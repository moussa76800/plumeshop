<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Publisher;
use Faker\Calculator\Isbn;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use App\Models\Author;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Expr\BinaryOp\Mul;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

//AIzaSyDCJ89ClXL5q9m1rX7V5kzTOYWCxgjSn_I
/**
     * Afficher la liste de tous les livres.
     *
     * @return \Illuminate\View\View
     */
    public function bookView()
    {
        $book = Book::all();
        return view('backend.book.book_view', ['book' => $book]);
    }

public function bookAdd()
    {
        $categories =  Category::orderBy('name_en','ASC')->get();
        $subcategory= SubCategory::orderBy('name_en','ASC')->get();
        return view('backend.book.book_add', [ 'categories' => $categories, 'subcategory' => $subcategory]);
    }

    public function bookStore(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'isbn' => 'required',
            'prix' => 'required',
            'product_qty' => 'required',
            'discount_price' => 'required',
        ]);
    
        $isbn = str_replace([' ', '-'], '', $validatedData['isbn']);
    
        // Remplacez 'YOUR_API_KEY' par votre propre clé d'API Google Books
        $apiKey = 'AIzaSyDCJ89ClXL5q9m1rX7V5kzTOYWCxgjSn_I';
    
        // Effectuer une requête à l'API Google Books pour récupérer les informations du livre
        $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:{$isbn}&key={$apiKey}";
        $response = file_get_contents($url);
    
        $bookData = json_decode($response, true);
    
        if (isset($bookData['items'])) {
            // Récupérer les informations nécessaires du livre depuis $bookData
            $bookInfo = $bookData['items'][0]['volumeInfo'];
            $name_en = $bookInfo['title'];
            $name_fr = ""; // Remplacez cette valeur par le nom français approprié si disponible
    
            $publisherDate = Arr::get($bookInfo, 'publisherDate', '');
    
            $imageLinks = Arr::get($bookInfo, 'imageLinks.thumbnail', '');
    
            $language = $bookInfo['language'];
            $description = $bookInfo['description'];
            $shortDescription = substr($description, 0, 255);
    
            $authorIds = [];
            if (isset($bookInfo['authors'])) {
                $authors = $bookInfo['authors'];
    
                // Enregistrer les auteurs dans la base de données et obtenir leurs IDs
                foreach ($authors as $authorName) {
                    $author = Author::firstOrCreate(['name_en' => $authorName,
                    'name_fr' => $authorName,
                    'firstname_en' => $authorName,
                    'firstname_fr' => $authorName]);
                    $authorIds[] = $author->id;
                }
            }
           // ...
           $publisherId = 0;
           if (isset($bookInfo['publisher'])) {
               $publisherName = $bookInfo['publisher'][0];
   
               // Rechercher l'éditeur dans la table "publishers" par nom
               $publisher = Publisher::firstOrCreate(['name_en' => $publisherName,
               'name_fr' => $publisherName ]);
   
               $publisherId = $publisher->id;
           }
        
// ...

        //     $categoryId = 0;
        //     if (isset($bookInfo['categories'])) {
        //         $categoryName = $bookInfo['categories'][0];
    
        //         // Enregistrer la catégorie dans la base de données et obtenir son ID
        //         $category = Category::firstOrCreate(['name_en' => $categoryName,
        //         'name_fr' => $categoryName,
        //         'image' =>'' ]);
        //         $categoryId = $category->id;
        //     }

        //     $subCategoryId = 0;
        // if (isset($bookInfo['subCategory'])) {
        //     $subCategoryName = $bookInfo['subCategory'][0];

        //     // Rechercher la sous-catégorie dans la base de données par nom
        //     $subCategory = SubCategory::where('name_en', $subCategoryName)->orWhere('name_fr', $subCategoryName)->first();

        //     if ($subCategory) {
        //         $subCategoryId = $subCategory->id;
        //     } else {
        //         // Enregistrer la sous-catégorie dans la base de données et obtenir son ID
        //         $subCategory = SubCategory::create([
        //             'name_en' => $subCategoryName,
        //             'name_fr' => $subCategoryName,
        //             'category_id' => $categoryId
        //         ]);
        //         $subCategoryId = $subCategory->id;
        //     }
        // }
    
            $productCode = $request->product_code ?? 'art' . mt_rand(10000000, 99999999);
    

            
            // Enregistrer les informations du livre dans la base de données
            $book = Book::create([
                'name_en' => $name_en,
                'name_fr' => $name_fr,
                'isbn' => $isbn,
                'image' => '',
                'prix' => $validatedData['prix'],
                'datePublication' => $publisherDate,
                'langue' => $language,
                'product_code' => $productCode,
                'product_qty' => $validatedData['product_qty'],
                'discount_price' => $validatedData['discount_price'],
                'short_descp_en' => '',
                'short_descp_fr' => '',
                'product_thambnail' => $imageLinks,
                'special_offer' => $request->has('special_offer') ? 1 : 0,
                'featured' => $request->has('featured') ? 1 : 0,
                'long_descp_en' => $shortDescription,
                'long_descp_fr' => $shortDescription,
                'categoryBook_id' => $request->category_id,
                'subCategory_id' => $request->subcategory_id,
                'publisher_id' => $publisherId,
            ]);
    
            // Associer les auteurs au livre
            if (!empty($authorIds)) {
                $book->authors()->attach($authorIds);
            }
    
            return view('backend.book.book_view')->with('success', 'Le livre a été ajouté avec succès.');
        } else {
            return view('backend.book.book_view')->with('error', "Aucune information de livre n'a été trouvée pour cet ISBN.");
        }
    }

    public function GetBook($categoryBook_id)
{
    $subCategories = SubCategory::where('category_id', $categoryBook_id)->orderBy('name_en','ASC')->get();

    return json_encode($subCategories);
}

        

    // public function bookStore(Request $request)
    // {
    //     // Valider les données du formulaire
    //     $validatedData = $request->validate([
    //         'isbn' => 'required',
    //         'prix' => 'required',
    //         'product_qty' => 'required',
    //         'discount_price' => 'required',
    //     ]);
    
    //     $isbn = $validatedData['isbn'];
    
    //     // Supprimer les espaces et les tirets de l'ISBN
    //     $isbn = str_replace([' ', '-'], '', $isbn);
    
    //     // Remplacez 'YOUR_API_KEY' par votre propre clé d'API Google Books
    //     $apiKey = 'YOUR_API_KEY';
    
    //     // Effectuer une requête à l'API Google Books pour récupérer les informations du livre
    //     $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:{$isbn}&key={$apiKey}";
    //     $response = file_get_contents($url);
    
    //     $bookData = json_decode($response, true);
    
    //     if (isset($bookData['items'])) {
    //         // Récupérer les informations nécessaires du livre depuis $bookData
    //         $name_en = $bookData['items'][0]['volumeInfo']['title'];
    //         $name_fr = ""; // Remplacez cette valeur par le nom français approprié si disponible
    
    //         // Vérifier si la clé 'publisherDate' existe dans le tableau $bookData['items'][0]['volumeInfo']
    //         $publisherDate = isset($bookData['items'][0]['volumeInfo']['publisherDate']) ? $bookData['items'][0]['volumeInfo']['publisherDate'] : "";
    
    //         // Vérifier si la clé 'imageLinks' existe dans le tableau $bookData['items'][0]['volumeInfo']
    //         $imageLinks = isset($bookData['items'][0]['volumeInfo']['imageLinks']) ? $bookData['items'][0]['volumeInfo']['imageLinks'] : '';
    
    //         $language = $bookData['items'][0]['volumeInfo']['language'];
    //         $description = $bookData['items'][0]['volumeInfo']['description'];
    //         $shortDescription = substr($description, 0, 255);
    
    //         // Vérifier si des auteurs sont présents dans les informations du livre
    //         $authorIds = [];
    //         if (isset($bookData['items'][0]['volumeInfo']['authors'])) {
    //             $authors = $bookData['items'][0]['volumeInfo']['authors'];
    
    //             // Enregistrer les auteurs dans la base de données et obtenir leurs IDs
    //             foreach ($authors as $authorName) {
    //                 $author = Author::firstOrCreate(
    //                     ['name_en' => $authorName],
    //                     ['name_fr' => '', 'firstname_en' => '', 'firstname_fr' => '']
    //                 );
    //                 $authorIds[] = $author->id;
    //             }
    //         }
    
    //         // Vérifier si un éditeur est présent dans les informations du livre
    //         $publisherId = 0;
    //         if (isset($bookData['items'][0]['volumeInfo']['publisher'])) {
    //             $publisherName = $bookData['items'][0]['volumeInfo']['publisher'];
    
    //             // Enregistrer l'éditeur dans la base de données et obtenir son ID
    //             $publisher = Publisher::firstOrCreate(
    //                 ['name_en' => $publisherName],
    //                 ['name_fr' => '']
    //             );
    //             $publisherId = $publisher->id;
    //         }
    
    //         // Vérifier si une catégorie est présente dans les informations du livre
    //         $categoryId = null;
    // // 



