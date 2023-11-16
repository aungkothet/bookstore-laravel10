<?php

namespace App\Repository;

use App\Interfaces\PublisherRepositoryInterface;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Collection;

class PublisherRepository implements PublisherRepositoryInterface
{
    public function getAllPublishers(): Collection{
        return Publisher::all();
    }

    public function getPublisherById($genreId){
        return Publisher::findOrFail($genreId);
    }

    public function updatePublisher($genreId, array $details){
        return Publisher::whereId($genreId)->update($details);
    }

    public function deletePublisher($genreId){
        Publisher::destroy($genreId);
    }

    public function getInActivePublishers(){
        return Publisher::onlyTrashed()->get();
    }

    public function createPublisher(array $details){
        return Publisher::create($details);
    }

}