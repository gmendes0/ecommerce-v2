<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
	use SoftDeletes;

	protected $fillable = ['name', 'extension', 'path', 'produto_id'];

	protected function produto(){
		return $this->belongsTo('App\Entities\Produto');
	}
}
