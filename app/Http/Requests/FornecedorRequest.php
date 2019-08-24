<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorRequest extends FormRequest
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
            'nome' => 'required|min:1|max:100',
            'email' => 'required|min:1|max:255',
            'cnpj' => 'required|min:14|max:14',
            'active' => 'required|numeric|min:0|max:1',
        ];
    }
}
