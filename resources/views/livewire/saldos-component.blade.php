<div>
    <form wire:submit='toBd'>
        <div class="flex">
            <input wire:model='fechaSaldos' type="text" placeholder=" {{ __('Date') }} " class="input input-sm input-bordered w-40 mb-3 ml-7"
                onfocus="(this.type='date')" />
        </div>


        <div class="flex justify-evenly">
            <fieldset class="border border-gray-600 rounded-xl p-3 max-w-40">
                <legend class="text-base" class="text-base">BANCO PROVINCIA</legend>
                <input wire:model='provincia.a893' type="number" placeholder="@error('provincia.a893') {{ $message }} @else A893 @enderror"  class="input input-sm input-bordered max-w-40 mb-2"  step="0.01"  />
                <input wire:model='provincia.a430' type="number" placeholder="A430" class="input input-sm input-bordered max-w-40 mb-2"  step="0.01" />
                <input wire:model='provincia.parroquia' type="number" placeholder="Parroquia" class="input input-sm input-bordered max-w-40 mb-2"  step="0.01"  />
                <input wire:model='provincia.adm' type="number" placeholder="ADM" class="input input-sm input-bordered max-w-40 mb-2"  step="0.01" />
            </fieldset>
            <fieldset class="border border-gray-600 rounded-xl p-3 max-w-40">
                <legend class="text-base">SANTANDER</legend>
                <input wire:model='santander.sant1' type="number" placeholder="Sant 1" class="input input-sm input-bordered max-w-40 mb-2" step="0.01"  />
                <input wire:model='santander.sant2' type="number" placeholder="Sant 2" class="input input-sm input-bordered max-w-40 mb-2" step="0.01"  />
                <input wire:model='santander.sant3' type="number" placeholder="Sant 3" class="input input-sm input-bordered max-w-40 mb-2" step="0.01"  />
            </fieldset>

            <fieldset class="border border-gray-600 rounded-xl p-3 max-w-40">
                <legend class="text-base">SANTANDER P.</legend>
                <input wire:model='santanderP.893' type="number" placeholder="893" class="input input-sm input-bordered max-w-40 mb-2" step="0.01" />
                <input wire:model='santanderP.430' type="number" placeholder="430" class="input input-sm input-bordered max-w-40 mb-2" step="0.01" />
                <input wire:model='santanderP.1486' type="number" placeholder="1486" class="input input-sm input-bordered max-w-40 mb-2" step="0.01" />
            </fieldset>

            <fieldset class="border border-gray-600 rounded-xl p-3 max-w-40">
                <legend class="text-base">FCI</legend>
                <input wire:model='fci.fciA' type="number" placeholder="FCI A$" class="input input-sm input-bordered max-w-40 mb-2" step="0.01" />
                <input wire:model='fci.fciPlus' type="number" placeholder="FCI Plus" class="input input-sm input-bordered max-w-40 mb-2" step="0.01" />
            </fieldset>
            <div>
                <fieldset class="border border-gray-600 rounded-xl p-3 max-w-40 mb-2">
                    <legend class="text-base">DIGITAL</legend>

                    <input wire:model='digital.mercadoPago' type="number" placeholder="Mercado Pago" class="input input-sm input-bordered max-w-40 mb-2" step="0.01" />
                </fieldset>
                <fieldset class="border border-gray-600 rounded-xl p-3 max-w-40">
                    <legend class="text-base">EFECTIVO</legend>
                    <input wire:model='efectivo.caja' type="number" placeholder="Caja" class="input input-sm input-bordered max-w-40 mb-2" step="0.01" />
                </fieldset>
            </div>
        </div>
        <div>
            <div class="mt-10">
                <button wire:click.prevent='calcularTotal' class="btn btn-sm btn-accent mr-3 ml-7">Calcular total</button> 
                <input wire:model='mostrarTotal' type="text" placeholder="CALCULADO" class="input input-sm input-bordered w-40" /> 
                <span class="text-xl">€</span>
                <div class="divider divider-primary"></div>
                <div class="flex justify-end mr-7">
                    <button type="submit" class="btn btn-accent">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>
