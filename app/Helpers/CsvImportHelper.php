<?php

if (!function_exists('show_csv_import_validation_errors')) {
    function show_csv_import_validation_errors($errors)
    {
        $failures = $errors->failures();

        $errorMessages = [];
        foreach ($failures as $failure) {
            // Collect error messages for each validation failure
            $errorMessages[] = "Row {$failure->row()}: {$failure->errors()[0]}";
        }

        // Redirect back with all validation error messages
        return redirect()->back()->withErrors($errorMessages)->withInput();
    }
}
