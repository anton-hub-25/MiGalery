<?php

namespace App\Http\Requests\ModParametro;

use Illuminate\Foundation\Http\FormRequest;

class tagFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//autorizamos la validacion.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Form_tag' => 'required|max:30',
            'Form_descripcion' => 'required|max:100'
        ];
    }
}
