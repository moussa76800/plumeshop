<?php

// app/Http/Controllers/API/ApiBookController.php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    public function getBooksBySubCategory($subCategoryId)
    {
        // Vérifier si la sous-catégorie existe
        $subCategory = SubCategory::findOrFail($subCategoryId);

        // Récupérer les 30 premiers livres de la sous-catégorie
        $books = Book::where('subCategory_id', $subCategoryId)
            ->take(30)
            ->get();

        return response()->json($books);
    }
}

