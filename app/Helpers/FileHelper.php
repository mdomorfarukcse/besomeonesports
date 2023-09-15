<?php

use Illuminate\Http\Request;

if (!function_exists('upload_avatar')) {
    /**
     * Upload and store the user's avatar.
     *
     * @param Request $request
     * @return string|null
     */
    function upload_avatar(Request $request, $name = 'avatar')
    {
        $request->validate([
            $name => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
        ]);

        if ($request->hasFile($name)) {
            $avatar = $request->file($name);
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('avatars', $avatarName, 'public');
            return $avatarName;
        }

        return null;
    }
}


if (!function_exists('show_avatar')) {
    /**
     * Get the user's avatar URL.
     *
     * @param string|null $avatarName
     * @return string
     */
    function show_avatar($avatarName = null)
    {
        if ($avatarName) {
            return asset('storage/avatars/' . $avatarName);
        }

        // If no avatar is specified, return a default avatar URL here.
        return 'https://fakeimg.pl/200x200';
    }
}