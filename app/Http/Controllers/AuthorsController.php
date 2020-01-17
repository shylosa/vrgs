<?php

namespace App\Http\Controllers;

use App\AppModel;
use App\Author;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class AuthorsController extends Controller
{
    /**
     * Show author's page
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $authors = Author::all();
        $fields = ['authors' => $authors];

        return ($request->ajax()) ?
            view('partials.table-authors', $fields) :
            view('authors.index', $fields);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $author = new Author;
        return view('partials.form-author', ['author' => $author]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' =>'required|alpha',
            'lastname' =>'required|alpha|min:3',
            'patronymic' => 'alpha|nullable'
        ]);
        //Save old input data in session
        $request->flash();
        //Validation OK
        if (!$validator->fails()) {
            Author::add($request->all());
            return redirect()->back()->with('status', 'Author add!');
        }
        //Validation failed
        //return redirect(route('author.add'))->withErrors($validator);
        return response()->json(['errors' => $validator->errors()->toArray()], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {

        //Edit author
        $author = Author::find($id);

        return view('partials.form-author', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse|RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'firstname' =>'required|alpha',
            'lastname' =>'required|alpha|min:3',
            'patronymic' => 'alpha|nullable'
        ]);
        //Save old input data in session
        $request->flash();
        //Validation OK
        if (!$validator->fails()) {
            $author = Author::find($id);
            $author->edit($request->all());

            return redirect()->back()->with('status', 'Author updated!');
        }
        //Validation failed
        return response()->json(['errors' => $validator->errors()->all()], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function delete($id)
    {
        //Delete records in linked table
        Author::find($id)->books()->detach();
        //Delete author
        Author::find($id)->remove();

        return redirect()->back()->with('status', 'Author deleted!');
    }
}
