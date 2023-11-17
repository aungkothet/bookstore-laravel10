<?php

namespace App\Repository;

use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookRepository implements BookRepositoryInterface
{
    public function getAllBooks(){
        return Book::with('author','publisher')->paginate(25);
    }

    public function getAllBooksByAuthorId($authorId): Collection{
        return Book::whereAuthorId($authorId)->get();
    }

    public function getAllBooksByPublisherId($publisherId): Collection{
        return Book::wherePublisherId($publisherId)->get();
    }

    public function getBookById($bookId){
        return Book::findOrFail($bookId);
    }

    public function updateBook($bookId, array $details){
        return Book::whereId($bookId)->update($details);
    }

    public function deleteBook($bookId){
        Book::destroy($bookId);
    }

    public function getInActiveBooks(){
        return Book::onlyTrashed()->get();
    }

    public function createBook(array $details){
        return Book::create($details);
    }
}