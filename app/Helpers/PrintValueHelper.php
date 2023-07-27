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
}

