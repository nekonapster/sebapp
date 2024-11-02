<div>
    <form wire:submit.prevent="editarUsuarioConfirmado">
        <dialog id="my_modal_5" class="modal max-w-fill" wire:ignore.self>

            <div class="modal-box">
                <h3 class="text-3xl font-bold mb-6">Editar usuario</h3>

                {{-- @if (session('msg'))
                <div role="alert" class="alert alert-success flex justify-center" id="alert-message">
                    {{session('msg')}}
                </div>

                @script
                <script>
                    $wire.on('alerta', () => { 
                        setTimeout(() => {
                            document.getElementById('alert-message').style.display = 'none';
                        }, 3000);
                    });
                </script>
                @endscript
                @endif --}}



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
                <p class="text-xs  font-thin mb-5"></p>
                <label for="pass" class="text-2xl mt-5">Password
                    <input wire:model='password' type="text" id="pass"
                        class="w-full input input-sm border border-primary mt-1 mb-3">
                </label>

                <div class="text-red-500 text-sm">
                    @error('password') {{ $message }} @enderror
                </div>

                {{-- <p class="text-xs font-thin mb-5"></p>
                <label class="flex items-center mt-1">
                    <input wire:model='role' type="checkbox" name="admin" id="admin"
                        class="checkbox checkbox-primary mr-3">
                    Admin?
                </label>
                <p class="mt-3 font-thin text-xs">
                    (Si activa esta opcion el email sera asociado a un administrador. Solo activar esta casilla si tiene
                    confianza en el usuario a crear).
                </p> --}}
                <div class="modal-action">
                    <!-- if there is a button, it will close the modal -->
                    <button type="submit" class="btn btn-success px-3">Guardar cambios</button>
                </div>
        </dialog>
    </form>
</div>