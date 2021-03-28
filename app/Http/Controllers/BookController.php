<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::orderBy('name', 'asc')->get());
    }

    public function store(Request $request)
    {
        if ($request->post()) {
            $book = Book::create($request->all());
            $book_r = new BookResource($book);
            return response($book_r, response::HTTP_CREATED);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->post()) {
            Book::where('id', $id)->update(['name' => $request->name]);
            $book = Book::findOrFail($id);
            $book_r = new BookResource($book);
            return response($book_r, response::HTTP_OK);
        }
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response('Data Deleted!', response::HTTP_OK);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        $book_r = new BookResource($book);
        if ($book_r) {
            return response($book_r, response::HTTP_OK);
        }else{
            return response('Data Not Found',response::HTTP_NOT_FOUND);
        }
    }
}
