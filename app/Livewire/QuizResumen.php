<?php

namespace App\Livewire;

use App\Models\Resumen;
use App\Models\Sala;
use Livewire\Component;

class QuizResumen extends Component
{
    public $sala;
    public $resumen;


    public function render()
    {
        
        $this->resumen = Resumen::where('sala_id', $this->sala->id)->orderBy('created_at', 'ASC')->get(); 
        return view('livewire.quiz-resumen');
    }
}
