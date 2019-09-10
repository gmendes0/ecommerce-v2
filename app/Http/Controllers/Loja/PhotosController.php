<?php

namespace App\Http\Controllers\Loja;

use App\Entities\Photo;
use App\Entities\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$photos = Photo::paginate(15);

		return view('photo.index')->with(['photos' => $photos]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($id)
	{
		return view('photo.create')->with(['produto' => Produto::findOrFail($id)]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $id)
	{
		try{

			$produto = Produto::findOrFail($id);
			if($produto){

				if($request->file('photo')->isValid()){

					if(Storage::disk('public')->exists('produtos/'.$id.'/'.$request->file('photo')->getClientOriginalName())){

						return redirect()->back()->with('alert', 'O arquivo já existe!');
					}else{

						$path = $request->file('photo')
							->storeAs('produtos/'.$id.'/', $request->file('photo')->getClientOriginalName(), 'public');
						
						if($path){

							$create = Photo::create([

								'name' => $request->file('photo')->getClientOriginalName(),
								'extension' => $request->file('photo')->extension(),
								'path' => $path,
								'produto_id' => $produto->id
							]);

							if($create){

								return redirect()->route('product.show', $produto->id)->with(['success' => 'Foto salva com sucesso!']);
							}else{
								
								return redirect()->back()->with('alert', 'Não foi possível salvar a imagem!');
							}
						}
					}
				}else{

					return redirect()->back()->with('alert', 'Imagem inválida!');
				}
			}
		}catch(\Exception $e){

			return redirect()->back()->with('alert', 'Error code: '.$e->getCode());
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
		//
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
