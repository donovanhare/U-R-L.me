<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class PostURL extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
            
            return true;
            
        }
        return false;
    }

    public function messages()
{
    return [
        'url.required' => 'Unfortunately, we can\'t shorten nothing. Please supply us with a URL (https://example.com)! ',
        'url' => 'The URL that you\'ve supplied is invalid, please use the following format (https://example.com) and try again.',
    ];
}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => 'required|url'
        ];
    }
}
