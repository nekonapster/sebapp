<div>
    <div class="grid grid-cols-5 gap-2">
        <!-- Fila 1 -->
        <input wire:model='baseGeneral_id' wire:click="$emitTo('TablaBaseGeneralComponent', 'baseGeneral_id','baseGeneral_id')" type="text" placeholder="ID" class="input input-sm input-bordered w-full"
            disabled />
        <select wire:model='proveedor_name' id="proveedor"
            class="select select-bordered select-sm w-full text-xs">
            <option value="SIN NOMBRE">PROVEEDOR</option>
            @foreach ($nombres as $nombre)
            <option wire.poll value="{{$nombre}}"> {{$nombre}} </option>
            @endforeach
        </select>
        <input wire:model='fechaFactura' type="text" placeholder="Fecha factura"
            class="input input-sm input-bordered w-full" onfocus="(this.type='date')" />
        <input wire:model='fechaVencimiento' type="text" placeholder="Fecha vencimiento"
            class="input input-sm input-bordered w-full" onfocus="(this.type='date')" />
        <div class="grid grid-cols-2">
            <input wire:model='auxiliar' type="text" placeholder="Auxiliar"
                class="input input-sm input-bordered w-full" />
            <label class="cursor-pointer label text-sm  md:text-xs -mt-1">
                Activacion
                <input wire:model='activacion' type="checkbox" class="checkbox checkbox-secondary ml-1" />
            </label>
        </div>
    </div>

    <!-- Fila 2 -->
    <div class="grid grid-cols-5 gap-2 mt-2">

        <!-- Fila 3 -->
        <input wire:model='ptoVenta' type="text" placeholder="Pto. Venta"
            class="input input-sm input-bordered w-full" />

        <!-- Fila 4 -->
        <input wire:model='nFactura' type="text" placeholder="Nº Factura" class="input input-sm input-bordered w-full" />
        <input wire:model='importe' type="number" step="0.1" placeholder="Importe" class="input input-sm input-bordered w-full" />

        <!-- Fila 5 -->
        <select wire:model='gastos' name="gastos" id="gastos" class="select select-bordered select-sm w-full text-xs">
            <option value="GASTOS">GASTOS</option>
            <option value="Gastos 1">Gastos 1</option>
            <option value="Gastos 2">Gastos 2</option>
            <option value="Gastos 3">Gastos 3</option>
        </select>
        <select wire:model='proyecto' name="proyecto" id="proyecto" class="select select-bordered select-sm w-full text-xs">
            <option value="PROYECTO">PROYECTO</option>
            <option value="Proyecto 1">Proyecto 1</option>
            <option value="Proyecto 2">Proyecto 2</option>
            <option value="Proyecto 3">Proyecto 3</option>
        </select>
    </div>

    <!-- Notas -->
    <div>
        <textarea wire:model='notas' placeholder="Notas" class="textarea textarea-bordered w-full mt-3"></textarea>
    </div>
    <!-- Botones -->
    <div class="flex justify-between mt-2">
        <div class="grid grid-cols-2">
            
            {{-- !modal nuevo proveedor --}}
            @livewire('modal-nuevo-proveedor-component')
            
            {{-- ! modal modal nuevo banco --}}
            @livewire('modal-nuevo-banco-component')
        </div>
        <div>
            <button wire:click='actualizarDatosFormulario' class="btn btn-sm btn-warning mr-5">Modificar</button>
            <button wire:click='nuevoDatoBaseGeneral' class="btn btn-sm btn-accent">Guardar</button>
        </div>
    </div>
       
</div>