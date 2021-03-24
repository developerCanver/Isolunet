<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'str_producto'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            //'nit.unique'                => 'Por favor Verificar. El NIT ya se encuentra almacenado',            
        ];
    }
}