//     public function bookStore(Request $request)
//     {
//         // Valider les données du formulaire
//         $validatedData = $request->validate([
//             'isbn' => 'required',
//             'price' => 'required',
//             'product_qty' => 'required',
//             'discount_price' => 'required',

//         ]);
    
//         $isbn = $validatedData['isbn'];
    
//         // Remplacez 'YOUR_API_KEY' par votre propre clé d'API Google Books
//         $apiKey = 'AIzaSyDCJ89ClXL5q9m1rX7V5kzTOYWCxgjSn_I';
    
//         // Effectuer une requête à l'API Google Books pour récupérer les informations du livre
//         $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:{$isbn}&key={$apiKey}";
//         $response = file_get_contents($url);
    
//         $bookData = json_decode($response, true);
    
//         if (isset($bookData['items'])) {
//             // Récupérer les informations nécessaires du livre depuis $bookData
//             $name_en = $bookData['items'][0]['volumeInfo']['title'];
//             $name_fr = ""; // Remplacez cette valeur par le nom français approprié si disponible
//             $publisherDate = $bookData['items'][0]['volumeInfo']['publisherDate'];
//             $imageLinks = $bookData['items'][0]['volumeInfo']['imageLinks'];
//             $language = $bookData['items'][0]['volumeInfo']['language'];
//             $description = $bookData['items'][0]['volumeInfo']['description'];
        
    
//             // Vérifier si des auteurs sont présents dans les informations du livre
//             if (isset($bookData['items'][0]['volumeInfo']['authors'])) {
//                 $authors = $bookData['items'][0]['volumeInfo']['authors'];
    
