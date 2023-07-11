<?php

use Illuminate\Http\Exceptions\HttpResponseException;

if (!function_exists('send_error')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function send_error($message, $errors=[], $statusCode=401)
    {
        $response = [
            'success' => false,
            'message' => $message
        ];

        if (!empty($errors)) {
            $response['data'] = $errors;
        }

        throw new HttpResponseException(response()->json($response, $statusCode));
    }
}
