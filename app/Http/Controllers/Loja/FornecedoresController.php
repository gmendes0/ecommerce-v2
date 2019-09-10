<?php

namespace App\Http\Controllers\Loja;

use App\Entities\Fornecedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FornecedorRequest;

class FornecedoresController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Fornecedor $fornecedor)
	{
		$fornecedores = $fornecedor->paginate(15);
		return view('fornecedor.index', compact('fornecedores'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('fornecedor.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(FornecedorRequest $request, Fornecedor $fornecedor)
	{
		$insert = $fornecedor->create($request->all());

		if ($insert) {
			return redirect()->route('supplier.index');
		} else {
			return redirect()->back();
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Fornecedor $fornecedor, $id)
	{
		$supplier = $fornecedor->find($id);
		return view('fornecedor.show', compact('supplier'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Fornecedor $fornecedor, $id)
	{
		$supplier = $fornecedor->find($id);
		return view('fornecedor.create', compact('supplier'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Fornecedor $fornecedor, FornecedorRequest $request, $id)
	{
		$update = $fornecedor->find($id)->update($request->all());
		if($update){
			return redirect()->route('supplier.show', $id);
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
	public function destroy(Fornecedor $fornecedor, $id)
	{
		$delete = $fornecedor->find($id)->delete();
		if ($delete) {
			return redirect()->route('supplier.index');
		} else {
			return redirect()->back();
		}
		
	}
}
