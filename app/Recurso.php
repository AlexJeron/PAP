<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $table = 'recurso';
    protected $fillable = ['nome', 'quantidade_total', 'danificados'];

    public function atividades()
    {
        return $this->hasMany(Atividade::class);
    }

    public function estados()
    {
        return $this->belongsToMany(Estado::class);
    }
}