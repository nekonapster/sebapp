<div>
    <div class="grid grid-cols-5 gap-2">
        <!-- Fila 1 -->
        <input wire:model='baseGeneral_id'
            wire:click="$emitTo('TablaBaseGeneralComponent', 'baseGeneral_id','baseGeneral_id')" type="text"
            placeholder="ID" class="input input-sm input-bordered w-full" disabled />
        <select wire:model='proveedor_name' id="proveedor"
            class="select select-bordered select-sm w-full text-xs @error('proveedor_name')border-red-500 @enderror">
            <option value="xx">@error('proveedor_name') {{$message}} @else PROVEEDOR @enderror</option>
            @foreach ($nombres as $nombre)
            <option wire.poll value="{{$nombre}}"> {{$nombre}} </option>
            @endforeach
        </select>
        <input wire:model='fechaFactura' type="text"
            placeholder="@error('fechaFactura'){{$message}} @else Fecha factura @enderror"
            class="input input-sm input-bordered w-full @error('fechaFactura')border-red-500 @enderror"
            onfocus="(this.type='date')" />
        <input wire:model='fechaVencimiento' type="text"
            placeholder="@error('fechaVencimiento'){{$message}} @else Fecha vencimiento @enderror"
            class="input input-sm input-bordered w-full  @error('fechaVencimiento')border-red-500 @enderror" onfocus="
            (this.type='date' )" />

        <div class="grid grid-cols-2 w-80 gap-0">
            <select wire:model='auxiliar' placeholder="@error('auxiliar'){{$message}} @else Auximliar @enderror"
                class="select select-bordered select-sm w-full text-xs @error('auxiliar')border-red-500 @enderror">
                <option value="1000">1000 - INICIAL</option>
                <option value="2000">2000 - PRIMARIO</option>
                <option value="2100">2100 - PRIMARIO JS - FATIMA</option>
                <option value="2200">2200 - PRIMARIO JC - FATIMA</option>
                <option value="2300">2300 - PRIMARIO ADULTOS - FATIMA</option>
                <option value="2500">2500 - FATIMA A-430</option>
                <option value="2600">2600 - FATIMA A-893</option>
                <option value="3000">3000 - SECUNDARIO</option>
                <option value="3100">3100 - SECUNDARIO DIURNO - FATIMA</option>
                <option value="3300">3300 - SECUNDARIO NOCTURNO - FATIMA</option>
                <option value="4000">4000 - TERCIARIO FATIMA</option>
                <option value="5000">5000 - NO DOCENTES</option>
                <option value="5001">5001 - ND A-430</option>
                <option value="5002">5002 - ND A-893</option>
                <option value="5003">5003 - ND A-1486</option>
                <option value="6000">6000 - INSTITUCIONALES</option>
                <option value="6050">6050 - COLEGIO FATIMA</option>
                <option value="6060">6060 - TERCIARIO FATIMA</option>
                <option value="6120">6120 - FUNDACION MARIANISTA</option>
                <option value="6130">6130 - A.R.</option>
                <option value="6140">6140 - AR PARROQUIA</option>
                <option value="6150">6150 - CRISTO RESUCITADO</option>
                <option value="7060">7060 - PASTORAL</option>
                <option value="7070">7070 - EXTRAPROGRAMATICOS</option>
            </select>
<div class="flex justify-start">
    <label class="cursor-pointer label text-sm md:text-xs -mt-1 px-0 mx-0 ml-5">
        Activacion
        <input wire:model='activacion' type="checkbox"
        class="checkbox checkbox-secondary px-0 ml-2  @error('activacion')border-red-500 @enderror"
        placeholder=" @error('activacion'){{$message}} @else Activacion @enderror" />
    </label>
</div>
        </div>
    </div>

    <!-- Fila 2 -->
    <div class="grid grid-cols-5 gap-2 mt-2">

        <!-- Fila 3 -->
        <input wire:model='ptoVenta' type="text" placeholder="@error('ptoVenta'){{$message}} @else Pto. venta @enderror"
            class="input input-sm input-bordered w-full  @error('ptoVenta')border-red-500 @enderror" />
        <!-- Fila 4 -->
        <input wire:model='nFactura' type=" text"
            placeholder="@error('nFactura'){{$message}} @else Nº factura @enderror"
            class="input input-sm input-bordered w-full  @error('nFactura')border-red-500 @enderror" />
        <input wire:model='importe' type=" number" step="0.1"
            placeholder="@error('importe'){{$message}} @else Importe @enderror"
            class="input input-sm input-bordered w-full  @error('importe')border-red-500 @enderror" />

        <!-- Fila 5 -->
        <select wire:model='gastos' name=" gastos" id="gastos" class="select select-bordered select-sm w-full text-xs">
            <option value="GASTOS">GASTOS</option>
            <option value="Presupuesto">Presupuesto</option>
            <option value="FMM">FMM</option>
            <option value="Normal">Normal</option>
        </select>
        <input wire:model='proyecto' type="text" placeholder="@error('proyecto'){{$message}} @else Proyecto @enderror"
            class="input input-sm input-bordered w-full  @error('proyecto')border-red-500 @enderror" />
    </div>

    <!-- Notas -->
    <div>
        <textarea wire:model='notas' placeholder="@error('notas'){{$message}} @else Notas @enderror"
            class="textarea textarea-bordered w-full mt-3  @error('notas')border-red-500 @enderror"></textarea>
    </div>
    <!-- Botones -->
    <div class="flex justify-between mt-2">
        <div class="grid grid-cols-2">
            {{-- !modal nuevo proveedor --}}
            @livewire('modal-nuevo-proveedor-component')

            {{-- ! modal modal nuevo banco --}}
            @livewire('modal-nuevo-banco-component')
        </div>
        <div class="m-0 p-0">
            <button wire:click='actualizarDatosFormulario' class="btn btn-sm btn-warning mr-5">Modificar</button>
            <button wire:click='nuevoDatoBaseGeneral' class="btn btn-sm btn-accent pr-10">Guardar</button>
            <input  wire:model='activarProyectarFechas' type="checkbox" class="checkbox checkbox-accent relative top-0 right-8" />
        </div>
    </div>
</div>