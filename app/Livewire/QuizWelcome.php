<?php

namespace App\Livewire;

use App\Models\Sala;
use Livewire\Component;

class QuizWelcome extends Component
{
   
    public $pin;
    public $nombre;

    public function render()
    {
        return view('livewire.quiz-welcome');
    }

    public function startGame()
    {
        $datos = $this->validate();
        $sala = Sala::where('pin', $datos['pin'])->first();

        if($sala === null){
            session()->flash('mensaje', 'El pin es inválido');
           return redirect()->route('index');
        }
        
        return redirect()->route('game', [$sala->pin, 'nombre' => $datos['nombre']]);
    }

    //validacion
    public function rules()
    {
        return[
            'pin' => 'required|string|max:14',
            'nombre' => 'required|string|max:100'
        ];
    }

    //personalizar mensaje
    public function messages()
    {
        return [
            'pin.required' => 'El Pin de la sala es obligatorio.',
            'pin.max' => 'El Pin no debe superar los :max caracteres.',
            'pin.string' => 'El pin debe ser una cadena de caracteres',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no debe superar los :max caracteres.',
            'nombre.string' => 'El nombre debe ser una cadena de caracteres',
        ];
    }
}
