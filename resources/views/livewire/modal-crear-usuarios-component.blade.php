<div>
    <button class="btn btn-accent font-bold" onclick="my_modal_4.showModal()">
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 12h14m-7 7V5" />
        </svg>
        Nuevo</button>

    <!-- modal, using ID.showModal() method -->

    <dialog id="my_modal_4" class="modal">
        <div class="modal-box w-11/12 max-w-5xl lg:h-auto xl:min-h-full xl:min-w-[96%]">
            <h3 class="text-3xl font-bold mb-6">Crear nuevo usuario</h3>

            <label for="nombre" class="text-2xl">Nombre <br>
            <span class="text-xs  font-thin">El nombre proporcionado solo sirve para visualizarlo en la tabla de usuarios, no se utilizara para loguearse.</span>
                <input type="text" placeholder="nombre" id="nombre"
                    class="w-full input input-sm border border-primary mt-1 mb-3">
            </label>
            <label for="email" class="text-2xl">Email <br>
            <span class="text-xs  font-thin">El email es un campo importante ya que es el que se usara para loguearse.</span>
                <input type="text" placeholder="email" id="email"
                    class="w-full input input-sm border border-primary mt-1 mb-3">
            </label>
            <label for="pass" class="text-2xl">Password <br>
            <span class="text-xs font-thin">La password puede ser de cualquier tipo siempre que tenga mas de 8 digitos.</span>
                <input type="text" placeholder="pass" id="pass"
                    class="w-full input input-sm border border-primary mt-1 mb-3">
            </label>
            <label class="flex items-center mt-10">
                <input type="checkbox" name="admin" id="admin" class="checkbox checkbox-primary mr-3">
                Admin?
            </label>
            <p class="mt-3 font-thin text-xs">
                    (Si activa esta opcion el email sera asociado a un administrador. Solo activar esta casilla si tiene confianza en el usaurio a crear). 
            </p>



            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button, it will close the modal -->
                    <button class="btn btn-success px-10">Crear</button>
                </form>
            </div>
        </div>
    </dialog>
</div>
