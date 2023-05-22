<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;
    protected $table = "filme";

    protected $fillable = [
        'nome', 'horario', 'sinopse','categoriafilme_id', 'imagemfilme'
    ];

    public function categoriafilme(){
        return $this->belongsTo(Categoriafilme::class,'categoriafilme_id','id');
    }

}
