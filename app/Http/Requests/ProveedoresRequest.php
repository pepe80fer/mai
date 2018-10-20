<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedoresRequest extends FormRequest
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
            'codigo'    => 'required|min:1|max:50|unique:proveedores,codigo',
            'nombre'    => 'required|min:2|max:100',
            'contacto'  => 'nullable|min:2|max:50',
            'telefono'  => 'required|min:4|max:100',
            'email'     => 'nullable|email|max:100|unique:proveedores,email',
            'direccion' => 'nullable|max:255',
            'estado'    => 'required'
        ];
    }
}
