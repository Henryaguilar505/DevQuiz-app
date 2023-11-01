<div>
    <form wire:submit.prevent='saveQuiz'>
        <x-input-error :messages="$errors->get('roomName')" class="mt-2" />
        <div class="flex justify-between items-center">
            @if (!$roomAdded)
                <div>
                    <input class="rounded-md dark:text-slate-800" type="text" wire:model="roomName"
                        placeholder="Nombre de la sala">

                    <button type="button"
                        class="font-bold bg-indigo-700 hover:bg-indigo-800 p-2 text-gray-100 rounded-md"
                        wire:click="addName">
                        Guardar Nombre</button>
                </div>
            @else
                <div>
                    <p class="font-bold text-md"> Sala:<span class="font-black text-xl"> {{ $roomName }}</span> </p>
                </div>
            @endif

            <button type="button" class="flex font-bold" wire:click="addQuestion">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                        clip-rule="evenodd" />
                </svg> Agregar pregunta</button>
        </div>

        @foreach ($questions as $questionIndex => $question)
            <div class="flex flex-col">
                @error("questions.$questionIndex.question")
                    <span class="text-red-500 mt-3">{{ $message }}</span>
                @enderror
                <input class="mt-3 font-black dark:text-slate-800" type="text"
                    wire:model="questions.{{ $questionIndex }}.question"
                    placeholder="Pregunta # {{ $questionIndex + 1 }}">

                <button type="button" class="flex p-2 font-semibold" wire:click="addAnswer({{ $questionIndex }})">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z"
                            clip-rule="evenodd" />
                    </svg> Agregar respuesta</button>
                </button>

                @foreach ($question['answers'] as $answerIndex => $answer)
                    <div class="mx-2">
                        <input class="w-full dark:text-slate-800" type="text"
                            wire:model="questions.{{ $questionIndex }}.answers.{{ $answerIndex }}"
                            placeholder="Respuesta">

                        <input type="checkbox" wire:model="questions.{{ $questionIndex }}.correct_answer"
                            value="{{ $answerIndex }}">
                        <label for="correct_answer">Correcta</label>


                        @error("questions.$questionIndex.answers.$answerIndex")
                            <span class="text-red-500 mt-3">{{ $message }}</span>
                        @enderror
                    </div>
                @endforeach
            </div>
        @endforeach

        @if ($questions)
            <div class="flex justify-between">

                <a href="{{ route('quiz') }}"
                    class="font-bold bg-red-600 hover:bg-red-700 p-2 text-center text-gray-100 
                rounded-md mt-8">Cancelar
                    y regresar</a>

                <button type="submit"
                    class="font-bold bg-indigo-700 hover:bg-indigo-800 p-2 text-center text-gray-100 rounded-md mt-8">Guardar
                    y publicar</button>
            </div>
        @endif

    </form>

</div>
