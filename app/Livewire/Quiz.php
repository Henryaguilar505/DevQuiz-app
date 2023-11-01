<?php

namespace App\Livewire;

use App\Models\Participante;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Resumen;
use App\Models\Sala;
use Livewire\Component;



use function PHPUnit\Framework\isEmpty;

class Quiz extends Component
{

    public $sala = '';
    public $puntuacion = 0;
    public $respuestasSeleccionadas = [];
    public $nombre;
    
    public function render()
    {
            $preguntas = Pregunta::where('sala_id', $this->sala['id'])->get();
       
            return view('livewire.quiz',[
            'preguntas' => $preguntas,
            'sala' => $this->sala
        ]);
    }

    public function seleccionar(int $respuesta, $preguntaId)
    {
       //obtener la respuesta correta de la pregunta
        $respuestaCorrecta = Respuesta::where('pregunta_id', $preguntaId)
        ->where('correct', true)
        ->first();
        
        // //comprobar que sea la respuesta correcta
        if($respuestaCorrecta->id === $respuesta){
            $this->puntuacion++;
        };
    }

    public function finalizar()
    {
        $puntuacion = 0;

        foreach ($this->respuestasSeleccionadas as $preguntaId => $respuestaId) {
            $respuestaCorrecta = Respuesta::find($respuestaId);
            if ($respuestaCorrecta->correct) {
                $puntuacion++;
            }
        }

        //guardar participante()
          $participante =  Participante::create([
                'name' =>$this->nombre,
                'sala_id' => $this->sala['id']
            ]);


        //create resumen
        $resumen = Resumen::create([
            'calificacion' => $puntuacion,
            'participante_id' => $participante->id,
            'sala_id' => $this->sala['id'],
            'participante_name' => $this->nombre
        ]);  
            
        
      return redirect()->route('quiz-finalizar', [$this->sala, $resumen]);
    }

}
