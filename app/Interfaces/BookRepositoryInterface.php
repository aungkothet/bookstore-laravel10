<?php
namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface BookRepositoryInterface{

    public function getAllBooks();
    public function getAllBooksByAuthorId($authorId): Collection;
    public function getAllBooksByPublisherId($publisherId): Collection;
    public function getBookById($bookId);
    public function updateBook($bookId, array $details);
    public function deleteBook($bookId);
    public function getInActiveBooks();
    public function createBook(array $details);

}