<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'razao_social',
        'cnpj',
        'telefone',
        'ativo',
        'data_cadastro',
        'data_inativacao',
        'endereco'
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'data_cadastro' => 'datetime',
        'data_inativacao' => 'datetime',
    ];
}
