<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\JsonPlaceholderService;

class AlbumController extends Controller
{
    protected $jsonPlaceholderService;

    public function __construct(JsonPlaceholderService $jsonPlaceholderService)
    {
        $this->jsonPlaceholderService = $jsonPlaceholderService;
    }

    public function index()
    {
        $albums = $this->jsonPlaceholderService->getAlbums();
        $users = $this->jsonPlaceholderService->getUsers();

        // Add user information to each album
        $albums = collect($albums)->map(function ($album) use ($users) {
            $user = collect($users)->firstWhere('id', $album['userId']);
            $album['user'] = $user;
            return $album;
        });

        return Inertia::render('Albums/Index', [
            'albums' => $albums,
            'users' => $users
        ]);
    }

    public function show($id)
    {
        $photos = $this->jsonPlaceholderService->getPhotosByAlbum($id);

        return Inertia::render('Albums/Show', [
            'photos' => $photos,
            'albumId' => $id
        ]);
    }
}
