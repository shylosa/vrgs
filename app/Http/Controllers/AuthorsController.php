<?php

namespace App\Http\Controllers;

use App\AppModel;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthorsController extends Controller
{
    public function index(Request $request)
    {
        $authors = DB::table('authors')->paginate(Controller::ON_PAGE);
        $startRow = AppModel::getPageNumber($request);

        return view('authors.index', ['authors' => $authors, 'startRow' => $startRow]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' =>'required|alpha|min:3',
            'lastname' =>'required|alpha',
            'patronymic' => 'alpha|nullable'
        ]);

        //Validation OK
        if (!$validator->fails()) {
            Author::add($request->all());

            return redirect()->back()->with('status', 'Author add!');
        }

        //Validation failed
        return redirect()->back()->withErrors($validator);

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
