<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function __construct(private BookRepositoryInterface $bookRepository){
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => $this->bookRepository->getAllBooks()
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
    public function store(StoreBookRequest $request)
    {
        $details = $request->validated();
        return response()->json(
            [
                'data' => $this->bookRepository->createBook($details)
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json([
            'data' => $this->bookRepository->getBookById($book)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $details = $request->validated();

        return response()->json([
            'data' => $this->bookRepository->updateBook($book, $details)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $this->bookRepository->deleteBook($book);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
