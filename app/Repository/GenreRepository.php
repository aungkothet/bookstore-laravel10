<?php

namespace App\Repository;

use App\Interfaces\GenreRepositoryInterface;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Collection;

class GenreRepository implements GenreRepositoryInterface
{
    public function getAllGenres(): Collection{
        return Genre::all();
    }

    public function getGenreById($genreId){
        return Genre::findOrFail($genreId);
    }

    public function updateGenre($genreId, array $details){
        return Genre::whereId($genreId)->update($details);
    }

    public function deleteGenre($genreId){
        Genre::destroy($genreId);
    }

    public function getInActiveGenres(){
        return Genre::onlyTrashed()->get();
    }

    public function createGenre(array $details){
        return Genre::create($details);
    }

}