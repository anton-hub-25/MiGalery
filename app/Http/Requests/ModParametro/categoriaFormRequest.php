<?php

namespace App\Http\Requests\ModParametro;

use Illuminate\Foundation\Http\FormRequest;

class categoriaFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Form_categoria' => 'required|max:30',
            'Form_descripcion' => 'required|max:100'
        ];
    }
}
