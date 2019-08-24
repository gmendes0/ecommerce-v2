<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    /**
     * Table name
     * 
     * @var string $table
     */
    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'email', 'cnpj', 'active'];
}
