<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professor';
    protected $fillable = ['nome', 'email'];
    // protected $primaryKey = 'professor_id';

    public function atividades()
    {
        return $this->belongsToMany(Atividade::class);
    }
}