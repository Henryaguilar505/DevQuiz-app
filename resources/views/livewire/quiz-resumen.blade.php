<div class="mt-6">
    <h1 class="text-center font-black text-3xl">Resumen sala: {{ $sala->name }}</h1>

    <div class="bg-white max-w-7xl mx-auto p-2 mt-6 rounded-md shadow-md">

        <table class="w-full text-center mx-auto ">
            <thead class="bg-gray-100 text-xl">
                <tr>
                    <th>Nombre</th>
                    <th>Calificación</th>
                    <th>Fechs</th>
                </tr>
            </thead>
            <tbody class="text-lg font-semibold">
                @foreach ($sala->resumen as $resumen)
                    <tr class="border-b h-12">
                        <td>{{ $resumen->participante_name }}</td>
                        <td>{{ $resumen->calificacion }}/{{ $sala->preguntas->count() }}</td>
                        <td>{{ $resumen->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-end mt-6 mb-2 px-6">
            <button class=" bg-red-500 hover:bg-red-700 text-white font-bold p-2 text-sm rounded-md">
                Reiniciar Sala
            </button>
        </div>

    </div>
</div>
