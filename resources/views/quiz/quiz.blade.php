<x-guest-layout>
    <div class=" max-w-full mx-auto sm:px-6 lg:px-8 ">
        <div class="bg-white dark:bg-gray-800 overflow-hidden w-full p-10 rounded-md shadow-md">

            <div class="md:flex justify-between">
                <div>
                    <h2 class="font-black dark:text-slate-400">Sala: <span class="text-slate-700 dark:text-slate-100 uppercase ">{{ $sala->name }}</span>
                    </h2>
                    <p class="font-bold dark:text-slate-400">Fecha: <span class="text-slate-600 dark:text-slate-100"> {{ now()->format('d-M-y') }}</span></p>
                    <p class="font-bold dark:text-slate-400"> Preguntas:<span class="text-slate-600 dark:text-slate-100"> {{ $sala->preguntas->count() }} </span>
                    </p>
                </div>

                <div>
                    <p class="font-black dark:text-slate-400">Alumno: <span class=" text-slate-700 uppercase dark:text-slate-100">{{ $nombre }}</span></p>
                    <p class="font-black dark:text-slate-400">Profesor: <span class=" text-slate-700 uppercase dark:text-slate-100">{{ $sala->user->name }}</span></p>
                </div>

            </div>


            <livewire:quiz :sala="$sala" :nombre="$nombre">

        </div>
    </div>

</x-guest-layout>
