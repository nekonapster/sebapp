<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2> -->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-1 text-gray-900 dark:text-gray-100 flex items-center gap-6 justify-between m-2">
                    <h1 class="text-3xl">Nuevos usuarios</h1>
                    <button class="btn btn-accent text-gray-800 font-bold" onclick="my_modal_4.showModal()">
                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                        </svg>
                        Nuevo</button>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 text-gray-900 dark:text-gray-100">
                    <table class="table">
                        <tr>
                            <th>Rol</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Pass</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <tr>
                            <td><input class="input input-sm" type="text"></td>
                            <td><input class="input input-sm" type="text"></td>
                            <td><input class="input input-sm" type="text"></td>
                            <td><input class="input input-sm" type="text"></td>


                            <td><button class="btn btn-sm btn-primary" type="button">Editar</button></td>
                            <td><button class="btn btn-sm btn-secondary" type="button">Borrar</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

<!-- modal, using ID.showModal() method -->

<dialog id="my_modal_4" class="modal">
    <div class="modal-box w-11/12 max-w-5xl h-full">
        <h3 class="text-4xl font-bold mb-6">Crear nuevo usuario</h3>
        <label for="nombre" class="text-2xl">Nombre <br>
            <input type="text" placeholder="nombre" id="nombre" class="w-full input border border-primary mt-3 mb-6">
        </label>
        <label for="email" class="text-2xl">Email <br>
            <input type="text" placeholder="email" id="email" class="w-full input border border-primary mt-3 mb-6">
        </label>
        <label for="pass" class="text-2xl">Password <br>
            <input type="text" placeholder="pass" id="pass" class="w-full input border border-primary mt-3 mb-6">
        </label>
        <label class="flex items-center">
            <input type="checkbox" name="admin" id="admin" class="checkbox checkbox-primary mr-3">
            Admin?
        </label>
        <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button, it will close the modal -->
                <button class="btn">Crear</button>
            </form>
        </div>
    </div>
</dialog>