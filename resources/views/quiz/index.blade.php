<x-app-layout>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))     
            <p class="bg-green-300 text-green-700 border
             border-green-700 font-bold p-1 text-center text-lg my-4">{{session('mensaje')}} </p>                    
            @endif

            <h1 class="font-bold py-8 text-4xl text-center text-slate-800 dark:text-gray-100">Mis Quiz</h1>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                  @if($userQuiz->isEmpty())
                  {{ __("Aún no has creado  ningún Quiz") }}

                  @else 
                  <livewire:all-quiz :userQuiz="$userQuiz">

                  @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
