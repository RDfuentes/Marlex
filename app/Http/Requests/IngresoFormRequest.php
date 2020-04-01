<?php

namespace marlex\Http\Requests;

use marlex\Http\Requests\Request;

class IngresoFormRequest extends Request
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

     //archivo para validar los datos de ingreso tanto para INGRESO como DETALLE DE INGRESO
    public function rules()
    {
        return [ 
            'idproveedor'=>'required',
            'tipo_comprobante'=>'required|max:20',
            'serie_comprobante'=>'max:7',
            'num_comprobante'=>'required|max:10',
            'idarticulo'=>'required',
            'cantidad'=>'required',
            'precio_compra'=>'required',
            'precio_venta'=>'required'
        ];
    }
}
