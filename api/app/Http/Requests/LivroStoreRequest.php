<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroStoreRequest extends FormRequest
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
            'id'            => 'required|integer',
            'nome'          => 'required|string',
            'autor'         => 'required|string',
            'categoria'     => 'required|string',
            'codigo'        => 'required|string|unique:livros,codigo,',
            'tipo'          => 'required|string',
            'tamanho'       => 'required|decimal',
            'created_at'    => 'string',
            'updates_at'    => 'string',
    
        ];
    }
}
