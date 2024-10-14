<?php

namespace App\Http\Controllers;

use App\Models\NewFriend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class NewFriendController extends Controller
{
    public function index()
    {
        $friends = NewFriend::all();
        return Inertia::render('CRUD/NewFriends', [
            'friends' => $friends
        ]);
    }

    public function create()
    {
        return Inertia::render('CRUD/NewFriendsCreate');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'grade_level' => 'required|string|max:255',
                'introduction_content' => 'required|string',
                'friend_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            if ($request->hasFile('friend_avatar')) {
                $validatedData['friend_avatar'] = $request->file('friend_avatar')->store('friend_avatars', 'public');
            }

            $newFriend = NewFriend::create($validatedData);

            return redirect()->route('new-friends')->with('success', 'Friend added successfully.');
        } catch (\Exception $e) {
            Log::error('Error adding new friend: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    public function show(NewFriend $newFriend)
    {
        return Inertia::render('CRUD/NewFriendsShow', ['friend' => $newFriend]);
    }

    public function edit(NewFriend $newFriend)
    {
        return Inertia::render('CRUD/NewFriendsEdit', ['friend' => $newFriend]);
    }

    public function update(Request $request, NewFriend $newFriend)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade_level' => 'required|string|max:255',
            'introduction_content' => 'required|string',
            'friend_avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $avatarPath = $newFriend->avatar;
        if ($request->hasFile('friend_avatar')) {
            $avatarPath = $request->file('friend_avatar')->store('avatars', 'public');
        }

        $newFriend->update([
            'name' => $request->name,
            'grade_level' => $request->category,
            'introduction_content' => $request->description,
            'friend_avatar' => $avatarPath,
        ]);

        return redirect()->route('new-friends')->with('success', 'Friend updated successfully.');
    }

    public function destroy(NewFriend $newFriend)
    {
        $newFriend->delete();
        return redirect()->route('new-friends')->with('success', 'Friend deleted successfully.');
    }
}