<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\IncomingMailController;
use App\Http\Controllers\OutgoingMailController;
use App\Http\Controllers\ComunityExperienceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Main Route
Route::get('/', [LoginController::class, 'index']);

//Login and Logout Route
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

//Route Users
Route::resource('/dashboard/users', UserController::class)->middleware('auth');
Route::get('/dashboard/profile/{user}', [UserController::class, 'show'])->middleware('auth');
Route::put('/dashboard/profile', [UserController::class, 'updateProfile'])->middleware('auth');

//Route Members
Route::resource('/dashboard/members', EmployeeController::class, [
    'parameters' => [
        'members' => 'employee',
    ],
])->middleware('auth');

//Route Publications
Route::resource('/dashboard/archive/publications', PublicationController::class)->middleware('auth');

//Route Instagram
Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard/social/instagram', InstagramController::class);

    // Route login Instagram
    Route::get('/dashboard/instagram-login', [InstagramController::class, 'redirectToInstagram'])->name('instagram.login');
    Route::get('/dashboard/instagram-callback', [InstagramController::class, 'handleInstagramCallback'])->name('instagram.callback');

    // Route Upload
    Route::get('/dashboard/social/instagram-story', [InstagramController::class, 'uploadStory'])
        ->name('instagram.uploadStory');
    
    Route::get('/dashboard/social/instagram-feed', [InstagramController::class, 'uploadFeed'])
        ->name('instagram.uploadFeed');
    
    Route::post('/dashboard/social/instagram/store-story', [InstagramController::class, 'storeStory'])
        ->name('instagram.storeStory');
    
    Route::post('/dashboard/social/instagram/store-feed', [InstagramController::class, 'storeFeed'])
        ->name('instagram.storeFeed');
    
});

//Route Mails
Route::middleware(['auth'])->group(function () {
    //Route Incoming Mails
    Route::resource('/dashboard/mails/incoming-mails', IncomingMailController::class)->except('show');
    
    Route::get('/dashboard/mails/incoming-mails/{number}', [IncomingMailController::class, 'show'])
        ->name('incoming-mails.show')
        ->where('number', '.*');

    //Route Outgoing Mails
    Route::resource('/dashboard/mails/outgoing-mails', OutgoingMailController::class)->except('show');
        
    Route::get('/dashboard/mails/outgoing-mails/{number}', [OutgoingMailController::class, 'show'])
            ->name('outgoing-mails.show')
            ->where('number', '.*');
});

//Route Experiences
Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard/experiences', ComunityExperienceController::class)
    ->except(['destroy', 'show', 'edit', 'update']);

    Route::get('/dashboard/experiences/{comunityExperience}', [ComunityExperienceController::class, 'show'])
        ->name('experiences.show');

    Route::get('/dashboard/experiences/{comunityExperience}/edit', [ComunityExperienceController::class, 'edit'])
        ->name('experiences.edit');

    Route::put('/dashboard/experiences/{comunityExperience}', [ComunityExperienceController::class, 'update'])
        ->name('experiences.update');

    Route::delete('/dashboard/experiences/{comunityExperience}', [ComunityExperienceController::class, 'destroy'])
        ->name('experiences.destroy');
});