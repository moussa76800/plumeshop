<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Publisher;
use Faker\Calculator\Isbn;
use App\Models\SubCategory;
use Illuminate\Support\Arr;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Expr\BinaryOp\Mul;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Output\OutputInterface;
use Illuminate\Support\Facades\Log;


class BookController extends Controller
{



    public function bookView()
    {
        $books = Book::orderBy('title')->get();

        return view('backend.book.book_view', compact('books'));
    }

    public function bookAdd()
    {
        $categories = Category::orderBy('name')->get();
        $subCategory = SubCategory::orderBy('name')->get();
        // return view('backend.book.book_add', [ 'categories' => $categories, 'subcategory' => $subcategory]);
        return view('backend.book.book_add', compact('categories', 'subCategory'));
    }


    public function bookStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'isbn' => 'required',
            'prix' => 'required|numeric|min:0',
            'product_qty' => 'required|numeric|min:1',
            'category_id' => 'required',
            'subCategory_id' => 'required',
        ]);

        // Remplacez 'YOUR_API_KEY' par votre propre clé d'API Google Books
        $apiKey = 'AIzaSyBQC5zTGO2xVUl9a3a2WZ4hWuGdZeK1hqk';
        $isbn = str_replace([' ', '-'], '', $request->isbn);

        // Effectuer une requête à l'API Google Books pour récupérer les informations du livre
        $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:{$isbn}&key={$apiKey}";
        $response = Http::get($url);
        $bookData = $response->json();

        // Vérifier si les données du livre sont disponibles dans la réponse de l'API
        if (isset($bookData['items'][0]['volumeInfo'])) {
            $bookInfo = $bookData['items'][0]['volumeInfo'];

            // Récupérer les informations nécessaires de chaque livre
            $title = isset($bookInfo['title']) ? $bookInfo['title'] : '';
            $isbn = isset($bookInfo['industryIdentifiers'][0]['identifier']) ? $bookInfo['industryIdentifiers'][0]['identifier'] : '';
            $pageCount = isset($bookInfo['pageCount']) ? $bookInfo['pageCount'] : null;
            $publisherDate = isset($bookInfo['publishedDate']) ? $bookInfo['publishedDate'] : null;
            $imageLinks = isset($bookInfo['imageLinks']['thumbnail']) ? $bookInfo['imageLinks']['thumbnail'] : '';
            $language = isset($bookInfo['language']) ? $bookInfo['language'] : '';
            $description = isset($bookInfo['description']) ? $bookInfo['description'] : '';
            $longDescription = substr($description, 0, 255);

            // Vérifier si toutes les informations nécessaires sont présentes
            if (empty($title) || empty($isbn) || $pageCount === null || $pageCount <= 0 || empty($imageLinks) || empty($language) || empty($description)) {
                // Si certaines informations essentielles sont manquantes ou invalides, redirigez avec un message d'erreur
                return redirect()->back()->with('error', 'Les informations du livre sont incomplètes ou invalides.');
            }
            //Log::info('Ceci est l isbn : ' . $isbn);

            // Vérifiez si le livre existe déjà dans la base de données en utilisant l'ISBN
            $existingBook = Book::where('isbn', $isbn)->first();

            if ($existingBook) {
                $existingBook->update([
                    'product_qty' => $existingBook['product_qty'] + $request->product_qty,
                ]);
                // Le livre existe déjà dans la base de données, redirigez avec un message d'erreur
                $notification = [
                    'message' => 'Ce livre existe déjà, la quantité à été ajoutée.',
                    'alert-type' => 'success',
                ];
                return redirect()->back()->with($notification);
            }

            // Chercher l'éditeur dans la base de données en utilisant le nom du publisher de l'API
            $publisherName = isset($bookInfo['publisher']) ? $bookInfo['publisher'] : '';
            $publisher = Publisher::where('name', $publisherName)->first();

            if (!$publisher) {
                // Si l'éditeur n'existe pas, l'insérer dans la base de données
                $publisher = Publisher::create(['name' => $publisherName]);
            }

            // Enregistrez les informations du livre dans la base de données
            $book = Book::create([
                'title' => $title,
                'isbn' => $isbn,
                'num_pages' => $pageCount,
                'image' => $imageLinks,
                'price' => $request->prix,
                'datePublication' => $publisherDate,
                'langue' => $language,
                'product_code' => 'art' . mt_rand(10000000, 99999999),
                'product_qty' => $request->product_qty,
                'discount_price' => $request->discount_price,
                'special_offer' => $request->special_offer,
                'featured' => $request->featured,
                'newBook' => $request->newBook,
                'long_descp' => $longDescription,
                'categoryBook_id' => $request->category_id,
                'subCategory_id' => $request->subCategory_id,
                'publisher_id' => $publisher->id,
            ]);

            // Associez les auteurs au livre si nécessaire
            if (isset($bookInfo['authors'])) {
                foreach ($bookInfo['authors'] as $authorName) {
                    // Rechercher l'auteur par nom dans la base de données
                    $author = Author::where('name', $authorName)->first();

                    if (!$author) {
                        // Si l'auteur n'existe pas, l'insérer dans la base de données
                        $author = Author::create(['name' => $authorName]);
                    }

                    // Associer l'auteur au livre
                    $book->authors()->attach($author->id);
                }
            }

            // Redirigez avec un message de succès
            return redirect()->back()->with('success', 'Le livre a été ajouté avec succès.');
        } else {
            // Si les données du livre ne sont pas disponibles dans la réponse de l'API, redirigez avec un message d'erreur
            return redirect()->back()->with('error', 'ISBN invalide ou livre introuvable dans l\'API Google Books.');
        }
    }


    public function addBooksAutomatically()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            $subCategories = SubCategory::where('category_id', $category->id)->get();

            foreach ($subCategories as $subCategory) {
                // Remplacez 'YOUR_API_KEY' par votre propre clé d'API Google Books
                $apiKey = 'AIzaSyBQC5zTGO2xVUl9a3a2WZ4hWuGdZeK1hqk';

                // Effectuer une requête à l'API Google Books pour récupérer les livres de la sous-catégorie
                $url = "https://www.googleapis.com/books/v1/volumes?q={$subCategory->name}&maxResults=30&key={$apiKey}";
                $response = Http::get($url);

                $bookData = $response->json();

                if (isset($bookData['items'])) {
                    foreach ($bookData['items'] as $item) {
                        // Récupérer les informations nécessaires de chaque livre
                        $bookInfo = $item['volumeInfo'];
                        $title = isset($bookInfo['title']) ? $bookInfo['title'] : '';
                        $isbn = isset($bookInfo['industryIdentifiers'][0]['identifier']) ? $bookInfo['industryIdentifiers'][0]['identifier'] : '';
                        $pageCount = isset($bookInfo['pageCount']) ? $bookInfo['pageCount'] : null;
                        $publisherDate = isset($bookInfo['publishedDate']) ? $bookInfo['publishedDate'] : null;
                        $imageLinks = isset($bookInfo['imageLinks']['thumbnail']) ? $bookInfo['imageLinks']['thumbnail'] : '';
                        $language = isset($bookInfo['language']) ? $bookInfo['language'] : '';
                        $description = isset($bookInfo['description']) ? $bookInfo['description'] : '';
                        $longDescription = substr($description, 0, 255);

                        // Vérifier si le livre existe déjà dans la base de données en utilisant l'ISBN
                        $existingBook = Book::where('isbn', $isbn)->first();

                        if (!$existingBook) {
                            // Vérifier si les informations essentielles du livre sont présentes
                            if (empty($title) || empty($imageLinks) || empty($publisherDate) || empty($isbn) || $pageCount === null || $pageCount <= 0) {
                                // Si certaines informations essentielles sont manquantes ou invalides, passer au livre suivant
                                continue;
                            }


                            // Chercher l'éditeur dans la base de données en utilisant le nom du publisher de l'API
                            $publisherName = isset($bookInfo['publisher']) ? $bookInfo['publisher'] : '';
                            $publisher = Publisher::where('name', $publisherName)->first();

                            if (!$publisher) {
                                // Si l'éditeur n'existe pas, l'insérer dans la base de données
                                $publisher = Publisher::create(['name' => $publisherName]);
                            }

                            $productCode = 'art' . mt_rand(10000000, 99999999);
                            $price = mt_rand(500, 2000) / 100;
                            $specialOffer = rand(0, 1);
                            $featured = rand(0, 1);
                            $newBook = rand(0, 1);
                            $discountPrice = mt_rand(1, 4000) / 100; // Génère un nombre avec deux chiffres après la virgule (ex: 12.34)
                            if ($discountPrice >= $price) {
                                $discountPrice = null;
                            } else {
                                $discountPrice = round($discountPrice * 2) / 2;
                            }
                            $productQty = mt_rand(1, 5);
                            $status = mt_rand(0, 1);


                            // Enregistrez les informations du livre dans la base de données
                            $book = Book::create([
                                'title' => $title,
                                'isbn' => $isbn,
                                'num_pages' => $pageCount,
                                'image' => $imageLinks,
                                'price' => $price,
                                'datePublication' => $publisherDate,
                                'langue' => $language,
                                'product_code' => $productCode,
                                'product_qty' =>  $productQty,
                                'discount_price' => $discountPrice,
                                'special_offer' => $specialOffer,
                                'featured' => $featured,
                                'newBook' => $newBook,
                                'long_descp' => $longDescription,
                                'status' => $status,
                                'categoryBook_id' => $category->id,
                                'subCategory_id' => $subCategory->id,
                                'publisher_id' => $publisher->id, // Utilisez l'ID de l'éditeur existant ou nouvellement inséré
                            ]);

                            if ($book->special_offer) {
                                $book->featured = 0;
                                $book->newBook = 0;
                            } else if ($book->featured) {
                                $book->newBook = 0;
                            } else if ($book->newBook) {
                                $book->featured = 0;
                            }

                            // Associez les auteurs au livre si nécessaire
                            if (isset($bookInfo['authors'])) {
                                foreach ($bookInfo['authors'] as $authorName) {
                                    // Rechercher l'auteur par nom dans la base de données
                                    $author = Author::where('name', $authorName)->first();

                                    if (!$author) {
                                        // Si l'auteur n'existe pas, l'insérer dans la base de données
                                        $author = Author::create(['name' => $authorName]);
                                    }

                                    // Associer l'auteur au livre
                                    $book->authors()->attach($author->id);
                                }
                            }
                        }
                    }
                }
            }
        }
    }



    public function GetBook($category_id)
    {
        $subCategory = SubCategory::where('categoryBook_id', $category_id)->orderBy('name', 'ASC')->get();

        return json_encode($subCategory);
    }



    public function bookDetails($id)
    {
        // Recherchez le livre dans la base de données par son ID
        $book = Book::with('categoryBook', 'subCategory')->findOrFail($id);
         
        return view('backend.book.details_book', compact('book'));
    }


    public function bookEdit($id)
    {
        $book = Book::findOrFail($id);
        $categories =  Category::orderBy('name')->get();
        $subCategories = SubCategory::orderBy('name')->get();
        return view('backend.book.book_edit', compact('book', 'categories', 'subCategories'));
    }

    public function bookUpdate(Request $request)
    {

        $book_id = $request->id;

        Book::findOrFail($book_id)->update([
            'categoryBook_id' => $request->category_id,
            'subCategory_id' => $request->subCategory_id,
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'discount_price' => $request->discount_price,
            'featured' => $request->featured,
            'newBook' => $request->newBook,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,

        ]);

        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('backend.book.book_view')->with($notification);
    } // end method 

    public function ThambnailImageUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book = Book::findOrFail($id);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image de la miniature si elle existe
            $oldThumbnail = public_path($book->image);
            if (file_exists($oldThumbnail)) {
                unlink($oldThumbnail);
            }

            // Enregistrer la nouvelle image de la miniature dans le système de fichiers
            $imagePath = $request->file('image')->store('upload/book/thambnail');

            // Mettre à jour le champ de l'image de la miniature du livre dans la base de données
            $book->update([
                'image' => $imagePath,
            ]);
        }

        $notification = [
            'message' => 'Product Image Thambnail Updated Successfully',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    public function bookInactiveNow($id)
    {
        Book::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'danger'
        );

        return redirect()->back()->with($notification);
    }


    public function bookActiveNow($id)
    {
        Book::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function bookDelete($id)
    {
        $product = Book::findOrFail($id);

        // Vérifier si l'image existe avant de tenter de la supprimer
        if (!empty($product->image) && file_exists(public_path($product->image))) {
            // Supprimer l'image du serveur
            unlink(public_path($product->image));
        }

        // Supprimer le livre de la base de données
        Book::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function productStock(){
        $stock = Book::get();
        return view('backend.book.book_stock',compact('stock'));
      }
}
