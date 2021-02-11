<?php

namespace App\Http\Requests\ModParametro;

use Illuminate\Foundation\Http\FormRequest;

class imagenEditarFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
       return [
            'Form_titulo'=> 'required|max:30',
            'Form_precio'=> 'required|max:30',
            'Form_descripcion'=> 'max:100',
            'Form_idCategoria' => 'required',
            'Form_idTag' => 'required',
            'Form_Imagen'=>'mimes:jpeg,bmp,png,jpg',
            'Form_idImagen' => ''
        ];
    }
}
