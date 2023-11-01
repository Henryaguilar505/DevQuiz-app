<?php

// namespace App\Livewire;

// use App\Models\Sala;
// use Livewire\Component;
// use App\Models\Pregunta;

// class QuizEditar extends Component
// {
//     public $sala;
//     public $roomName;
//     public $roomAdded;
//     public $questions; //preguntas de la base de datos


//     public function mount()
//     {
    
//         $this->sala = Sala::with('preguntas.respuestas')->find($this->sala->id);
//         $this->roomName = $this->sala->name;
//         $this->questions = $this->sala->preguntas;
//     }



//     public function render()
//     {
//         return view('livewire.quiz-editar');
//     }

// }
