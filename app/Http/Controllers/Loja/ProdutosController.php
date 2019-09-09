<?php

namespace App\Http\Controllers\Loja;

use App\Entities\Fornecedor;
use App\Entities\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;

class ProdutosController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$produtos = Produto::all();
		return view('produto.index')->with(['produtos' => $produtos]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$fornecedores = Fornecedor::select('id', 'nome')
															->where(['active' => 1])
															->orderBy('nome', 'asc')
															->get();
		return view('produto.create')->with(['fornecedores' => $fornecedores]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProdutoRequest $request)
	{
		$insert = Produto::create($request->all());
		if($insert){
			return redirect()->route('product.index');
		}else{
			return redirect()->back();
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$produto = Produto::findOrFail($id);

		return view('produto.show')->with(['produto' => $produto]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
