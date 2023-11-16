<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Interfaces\PublisherRepositoryInterface;
use App\Models\Publisher;
use Illuminate\Http\Response;

class PublisherController extends Controller
{

    public function __construct(private PublisherRepositoryInterface $publisherRepository){
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => $this->publisherRepository->getAllpublishers()
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
    public function store(StorePublisherRequest $request)
    {
        $details = $request->validated();
        return response()->json(
            [
                'data' => $this->publisherRepository->createpublisher($details)
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        return response()->json([
            'data' => $this->publisherRepository->getpublisherById($publisher)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        $details = $request->validated();

        return response()->json([
            'data' => $this->publisherRepository->updatepublisher($publisher, $details)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $this->publisherRepository->deletepublisher($publisher);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
