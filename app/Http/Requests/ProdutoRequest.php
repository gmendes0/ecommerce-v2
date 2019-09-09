<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
			'nome' => 'required|min:1|max:255',
			'valor' => 'required|numeric|min:0|max:9999999.99',
			'descricao' => 'max:1000',
			'active' => 'required|numeric|min:0|max:1',
			'fornecedor_id' => 'required|numeric|min:0',
		];
	}
}
