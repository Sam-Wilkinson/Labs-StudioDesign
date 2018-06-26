<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlog extends FormRequest
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
            'name'=> 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required|image|max:20000',
            'category' => 'numeric',
            'tags' => 'required|array',
        ];
    }
    /**
    * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'name.alpha_spaces' => 'The title contains characters other than letters and spaces',
            'description.alpha_spaces' => 'The title contains characters other than letters and spaces',
            'content.alpha_spaces' => 'The title contains characters other than letters and spaces',
            
        ];
    }
}
