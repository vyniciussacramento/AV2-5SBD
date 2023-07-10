<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bem extends Model
{
    use HasFactory;
    
    protected $table = 'bens';
    protected $fillable = [
        'nome',
        'valor',
        'contrato',
        'descricao',
    ];
}
