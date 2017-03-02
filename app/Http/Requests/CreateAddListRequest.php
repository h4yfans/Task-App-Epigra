<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'list_name'        => 'required|min:5',
            'list_description' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'list_name.required' => 'Liste adı gerekli',
            'list_name.min' => 'Liste adı en az 5 karakter olmalı',
            'list_description.required'   => 'Liste açıklaması gerekli',
            'list_description.min' => 'Liste açıklaması en az 10 karakterl olmalı'
        ];

    }
}
