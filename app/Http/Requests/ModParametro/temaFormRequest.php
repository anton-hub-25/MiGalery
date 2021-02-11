<?php

namespace App\Http\Requests\ModParametro;

use Illuminate\Foundation\Http\FormRequest;

class temaFormRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Form_tema' => 'required|max:30',
            'Form_descripcion' => 'required|max:100'
        ];
    }
}
