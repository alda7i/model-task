<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publication_year' => 'required|integer|digits:4',
        ]);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publication_year' => $request->publication_year,
        ]);

        return $book;
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);

        return $book;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'sometimes|string',
            'author' => 'sometimes|string',
            'publication_year' => 'sometimes|integer|digits:4',
        ]);

        $book = Book::findOrFail($id);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'publication_year' => $request->publication_year,
        ]);

        return $book;
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return 'Book deleted successfully';
    }
}
