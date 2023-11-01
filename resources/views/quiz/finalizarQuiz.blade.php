<x-guest-layout>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-center items-center gap-6">

                 <h1 class="text-4xl text-indigo-700 font-black">Felicidades, haz completado este quiz!</h1>

                 <p 
                 class="font-black text-slate-900 dark:text-slate-400 text-3xl ">Nombre: 
                 <span class="text-slate-700 dark:text-slate-100 uppercase">{{$nombreAlumno}}</span></p>

                 <p 
                 class="font-black text-slate-900 dark:text-slate-400 text-3xl">Calificación: 
                 <span class="text-slate-700 dark:text-slate-100">{{$calificacion}}/{{$totalPreguntas}}</span></p>

                 <a href="{{route('dashboard')}}"
                 class="bg-indigo-700 font-semibold hover:bg-indigo-800 dark:bg-gray-200 border dark:hover:bg-gray-100 dark:text-slate-900 text-white py-2 px-4 rounded-md"
                 >Volver</a>
                   
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
