<div>
    <form wire:submit.prevent="editarUsuario">
        <dialog id="my_modal_5" class="modal max-w-fill" wire:ignore.self>

            <div class="modal-box">
                <h3 class="text-3xl font-bold mb-6">Editar usuario</h3>

                <label for="nombre" class="text-2xl">Nombre
                    <input wire:model.defer='name' type="text" id="nombre"
                        class="w-full input input-sm border border-primary mt-1 mb-3">
                </label>

                <div class="text-red-500 text-sm">
                    @error('name'){{$message}}@enderror
                </div>

                <p class="text-xs  font-thin mb-5"></p>
                <label for="email" class="text-2xl">Email
                    <input wire:model='email' type="text" id="email"
                        class="w-full input input-sm border border-primary mt-1 mb-3">

                    <div class="text-red-500 text-sm">
                        @error('email') {{$message}} @enderror
                    </div>
                </label>

                <div class="flex items-center pt-5">
                    <span class="pr-5 text-xl">Admin</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input  wire:model="isAdmin" type="checkbox" class="sr-only peer">
                        <div class="w-10 h-6 bg-slate-900 rounded-full peer-focus:ring-4 peer-focus:ring-primary transition-all 
        peer-checked:bg-none"></div>
                        <div class="absolute left-1 top-1 w-4 h-4 bg-gray-700 rounded-full transition-transform 
        peer-checked:translate-x-4 peer-checked:bg-violet-600"></div>
                    </label>
                </div>





                <div class="modal-action">
                    <!-- if there is a button, it will close the modal -->
                    <button type="submit" class="btn btn-success px-3"
                        wire:confirm='Seguro que desea modificar el/los campos?'>Guardar cambios</button>
                </div>
        </dialog>
    </form>
</div>




