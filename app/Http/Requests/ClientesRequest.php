<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
            'codigo'    => 'required|min:1|max:50|unique:clientes,codigo',
            'nombres'   => 'required|min:2|max:50',
            'apellidos' => 'nullable|min:2|max:50',
            'telefono'  => 'required|min:4|max:100',
            'email'     => 'nullable|email|max:100|unique:clientes,email',
            'direccion' => 'nullable|max:255'
        ];
    }
}
