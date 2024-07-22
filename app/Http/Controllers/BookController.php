<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        return view("books.index", [
            "books" => Book::all()
        ]);
    }

    public function create()
    {
        return view("books.create");
    }

    public function store(Request $request)
    {
        $allData = $request->all();

        $book = new Book();
        $validator = Validator::make($allData, $book->getRules());

        // process the login
        if ($validator->fails()) {
            return redirect()->route("books.create")
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $book->fill($allData);
            $book->save();

            return redirect()->route("books.index")
                ->with("message", "Book added successfully!");
        }
    }

    public function edit(int $id)
    {
        $book = Book::findOrfail($id);

        return view("books.edit", [
            "book" =>$book
        ]);
    }

    public function update(Request $request, int $id)
    {
        $book = Book::findOrfail($id);
        $allData = $request->all();

        $validator = Validator::make($allData, $book->getRules());

        // process the login
        if ($validator->fails()) {
            return redirect()->route("books.edit", $book->id)
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $book->update($allData);

            return redirect()->route("books.index")
                ->with("message", "Book updated successfully!");
        }
    }

    public function destroy(int $id)
    {
        Book::destroy($id);

        return redirect()->route("books.index")
            ->with("message", "Book deleted successfully!");
    }
}
