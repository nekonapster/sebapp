{{-- MODAL DE NUEVO USUARIO EN PESTAÑA USUARIOS --}}
<div>
    <button class="btn btn-accent font-bold mt-3 mr-1" onclick="my_modal_4.showModal()">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 12h14m-7 7V5" />
        </svg>Nuevo</button>


    <!-- modal, using ID.showModal() method -->
        <dialog id="my_modal_4" class="modal max-w-fill" wire:ignore.self>

            <div class="modal-box">
                <h3 class="text-3xl font-bold mb-6">Crear nuevo usuario</h3>

                @if (session('msg'))
                    <div role="alert" class="alert alert-success flex justify-center mb-5" id="alert-message">
                        {{session('msg')}}
                    </div>

                    @script
                        <script>
                            $wire.on('alerta', () => { 
                                setTimeout(() => {
                                    document.getElementById('alert-message').style.display = 'none';
                                    }, 1000);
                                });
                        </script>
                    @endscript
                @endif



                <label for="nombre" class="text-2xl">Nombre
                    <input wire:model='name' type="text" placeholder="El nombre no se utilizara para loguearse."
                        id="nombre" class="w-full input input-sm border border-primary mt-1 mb-3">
                </label>

                <div class="text-red-500 text-sm">
                    @error('name'){{$message}}@enderror
                </div>

                <p class="text-xs  font-thin mb-5"></p>
                <label for="email" class="text-2xl">Email
                    <input wire:model='email' type="text"
                        placeholder="El email es un campo importante ya que se usará para loguearse." id="email"
                        class="w-full input input-sm border border-primary mt-1 mb-3">

                    <div class="text-red-500 text-sm">
                        @error('email') {{$message}} @enderror
                    </div>

                </label>
                <p class="text-xs  font-thin mb-5"></p>
                <label for="pass" class="text-2xl mt-5">Password
                    <input wire:model='password' type="text" placeholder="La password puede ser de cualquier tipo siempre que tenga mas de 8
                    digitos." id="pass" class="w-full input input-sm border border-primary mt-1 mb-3">
                </label>

                <div class="text-red-500 text-sm">
                    @error('password') {{ $message }} @enderror
                </div>

                <p class="text-xs font-thin mb-5"></p>
                <label class="flex items-center mt-1">
                    <input wire:model='role' type="checkbox" name="admin" id="admin"
                        class="checkbox checkbox-primary mr-3">
                    Admin?
                </label>
                <p class="mt-3 font-thin text-xs">
                    (Si activa esta opcion el email sera asociado a un administrador. Solo activar esta casilla si tiene confianza en el usuario a crear).
                </p>
                <div class="modal-action">
                    <!-- if there is a button, it will close the modal -->
                    <button wire:click="crearUsuario" class="btn btn-accent px-3">Crear</button>
                </div>
        </dialog>
    </form>


</div>

@script
<script>
    //detectamos el cierre de la pagina mediante la tecla ESC
        document.addEventListener('keydown', function (event) {
            if (event.key === "Escape") {
                $wire.cerrarModal(); // Llama a la función en el componente de Livewire
            }
        });
        //recargamos la pagina cuando cerramos el modal con esc
        $wire.on('modalClosed', () => {
                location.reload();
        });
</script>
@endscript