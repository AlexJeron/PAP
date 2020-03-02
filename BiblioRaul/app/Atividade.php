<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Carbon\Carbon;

class Atividade extends Model
{
    protected $table = 'atividade';
    protected $fillable = ['nome', 'local_id', 'user_id', 'total_espectadores', 'outros_espectadores', 'observacao'];
    protected $dates = ['inicio', 'fim'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    public function recurso()
    {
        return $this->belongsTo(Recurso::class);
    }

    public function professores()
    {
        return $this->belongsToMany(Professor::class)->withTimestamps();
    }

    public function turmas()
    {
        return $this->belongsToMany(Turma::class)->withTimestamps();
    }

    // public function getInicioAttribute($value)
    // {
    //     $dateStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
    //     $timeStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');

    //     return $this->start = ($timeStart == '00:00:00' ? $dateStart : $value);
    // }

    // public function getFimAttribute($value)
    // {
    //     $dateEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
    //     $timeEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');

    //     return $this->end= ($timeEnd == '00:00:00' ? $dateEnd: $value);
    // }
}