<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Services\JsonPlaceholderService;

class UserController extends Controller
{
    protected $jsonPlaceholderService;

    public function __construct(JsonPlaceholderService $jsonPlaceholderService)
    {
        $this->jsonPlaceholderService = $jsonPlaceholderService;
    }

    public function index()
    {
        return Inertia::render('Users/Index', [
            'users' => $this->jsonPlaceholderService->getUsers()
        ]);
    }

    public function show($id)
    {
        $user = $this->jsonPlaceholderService->getUser($id);
        $albums = $this->jsonPlaceholderService->getAlbumsByUser($id);

        return Inertia::render('Users/Show', [
            'user' => $user,
            'albums' => $albums
        ]);
    }
}
