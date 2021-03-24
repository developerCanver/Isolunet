<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaFormRequest extends FormRequest
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
            'razon_social'       => 'required',
            'nit'       => 'required|unique:tbl_empresa',  


        ];
    }

    public function messages()
    {
        return [
            'nit.unique'                => 'Por favor Verificar. El NIT ya se encuentra almacenado',
            'nit.required'              => 'Por favor Verificar. El Nit  estÁ vacio',
            'razon_social.required'     => 'Por favor Verificar. El Campo Razon Social no se ha ingresado',
        ];
    }

}
