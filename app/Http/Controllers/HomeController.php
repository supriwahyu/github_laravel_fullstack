<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Book;

class HomeController extends Controller
{
    public function home()
    {
        $articles = Article::all();
        $articles = Article::orderBy('id', 'desc')->take(4)->get();

        $books = Book::all();
        $books = Book::orderBy('id', 'desc')->take(6)->get();

        return view('home', compact('articles', 'books'));
    }

    public function signin()
    {

        return view('signin');
    }

    public function signup()
    {

        return view('signup');
    }
}
