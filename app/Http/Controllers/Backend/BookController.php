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

class BookController extends Controller
{

    
    
        public function bookView()
        {
            $books = Book::all();
    
            return view('backend.book.book_view', compact('books'));
        }
    
        public function bookAdd()
            {
                $categories =  Category::orderBy('name')->get();
                $subcategory= SubCategory::orderBy('name')->get();
                // return view('backend.book.book_add', [ 'categories' => $categories, 'subcategory' => $subcategory]);
                return view('backend.book.book_add',compact('categories','subcategory'));
            }
            
                public function bookStore(Request $request)
                {
                    $validatedData = $request->validate([
                        'isbn' => 'required|regex:/^(\d{3}-\d{10}|\d{13})$/',
                        'prix' => 'required|numeric|min:0',
                        'product_qty' => 'required|numeric|min:0',
                        'category_id' => 'required',
                        'subcategory_id' => 'required',
                    ]);
            
                    $isbn = str_replace([' ', '-'], '', $validatedData['isbn']);
            
                    $categories = Category::all();
            
                    foreach ($categories as $category) {
                        $subCategories = SubCategory::where('category_id', $category->id)->get();
            
                        foreach ($subCategories as $subCategory) {
                            // Remplacez 'YOUR_API_KEY' par votre propre clé d'API Google Books
                            $apiKey = '';
            
                            // Effectuez une requête à l'API Google Books pour récupérer les livres de la sous-catégorie
                            $url = "https://www.googleapis.com/books/v1/volumes?q={$subCategory->name}&maxResults=30&key={$apiKey}";
                            $response = Http::get($url);
            
                            $bookData = $response->json();
            
                            if (isset($bookData['items'])) {
                                $booksAdded = 0; // Compteur de livres ajoutés pour cette sous-catégorie
                                foreach ($bookData['items'] as $item) {
                                    if ($booksAdded >= 30) {
                                        break; // Limite de 30 livres atteinte, sortir de la boucle
                                    }
                                    // Récupérez les informations nécessaires de chaque livre
                                    $bookInfo = $item['volumeInfo'];
                                    $title = $bookInfo['title'];
                                    $isbn = isset($bookInfo['industryIdentifiers'][0]['identifier']) ? $bookInfo['industryIdentifiers'][0]['identifier'] : '';
                                    $pageCount = isset($bookInfo['pageCount']) ? $bookInfo['pageCount'] : null;
                                    $publisherDate = isset($bookInfo['publishedDate']) ? $bookInfo['publishedDate'] : null;
                                    $imageLinks = isset($bookInfo['imageLinks']['thumbnail']) ? $bookInfo['imageLinks']['thumbnail'] : '';
                                    $language = isset($bookInfo['language']) ? $bookInfo['language'] : '';
                                    $description = isset($bookInfo['description']) ? $bookInfo['description'] : '';
                                    $longDescription = substr($description, 0, 255);
            
                                    // Vérifiez si le livre existe déjà dans la base de données en utilisant l'ISBN
                                    $existingBook = Book::where('isbn', $isbn)->first();
            
                                    if (!$existingBook) {
                                        // Enregistrez les informations du livre dans la base de données
                                        $book = Book::create([
                                            'title' => $title,
                                            'isbn' => $isbn,
                                            'num_pages' => $pageCount,
                                            'image' => $imageLinks,
                                            'price' => $request->prix,
                                            'datePublication' => $publisherDate,
                                            'langue' => $language,
                                            'product_code' => $request->product_code ?? 'art' . mt_rand(10000000, 99999999),
                                            'product_qty' => $validatedData['product_qty'],
                                            'discount_price' => $request->discount_price,
                                            'special_offer' => $request->has('special_offer') ? 1 : 0,
                                            'featured' => $request->has('featured') ? 1 : 0,
                                            'long_descp' => $longDescription,
                                            'categoryBook_id' => $category->id,
                                            'subCategory_id' => $subCategory->id,
                                            'publisher_id' => null,
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
            
                                        // Associez l'éditeur au livre si nécessaire
                                        $publisherName = isset($bookInfo['publisher']) ? $bookInfo['publisher'] : '';
                                        if (!empty($publisherName)) {
                                            $publisher = Publisher::where('name', $publisherName)->first();
            
                                            if (!$publisher) {
                                                // Si l'éditeur n'existe pas, l'insérer dans la base de données
                                                $publisher = Publisher::create(['name' => $publisherName]);
                                            }
            
                                            // Associer l'éditeur au livre
                                            $book->publisher_id = $publisher->id;
                                            $book->save();
                                            $booksAdded++; // Incrémenter le compteur de livres ajoutés
                                        }
                                    }
                                }
                            }
                        }
                    }
            
                    return view('backend.book.book_view')->with('success', 'Les livres ont été ajoutés avec succès.');
                }

                public function addBooksAutomatically()
                {
                    $categories = Category::all();
                
                    foreach ($categories as $category) {
                        $subCategories = SubCategory::where('category_id', $category->id)->get();
                
                        foreach ($subCategories as $subCategory) {
                            // Remplacez 'YOUR_API_KEY' par votre propre clé d'API Google Books
                            $apiKey = '';
                
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
                                        if (empty($title) || empty($isbn) || $pageCount === null || $pageCount <= 0) {
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
                                        $discountPrice = rand(0, 60);
                                        $productQty = mt_rand(0, 10);

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
                                            'long_descp' => $longDescription,
                                            'categoryBook_id' => $category->id,
                                            'subCategory_id' => $subCategory->id,
                                            'publisher_id' => $publisher->id, // Utilisez l'ID de l'éditeur existant ou nouvellement inséré
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
                                    }
                                }
                            }
                        }
                    }
                }
                
               
    


