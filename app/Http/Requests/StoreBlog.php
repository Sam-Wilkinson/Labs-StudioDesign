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
            'name'=> 'required|max:255|alpha_spaces',
            'description' => 'required|alpha_spaces',
            'content' => 'required|alpha_spaces',
            'image' => 'required|image|max:20000',
            'category' => 'numeric',
            'tags' => 'required|array',
        ];
    }
}
