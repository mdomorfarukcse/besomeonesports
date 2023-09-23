<?php

use Illuminate\Http\Request;

if (!function_exists('upload_image')) {
    /**
     * Upload and store the user's image.
     *
     * @param Request $request
     * @return string|null
     */
    function upload_image(Request $request, $name)
    {
        $request->validate([
            $name => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ]);

        if ($request->hasFile($name)) {
            $image = $request->file($name);
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            return $imageName;
        }

        return null;
    }
}


if (!function_exists('show_image')) {
    /**
     * Get the URL to display an image from the "images" folder in storage.
     *
     * @param string|null $imageName
     * @param string|null $defaultImage
     * @return string
     */
    function show_image($imageName = null, $defaultImage = 'https://fakeimg.pl/500/?text=No-Image')
    {
        if ($imageName) {
            return asset('storage/images/' . $imageName);
        }

        // If no image is specified, return a default image URL.
        return $defaultImage;
    }
}