<div>
   <dialog id="my_modal_4" class="modal">
        <div class="modal-box w-11/12 max-w-5xl h-full">
            <h3 class="text-4xl font-bold mb-6">Crear nuevo usuario</h3>
            <label for="nombre" class="text-2xl">Nombre <br>
                <input type="text" placeholder="nombre" id="nombre"
                    class="w-full input border border-primary mt-3 mb-6">
            </label>
            <label for="email" class="text-2xl">Email <br>
                <input type="text" placeholder="email" id="email"
                    class="w-full input border border-primary mt-3 mb-6">
            </label>
            <label for="pass" class="text-2xl">Password <br>
                <input type="text" placeholder="pass" id="pass"
                    class="w-full input border border-primary mt-3 mb-6">
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
</div>
