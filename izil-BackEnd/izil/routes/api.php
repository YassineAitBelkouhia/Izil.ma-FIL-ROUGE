<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RiadController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RiadAvailability;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RiadImageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Riad Routs
Route::get('/riads', [RiadController::class, 'index']);
Route::get('/riads/{id}', [RiadController::class, 'show']);
// Route::put('/riads/{id}', [RiadController::class, 'update']);
Route::delete('/riads/{id}', [RiadController::class, 'destroy']);
Route::get('/riads/searchbytitle/{title}', [RiadController::class, 'searchByTitle']);
Route::get('/riads/searchbycity/{city}', [RiadController::class, 'searchByCity']);
Route::post('/riads', [RiadController::class, 'store']);

Route::post('/riads/images', [RiadImageController::class, 'store']);
// Route::put('/riads/images/{id}', [RiadImageController::class, 'update']);
Route::delete('/riads/images/{id}', [RiadImageController::class, 'destroy']);
Route::get('/riads/images/{id}', [RiadImageController::class, 'getRiadImage']);

Route::post('/riads/{id}/availability', [RiadAvailability::class, 'checkAvailability']);
Route::get('/riads/{id}/rating', [RiadController::class, 'averageRating']);



//Booking routes
Route::post('/bookings', [BookingController::class, 'store']);
Route::put('/bookings/{id}', [BookingController::class, 'update']);
Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);
Route::get('/riads/{id}/bookings', [BookingController::class, 'getRiadBooking']);
Route::get('/booking/{id}/totalprice', [BookingController::class, 'getTotalPrice']);
Route::get('/booking/{id}/review', [BookingController::class, 'getBookingReview']);

//review Routes:
Route::get('/reviews', [ReviewController::class, 'index']);
Route::post('/reviews', [ReviewController::class, 'store']);
Route::put('/reviews/{id}', [ReviewController::class, 'update']);
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);
Route::get('/riads/{id}/reviews', [ReviewController::class, 'getRiadReviews']);

Route::get('/bookings', [BookingController::class, 'index']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/user/{id}/bookings', [BookingController::class, 'getUserBookings']);
Route::get('/review/{id}/user', [ReviewController::class, 'getReviewUser']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);





Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
