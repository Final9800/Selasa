<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getAllBooks() {
        $books = Book::get()->toJson(JSON_PRETTY_PRINT);
        return response($books, 200);
      }

      public function createBook(Request $request) {
        $book = new Book;
        // $book->id = $request->id;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->save();

        return response()->json([
          "message" => "Book record created",
          "title"=>$request->title,
          "author"=>$request->author,
        ], 201);
      }

      public function getBook($id) {
        if (Book::where('id', $id)->exists()) {
          $book = Book::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($book, 200);
        } else {
          return response()->json([
            "message" => "Book not found"
          ], 404);
        }
      }

      public function updateBook(Request $request, $id) {
        if (Book::where('id', $id)->exists()) {
          $book = Book::find($id);

          $book->title = is_null($request->title) ? $book->title : $request->title;
          $book->author = is_null($request->author) ? $book->author : $request->author;
          $book->save();

          return response()->json([
            "message" => "records updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "Book not found"
          ], 404);
        }
      }

      public function deleteBook ($id) {
        if(Book::where('id', $id)->exists()) {
          $book = Book::find($id);
          $book->delete();

          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Book not found"
          ], 404);
        }
      }
}
