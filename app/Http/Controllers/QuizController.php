<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use App\Models\Resumen;
use App\Models\Sala;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        //todas las salas por uusario
        $userQuiz = Sala::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();

        return view('quiz.index', [
            'userQuiz' => $userQuiz
        ]);
    }

    public function game($pin, $nombre)
    {
        $sala = Sala::where('pin', $pin)->first();

        if($sala &&  $sala->disponible){
            return view('quiz.quiz', [
                'sala' => $sala,
                'nombre' => $nombre
            ]);
        }

        session()->flash('mensaje', 'El pin es inválido');
        return redirect()->route('index'); 
    }

    public function finalizar(Sala $sala, Resumen $resumen)
    {
        //datos a mostar
        $alumno = Participante::where('id',$resumen->participante_id)->first();
        $nombreAlumno = $alumno->name;

        //calificacion
        $calificacion = Resumen::where('participante_id', $alumno->id)->first();
        $calificacion = $calificacion->calificacion;

        //total preguntas
        $totalPreguntas =  $sala->preguntas->count();
       

        return view('quiz.finalizarQuiz', [
            'resumen' => $resumen,
            'nombreAlumno' => $nombreAlumno,
            'calificacion' => $calificacion,
            'totalPreguntas' => $totalPreguntas
        ]);
    }

    //mostrar resumen de una sala
    public function verResumen(Sala $sala)
    {
       return view('quiz.resumen', ['sala' => $sala]);
    }

    public function editar(Sala $sala)
    {
        return view('quiz.editarQuiz', [
            'sala' => $sala
        ]);
    }
}
