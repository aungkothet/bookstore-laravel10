<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Interfaces\GenreRepositoryInterface;
use App\Models\Genre;
use Illuminate\Http\Response;

class GenreController extends Controller
{
    public function __construct(private GenreRepositoryInterface $genreRepository){

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => $this->genreRepository->getAllgenres()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        $details = $request->validated();
        return response()->json(
            [
                'data' => $this->genreRepository->creategenre($details)
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return response()->json([
            'data' => $this->genreRepository->getgenreById($genre)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $details = $request->validated();

        return response()->json([
            'data' => $this->genreRepository->updategenre($genre, $details)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $this->genreRepository->deletegenre($genre);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
