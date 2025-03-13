# API Test Cases for JSONPlaceholder Integration

This document outlines comprehensive test cases for testing the API endpoints from JSONPlaceholder that are integrated into our Laravel 12 application with Inertia and Vue 3.

## Table of Contents
- [Overview](#overview)
- [Test Environment](#test-environment)
- [Global Test Cases](#global-test-cases)
- [Users Endpoint Test Cases](#users-endpoint-test-cases)
- [Albums Endpoint Test Cases](#albums-endpoint-test-cases)
- [Photos Endpoint Test Cases](#photos-endpoint-test-cases)

## Overview

These test cases are designed to verify the proper integration of the following JSONPlaceholder endpoints:
- `https://jsonplaceholder.typicode.com/users`
- `https://jsonplaceholder.typicode.com/albums`
- `https://jsonplaceholder.typicode.com/photos`

## Test Environment

- **Testing Tool/Framework**: Jest/Supertest (or any API testing tool you prefer)
- **Base URL**: `https://jsonplaceholder.typicode.com`
- **Headers**:
  - `Content-Type: application/json`
  - `Accept: application/json`

## Global Test Cases

These test cases apply to all endpoints.

### GTC-01: API Availability
**Description**: Verify that the API is accessible and responding.
**Steps**:
1. Send a GET request to the base URL
**Expected Result**: Server responds with a 200 OK status code within acceptable time limits (< 2 seconds)

### GTC-02: Error Handling - Invalid Endpoint
**Description**: Verify proper error handling for invalid endpoints.
**Steps**:
1. Send a GET request to a non-existent endpoint (e.g., `/invalidEndpoint`)
**Expected Result**: Server responds with an appropriate status code (404 Not Found) and error message

### GTC-03: Authentication Tests (if applicable)
**Description**: Test authentication requirements.
**Steps**:
1. Send requests with invalid/missing authentication tokens (if your implementation uses auth)
**Expected Result**: Proper authentication error responses

## Users Endpoint Test Cases

### UT-01: Get All Users
**Description**: Verify the endpoint returns all users correctly.
**Method**: GET
**Endpoint**: `/users`
**Steps**:
1. Send a GET request to `/users`
**Expected Results**:
- Status Code: 200 OK
- Response contains an array of 10 user objects
- Each user object has the expected fields (id, name, username, email, etc.)
- Response time is within acceptable limits
- Data matches expected format from JSONPlaceholder

### UT-02: Get Single User by ID
**Description**: Verify the endpoint returns a specific user by ID.
**Method**: GET
**Endpoint**: `/users/{id}`
**Steps**:
1. Send a GET request to `/users/1`
**Expected Results**:
- Status Code: 200 OK
- Response contains a single user object with ID 1
- All expected fields are present
- Data matches expected user from JSONPlaceholder

### UT-03: Get Non-existent User
**Description**: Verify behavior when requesting a non-existent user.
**Method**: GET
**Endpoint**: `/users/{id}`
**Steps**:
1. Send a GET request to `/users/99` (assuming ID 99 doesn't exist)
**Expected Results**:
- Status Code: 404 Not Found
- Response contains appropriate error message

### UT-04: Create New User
**Description**: Verify the ability to create a new user.
**Method**: POST
**Endpoint**: `/users`
**Request Body**:
```json
{
  "name": "Test User",
  "username": "testuser",
  "email": "test@example.com",
  "address": {
    "street": "Test Street",
    "suite": "Apt 1",
    "city": "Test City",
    "zipcode": "12345",
    "geo": {
      "lat": "40.7128",
      "lng": "-74.0060"
    }
  },
  "phone": "1-770-736-8031",
  "website": "test.org",
  "company": {
    "name": "Test Company",
    "catchPhrase": "Testing is important",
    "bs": "quality assurance"
  }
}
```
**Steps**:
1. Send a POST request to `/users` with the request body
**Expected Results**:
- Status Code: 201 Created
- Response contains the created user with an ID
- All sent fields are returned correctly

### UT-05: Update User
**Description**: Verify the ability to update a user.
**Method**: PUT
**Endpoint**: `/users/{id}`
**Request Body**:
```json
{
  "name": "Updated Name",
  "email": "updated@example.com"
}
```
**Steps**:
1. Send a PUT request to `/users/1` with the request body
**Expected Results**:
- Status Code: 200 OK
- Response contains the updated user data
- Fields that were updated show new values

### UT-06: Delete User
**Description**: Verify the ability to delete a user.
**Method**: DELETE
**Endpoint**: `/users/{id}`
**Steps**:
1. Send a DELETE request to `/users/1`
**Expected Results**:
- Status Code: 200 OK
- Empty response body or success message

### UT-07: Filter Users by Username
**Description**: Verify the ability to filter users by username.
**Method**: GET
**Endpoint**: `/users?username={username}`
**Steps**:
1. Send a GET request to `/users?username=Bret`
**Expected Results**:
- Status Code: 200 OK
- Response contains filtered results with only users with username "Bret"

## Albums Endpoint Test Cases

### AT-01: Get All Albums
**Description**: Verify the endpoint returns all albums correctly.
**Method**: GET
**Endpoint**: `/albums`
**Steps**:
1. Send a GET request to `/albums`
**Expected Results**:
- Status Code: 200 OK
- Response contains an array of album objects (100 items)
- Each album object has expected fields (userId, id, title)
- Response time is within acceptable limits

### AT-02: Get Single Album by ID
**Description**: Verify the endpoint returns a specific album by ID.
**Method**: GET
**Endpoint**: `/albums/{id}`
**Steps**:
1. Send a GET request to `/albums/1`
**Expected Results**:
- Status Code: 200 OK
- Response contains a single album object with ID 1
- All expected fields are present

### AT-03: Get Albums for a Specific User
**Description**: Verify the ability to get albums for a specific user.
**Method**: GET
**Endpoint**: `/albums?userId={userId}`
**Steps**:
1. Send a GET request to `/albums?userId=1`
**Expected Results**:
- Status Code: 200 OK
- Response contains only albums belonging to user with ID 1
- All returned albums have userId field equal to 1

### AT-04: Create New Album
**Description**: Verify the ability to create a new album.
**Method**: POST
**Endpoint**: `/albums`
**Request Body**:
```json
{
  "userId": 1,
  "title": "Test Album Title"
}
```
**Steps**:
1. Send a POST request to `/albums` with the request body
**Expected Results**:
- Status Code: 201 Created
- Response contains the created album with an ID
- All sent fields are returned correctly

### AT-05: Update Album
**Description**: Verify the ability to update an album.
**Method**: PUT
**Endpoint**: `/albums/{id}`
**Request Body**:
```json
{
  "title": "Updated Album Title"
}
```
**Steps**:
1. Send a PUT request to `/albums/1` with the request body
**Expected Results**:
- Status Code: 200 OK
- Response contains the updated album data
- Title field shows the new value

### AT-06: Delete Album
**Description**: Verify the ability to delete an album.
**Method**: DELETE
**Endpoint**: `/albums/{id}`
**Steps**:
1. Send a DELETE request to `/albums/1`
**Expected Results**:
- Status Code: 200 OK
- Empty response body or success message

### AT-07: Pagination Test (if supported)
**Description**: Verify pagination functionality.
**Method**: GET
**Endpoint**: `/albums?_page=2&_limit=10`
**Steps**:
1. Send a GET request to `/albums?_page=2&_limit=10`
**Expected Results**:
- Status Code: 200 OK
- Response contains 10 albums from the second page
- Albums have IDs from 11-20

## Photos Endpoint Test Cases

### PT-01: Get All Photos
**Description**: Verify the endpoint returns all photos correctly.
**Method**: GET
**Endpoint**: `/photos`
**Steps**:
1. Send a GET request to `/photos`
**Expected Results**:
- Status Code: 200 OK
- Response contains an array of photo objects (5000 items)
- Each photo object has expected fields (albumId, id, title, url, thumbnailUrl)
- Response time is within acceptable limits

### PT-02: Get Single Photo by ID
**Description**: Verify the endpoint returns a specific photo by ID.
**Method**: GET
**Endpoint**: `/photos/{id}`
**Steps**:
1. Send a GET request to `/photos/1`
**Expected Results**:
- Status Code: 200 OK
- Response contains a single photo object with ID 1
- All expected fields are present

### PT-03: Get Photos for a Specific Album
**Description**: Verify the ability to get photos for a specific album.
**Method**: GET
**Endpoint**: `/photos?albumId={albumId}`
**Steps**:
1. Send a GET request to `/photos?albumId=1`
**Expected Results**:
- Status Code: 200 OK
- Response contains only photos belonging to album with ID 1
- All returned photos have albumId field equal to 1

### PT-04: Create New Photo
**Description**: Verify the ability to create a new photo.
**Method**: POST
**Endpoint**: `/photos`
**Request Body**:
```json
{
  "albumId": 1,
  "title": "Test Photo Title",
  "url": "https://via.placeholder.com/600/92c952",
  "thumbnailUrl": "https://via.placeholder.com/150/92c952"
}
```
**Steps**:
1. Send a POST request to `/photos` with the request body
**Expected Results**:
- Status Code: 201 Created
- Response contains the created photo with an ID
- All sent fields are returned correctly

### PT-05: Update Photo
**Description**: Verify the ability to update a photo.
**Method**: PUT
**Endpoint**: `/photos/{id}`
**Request Body**:
```json
{
  "title": "Updated Photo Title"
}
```
**Steps**:
1. Send a PUT request to `/photos/1` with the request body
**Expected Results**:
- Status Code: 200 OK
- Response contains the updated photo data
- Title field shows the new value

### PT-06: Delete Photo
**Description**: Verify the ability to delete a photo.
**Method**: DELETE
**Endpoint**: `/photos/{id}`
**Steps**:
1. Send a DELETE request to `/photos/1`
**Expected Results**:
- Status Code: 200 OK
- Empty response body or success message

### PT-07: Filtering by Title
**Description**: Verify the ability to filter photos by title.
**Method**: GET
**Endpoint**: `/photos?title_like={searchTerm}`
**Steps**:
1. Send a GET request to `/photos?title_like=accusamus`
**Expected Results**:
- Status Code: 200 OK
- Response contains only photos with "accusamus" in the title
- All returned photos contain the search term in their title

### PT-08: Performance Test - Large Data Set
**Description**: Verify performance when retrieving large data sets.
**Method**: GET
**Endpoint**: `/photos`
**Steps**:
1. Send a GET request to `/photos`
**Expected Results**:
- Status Code: 200 OK
- Response time is within acceptable limits (< 3 seconds)
- All 5000 photos are returned correctly

## Cross-Entity Test Cases

### CT-01: User-Album Relationship
**Description**: Verify relationships between users and albums.
**Method**: GET
**Endpoint**: First `/users/1`, then `/albums?userId=1`
**Steps**:
1. Send a GET request to `/users/1`
2. Send a GET request to `/albums?userId=1`
**Expected Results**:
- User 1 exists and has valid data
- Albums returned belong to user 1
- Data relationships are preserved

### CT-02: Album-Photo Relationship
**Description**: Verify relationships between albums and photos.
**Method**: GET
**Endpoint**: First `/albums/1`, then `/photos?albumId=1`
**Steps**:
1. Send a GET request to `/albums/1`
2. Send a GET request to `/photos?albumId=1`
**Expected Results**:
- Album 1 exists and has valid data
- Photos returned belong to album 1
- Data relationships are preserved
