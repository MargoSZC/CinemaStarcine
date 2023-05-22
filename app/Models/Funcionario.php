<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = "funcionario";

    protected $fillable = [
        'nome', 'salario', 'funcao','categoriafuncionario_id', 'imagemfuncionario'
    ];

    public function categoriafuncionario(){
        return $this->belongsTo(Categoriafuncionario::class,'categoriafuncionario_id','id');
    }

}
