<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' =>'required|min:1|max:80',
            'last_name' =>'required|min:1|max:80',
            'email' =>'required|min:1|max:150',
            'phone' =>'required|min:1|max:15',
           
        ];
    }
}
