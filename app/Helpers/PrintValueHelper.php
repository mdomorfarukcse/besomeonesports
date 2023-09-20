<?php

if (!function_exists('status')) {

    /**
     * Get the status HTML badge.
     *
     * @param  string  $status
     * @return string
     */
    function status($status)
    {
        if ($status === 'Active') {
            return '<span class="badge badge-success-inverse text-bold text-uppercase p-1">Active</span>';
        } elseif ($status === 'Inactive') {
            return '<span class="badge badge-danger-inverse text-bold text-uppercase p-1">Inactive</span>';
        } elseif ($status === 'Running') {
            return '<span class="badge badge-primary-inverse text-bold text-uppercase p-1">Running</span>';
        } elseif ($status === 'Delivery') {
            return '<span class="badge badge-info-inverse text-bold text-uppercase p-1">Delivery</span>';
        } elseif ($status === 'Completed') {
            return '<span class="badge badge-success-inverse text-bold text-uppercase p-1">Completed</span>';
        } elseif ($status === 'Canceled') {
            return '<span class="badge badge-danger-inverse text-bold text-uppercase p-1">Canceled</span>';
        } else {
            return '<span class="badge badge-warning-inverse text-bold text-uppercase p-1">Banned</span>';
        }
    }  
}
    

if (!function_exists('show_height')) {
    /**
     * Format the height in feet and inches with <sup> tags for display.
     *
     * @param float $height The height in feet (can be a float value).
     * @return string The formatted height with <sup> tags for feet and inches (e.g., "5 <sup>ft</sup> 7 <sup>inch</sup>").
     */
    function show_height(float $height): string
    {
        $feet = (int) $height;
        $inches = round(($height - $feet) * 12);

        $feet_html = $feet . '<sup class="text-bold">feet</sup> ';
        $inches_html = $inches . '<sup class="text-bold">inch</sup>';

        return $feet_html . $inches_html;
    }
}

if (!function_exists('show_weight')) {
    /**
     * Format the weight in pounds with <sup> tags for display.
     *
     * @param float $weight The weight in pounds (can be a float value).
     * @return string The formatted weight with <sup> tags for pounds (e.g., "150 <sup>lbs</sup>").
     */
    function show_weight(float $weight): string
    {
        $kilograms = (int) $weight;
        $grams = round(($weight - $kilograms) * 1000);

        $kilograms_html = $kilograms . '<sup class="text-bold">kg</sup> ';
        $grams_html = $grams . '<sup class="text-bold">gram</sup>';

        return $kilograms_html . $grams_html;
    }
}

if (!function_exists('serial')) {
    /**
     * Get the serial number with leading zeros based on the given key.
     *
     * @param \Illuminate\Support\Collection $events The collection of items.
     * @param int $key The key (index) for which the serial number is generated.
     * @return string The serial number with leading zeros.
     */
    function serial($events, int $key): string
    {
        $totalItems = $events->count();
        $totalDigits = strlen((string) $totalItems);
        return str_pad($key + 1, $totalDigits, '0', STR_PAD_LEFT);
    }
}  


if (!function_exists('print_one_line')) {
    /**
     * Truncates a string to fit within a maximum length, adding ellipsis if necessary.
     *
     * @param string $value The input string to be truncated.
     * @param int $max_length The maximum length of the output string.
     * @return string The truncated string with optional ellipsis.
     */
    function print_one_line(string $value, int $max_length = 50): string {
        // Replace newlines with spaces
        $value = str_replace(["\r", "\n"], ' ', $value);
        
        // Strip HTML tags
        $value = strip_tags($value);
        
        // Trim whitespace
        $value = trim($value);
        
        // Check if the value exceeds the maximum length
        if (mb_strlen($value) > $max_length) {
            // Truncate the string and add ellipsis
            $value = mb_substr($value, 0, $max_length - 3) . '...';
        }
        
        return $value;
    }
}


if (!function_exists('unique_id')) {
    /**
     * Generate a unique ID with a minimum and maximum length of characters.
     *
     * @param int $minLength Minimum length of the generated unique ID.
     * @param int $maxLength Maximum length of the generated unique ID.
     *
     * @return string The generated unique ID.
     */
    function unique_id(int $minLength = 10, int $maxLength = 10): string {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $timestampLength = 13; // Length of the timestamp in milliseconds
    
        // Get the current timestamp in milliseconds
        $timestamp = round(microtime(true) * 1000);
    
        // Convert the timestamp to a string and remove the decimal point
        $timestampString = str_replace('.', '', (string)$timestamp);
    
        // Calculate the number of characters needed to fill the remaining length
        $charactersNeeded = $minLength - $timestampLength;
    
        // Ensure we have enough characters to fill the minimum length
        while (strlen($timestampString) < $charactersNeeded) {
            $randomCharacter = $characters[random_int(0, strlen($characters) - 1)];
            $timestampString .= $randomCharacter;
        }
    
        // Convert the timestamp to all capital letters
        $timestampString = strtoupper($timestampString);
    
        // Combine the timestamp with the random characters and take a substring within the specified length
        $uniqueID = substr($timestampString, 0, $maxLength);
    
        return $uniqueID;
    }
}


if (!function_exists('generate_password')) {
    /**
     * Generate a password with length of characters.
     *
     * @param int $length of the generated password.
     *
     * @return string The generated password.
     */
    function generate_password($length = 12)
    {
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $specialCharacters = '!@#$%^&*()_+-=[]{}|;:,.<>?';

        $password = '';

        // Ensure at least one character from each category
        $password .= $uppercase[random_int(0, strlen($uppercase) - 1)];
        $password .= $lowercase[random_int(0, strlen($lowercase) - 1)];
        $password .= $numbers[random_int(0, strlen($numbers) - 1)];
        $password .= $specialCharacters[random_int(0, strlen($specialCharacters) - 1)];

        // Generate the remaining characters
        $remainingLength = $length - 4; // Subtract 4 for the required characters
        $characters = $uppercase . $lowercase . $numbers . $specialCharacters;

        for ($i = 0; $i < $remainingLength; $i++) {
            $password .= $characters[random_int(0, strlen($characters) - 1)];
        }

        // Shuffle the characters to randomize the password
        $password = str_shuffle($password);

        return $password;
    }
}