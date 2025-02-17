<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return response()->json([
            'status' => 200,
            'message' => 'Books retrieved succesfully',
            'data' => $books
        ], 200);
    }

    public function store(Request $request)
    {
        $books = Book::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Book created succesfully',
            'data' => $books
        ], 201);
    }

    public function show($id)
    {
        $books = Book::find($id);

        if (!$books) {
            return response()->json([
                'status' => 404,
                'message' => 'Book not found',
                'data' => null
            ],404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Book retrieved succesfully',
            'data' => $books
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $books = Book::find($id);

        if(!$books) {
            return response()->json([
                'status' => 404,
                'message' => 'Book not found',
                'data' => null
            ], 404);
        }

        $request->validate([
            'title' => 'required|string',
            'writer' => 'required|string',
            'user_id' => 'required',
            'category_id' => 'required',
            'publisher' => 'required|string',
            'year' => 'required|integer',
        ]);

        $books->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Book updated succesfully',
            'data' => $books
        ], 200);
    }

    public function destroy($id)
    {
        $books = Book::find($id);

        if(!$books) {
            return response()->json([
                'status' => 404,
                'message' => 'Book not found',
                'data' => null
            ], 404);
        }

        $books->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Book deleted succesfully',
            'data' => null
        ], 200);
    }
}