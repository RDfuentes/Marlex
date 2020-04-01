<?php

namespace marlex\Http\Requests;

use marlex\Http\Requests\Request;

class ArticuloFormRequest extends Request
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
            'idcategoria'=>'required',
            'codigo'=>'required|max:50',
            'nombre'=>'required|max:150',
            'stock'=>'required|numeric',
            'descripcion'=>'max:50',
            'imagen'=>'mimes:jpeg,bmp,png'
        ];
    }
}
