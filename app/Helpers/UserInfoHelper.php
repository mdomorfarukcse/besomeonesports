<?php

use App\Models\User;

if (!function_exists('get_user_data')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function get_user_data($userId, $column)
    {
        $user = User::find($userId);
    
        if ($user && $user->{$column}) {
            return $user->{$column};
        }
    
        return null;
    }
}
