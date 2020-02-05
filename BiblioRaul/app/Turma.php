<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table = 'turma';
    protected $fillable = ['nome'];

    public function atividades()
    {
        return $this->belongsToMany(Atividade::class);
    }
}