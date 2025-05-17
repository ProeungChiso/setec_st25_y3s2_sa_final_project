<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ImageController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $storedImages = [];

        foreach ($request->file('images') as $image) {
            // Generate a unique name
            $imageName = time().'_'.uniqid().'.'.$image->extension();

            // Store the image
            $path = $image->storeAs('images', $imageName, 'public');

            // Generate public URL
            $fullUrl = asset('storage/' . $path);

            // Save to DB
            Image::create([
                'path' => $fullUrl,
            ]);

            $storedImages[] = [
                'filename' => $imageName,
                'path' => $fullUrl,
            ];
        }

        return response()->json([
            'success' => true,
            'message' => 'Images uploaded successfully.',
            'images' => $storedImages,
        ], 201);
    }

}
