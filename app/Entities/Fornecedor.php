<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'email', 'cnpj', 'active'];
}
