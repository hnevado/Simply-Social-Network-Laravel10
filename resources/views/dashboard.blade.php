<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="mb-4 text-xl font-bold">¡Bienvenido! Te has logeado correctamente</h2>
                    <hr class="mb-6">

                    <a href="{{route('home')}}" class="m-4 ml-0 bg-blue-400 w-48 mt-5 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                        Ir a la red social
                    </a>

                    <a href="{{route('profile.edit')}}" class="m-4 bg-blue-400 w-48 mt-5 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                        Cambiar los datos de mi perfil
                    </a>
                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
