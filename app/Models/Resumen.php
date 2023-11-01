<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resumen extends Model
{
    use HasFactory;

    protected $table = 'resumen';

    protected $fillable = [
        'calificacion',
        'participante_id',
        'sala_id',
        'participante_name'
    ];

    public function Participante()
    {
        return $this->hasMany(Participante::class);
    }

    public function Sala()
    {
        return $this->belongsTo(Sala::class);
    }

  
}
