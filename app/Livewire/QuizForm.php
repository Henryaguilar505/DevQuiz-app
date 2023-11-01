<?php

namespace App\Livewire;

use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Sala;
use Livewire\Component;

class QuizForm extends Component
{
    //array para preguntas
    public $questions = [];
    //para gregar pregunta nueva al arreglo
    public $newQuestion = '';

    //nombre se la sala
    public $roomName;
    public $roomAdded = false;

    public function addName()
    {
        // Verificar si el nombre de la sala ya se ha agregado
        if (!empty($this->roomName)) {
            $this->roomAdded = true; // Establecer la bandera
        }
    }

    //agregar pregunta
    public function addQuestion()
    {
        // Agregar la pregunta y relacionarla con la sala
        $this->questions[] = [
            'question' => $this->newQuestion,
            'answers' => [],
            'correct_answer' => null,
        ];

        $this->newQuestion = '';
    }

    //agregar respuesta
    public function addAnswer($questionIndex)
    {
        // Agregar una respuesta a la pregunta
        $this->questions[$questionIndex]['answers'][] = '';
    }

    //guardar quiz
    public function saveQuiz()
    {
        //validar
        $datos = $this->validate();

        //generar pin de la sala
        $pin = uniqid();

        //crear sala
        $sala = Sala::create([
            'name' => $this->roomName,
            'pin' => $pin,
            'user_id' => auth()->id()
        ]);


        foreach ($this->questions as $questionData) {
            // Crear la pregunta
            $pregunta = $sala->preguntas()->create([
                'pregunta' => $questionData['question'],
            ]);
    
            foreach ($questionData['answers'] as $answerDataIndex => $answerData) {
                // Crear la respuesta
                $respuesta = $pregunta->respuestas()->create([
                    'respuesta' => $answerData,
                ]);
    
                // Verificar si esta respuesta es la correcta
                if ($answerDataIndex == $questionData['correct_answer']) {
                    // Marcar esta respuesta como la correcta
                    $respuesta->update([
                        'correct' => true,
                    ]);
                }
            }
        }
        
        //crear mensaje
        session()->flash('mensaje', 'Se ha publicado corectamente tu sala');
        return redirect()->route('quiz');
    }

    //validacion
    public function rules()
    {
        return [
            'roomName' => 'required|string|max:100',
            'questions.*.question' => 'required|string|max:255',
            'questions.*.answers.*' => 'required|string|max:255',
            'questions.*.correct_answer' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'roomName.required' => 'El nombre de la sala es obligatorio.',
            'roomName.max' => 'El nombre de la sala no debe superar los :max caracteres.',
            'questions.*.question.required' => 'La pregunta es obligatoria.',
            'questions.*.question.max' => 'La pregunta no debe superar los :max caracteres.',
            'questions.*.answers.*.required' => 'Debe al menos haber una respuesta.',
            'questions.*.answers.*.max' => 'La respuesta no debe superar los :max caracteres.',
            'questions.*.correct_answer.required' => 'debe haber al menos una respuesta correcta',

            // Otras reglas de validación...
        ];
    }
}
