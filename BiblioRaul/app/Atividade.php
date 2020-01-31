<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $table = 'atividade';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function professor()
    {
        return $this->belongsToMany(Professor::class);
    }

    public function turma()
    {
        return $this->belongsToMany(Turma::class);
    }

    public function espectador()
    {
        return $this->belongsToMany(Espectador::class);
    }

    public function recurso()
    {
        return $this->belongsToMany(Recurso::class);
    }
}
