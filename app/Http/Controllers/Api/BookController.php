<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Exception;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            return response()->json([
                "data" => Book::all()
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Unknown error when fetching books"
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $allData = $request->all();

            $book = new Book();
            $book->fill($allData);
            $book->save();

            return response()->json([
                "message" => "OK"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Unknown error when fetching books"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $target = Book::findOrFail($id);

            return response()->json([
                "data" => $target
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Unknown error when fetching your book."
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $allData = $request->all();
            $instance = Book::findOrFail($id);

            $instance->update($allData);

            return response()->json([
                "message" => "OK"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Unknown error when updating your book"
            ], 500);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            Book::destroy($id);

            return response()->json([
                "message" => "OK"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Unknown error when deleting your book"
            ], 500);
        }
    }
}
