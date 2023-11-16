<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Interfaces\AuthorRepositoryInterface;
use App\Models\Author;
use Illuminate\Http\Response;

class AuthorController extends Controller
{

    public function __construct(private AuthorRepositoryInterface $authorRepository){

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => $this->authorRepository->getAllAuthors()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $details = $request->validated();
        return response()->json(
            [
                'data' => $this->authorRepository->createAuthor($details)
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($author)
    {
        return response()->json([
            'data' => $this->authorRepository->getAuthorById($author)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, $author)
    {
        $details = $request->validated();

        return response()->json([
            'data' => $this->authorRepository->updateAuthor($author, $details)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($author)
    {
        $this->authorRepository->deleteAuthor($author);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
