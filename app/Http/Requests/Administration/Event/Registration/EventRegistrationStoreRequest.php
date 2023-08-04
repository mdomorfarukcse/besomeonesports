<?php

namespace App\Http\Requests\Administration\Event\Registration;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Event\Registration\EventRegistration;

class EventRegistrationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'event_id' => 'required|exists:events,id',
            'player_id' => 'required|exists:players,id',
        ];
    }
}
