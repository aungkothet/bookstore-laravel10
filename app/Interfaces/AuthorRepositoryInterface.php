<?php
namespace App\Interfaces;

use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

interface AuthorRepositoryInterface{

    public function getAllAuthors(): Collection;
    public function getAuthorById($authorId);
    public function updateAuthor($authorId, array $details);
    public function deleteAuthor($authorId);
    public function getInActiveAuthors();
    public function createAuthor(array $details);

}