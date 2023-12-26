<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => ['required', 'min:3', 'string'],
            // 'description' => ['required', 'min:3', 'string'],
            // 'quota'      => ['required', 'min: 1'],
            // 'contact_email' => ['required', 'email', 'email:dns'],
            // 'contact_phone' => ['required'],
            'location'    => ['required'],
            // 'start_date'  => ['required', 'date', 'after_or_equal:today'],
            // 'end_date'    => ['required', 'date', 'after_or_equal:start_date']
        ];
    }
}
