<?php

namespace App\Http\Controllers\Loja;

use App\Entities\Photo;
use App\Entities\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;

class PhotoApiController extends Controller
{
	public function store(Request $request, $id)
	{

		$produto = Produto::findOrFail($id);

		$data = [];
		$photos = [];
		$warnings = [];
		$i = 0;

		try{

			if(empty($request->file('photo'))){

				throw new Exception("Nenhuma imagem enviada", 1);
			}else{

				foreach ($request->file('photo') as $key => $photo) {
				
					if(!Storage::disk('public')->exists("produtos/$produto->id/".$photo->getClientOriginalName())){

						$path = $photo->storeAs("produtos/$produto->id", $photo->getClientOriginalName(), 'public');

						if(!Photo::create([

							'name' => $photo->getClientOriginalName(),
							'type' => $photo->getClientMimeType(),
							'extension' => $photo->getClientOriginalExtension(),
							'path' => $path,
							'produto_id' => $produto->id
						])){

							Storage::disk('public')->delete($path);
						}

						$photos += [
							$key => [
			
								'name' => $photo->getClientOriginalName(),
								'extension' => $photo->getClientOriginalExtension(),
								'path' => $path
							]
						];
						$i++;
					}else{

						$warnings += [

							$key => [

								'type' => 'existent',
								'photo' => $photo->getClientOriginalName(),
								'message' => 'Arquivo existente'
							]
						];
					}
				}
			}

			$data += ['error' => false];
			$data += ['total_imagens' => $i];
			$data += ['photos' => $photos];
			$data += ['warnings' => !empty($warnings) ? $warnings : false];
		} catch(Exception $e) {

			$data += ['error' => [

				'code' => $e->getCode(),
				'message' => $e->getMessage()
			]];
		}

		return response()->json(['data' => $data]);
		// return response()->json($request->file('photo'));
	}
}
