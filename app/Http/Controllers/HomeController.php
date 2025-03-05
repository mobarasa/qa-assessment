<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JsonPlaceholderService;
use Inertia\Inertia;

class HomeController extends Controller
{
    protected $jsonPlaceholderService;

    public function __construct(JsonPlaceholderService $jsonPlaceholderService)
    {
        $this->jsonPlaceholderService = $jsonPlaceholderService;
    }

    public function index()
    {

        $userCount = count($this->jsonPlaceholderService->getUsers());
        $albumCount = count($this->jsonPlaceholderService->getAlbums());
        $photoCount = count($this->jsonPlaceholderService->getPhotos());

        return Inertia::render('Home/Index', [
            'stats' => [
                'users' => $userCount,
                'albums' => $albumCount,
                'photos' => $photoCount
            ]
        ]);
    }
}
