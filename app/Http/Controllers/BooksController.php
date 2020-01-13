<?php

namespace App\Http\Controllers;

use App\AppModel;
use App\Book;
use App\Author;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    private static $currentBook = ['title' => '', 'description' => '', 'published_at' => ''];

    /**
     * Show books's page
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        //$books = Book::paginate(Controller::ON_PAGE);
        $books = Book::all();
        $startRow = AppModel::getPageNumber($request);
        $authors = Author::all();
        $fields = [
            'books' => $books,
            'startRow' => $startRow,
            'currentBook' => self::$currentBook,
            'currentAuthors' => [],
            'id' => '',
            'authors' => $authors];

        return ($request->ajax()) ?
             view('partials.table-books', $fields) :
             view('books.index', $fields);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function edit(Request $request)
    {
        //Edit book
        if ($request->id) {
            $id = $request->id;
            $book = Book::find($id);
            $currentBook = $book->toArray();
            $currentAuthors = $book->getAuthors();
            $authors = Author::all();

            return view('partials.form-book', [
                'currentBook' => $currentBook,
                'currentAuthors' => $currentAuthors,
                'id' => $id,
                'authors' => $authors
            ]);
        }

        return null;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(Request $request, $id)
    {
        //Delete records in a staging table
        Book::find($id)->authors()->detach();
        //Delete author
        Book::find($id)->remove();

        return redirect()->back()->with('status', 'Book deleted!');
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
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'integer|digits:4|nullable'
        ]);

        //Validation OK
        if (!$validator->fails()) {
            //Update existing book
            if ($request->book_id) {
                $book = Book::find($request->book_id);
                $book->edit($request->all());
                $book->uploadImage($request->file('image'));
                $book->setAuthors($request->authors);

                return redirect()->back()->with('status', 'Book updated!');
            }
            //Create new book
            $book = Book::add($request->all());
            $book->uploadImage($request->file('image'));
            $book->setAuthors($request->authors);

            return redirect()->back()->with('status', 'Book add!');
        }

        //Validation failed
        return redirect()->back()->withErrors($validator);
    }
}
