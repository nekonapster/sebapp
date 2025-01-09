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
                    <span class="text-red-500"> <br> @error('numeroCC'){{$message}}@enderror </span>
                    <input wire:model="numeroCC" type="text" {{-- pattern="\d{8}" --}} minlength="8" maxlength="8" class="input input-bordered w-full mb-5 
                        @error('numeroCC') border-red-500 @enderror" placeholder="Solo numeros sin decimal" required>

                    <span class="label-text">Rubro</span>
                    <Select wire:model='rubro' class="select w-full select-bordered mb-5">
                        <option value="Actividades Escolares">Actividades Escolares</option>
                        <option value="Aportes">Aportes</option>
                        <option value="Aranceles">Aranceles</option>
                        <option value="Mantenimiento">Mantenimiento</option>
                        <option value="Materiales y suministros">Materiales y suministros</option>
                        <option value="Movilidad y Viáticos">Movilidad y Viáticos</option>
                        <option value="Muebles y Utiles">Muebles y Utiles</option>
                        <option value="Operativos">Operativos</option>
                        <option value="Otros egresos">Otros egresos</option>
                        <option value="Otros ingresos">Otros ingresos</option>
                        <option value="Personal">Personal</option>
                        <option value="Seguros">Seguros</option>
                        <option value="Servicios">Servicios</option>
                        <option value="Servicios profesionales">Servicios profesionales</option>
                    </Select>

                    <span class="label-text">Descripcion</span>
                    <span class="text-error"> <br> @error('descripcion'){{$message}}@enderror</span>
                    <input wire:model='descripcion' type="text"
                        class="input input-bordered w-full mb-5 @error('descripcion') border-red-500 @enderror"
                        placeholder="Minimo 5 caracteres">

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