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
        return view("book", [
            "books" => Book::all()
        ]);
    }

    public function create()
    {
        return view("book/create");
    }

    public function store(Request $request)
    {
        $allData = $request->all();

        $book = new Book();
        $validator = Validator::make($allData, $book->getRules());

        // process the login
        if ($validator->fails()) {
            return Redirect::to('book/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store

            $book->fill($allData);
            $book->save();

            return Redirect::to('book')
                ->with("message", "Book added successfully!");
        }
    }

    public function edit(Book $book)
    {
        return view("book/show", [
            "book" =>$book
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $allData = $request->all();

        $validator = Validator::make($allData, $book->getRules());

        // process the login
        if ($validator->fails()) {
            return Redirect::to('book/edit', $book->id)
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $book->update($allData);
            $book->save();

            return Redirect::to('book')
                ->with("message", "Book updated successfully!");
        }

    }

    public function destroy(Book $book)
    {
        $book->delete();

        return Redirect::to("book")
            ->with("message", "Book deleted successfully!");
    }
}
