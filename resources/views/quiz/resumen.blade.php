<x-app-layout>

    @if ($sala->resumen->isEmpty())
        <div class="max-w-7xl mx-auto  mt-6 text-center bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                Aún no se ha creado un resumen de este Quiz, invita a tus alumnos a participar.
            </div>
        </div>
    @else
        <livewire:quiz-resumen :sala="$sala">
    @endif


</x-app-layout>
