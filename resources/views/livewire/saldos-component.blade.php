<div>
    <form wire:submit='toBd'>
        <div class="flex">
            <input wire:model='fechaSaldos' type="date" placeholder=" {{ __('Date') }} "
                class="input input-sm input-bordered w-40 mb-3 ml-1" onfocus="(this.type='date')" required />
        </div>

        <div class="flex justify-evenly">
            <fieldset class="border border-gray-600 rounded-xl p-3 max-w-48">
                <legend class="text-base">BANCO PROVINCIA</legend>
                <input wire:model='provincia.a893' type="number"
                    placeholder="@error('provincia.a893') {{ $message }} @else A893 @enderror"
                    class="input input-sm input-bordered max-w-36 mb-2 @error('provincia.a893') border-red-500 text-red-500 @enderror"
                    step="0.01"/> <span>$</span>
                <input wire:model='provincia.a430' type="number"
                    placeholder="@error('provincia.a430') {{ $message }} @else A430 @enderror"
                    class="input input-sm input-bordered max-w-36 mb-2 @error('provincia.a430') border-red-500 text-red-500 @enderror"
                    step="0.01" /> <span>$</span>
                <input wire:model='provincia.parroquia' type="number"
                    placeholder="@error('provincia.parroquia') {{ $message }} @else PARROQUIA @enderror"
                    class="input input-sm input-bordered max-w-36 mb-2 @error('provincia.parroquia') border-red-500 text-red-500 @enderror"
                    step="0.01" /> <span>$</span>
                <input wire:model='provincia.adm' type="number"
                    placeholder="@error('provincia.adm') {{ $message }} @else ADM @enderror"
                    class="input input-sm input-bordered max-w-36 mb-2 @error('provincia.adm') border-red-500 text-red-500 @enderror"
                    step="0.01" /> <span>$</span>
            </fieldset>

            <fieldset class="border border-gray-600 rounded-xl p-3 max-w-48">
                <legend class="text-base">SANTANDER</legend>
                <input wire:model='santander.sant1' type="number"
                    placeholder="@error('santander.sant1') {{ $message }} @else Sant 1 @enderror"
                    class="input input-sm input-bordered max-w-36 mb-2 @error('santander.sant1') border-red-500 text-red-500 @enderror"
                    step="0.01" /> <span>$</span>
                <input wire:model='santander.sant2' type="number"
                    placeholder="@error('santander.sant2') {{ $message }} @else Sant 2 @enderror"
                    class="input input-sm input-bordered max-w-36 mb-2 @error('santander.sant2') border-red-500 text-red-500 @enderror"
                    step="0.01" /> <span>$</span>
                <input wire:model='santander.sant3' type="number"
                    placeholder="@error('santander.sant3') {{ $message }} @else Sant 3 @enderror"
                    class="input input-sm input-bordered max-w-36 mb-2 @error('santander.sant3') border-red-500 text-red-500 @enderror"
                    step="0.01" /> <span>$</span>
            </fieldset>

            <fieldset class="border border-gray-600 rounded-xl p-3 max-w-48">
                <legend class="text-base">SANTANDER P.</legend>
                <input wire:model='santanderP.893' type="number"
                    placeholder="@error('santanderP.893') {{ $message }} @else 893 @enderror"
                    class="input input-sm input-bordered max-w-36 mb-2 @error('santanderP.893') border-red-500 text-red-500 @enderror"
                    step="0.01" /> <span>$</span>
                <input wire:model='santanderP.430' type="number"
                    placeholder="@error('santanderP.430') {{ $message }} @else 430 @enderror"
                    class="input input-sm input-bordered max-w-36 mb-2 @error('santanderP.430') border-red-500 text-red-500 @enderror"
                    step="0.01" /> <span>$</span>
                <input wire:model='santanderP.1486' type="number"
                    placeholder="@error('santanderP.1486') {{ $message }} @else 1486 @enderror"
                    class="input input-sm input-bordered max-w-36 mb-2 @error('santanderP.1486') border-red-500 text-red-500 @enderror"
                    step="0.01" /> <span>$</span>
            </fieldset>

            <fieldset class="border border-gray-600 rounded-xl p-3 max-w-48">
                <legend class="text-base">FCI</legend>
                <input wire:model='fci.fciA' type="number"
                    placeholder="@error('fci.fciA') {{ $message }} @else FCI A @enderror"
                    class="input input-sm input-bordered max-w-36 mb-2 @error('fci.fciA') border-red-500 text-red-500 @enderror"
                    step="0.01" /> <span>$</span>
                <input wire:model='fci.fciPlus' type="number"
                    placeholder="@error('fci.fciPlus') {{ $message }} @else FCI Plus @enderror"
                    class="input input-sm input-bordered max-w-36 mb-2 @error('fci.fciPlus') border-red-500 text-red-500 @enderror"
                    step="0.01" /> <span>$</span>
            </fieldset>

            <div>
                <fieldset class="border border-gray-600 rounded-xl p-3 max-w-49 mb-2">
                    <legend class="text-base">DIGITAL</legend>
                    <input wire:model='digital.mercadoPago' type="number"
                        placeholder="@error('digital.mercadoPago') {{ $message }} @else Mercado Pago @enderror"
                        class="input input-sm input-bordered max-w-36 mb-2 @error('digital.mercadoPago') border-red-500 text-red-500 @enderror"
                        step="0.01" /> <span>$</span>
                </fieldset>

                <fieldset class="border border-gray-600 rounded-xl p-3 max-w-48">
                    <legend class="text-base">EFECTIVO</legend>
                    <input wire:model='efectivo.caja' type="number"
                        placeholder="@error('efectivo.caja') {{ $message }} @else Caja @enderror"
                        class="input input-sm input-bordered max-w-36 mb-2 @error('efectivo.caja') border-red-500 text-red-500 @enderror"
                        step="0.01" /> <span>$</span>
                </fieldset>
            </div>
        </div>

        <div>
            <div class="mt-10 flex justify-between items-center">
                <div>
                    <button wire:click.prevent='calcularTotal' class="btn btn-sm btn-accent mr-3 ml-1">Calcular
                        total</button>
                    <input wire:model='mostrarTotal' type="number" placeholder="CALCULADO" 
                    disabled
                        class="input input-sm input-bordered w-40" />
                    <span class="text-xl">$</span>
                </div>
                {{-- <div class="divider divider-primary"></div> --}}
                <div class="mr-1">
                    <button type="submit" class="btn btn-accent">Guardar</button>
                </div>
                {{-- {{-- --}}
            </div>
        </div>
    </form>
</div>