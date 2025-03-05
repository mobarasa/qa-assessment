<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\JsonPlaceholderService;

class PhotoController extends Controller
{
    protected $jsonPlaceholderService;

    public function __construct(JsonPlaceholderService $jsonPlaceholderService)
    {
        $this->jsonPlaceholderService = $jsonPlaceholderService;
    }

    public function index()
    {
        $photos = $this->jsonPlaceholderService->getPhotos();
        $albums = $this->jsonPlaceholderService->getAlbums();

        return Inertia::render('Photos/Index', [
            'photos' => $photos,
            'albums' => $albums
        ]);
    }

    public function show($id)
    {
        $photos = $this->jsonPlaceholderService->getPhotos();
        $photo = collect($photos)->firstWhere('id', (int)$id);

        return Inertia::render('Photos/Show', [
            'photo' => $photo
        ]);
    }
}
