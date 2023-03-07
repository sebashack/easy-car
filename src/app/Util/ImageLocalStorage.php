<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        $newImageName = 'images/' . uniqid() . '-' . 'car' . '.' . $request->image_uri->extension();
        if ($request->hasFile('image_uri')) {
            Storage::disk('public')->put(
                $newImageName,
                file_get_contents($request->file('image_uri')->getRealPath())
            );
        }
        return $newImageName;
    }
}