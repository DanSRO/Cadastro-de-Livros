<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'editora',
        'genero_id',
        'ano_lancamento',
        'estado'
    ];

    public function genero(){
        return $this->belongsTo(Genero::class, 'genero_id'); 
    }
}
