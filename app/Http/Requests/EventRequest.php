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
            'title' => 'required|min:1',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Preencha o campo Nome',
            'title.min' => 'O nome precisa de pelo menos 1 caracter',
        ];
    }
}