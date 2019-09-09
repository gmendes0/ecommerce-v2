<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
	use SoftDeletes;

	protected $fillable = ['nome', 'valor', 'descricao', 'active', 'fornecedor_id'];

	protected function fornecedor(){
		return $this->belongsTo('App\Entities\Fornecedor');
	}
}
