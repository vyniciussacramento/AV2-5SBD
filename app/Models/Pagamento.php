<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;
    protected $table = 'pagamentos';

    protected $fillable = [
        'numero_parcela',
        'contrato',
        'valor_parcela',
        'verificar_pagamento',
    ];
}
