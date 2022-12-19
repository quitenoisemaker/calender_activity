<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
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
            //
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'image' => 'nullable',
            'start_date' => 'sometimes|required|date|after_or_equal:2000-01-01',
            'end_date' => 'sometimes|required|date|after_or_equal:start_date',
        ];
    }
}
