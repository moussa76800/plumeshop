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
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Expr\BinaryOp\Mul;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

//    // Méthode pour afficher tous les livres
//    public function BookView()
//    {
//        // Récupérer tous les livres triés par date de création
//        $books = Book::latest()->get();
      
//        // Passer les livres à la vue "backend.book.book_view"
//        return view('backend.book.book_view', compact('books'));
//    }

//    public function bookAdd()
// {
//     return view('backend.book.book_add');
// }
//    //    public function search(Request $request)
//    //  {
//    //      $request->validate([
//    //          'query' => 'required|string',
//    //      ]);

//    //      $query = $request->input('query');
//    //      $books = Book::search($query)->get();

//    //      if (! $books->count()) {
//    //          return back()->withErrors(['Aucun résultat trouvé']);
//    //      }

//    //      return view('books.search', ['books' => $books]);
    

//    //      $query = $request->input('query');
//    //      $type = $request->input('type');
//    //      $books = null;
//    //      if ($type === 'title') {
//    //          $books = Book::where('title', 'like', '%' . $query . '%')->get();
//    //      } elseif ($type === 'author') {
//    //          $books = Book::whereHas('authors', function ($query) use ($request) {
//    //              $query->where('name', 'like', '%' . $request->input('query') . '%');
//    //          })->get();
//    //      } elseif ($type === 'publisher') {
//    //          $books = Book::where('publisher', 'like', '%' . $query . '%')->get();
//    //      } elseif ($type === 'category') {
//    //       $books = Book::whereHas('categories', function ($query) use ($request) {
//    //          $query->where('name', 'like', '%' . $request->input('query') . '%');
//    //      })->get();
//    //  }
//    //  return view('books.search', ['books' => $books]);

//    // }

//    // Méthode pour rechercher des livres en fonction d'un critère
//    public function search(Request $request)
//    {
//        // Valider que le champ de recherche n'est pas vide
//        $request->validate([
//            'query' => 'required|string',
//        ]);

//        // Récupérer le terme de recherche saisi par l'utilisateur
//        $query = $request->input('query');

//        // Récupérer le type de recherche choisi (par titre, auteur, éditeur ou catégorie)
//        $type = $request->input('type');

//        // Initialiser la variable des livres à null
//        $books = null;

//        // Si le type de recherche est par titre, récupérer les livres dont le titre contient le terme de recherche
//        if ($type === 'title') {
//            $books = Book::where('title', 'like', '%' . $query . '%')->get();
//        } 
//        // Si le type de recherche est par auteur, récupérer les livres dont l'auteur contient le terme de recherche
//        elseif ($type === 'author') {
//            $books = Book::whereHas('authors', function ($query) use ($request) {
//                $query->where('name', 'like', '%' . $request->input('query') . '%');
//            })->get();
//        } 
//        // Si le type de recherche est par éditeur, récupérer les livres dont l'éditeur contient le terme de recherche
//        elseif ($type === 'publisher') {
//            $books = Book::where('publisher', 'like', '%' . $query . '%')->get();
//        } 
//        // Si le type de recherche est par catégorie, récupérer les livres dont la catégorie contient le terme de recherche
//        elseif ($type === 'category') {
//            $books = Book::whereHas('categories', function ($query) use ($request) {
//                $query->where('name', 'like', '%' . $request->input('query') . '%');
//            })->get();
//        }

//        // Si aucun livre n'a été trouvé pour la recherche, retourner une erreur
//        if (! $books->count()) {
//            return back()->withErrors(['Aucun résultat trouvé']);
//        }

//        // Passer les livres trouvés à la vue "books.search"
//        return view('books.search', ['books' => $books]);
//    }
//       public function bookStore(Request $request)
// { 
//     // Récupérer l'identifiant Google Books saisi par l'utilisateur
//     $googleBooksId = $request->isbn;

//     // Construire l'URL de l'API Google Books pour récupérer les données du livre
//     $apiUrl = 'https://www.googleapis.com/books/v1/volumes/' . $googleBooksId;

//     // Récupérer les données du livre à partir de l'API Google Books
//     $bookData = json_decode(file_get_contents($apiUrl), true);

//     // Vérifier si le livre existe déjà en base de données
//     $existingBook = Book::where('google_books_id', $googleBooksId)->first();

