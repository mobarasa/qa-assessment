<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class JsonPlaceholderService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://jsonplaceholder.typicode.com';
    }

    public function getUsers()
    {
        return Cache::remember('users', 3600, function () {
            return Http::get("{$this->baseUrl}/users")->json();
        });
    }

    public function getUser($id)
    {
        return Cache::remember("user_{$id}", 3600, function () use ($id) {
            return Http::get("{$this->baseUrl}/users/{$id}")->json();
        });
    }

    public function getAlbums()
    {
        return Cache::remember('albums', 3600, function () {
            return Http::get("{$this->baseUrl}/albums")->json();
        });
    }

    public function getPhotos()
    {
        return Cache::remember('photos', 3600, function () {
            return Http::get("{$this->baseUrl}/photos")->json();
        });
    }
}
