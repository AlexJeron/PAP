<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espectador extends Model
{
    protected $table = 'espectador';
    protected $fillable = ['nome'];

    public function atividade()
    {
        return $this->belongsToMany(Atividade::class);
    }
}