//                 // Enregistrer les auteurs dans la base de données et obtenir leurs IDs
//                 $authorIds = [];
//                 foreach ($authors as $authorName) {
//                     $author = Author::firstOrCreate(
//                         ['name_en' => $authorName],
//                         ['name_fr' => '', 'firstname_en' => '', 'firstname_fr' => '']
//                     );
//                     $authorIds[] = $author->id;
//                 }
                
//             }
    
//             // Vérifier si un éditeur est présent dans les informations du livre
//             if (isset($bookData['items'][0]['volumeInfo']['publisher'])) {
//                 $publisherName = $bookData['items'][0]['volumeInfo']['publisher'];
    
//                 // Enregistrer l'éditeur dans la base de données et obtenir son ID
//                 $publisher = Publisher::firstOrCreate(
//                     ['name_en' => $publisherName],
//                     ['name_fr' => '',]);
//                 $publisherId = $publisher->id;
//             }
            
//             // Vérifier si un éditeur est présent dans les informations du livre
//             if (isset($bookData['items'][0]['volumeInfo']['categories'])) {
//                 $categoryName = $bookData['items'][0]['volumeInfo']['categories'];
    
//                 // Enregistrer l'éditeur dans la base de données et obtenir son ID
//                 $categories = Publisher::firstOrCreate(
//                     ['name_en' => $categoryName],
//                     ['name_fr' => '',]);
//                 $categoryId = $categories->id;
//             }

//             $productCode = 'art' . mt_rand(10000000, 99999999);
    
//             // Enregistrer les informations du livre dans la base de données
//             $book = Book::create([
                
//                 'name_en' => $name_en,
//                 'name_fr' => $name_fr,
//                 'isbn' => $isbn,
//                 'image' =>  $imageLinks,
//                 'prix' => $request->prix,
//                 'datePublication' => $publisherDate,
//                 'langue' => $language, 
//                 'product_code' =>  $productCode,
//                 'product_qty' => $request->product_qty,
//                 'discount_price' => $request->discount_price,
//                 'short_descp_en'=> $description,
//                 'short_descp_fr'=> '',
//                 'product_thambnail' =>  $imageLinks,
//                 'special_offer' => $request->has('special_offer') ? 1 : 0,
//                  'featured' => $request->has('featured') ? 1 : 0,
//                 'long_descp_en'=> $description,
//                 'subCategory_id'=> '',
//                 'category_id' => $categoryId,
//                 'publisher_id'=> $publisherId,

//             ]);
//             // Associer les auteurs au livre
//             if (isset($authorIds)) {
//                 $book->authors()->attach($authorIds);

//             }
    
//             // Associer l'éditeur au livre
//             if (isset($publisherId)) {
//                 $book->publisher()->associate($publisherId);
//             }

            
//             // Associer category au livre
//             if (isset($categoryId)) {
//                 $book->category()->attach($categoryId);
//             }
    
//             return view('backend.book.book_view')->with('success', 'Le livre a été ajouté avec succès.');
//         } 
//     }
    

// public function bookEdit($id)
// {
//     $book = Book::findOrFail($id);
//     return view('backend.book.book_view', compact('book'));
// }
    

public function bookDelete($id)
{
    // Récupérer le livre à supprimer
    $book = Book::findOrFail($id);

    // Supprimer les images associées au livre
    $images = $book->images;
    foreach ($images as $image) {
        Storage::delete('public/books/' . $image->filename);
        $image->delete();
    }

    // Supprimer le livre
    $book->delete();

    return redirect()->route('all.books')->with('success', 'Le livre a été supprimé avec succès.');
}


}