//     if ($existingBook) {
//         // Le livre existe déjà, renvoyer une erreur
//         return response()->json(['error' => 'Ce livre existe déjà en base de données.'], 409);
//     }

//     // Créer un nouveau livre
//     $book = new Book;
//     $book->google_books_id = $googleBooksId;
//     $book->title = $bookData['volumeInfo']['title'] ?? '';
//     $book->author = $bookData['volumeInfo']['authors'][0] ?? '';
//     $book->description = $bookData['volumeInfo']['description'] ?? '';
//     $book->publication_date = $bookData['volumeInfo']['publishedDate'] ?? '';
//     $book->page_count = $bookData['volumeInfo']['pageCount'] ?? '';
//     $book->language = $bookData['volumeInfo']['language'] ?? '';
//     $book->thumbnail_url = $bookData['volumeInfo']['imageLinks']['thumbnail'] ?? '';
//     $book->save();

//     return response()->json(['success' => 'Le livre a bien été ajouté en base de données.'], 200);
// }

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
        return view('backend.book.book_add');
    }

    /**
     * Rechercher des livres à partir de l'API Google Books.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchBooks(Request $request)
    {
        // Valider les données de la requête
        $validator = Validator::make($request->all(), [
            'search_term' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('books.search')
                ->withErrors($validator)
                ->withInput();
        }

        // Récupérer le terme de recherche
        $searchTerm = $request->input('isbn');

        // Construire l'URL de l'API Google Books
        $apiUrl = 'https://www.googleapis.com/books/v1/volumes?q=' . urlencode($searchTerm);

        // Récupérer les données des livres à partir de l'API Google Books
        $bookData = json_decode(file_get_contents($apiUrl), true);

        // Récupérer les données utiles pour chaque livre
        $books = [];
        foreach ($bookData['items'] as $item) {
            $book = [
                'google_books_id' => $item['id'],
                'title' => $item['volumeInfo']['title'] ?? '',
                'author' => implode(', ', $item['volumeInfo']['authors'] ?? []),
                'description' => $item['volumeInfo']['description'] ?? '',
                'publication_date' => $item['volumeInfo']['publishedDate'] ?? '',
                'page_count' => $item['volumeInfo']['pageCount'] ?? '',
                'language' => $item['volumeInfo']['language'] ?? '',
                'thumbnail_url' => $item['volumeInfo']['imageLinks']['thumbnail'] ?? '',
            ];

            $books[] = $book;
        }

        return view('backend.book.book_add', ['books' => $books]);
    }


    /**
     * Enregistrer un nouveau livre en base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function bookStore(Request $request)
{ 
    // Récupérer l'identifiant Google Books saisi par l'utilisateur
    $googleBooksId = $request->isbnn;

    // Construire l'URL de l'API Google Books pour récupérer les données du livre
    $apiUrl = 'https://www.googleapis.com/books/v1/volumes/' . $googleBooksId;

    // Récupérer les données du livre à partir de l'API Google Books
    $bookData = json_decode(file_get_contents($apiUrl), true);
    dd($bookData);

    // Vérifier si le livre existe déjà en base de données
    $existingBook = Book::where('google_books_id', $googleBooksId)->first();

    if ($existingBook) {
        // Le livre existe déjà, renvoyer une erreur
        return response()->json(['error' => 'Ce livre existe déjà en base de données.'], 409);
    }

    // Créer un nouveau livre
    $book = new Book;
    $book->google_books_id = $googleBooksId;
    $book->title = $bookData['volumeInfo']['title'] ?? '';
    $book->author = implode(', ', $bookData['volumeInfo']['authors'] ?? []);
    $book->description = $bookData['volumeInfo']['description'] ?? '';
    $book->publication_date = $bookData['volumeInfo']['publishedDate'] ?? '';
    $book->page_count = $bookData['volumeInfo']['pageCount'] ?? '';
    $book->language = $bookData['volumeInfo']['language'] ?? '';
    $book->thumbnail_url = $bookData['volumeInfo']['imageLinks']['thumbnail'] ?? '';
    $book->save();

    return response()->json(['success' => 'Le livre a bien été ajouté en base de données.'], 200);
}

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