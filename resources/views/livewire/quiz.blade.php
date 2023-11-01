<div>
    <div class="text-center ">
        <div>
            @if (count($preguntas) > 0)
                <form wire:submit.prevent="finalizar">
                    <hr class="my-4">
                    @foreach ($preguntas as $pregunta)
                        <p class="text-lg font-semibold dark:text-slate-300">{{ $pregunta->pregunta }}</p>
                        @foreach ($pregunta->respuestas as $respuesta)
                            <div class="flex items-center mt-2">
                                <input type="radio"
                                 wire:model="respuestasSeleccionadas.{{ $pregunta->id }}" value="{{ $respuesta->id }}"
                                 name="pregunta_{{ $pregunta->id }}">
                                <label for="respuesta_{{ $pregunta->id }}_{{ $respuesta->id }}"
                                    class="ml-2 ">
                                   <p class="dark:text-slate-300">{{ $respuesta->respuesta }}</p> 
                                </label>
                            </div>
                        @endforeach
                        <hr class="my-4">
                    @endforeach
                    <div>
                        <button type="submit" class="bg-indigo-700 font-bold text-white p-2 rounded hover:bg-indigo-700">
                            Finalizar
                        </button>
                    </div>
                </form>
            @else
                <p class="text-lg">No hay preguntas disponibles en esta sala.</p>
            @endif
        </div>
        
    </div>
 
  



</div>
