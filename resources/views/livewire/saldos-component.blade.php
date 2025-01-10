<div>
    <form wire:submit='toBd'>
        <div class="flex">
            <input wire:model='fechaSaldos' type="date" placeholder=" {{ __('Date') }} "
                class="input input-sm input-bordered border-base-100 w-40 mb-3 ml-1" onfocus="(this.type='date')" required />
        </div>

        <div class="flex justify-evenly">
            <fieldset class="border border-base-300 rounded-xl p-3 max-w-48">
                <legend class="text-base">BANCO PROVINCIA</legend>
                <input id="a893" wire:model="provincia.a893" type=""
                    placeholder="@error('provincia.a893') {{ $message }} @else A893 @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100 max-w-36 mb-2 @error('provincia.a893') border-error text-red-500 @enderror"
                    step="0.01" />
                <input id="a430" wire:model="provincia.a430" type=""
                    placeholder="@error('provincia.a430') {{ $message }} @else A430 @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100 max-w-36 mb-2 @error('provincia.a430') border-error text-red-500 @enderror"
                    step="0.01" />
                <input id="parroquia" wire:model="provincia.parroquia" type=""
                    placeholder="@error('provincia.parroquia') {{ $message }} @else PARROQUIA @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100 max-w-36 mb-2 @error('provincia.parroquia') border-error text-red-500 @enderror"
                    step="0.01" />
                <input id="adm" wire:model="provincia.adm" type=""
                    placeholder="@error('provincia.adm') {{ $message }} @else ADM @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100 max-w-36 mb-2 @error('provincia.adm') border-error text-red-500 @enderror"
                    step="0.01" />
            </fieldset>

            <fieldset class="border border-base-300 rounded-xl p-3 max-w-48">
                <legend class="text-base">SANTANDER P.</legend>
                <input wire:model='santander.sant1' type=""
                    placeholder="@error('santander.sant1') {{ $message }} @else Sant 1 @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('santander.sant1') border-error text-red-500 @enderror"
                    step="0.01" />
                <input wire:model='santander.sant2' type=""
                    placeholder="@error('santander.sant2') {{ $message }} @else Sant 2 @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('santander.sant2') border-error text-red-500 @enderror"
                    step="0.01" />
                <input wire:model='santander.sant3' type=""
                    placeholder="@error('santander.sant3') {{ $message }} @else Sant 3 @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('santander.sant3') border-error text-red-500 @enderror"
                    step="0.01" />
            </fieldset>

            <fieldset class="border border-base-300 rounded-xl p-3 max-w-48">
                <legend class="text-base">SANTANDER A.</legend>
                <input wire:model='santanderP.893' type=""
                    placeholder="@error('santanderP.893') {{ $message }} @else 893 @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('santanderP.893') border-error text-red-500 @enderror"
                    step="0.01" />
                <input wire:model='santanderP.430' type=""
                    placeholder="@error('santanderP.430') {{ $message }} @else 430 @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('santanderP.430') border-error text-red-500 @enderror"
                    step="0.01" />
                <input wire:model='santanderP.1486' type=""
                    placeholder="@error('santanderP.1486') {{ $message }} @else 1486 @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('santanderP.1486') border-error text-red-500 @enderror"
                    step="0.01" />
            </fieldset>
        
            <fieldset class="border border-base-300 rounded-xl p-3 max-w-48">
                <legend class="text-base">CIUDAD</legend>
                <input wire:model='ciudad.cA430' type=""
                    placeholder="@error('ciudad.cA430') {{ $message }} @else CA430 @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('ciudad.cA430') border-error text-red-500 @enderror"
                    step="0.01" />
                <input wire:model='ciudad.asoc1' type=""
                    placeholder="@error('ciudad.asoc1') {{ $message }} @else Asoc 1 @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('ciudad.asoc1') border-error text-red-500 @enderror"
                    step="0.01" />
                <input wire:model='ciudad.asoc2' type=""
                    placeholder="@error('ciudad.asoc2') {{ $message }} @else Asoc 2 @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('ciudad.asoc2') border-error text-red-500 @enderror"
                    step="0.01" />
            </fieldset>

            <fieldset class="border border-base-300 rounded-xl p-3 max-w-48">
                <legend class="text-base">FCI</legend>
                <input wire:model='fci.fciA' type=""
                    placeholder="@error('fci.fciA') {{ $message }} @else FCI A @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('fci.fciA') border-error text-red-500 @enderror"
                    step="0.01" />
                <input wire:model='fci.fciPlus' type=""
                    placeholder="@error('fci.fciPlus') {{ $message }} @else FCI Plus @enderror"
                    class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('fci.fciPlus') border-error text-red-500 @enderror"
                    step="0.01" />
            </fieldset>

            <div>
                <fieldset class="border border-base-300 rounded-xl p-3 max-w-49 mb-2">
                    <legend class="text-base">DIGITAL</legend>
                    <input wire:model='digital.mercadoPago' type=""
                        placeholder="@error('digital.mercadoPago') {{ $message }} @else Mercado Pago @enderror"
                        class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('digital.mercadoPago') border-error text-red-500 @enderror"
                        step="0.01" />
                </fieldset>

                <fieldset class="border border-base-300 rounded-xl p-3 max-w-48">
                    <legend class="text-base">EFECTIVO</legend>
                    <input wire:model='efectivo.caja' type=""
                        placeholder="@error('efectivo.caja') {{ $message }} @else Caja @enderror"
                        class="input input-sm formatNumber input-bordered border-base-100  max-w-36 mb-2 @error('efectivo.caja') border-error text-red-500 @enderror"
                        step="0.01" />
                </fieldset>
            </div>

        </div>
        <p class="mt-1 text-xs">*Los campos de arriba solo admiten numeros con dos decimales.</p>

        <div>
            <div class="mt-10 flex justify-between items-center">
                <div>
                    <button wire:click.prevent='calcularTotal' class="btn btn-sm btn-accent mr-3 ml-1">Calcular
                        total</button>
                    <input wire:model='mostrarTotal' type="" placeholder="CALCULADO" 
                    disabled
                        class="input input-sm input-bordered border-base-100  w-40" />
                </div>
                {{-- <div class="divider divider-primary"></div> --}}
                <div class="mr-1">
                    <button type="submit" class="btn btn-accent">Guardar</button>
                </div>
                {{-- loading --}}
                <div wire:loading class="position absolute left-[47%] top-[77%] drop-shadow-md">
                    {{-- <span class=" loading loading-spinner text-accent w-14"></span> --}}
                    {{-- <span class="loading loading-infinity w-14"></span> --}}
                    <span class="loading loading-bars w-12 text-cyan-500"></span>
                </div>
            </div>
        </div>
    </form>
</div>

@script
<script>
$(".formatNumber").on({
  "focus": function(event) {
    $(event.target).select();
  },
  "keyup": function(event) {
    $(event.target).val(function(index, value) {
      // Permitir solo números y un único punto decimal
      value = value.replace(/[^0-9,]/g, ""); // Reemplaza todo excepto dígitos y puntos
      const parts = value.split(",");
      // Limitar los decimales a uno y formatear con comas
      if (parts.length > 2) {
        value = parts[0] + "," + parts[1].slice(0, 2); // Limitar a dos decimales
      }
      return value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    });
  }
});

</script>
@endscript