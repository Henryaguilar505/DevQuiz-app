<div>
    <div class="text-gray-900 dark:text-gray-100 mb-8">
        @if (session()->has('mensaje'))
            <p class="bg-red-300 text-red-700 border
         border-red-700 font-bold p-1 text-center text-lg my-4">
                {{ session('mensaje') }} </p>
        @endif

        <h1 class="font-bold text-4xl text-center text-slate-800 dark:text-gray-100">Bienvenido</h1>
        <p class="m-4 font-semibold text-center text-slate-700 dark:text-slate-200">Ingresa tu nombre y el pin de la
            sala:</p>

        <form novalidate wire:submit.prevent='startGame'>
            <div class="flex flex-col gap-2 justify-center items-center">

                <label for="nombre" class="font-black text-xl text-indigo-950 dark:text-indigo-400">Nombre:</label>
                <x-text-input id="nombre" class="w-1/2 text-slate-700 font-black text-xl" type="text"
                    wire:model="nombre" placeholder="Tu nombre" value="{{old('nombre')}}" required autofocus />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />

                <label for="pin" class="font-black text-xl text-indigo-950 dark:text-indigo-400">PIN:</label>
                <x-text-input id="pin" class="w-1/2 text-slate-700 font-black text-xl" type="text"
                    wire:model="pin" placeholder="PIN" value="{{old('pin')}}" required autofocus />
                <x-input-error :messages="$errors->get('pin')" class="mt-2" />

                <button type="submit"
                    class="mt-4 bg-indigo-700 font-semibold uppercase hover:bg-indigo-800 dark:bg-gray-200 border dark:hover:bg-gray-100 dark:text-slate-900 text-white p-2 w-1/2 rounded-md">Entrar</button>
            </div>
        </form>
    </div>

    @guest
        <div class="flex flex-col w-1/2 mx-auto items-center gap-4 md:flex-row md:justify-between">
            <a class="font-bold text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none "
                href="{{ route('login') }}">Iniciar Sesión</a>

            <a class="font-bold text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none"
                href="{{ route('register') }}">Registrarse</a>
        </div>
    @endguest

    @auth
        <div class="flex flex-col w-1/2 mx-auto items-center gap-4 md:flex-row md:justify-between">
            <a class="font-bold text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none "
                href="{{ route('crear-quiz') }}">Crear Quiz</a>

            <a class="font-bold text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none"
                href="{{ route('quiz') }}">Mis Quiz</a>
        </div>
    @endauth
</div>
