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
            return '<span class="badge badge-success">Active</span>';
        } elseif ($status === 'Inactive') {
            return '<span class="badge badge-danger">Inactive</span>';
        } else {
            return '<span class="badge badge-warning">Banned</span>';
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
}

