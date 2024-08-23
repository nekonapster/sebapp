<x-app-layout class="">
    <div class="mx-10 bg-neutral rounded-xl p-5">
        <div class="flex">
            <input type="text" placeholder=" {{ __('Date') }} " class="input input-sm input-bordered w-40 mb-3"
                onfocus="(this.type='date')" />
        </div>
        <div class="flex justify-evenly">
            <fieldset class="border border-gray-600 rounded-xl p-3 max-w-40">
                <legend class="text-base" class="text-base">BANCO PROVINCIA</legend>
                <input type="number" placeholder="A893" class="input input-sm input-bordered max-w-40 mb-2" />
                <input type="number" placeholder="A430" class="input input-sm input-bordered max-w-40 mb-2" />
                <input type="number" placeholder="Parroquia" class="input input-sm input-bordered max-w-40 mb-2" />
                <input type="number" placeholder="ADM" class="input input-sm input-bordered max-w-40 mb-2" />
            </fieldset>
            <fieldset class="border border-gray-600 rounded-xl p-3 max-w-40">
                <legend class="text-base">SANTANDER</legend>
                <input type="number" placeholder="Sant 1" class="input input-sm input-bordered max-w-40 mb-2" />
                <input type="number" placeholder="Sant 2" class="input input-sm input-bordered max-w-40 mb-2" />
                <input type="number" placeholder="Sant 3" class="input input-sm input-bordered max-w-40 mb-2" />
            </fieldset>

            <fieldset class="border border-gray-600 rounded-xl p-3 max-w-40">
                <legend class="text-base">SANTANDER P.</legend>
                <input type="number" placeholder="893" class="input input-sm input-bordered max-w-40 mb-2" />
                <input type="number" placeholder="430" class="input input-sm input-bordered max-w-40 mb-2" />
                <input type="number" placeholder="1486" class="input input-sm input-bordered max-w-40 mb-2" />
            </fieldset>

            <fieldset class="border border-gray-600 rounded-xl p-3 max-w-40">
                <legend class="text-base">Carga de datos Cuatro</legend>
                <input type="number" placeholder="FCI A$" class="input input-sm input-bordered max-w-40 mb-2" />
                <input type="number" placeholder="FCI Plus" class="input input-sm input-bordered max-w-40 mb-2" />
            </fieldset>
            <div>
                <fieldset class="border border-gray-600 rounded-xl p-3 max-w-40 mb-2">
                    <legend class="text-base">Digital</legend>

                    <input type="number" placeholder="Mercado Pago" class="input input-sm input-bordered max-w-40 mb-2" />
                </fieldset>
                <fieldset class="border border-gray-600 rounded-xl p-3 max-w-40">
                    <legend class="text-base">Efectivo</legend>
                    <input type="number" placeholder="Caja" class="input input-sm input-bordered max-w-40 mb-2" />
                </fieldset>
            </div>
        </div>
        <div>
            <div class="mt-10">

                <button class="btn btn-sm btn-info">Calcular total</button>
                <input type="text" placeholder="CALCULADO" class="input input-sm input-bordered w-40" />
                <div class="divider divider-primary"></div>
                <div class="flex justify-end">
                    <button class="btn btn-accent">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