        //     public function bookStore(Request $request)
        //     {
        //         // Valider les données du formulaire
        //         $validatedData = $request->validate([
        //             'isbn' => 'required|regex:/^(\d{3}-\d{10}|\d{13})$/',
        //             'prix' => 'required|numeric|min:0',
        //             'product_qty' => 'required|numeric|min:0',
        //             'category_id' => 'required',
        //             'subcategory_id' => 'required',
        //         ]);
            
        //         $isbn = str_replace([' ', '-'], '', $validatedData['isbn']);
            
        //         // Remplacez 'YOUR_API_KEY' par votre propre clé d'API Google Books
        //         $apiKey = '';
            
        //         // Effectuer une requête à l'API Google Books pour récupérer les informations du livre
        //         $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:{$isbn}&key={$apiKey}";
        //         $response = file_get_contents($url);
                
            
        //         $bookData = json_decode($response, true);
            
        //         if (isset($bookData['items'])) {
        //             // Récupérer les informations nécessaires du livre depuis $bookData
        //             $bookInfo = $bookData['items'][0]['volumeInfo'];
        //             $title = $bookInfo['title'];
        //             $pageCount=$bookInfo['pageCount'];
        //             $publisherDate = Arr::get($bookInfo, 'publishedDate', '');
        //             $imageLinks = Arr::get($bookInfo, 'imageLinks.thumbnail', '');
        //             $language = $bookInfo['language'];
        //             $description = isset($bookInfo['description']) ? $bookInfo['description'] : '';
        //             $longDescription = substr($description, 0, 255);

        //              //dd($imageLinks);
                
        //             // Récupérer l'URL de l'image à partir de la réponse de l'API Google Books
        //             $imageLinks = Arr::get($bookInfo, 'imageLinks.thumbnail', '');

        //             // Vérifier si l'URL de l'image est vide
        //             if (!empty($imageLinks)) {
        //                 // Récupérer le nom de fichier à partir de l'URL de l'image
        //                 $filename = basename($imageLinks);

        //                 // Définir le chemin de destination de l'image
        //                 $destinationPath = public_path('upload/book/thambnail/') . $filename;

        //                // Télécharger l'image depuis l'URL
        //                 $imageContent = file_get_contents($imageLinks);

        //                 // Redimensionner l'image avec une taille maximale de 917x1000
        //                 $image = Image::make($imageContent)->resize(917, 1000, function ($constraint) {
        //                     $constraint->aspectRatio();
        //                     $constraint->upsize();
        //                 });

        //                         // Enregistrer l'image redimensionnée dans le répertoire de destination
        //                 $image->save($destinationPath);

        //                 // Mettre à jour l'URL de l'image avec le chemin local
        //                 $imageLinks = 'upload/book/thambnail/' . $filename;
        //             } else {
        //                 // Si l'URL de l'image est vide, fournir une image par défaut
        //                 $imageLinks = url('upload/no_image.png');
        //             }

            
        //             $authorIds = [];
        //                 if (isset($bookInfo['authors'])) {
        //                     $authors = $bookInfo['authors'];

        //                     foreach ($authors as $authorName) {
        //                         // Rechercher l'auteur par nom dans la base de données
        //                         $author = Author::where('name', $authorName)->first();

        //                         if (!$author) {
        //                             // Si l'auteur n'existe pas, l'insérer dans la base de données
        //                             $author = Author::create(['name' => $authorName]);
        //                         }

        //                         $authorIds[] = $author->id;
        //                     }
        //                 }

        //                         // Récupérer les informations sur l'éditeur
        //             $publisherName = isset($bookInfo['publisher']) ? $bookInfo['publisher'] : '';
        //             $publisher = Publisher::where('name', $publisherName)->first();
                

        //             if (!$publisher) {
        //                 // Si l'éditeur n'existe pas, l'insérer dans la base de données
        //                 $publisher = Publisher::create(['name' => $publisherName]);
        //             }

        //             $publisherId = $publisher->id;
                        
