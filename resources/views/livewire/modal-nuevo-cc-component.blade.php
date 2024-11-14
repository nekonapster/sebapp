<div>
    <button type="button" class="btn btn-square btn-sm inline btn-primary" onclick="modalCC.showModal()">CC</button>


    {{-- ! modal para creacion de 'CC' cuenta contable --}}
    <dialog id="modalCC" class="modal" wire:ignore.self>
        <div class="card bg-base-100 w-96 shadow-xl">
            <div class="card-body items-center">
                <div>
                    <p class="mb-5 text-start text-2xl w-full">Nueva Cuenta Contable</p>
                    <div class="divider"></div>


                    @if (session('msg_CC'))
                    <div role="alert" class="alert alert-success flex justify-center mb-5" id="mensajeCC">
                        {{session('msg_CC')}}
                    </div>

                    @script
                    <script>
                        $wire.on('msgCC_close', () => { 
                            setTimeout(() => {
                                document.getElementById('mensajeCC').style.display = 'none';
                                }, 2000);
                            });
                    </script>
                    @endscript
                    @endif


                    <span class="label-text">Numero</span>
                    <input wire:model="numeroCC" type="text" class="input input-bordered w-full mb-5"
                        placeholder="Solo numeros con un decimal" maxlength="9">


                    <span class="label-text">Rubro</span>
                    <Select wire:model='rubro' class="select w-full select-bordered mb-5">
                        <option value="aranceles">Aranceles</option>
                        <option value="materiales y suministros">Materiales y suministros</option>
                        <option value="operativos">Operativos</option>
                        <option value="mantenimiento">Mantenimiento</option>
                        <option value="seguros">Seguros</option>
                        <option value="muebles y utiles">Muebles y utiles</option>
                        <option value="servicios profesionales">Servicios profesionales</option>
                        <option value="servicios">Servicios</option>
                        <option value="personal">Personal</option>
                    </Select>

                    <span class="label-text">Descripcion</span>
                    <input wire:model='descripcion' type="text" placeholder="Description"
                        class="input input-bordered w-full mb-5">

                    <div class="flex justify-start w-full input input-bordered items-center mt-3">
                        <p>Tipo</p>
                        <div class="">
                            <label for="in" class="text-sm mr-3">
                                In
                                <input type="radio" value="in" wire:model="tipo" class="radio radio-primary radio-sm">
                            </label>

                            <label for="out" class="text-sm">
                                Out
                                <input type="radio" value="out" wire:model="tipo" class="radio radio-primary radio-sm">
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