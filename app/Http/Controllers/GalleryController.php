<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class GalleryController extends Controller
{
    public function index()
    {
        $events = Gallery::all(); 
        return Inertia::render('CRUD/GalleryIndex', [
            'events' => $events
        ]);
    }

    public function create()
    {
        return Inertia::render('CRUD/GalleryCreate');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'event_name' => 'required|string|max:255',
                'event_type' => 'required|string|max:255',
                'event_description' => 'required|string|max:255',
                'event_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $imagePaths = [];
            if ($request->hasFile('event_images')) {
                foreach ($request->file('event_images') as $image) {
                    $imagePaths[] = $image->store('event_images', 'public');
                }
            }


            $gallery = Gallery::create([
                'event_name' => $validatedData['event_name'],
                'event_type' => $validatedData['event_type'],
                'event_description' => $validatedData['event_description'],
                'event_images' => json_encode($imagePaths),
            ]);

            return redirect()->route('gallery.index')->with('success', 'Event added successfully.');
        } catch (\Exception $e) {
            Log::error('Error adding event: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }


    public function show(Gallery $gallery)
    {
        return Inertia::render('CRUD/GalleryShow', ['events' => $gallery]);
    }

    public function edit(Gallery $gallery)
    {
        return Inertia::render('CRUD/GalleryEdit', ['event' => $gallery]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_type' => 'required|string|max:255',
            'event_description' => 'required|string',
            'event_images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $gallery->event_image;
        if ($request->hasFile('event_images')) {
            $imagePath = $request->file('event_images')->store('event_images', 'public');
        }

        $gallery->update([
            'event_name' => $request->event_name,
            'event_type' => $request->event_type,
            'event_description' => $request->event_description,
            'event_images' => $imagePath,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Event deleted successfully.');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $file = $request->file('file');
        $path = $file->store('gallery', 'public');
        
        return response()->json([
            'path' => $path
        ]);
    }
}
