<?php

namespace App\Livewire;

use App\Models\Participante;
use App\Models\Sala;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AllQuiz extends Component
{
    public $userQuiz;

    public function render()
    {
        return view('livewire.all-quiz');
    }

    //funcion para mostrar resumen
    public function verResumen(Sala $sala)
    {
    
       return redirect()->route('show.resumen', $sala);
    }

    //funcion para hacer visible una sala
    public function disponible(Sala $sala){
        if($sala->disponible){
            $sala->disponible = false;
            $sala->save();
        }else{
            $sala->disponible = true;
            $sala->save();
        }

        return redirect()->route('quiz');
    }
    

    //funcion para eliminar sala
    public function eliminar(Sala $sala)
    {
        $sala->delete();
        session()->flash('mensaje', 'se ha eliminado la sala correctamente');
        return redirect()->route('quiz');
    }

    //redirigir sala a la ruta de editar
    public function editar(Sala $sala)
    {
        return redirect()->route('sala.editar', $sala);
    }
}
