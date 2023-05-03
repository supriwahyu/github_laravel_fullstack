<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Book;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $books = Book::all();
        return view('admin.dashboard', compact('articles', 'books'));
    }
}
