<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{

    /**
     * Show catalog page
     *
     * @return Factory|View
     */
    public function index()
    {
        $books = Book::all();

        return view('main.index', ['books' => $books]);
    }

}
