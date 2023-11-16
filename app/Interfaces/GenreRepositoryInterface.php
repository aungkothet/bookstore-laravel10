<?php
namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface GenreRepositoryInterface{

    public function getAllGenres(): Collection;
    public function getGenreById($genreId);
    public function updateGenre($genreId, array $details);
    public function deleteGenre($genreId);
    public function getInActiveGenres();
    public function createGenre(array $details);

}