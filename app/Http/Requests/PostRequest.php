<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//za pocetak pustiti svakoga
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()//pravila sto definisemo
    {
        return [
            'body' => 'required',
            'title' => 'required',
            'tags' => 'required|array'        
        ];
    }
}
