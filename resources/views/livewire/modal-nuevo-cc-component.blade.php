<div>
    <button type="button" class="btn btn-square btn-sm inline btn-primary" onclick="modalCC.showModal()">CC</button>

    {{-- ! modal para creacion de 'CC' cuenta contable --}}
    <dialog id="modalCC" class="modal" wire:ignore.self>
        <div class="card bg-base-100 w-96 shadow-xl">
            <div class="card-body items-center">
                <div>
                    <p class="mb-5 text-start text-2xl w-full">Nueva Cuenta Contable</p>
                    <div class="divider"></div>
                    <span class="label-text">Rubro</span>
                    <Select wire:model='rubro' class="select w-full select-bordered mb-5">
                        <option value="Aranceles">Aranceles</option>
                        <option value="Materiales y suministros">Materiales y suministros</option>
                        <option value="Operativos">Operativos</option>
                        <option value="Mantenimiento">Mantenimiento</option>
                        <option value="Seguros">Seguros</option>
                        <option value="Muebles y utiles">Muebles y utiles</option>
                        <option value="Servicios profesionales">Servicios profesionales</option>
                        <option value="Servicios">Servicios</option>
                        <option value="Personal">Personal</option>
                    </Select>

                    <span class="label-text">Descripcion</span>
                    <input wire:model='descripcion' type="text" placeholder="Description"
                        class="input input-bordered w-full mb-5">

                    <div class="flex justify-start w-full input input-bordered items-center">
                        <p>Tipo</p>
                        <div class="">
                            <label for="in" class="mr-3">
                                In
                                <input type="radio" value="in" wire:model="tipo" class="radio radio-primary">
                            </label>

                            <label for="out">
                                Out
                                <input type="radio" value="out" wire:model="tipo" class="radio radio-primary">

                            </label>
                        </div>
                    </div>
                    <div class="card-actions w-full">
                        <button wire:click='crearCC' class="btn w-full mt-5 btn-accent">Crear</button>
                    </div>
                </div>
            </div>
        </div>
    </dialog>
</div>