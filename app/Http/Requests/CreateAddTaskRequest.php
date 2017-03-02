<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddTaskRequest extends FormRequest
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
            'task_new'    => 'required',
            'task_repeat' => 'required|integer'
        ];
    }


    public function messages()
    {
        return [
            'task_new.required' => 'Task ismi gerekli',
            'task_repeat.required' => 'Gün tekrar süresi gerekli',
            'task_repeat.integer' => 'Gün tekrar süresi sayı olmalı'
        ];
    }
}
