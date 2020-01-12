<?php

namespace App\Http\Controllers;

use App\AppModel;
use App\Author;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

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
        $authors = DB::table('authors')->paginate(Controller::ON_PAGE);
        $startRow = AppModel::getPageNumber($request);
        $modalTitle = 'Создание автора';
        $currentAuthor = ['firstname' => '', 'lastname' => '', 'patronymic' => ''];

        return view('authors.index', [
            'authors' => $authors,
            'startRow' => $startRow,
            'modalTitle' => $modalTitle,
            'currentAuthor' => $currentAuthor,
            'id' => ''
        ]);
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function create(Request $request)
    {
        return view('partials.form-author');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function edit(Request $request)
    {
        //Edit author
        if ($request->id) {
            $id = $request->id;
            $currentAuthor = Author::find($id)->toArray();

            return view('partials.form-author', ['currentAuthor' => $currentAuthor, 'id' => $id]);
        }

        return null;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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

    /**
     * Save form data in database
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' =>'required|alpha|min:3',
            'lastname' =>'required|alpha',
            'patronymic' => 'alpha|nullable'
        ]);

        //Validation OK
        if (!$validator->fails()) {
            //Update existing author
            if ($request->author_id) {
                $author = Author::find($request->author_id);
                $author->edit($request->all());

                return redirect()->back()->with('status', 'Author updated!');
            }
            //Create new author
            Author::add($request->all());

            return redirect()->back()->with('status', 'Author add!');
        }

        //Validation failed
        return redirect()->back()->withErrors($validator);
    }
}
