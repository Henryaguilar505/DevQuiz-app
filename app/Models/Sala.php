<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Sala extends Model
{
    use HasFactory;

    protected $table = 'salas';

    protected $fillable = [
        'name',
        'pin',
        'user_id',
        'disponible'
    ];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function participantes()
    {
        return $this->hasMany(Participante::class);
    }

    public function resumen()
    {
        return $this->hasMany(Resumen::class);
    }
}
