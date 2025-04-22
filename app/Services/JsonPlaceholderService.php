<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class JsonPlaceholderService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://jsonplaceholder.typicode.com';
    }

    /**
     * Fetch all users with caching.
     *
     * @return array
     */
    public function getUsers()
    {
        return Cache::remember('users', 3600, function () {
            return Http::get("{$this->baseUrl}/users")->json();
        });
    }

    /**
     * Fetch a specific user by ID with caching.
     *
     * @param int $id
     * @return array
     */
    public function getUser($id)
    {
        return Cache::remember("user_{$id}", 3600, function () use ($id) {
            // return Http::get("{$this->baseUrl}/users/{$id}")->json();
            return Http::timeout(30)->get("{$this->baseUrl}/users/{$id}")->json();
        });
    }

    /**
     * Fetch all albums with caching.
     *
     * @return array
     */
    public function getAlbums()
    {
        return Cache::remember('albums', 3600, function () {
            return Http::get("{$this->baseUrl}/albums")->json();
        });
    }

    /**
     * Fetch albums by a specific user with caching.
     *
     * @param int $userId
     * @return array
     */
    public function getAlbumsByUser($userId)
    {
        return Cache::remember("albums_user_{$userId}", 3600, function () use ($userId) {
            return Http::get("{$this->baseUrl}/users/{$userId}/albums")->json();
        });
    }

    /**
     * Fetch all photos with caching.
     *
     * @return array
     */
    public function getPhotos()
    {
        return Cache::remember('photos', 3600, function () {
            return Http::get("{$this->baseUrl}/photos")->json();
        });
    }

    /**
     * Fetch photos by a specific album with caching.
     *
     * @param int $albumId
     * @return array
     */
    public function getPhotosByAlbum($albumId)
    {
        return Cache::remember("photos_album_{$albumId}", 3600, function () use ($albumId) {
            return Http::get("{$this->baseUrl}/albums/{$albumId}/photos")->json();
        });
    }
}
