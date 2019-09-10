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
		$produtos = Produto::simplePaginate(5);
		// $produtos = Produto::select('*')
		// 	->withTrashed()
		// 	->get();
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
		$produto = Produto::findOrFail($id);
		$fornecedores = Fornecedor::select('id', 'nome')
			->where('active', 1)
			->get();

		return view('produto.create')->with(['produto' => $produto, 'fornecedores' => $fornecedores]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(ProdutoRequest $request, $id)
	{
		$update = Produto::findOrFail($id)->update($request->all());

		if($update){
			return redirect()->route('product.index');
		}else{
			return redirect()->back();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$delete = Produto::findOrFail($id)->delete();

		if($delete){
			return redirect()->route('product.index');
		}else{
			return redirect()->back();
		}
	}
}
