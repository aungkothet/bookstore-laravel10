<?php
namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface PublisherRepositoryInterface{

    public function getAllPublishers(): Collection;
    public function getPublisherById($genreId);
    public function updatePublisher($genreId, array $details);
    public function deletePublisher($genreId);
    public function getInActivePublishers();
    public function createPublisher(array $details);

}