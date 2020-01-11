<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function index()
    {
        $books = DB::table('books')->paginate(Controller::ON_PAGE);

        return view('books.index', ['books' => $books]);
    }

    public function create()
    {
        return redirect('/books');
    }

    public function edit()
    {
        return redirect('/books');
    }

    public function delete()
    {
        return redirect('/books');
    }
}
