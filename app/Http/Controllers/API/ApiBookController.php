<?php

// app/Http/Controllers/API/ApiBookController.php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Models\Author;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiBookController extends Controller
{
    public function getBooksBySubCategory($subCategoryId)
    {
        // Vérifier si la sous-catégorie existe
        SubCategory::findOrFail($subCategoryId);

        // Récupérer les 30 premiers livres de la sous-catégorie
        $books = Book::where('subCategory_id', $subCategoryId)
            ->take(30)
            ->get();

        return response()->json($books);
    }

    public function Books(){
        $livres = Book::all();
        return response()->json($livres);
    }

    public function Show($id)
{
    $book = Book::find($id); 

    if (!$book) {
        return response()->json(['message' => 'Livre non trouvé'], 404); 
    }

    return response()->json($book, 200); 
}

    public function Authors(){
        $livres = Author::all();
        return response()->json($livres);
    }


}