        //             $productCode = $request->product_code ?? 'art' . mt_rand(10000000, 99999999);
                
        //             // Enregistrer les informations du livre dans la base de données
        //             $book = Book::create([
        //                 'title' => $title,
        //                 'isbn' => $isbn,
        //                 'num_pages' => $pageCount,
        //                 'image' => $imageLinks,
        //                 'price' => $request->prix,
        //                 'datePublication' => $publisherDate,
        //                 'langue' => $language,
        //                 'product_code' => $productCode,
        //                 'product_qty' => $validatedData['product_qty'],
        //                 'discount_price' => $request->discount_price,
        //                 'special_offer' => $request->has('special_offer') ? 1 : 0,
        //                 'featured' => $request->has('featured') ? 1 : 0,
        //                 'long_descp' =>$longDescription ,
        //                 'categoryBook_id' => $request->category_id,
        //                 'subCategory_id' => $request->subcategory_id,
        //                 'publisher_id' => $publisherId,

                        
        //             ]);
            
        //             // Associer les auteurs au livre
        //             if (!empty($authorIds)) {
        //                 $book->authors()->attach($authorIds);
        //             }
            
        //             return view('backend.book.book_view')->with('success', 'Le livre a été ajouté avec succès.');
        //         } else {
        //             return view('backend.book.book_view')->with('error', "Aucune information de livre n'a été trouvée pour cet ISBN.");
        //         }
        //     }

        //     public function GetBook($categoryBook_id)
        // {
        //     $subCategories = SubCategory::where('category_id', $categoryBook_id)->orderBy('name','ASC')->get();

        //     return json_encode($subCategories);
        // }


        //  public function bookEdit($id)
        // {
        //     $book = Book::findOrFail($id);
        //     $categories =  Category::orderBy('name')->get();
        //     $subCategories= SubCategory::orderBy('name')->get();
        //     return view('backend.book.book_edit', compact('book','categories','subCategories'));
        // }  

        // public function bookUpdate(Request $request){

        // 		$book_id = $request->id;

        //          Book::findOrFail($book_id)->update([
        //       	'category_id' => $request->category_id,
        //       	'subCategory_id' => $request->subCategory_id,
        //       	'product_code' => $request->product_code,
        //       	'product_qty' => $request->product_qty,
        //       	'discount_price' => $request->discount_price,
        //       	'featured' => $request->featured,
        //       	'special_offer' => $request->special_offer,
        //       	'special_deals' => $request->special_deals,      	 
        //       	'status' => 1,

        //       ]);

        //           $notification = array(
        // 			'message' => 'Product Updated Without Image Successfully',
        // 			'alert-type' => 'success'
        // 		);

        // 		return redirect()->route('backend.book.book_view')->with($notification);


        // 	} // end method 

            // // Multiple Image Update
            // public function MultiImageUpdate(Request $request){
            // 	$imgs = $request->multi_img;

            // 	foreach ($imgs as $id => $img) {
            //     $imgDel = MultiImg::findOrFail($id);
            //     unlink($imgDel->photo_name);
                
            // 	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            // 	Image::make($img)->resize(917,1000)->save('upload/book/multi_image/'.$make_name);
            // 	$uploadPath = 'upload/book/multi_image/'.$make_name;

            // 	MultiImg::where('id',$id)->update([
            // 		'photo_name' => $uploadPath,
            // 		'updated_at' => Carbon::now(),

            // 	]);

            //  } // end foreach

            //    $notification = array(
            // 		'message' => 'Product Image Updated Successfully',
            // 		'alert-type' => 'info'
            // 	);

            // 	return redirect()->back()->with($notification);

            // } // end mehtod 


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



        //  //// Multi Image Delete ////
        //      public function MultiImageDelete($id){
        //      	$oldimg = MultiImg::findOrFail($id);
        //      	unlink($oldimg->photo_name);
        //      	MultiImg::findOrFail($id)->delete();

        //      	$notification = array(
        // 			'message' => 'Product Image Deleted Successfully',
        // 			'alert-type' => 'success'
        // 		);

        // 		return redirect()->back()->with($notification);

        //      } // end method 



        public function bookInactiveNow($id){
            Book::findOrFail($id)->update(['status' => 0]);
            $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'danger'
        );

        return redirect()->back()->with($notification);
        }


        public function bookActiveNow($id){
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

            // Récupérer toutes les images liées au livre
            $images = MultiImg::where('book_id', $id)->get();

            // Parcourir les images et les supprimer du serveur
            foreach ($images as $img) {
                if (!empty($img->photo_name) && file_exists(public_path($img->photo_name))) {
                    unlink(public_path($img->photo_name));
                }
            }

            // Supprimer toutes les images liées au livre de la base de données
            MultiImg::where('book_id', $id)->delete();

            $notification = array(
                'message' => 'Product Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

        }

