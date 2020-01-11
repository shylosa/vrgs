<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller
{

    public function index()
    {
        $authors = DB::table('authors')->paginate(Controller::ON_PAGE);

        return view('authors.index', ['authors' => $authors]);
    }

    public function create()
    {
        return redirect('/authors');
    }

    public function edit()
    {
        return redirect('/authors');
    }

    public function delete()
    {
        return redirect('/authors');
    }
}
