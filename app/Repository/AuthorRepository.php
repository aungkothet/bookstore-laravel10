<?php

namespace App\Repository;

use App\Interfaces\AuthorRepositoryInterface;
use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

class AuthorRepository implements AuthorRepositoryInterface
{
    public function getAllAuthors(): Collection{
        return Author::all();
    }

    public function getAuthorById($authorId){
        return Author::findOrFail($authorId);
    }

    public function updateAuthor($authorId, array $details){
        return Author::whereId($authorId)->update($details);
    }

    public function deleteAuthor($authorId){
        Author::destroy($authorId);
    }

    public function getInActiveAuthors(){
        return Author::onlyTrashed()->get();
    }

    public function createAuthor(array $details){
        return Author::create($details);
    }

}