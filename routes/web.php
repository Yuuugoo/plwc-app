<?php

use App\Http\Controllers\NewFriendController;
use App\Http\Controllers\ProfileController;
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

    Route::get('/1', function () {
        return Inertia::render('About/About1', [
            'canLogin' => Route::has('login'),
        ]);
    })->name('about.news');

    Route::get('/2', function () {
        return Inertia::render('About/About2', [
            'canLogin' => Route::has('login'),
        ]);
    })->name('about.contacts');

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

Route::get('/gallery', function () {
    return Inertia::render('Gallery',[
        'canLogin' => Route::has('login'),
    ]);
})->name('gallery');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('crud')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/gallery', function () {
        return Inertia::render('CRUD/GalleryCrud');
    })->name('gallery-crud');

    Route::get('/new-friends', [NewFriendController::class, 'index'])->name('new-friends');
    Route::get('/new-friends/create', [NewFriendController::class, 'create'])->name('new-friends.create');
    Route::post('/new-friends', [NewFriendController::class, 'store'])->name('new-friends.store');
    Route::get('/new-friends/{newFriend}/edit', [NewFriendController::class, 'edit'])->name('new-friends.edit');
    Route::put('/new-friends/{newFriend}', [NewFriendController::class, 'update'])->name('new-friends.update');
    Route::delete('/new-friends/{newFriend}', [NewFriendController::class, 'destroy'])->name('new-friends.destroy');

});

Route::get('/new-friends/{newFriend}', [NewFriendController::class, 'show'])->name('new-friends.show');

Route::get('/settings', function () {
    return Inertia::render('Settings');
})->middleware(['auth', 'verified'])->name('settings');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
