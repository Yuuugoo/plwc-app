<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewFriendController;
use App\Http\Controllers\ProfileController;
use App\Models\Gallery;
use App\Models\NewFriend;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $friends = NewFriend::all()->map(function ($friend) {
        return [
            'id' => $friend->id,
            'name' => $friend->name,
            'avatar' => $friend->friend_avatar ? asset('storage/' . $friend->friend_avatar) : null,
        ];
    });

    return Inertia::render('LandingPage', [
        'canLogin' => Route::has('login'),
        'friends' => $friends,
    ]);
})->name('home');

Route::get('/events', function () {
    return Inertia::render('Event',[
        'canLogin' => Route::has('login'),
    ]);
})->name('event');


Route::prefix('about')->group(function () {
    Route::get('/', function () {
        return Inertia::render('About/About', [
            'canLogin' => Route::has('login'),
        ]);
    })->name('about');

    Route::get('/mission-vision', function () {
        return Inertia::render('About/MissionVision', [
            'canLogin' => Route::has('login'),
        ]);
    })->name('about.mission-vision');

    Route::get('/history', function () {
        return Inertia::render('About/History', [
            'canLogin' => Route::has('login'),
        ]);
    })->name('about.history');

    // Route::get('/{page}', function ($page) {
    //     return Inertia::render('About2', [
    //         'canLogin' => Route::has('login'),
    //         'page' => $page,
    //     ]);
    // })->where('page', '[1-2]')->name('about.subpage');
});

Route::prefix('group')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Church-Groups/All', [
            'canLogin' => Route::has('login'),
        ]);
    })->name('group');

    Route::get('/elementary', function () {
        return Inertia::render('Church-Groups/Elementary', [
            'canLogin' => Route::has('login'),
        ]);
    })->name('group.elementary');

    Route::get('/highschool-1styear', function () {
        return Inertia::render('Church-Groups/HighschoolTo1st', [
            'canLogin' => Route::has('login'),
        ]);
    })->name('group.highschool.1styear');

    Route::get('/2ndyear-3rdyear', function () {
        return Inertia::render('Church-Groups/2ndTo3rd', [
            'canLogin' => Route::has('login'),
        ]);
    })->name('group.2ndyear.3rdyear');

    Route::get('/4thyear', function () {
        return Inertia::render('Church-Groups/4th', [
            'canLogin' => Route::has('login'),
        ]);
    })->name('group.4thyear');

    Route::get('/youth', function () {
        return Inertia::render('Church-Groups/Youth', [
            'canLogin' => Route::has('login'),
        ]);
    })->name('group.youth');

    Route::get('/parents', function () {
        return Inertia::render('Church-Groups/Parent', [
            'canLogin' => Route::has('login'),
        ]);
    })->name('group.parents');

});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('crud')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::post('/gallery/upload', [GalleryController::class, 'upload'])->name('gallery.upload');
    Route::get('/gallery/{eventId}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::delete('/gallery/{eventId}', [GalleryController::class, 'destroy'])->name('gallery.destroy');


    Route::get('/new-friends', [NewFriendController::class, 'index'])->name('new-friends');
    Route::get('/new-friends/create', [NewFriendController::class, 'create'])->name('new-friends.create');
    Route::post('/new-friends', [NewFriendController::class, 'store'])->name('new-friends.store');
    Route::get('/new-friends/{newFriend}/edit', [NewFriendController::class, 'edit'])->name('new-friends.edit');
    Route::put('/new-friends/{newFriend}', [NewFriendController::class, 'update'])->name('new-friends.update');
    Route::delete('/new-friends/{newFriend}', [NewFriendController::class, 'destroy'])->name('new-friends.destroy');

});

Route::get('/gallery', function () {
    $events = Gallery::all()->map(function ($event) {
        return [
            'id' => $event->id,
            'event_name' => $event->event_name,
            'event_description' => $event->event_description,
            'image_url' => $event->event_images ? asset('storage/' . $event->event_images) : null,
            'event_type' => $event->event_type,
            'created_at' => $event->created_at->format('Y-m-d H:i:s'),
        ];
    });

    return Inertia::render('Gallery', [
        'canLogin' => Route::has('login'),
        'events' => $events,
    ]);
})->name('gallery');


Route::get('/gallery/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/new-friends-all', [NewFriendController::class, 'show'])->name('new-friends.show');

Route::get('/settings', function () {
    return Inertia::render('Settings');
})->middleware(['auth', 'verified'])->name('settings');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
