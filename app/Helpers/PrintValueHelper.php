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
