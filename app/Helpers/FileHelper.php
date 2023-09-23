<?php

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

if (!function_exists('upload_image')) {
    /**
     * Upload and store an image in the "images" directory.
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @return string|null
     */
    function upload_image(UploadedFile $image)
    {
        // Validate and store the image in the "images" directory
        $image->store('images', 'public');

        // Return the image file name (e.g., "image.jpg")
        return $image->hashName();
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
    function show_image($imageName = null, $defaultImage = 'https://fakeimg.pl/300/dddddd/?text=No-Image')
    {
        if ($imageName) {
            return asset('storage/images/' . $imageName);
        }

        // If no image is specified, return a default image URL.
        return $defaultImage;
    }
}