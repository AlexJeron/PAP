<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $table = 'recurso';
    protected $fillable = ['nome', 'quantidade_total'];

    public function atividade()
    {
        return $this->belongsToMany(Atividade::class);
    }
}