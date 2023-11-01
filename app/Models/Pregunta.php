<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'preguntas';

    protected $fillable = [
        'pregunta',
        'sala_id'
    ];

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }

    public function salas()
    {
        return $this->belongsTo(Sala::class);
    }
}
