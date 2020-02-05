<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $table = 'atividade';
    protected $fillable = ['nome', 'local_id', 'user_id', 'observacao'];
    protected $dates = ['inicio', 'fim'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    public function professores()
    {
        return $this->belongsToMany(Professor::class);
    }

    public function turmas()
    {
        return $this->belongsToMany(Turma::class);
    }

    public function espectadores()
    {
        return $this->belongsToMany(Espectador::class);
    }

    public function recursos()
    {
        return $this->belongsToMany(Recurso::class);
    }
}