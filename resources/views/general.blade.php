{{-- COMPONENTE DE BASE GENERAL --}}
<x-app-layout>
    <div class="card overflow-hidden shadow-sm sm:rounded-lg">
        <div class="card-body bg-neutral rounded-xl mx-10">
            <div class="primerDiv flex items-center justify-between ">
                <input type="text" placeholder="ID" class="input input-sm input-bordered max-w-xs w-40" />
                <select name="" id="" class="select select-bordered select-sm max-w-xs w-48 text-xs">
                    <option value="0">PROVEEDOR</option>
                    <option value="1">MARTIN</option>
                    <option value="2">SEBASTIAN</option>
                    <option value="3">MARIA EMILIA</option>
                    <option value="4">GRACIELA</option>
                    <option value="5">ALEJANDRO</option>
                    <option value="5">ANTONIO</option>
                </select>

                <input type="text" placeholder="Fecha factura" name="" id=""
                    class="input input-sm input-bordered max-w-xs w-40" onfocus="(this.type='date')" />
                <input type="text" placeholder="Fecha vencimiento" name="" id=""
                    class="input input-sm input-bordered max-w-xs w-40" onfocus="(this.type='date')" />
                <input type="text" placeholder="Auxiliar" class="input input-sm input-bordered max-w-xs w-40" />
            </div>

            <!-- /////////////////////////////////// -->

            <div class="segundoDIV flex items-center justify-between mt-5">
                <input type="text" class="input input-sm input-bordered max-w-xs w-40" placeholder="Pto. Venta" />
                <input type="text" class="input input-sm input-bordered max-w-xs w-40" placeholder="Nº Factura" />
                <input type="number" step="0.1" class="input input-sm input-bordered max-w-xs w-40"
                    placeholder="Importe" />

                <select name="" id="" class="select select-bordered select-sm max-w-xs w-24 text-xs">
                    <option value="">GASTOS</option>
                    <option value="">Gastos 1</option>
                    <option value="">Gastos 2</option>
                    <option value="">Gastos 3</option>
                </select>
                <select name="" id="" class="select select-bordered select-sm max-w-xs w-36 text-xs">
                    <option value="">PROYECTO</option>
                    <option value="">Proyecto 1</option>
                    <option value="">Proyecto 2</option>
                    <option value="">Proyecto 3</option>
                </select>
                <label class="cursor-pointer label w-28">Activacion
                    <input type="checkbox" class="checkbox checkbox-secondary" />
                </label>
            </div>



            <textarea placeholder="Notas" class="textarea textarea-bordered mt-3"></textarea>

            <div class="divider divider-primary mt-5"></div>

            <div class="flex justify-between">
                <div>
                    <button class="btn btn-accent btn-outline" onclick="my_modal_4.showModal()">Nuevo Proveedor</button>
                    <button class="btn btn-accent btn-outline ml-3" onclick="my_modal_6.showModal()">Nuevo
                        Banco</button>
                </div>
                <div>
                    <button class="btn btn-accent">Guardar</button>
                </div>


                {{-- ! modal 'nuevo proveedor' --}}
                <dialog id="my_modal_4" class="modal">
                    <div class="modal-box max-w-6xl">
                        <h3 class="font-bold text-lg">Proveedor</h3>

                        <div class="card-body card-bordered px-3">
                            <div class="grid grid-cols-4 gap-2">
                                <input type="text" placeholder="ID" class="input input-sm input-bordered w-full"
                                    value="BUE001" />

                                <input type="text" placeholder="NOMBRE" class="input input-sm input-bordered w-full"
                                    required />
                                <input type="text" placeholder="RUBRO" class="input input-sm input-bordered w-full"
                                    required />
                                <input type="text" placeholder="DESCRIPCION"
                                    class="input input-sm input-bordered w-full" required />
                                <input type="tel" placeholder="TEL" class="input input-sm input-bordered w-full"
                                    required />
                                <input type="text" placeholder="CONTACTO" class="input input-sm input-bordered w-full"
                                    required />
                                <input type="email" placeholder="CORREO" class="input input-sm input-bordered w-full"
                                    required />
                                <div class="flex items-center gap-3">
                                    <input list="cc" placeholder="Cuenta Contable"
                                        class="select select-bordered select-sm text-xs w-72">
                                    <datalist name="" id="cc">
                                        <option value="5.1420006"></option>
                                        <option value="5.1420007"></option>
                                        <option value="5.1510003"></option>
                                        <option value="5.1520003"></option>
                                        <option value="11130001"></option>
                                        <option value="11130002"></option>
                                        <option value="11130003"></option>
                                        <option value="11130016"></option>
                                        <option value="11130017"></option>
                                        <option value="11130018"></option>
                                        <option value="12130001"></option>
                                        <option value="12140001"></option>
                                        <option value="12150001"></option>
                                        <option value="12170001"></option>
                                        <option value="41110001"></option>
                                        <option value="41110008"></option>
                                        <option value="41120002"></option>
                                        <option value="41130003"></option>
                                        <option value="41210008"></option>
                                        <option value="41210009"></option>
                                        <option value="41210015"></option>
                                        <option value="41210016"></option>
                                        <option value="41410001"></option>
                                        <option value="41420001"></option>
                                        <option value="41420002"></option>
                                        <option value="51110001"></option>
                                        <option value="51110002"></option>
                                        <option value="51110004"></option>
                                        <option value="51110006"></option>
                                        <option value="51110007"></option>
                                        <option value="51210001"></option>
                                        <option value="51210002"></option>
                                        <option value="51210003"></option>
                                        <option value="51210004"></option>
                                        <option value="51210005"></option>
                                        <option value="51210006"></option>
                                        <option value="51310001"></option>
                                        <option value="51310002"></option>
                                        <option value="51310003"></option>
                                        <option value="51310004"></option>
                                        <option value="51320001"></option>
                                        <option value="51410001"></option>
                                        <option value="51410002"></option>
                                        <option value="51410003"></option>
                                        <option value="51410004"></option>
                                        <option value="51410005"></option>
                                        <option value="51410006"></option>
                                        <option value="51410008"></option>
                                        <option value="51410009"></option>
                                        <option value="51420001"></option>
                                        <option value="51420002"></option>
                                        <option value="51420003"></option>
                                        <option value="51420004"></option>
                                        <option value="51420005"></option>
                                        <option value="51420006"></option>
                                        <option value="51420007"></option>
                                        <option value="51420008"></option>
                                        <option value="51420009"></option>
                                        <option value="51420010"></option>
                                        <option value="51420011"></option>
                                        <option value="51510001"></option>
                                        <option value="51510003"></option>
                                        <option value="51510004"></option>
                                        <option value="51510005"></option>
                                        <option value="51510006"></option>
                                        <option value="51510008"></option>
                                        <option value="51510010"></option>
                                        <option value="51510012"></option>
                                        <option value="51510013"></option>
                                        <option value="51610001"></option>
                                        <option value="51710001"></option>
                                        <option value="51810006"></option>
                                        <option value="51920001"></option>
                                        <option value="51920002"></option>
                                        <option value="41110002"></option>
                                        <option value="41110004"></option>
                                    </datalist>
                                    {{-- ! boton para modal de cuenta contable --}}
                                    <div class="flex justify-start">
                                        <button class="btn btn-square btn-sm inline btn-primary"
                                            onclick="my_modal_5.showModal()">CC</button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between mt-5">
                                <div class="">
                                    <button class="btn btn-sm btn-outline btn-accent" onclick="upload1.showModal()">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-teal-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Cargar</button>
                                </div>
                                <div class="">
                                    <button class="btn btn-sm btn-primary">Modificar</button>
                                    <button class="btn btn-sm btn-secondary">Guardar</button>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <!-- tabla dentro del modal ↓ -->
                            <div class="mt-2">
                                <table class="table table-xs text-center" id="myTable">
                                    <!-- head -->
                                    <thead class="text-center">
                                        <tr>
                                            <th class="px-0"></th>
                                            <th class="px-0">ID</th>
                                            <th class="px-0">CC</th>
                                            <th class="px-0">DESCRIPCION</th>
                                            <th class="px-0">RUBRO</th>
                                            <th class="px-0">TEL</th>
                                            <th class="px-0">PROVEEDOR</th>
                                            <th class="px-0">CONTACTO</th>
                                            <th class="px-0">CORREO</th>
                                            <th class="px-0" colspan="2">ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-xs text-center">
                                        <tr class="">
                                            <td class="px-0">1</td>
                                            <td class="px-0">bue001</td>
                                            <td class="px-0">51420003</td>
                                            <td class="px-0">refrigerios</td>
                                            <td class="px-0">materiales y suministros</td>
                                            <td class="px-0">1125-037551</td>
                                            <td class="px-0">aqualine 00</td>
                                            <td class="px-0">pedro duarte</td>
                                            <td class="px-0">aqualine@mail.com</td>
                                            <td class="px-0"><button class="btn btn-success btn-xs">Sel</button>
                                            </td>
                                            <td class="px-0"><button class="btn btn-secondary btn-xs">Del</button></td>
                                        </tr>
                                        <tr class="">
                                            <td class="px-0">1</td>
                                            <td class="px-0">bue001</td>
                                            <td class="px-0">51420003</td>
                                            <td class="px-0">refrigerios</td>
                                            <td class="px-0">materiales y suministros</td>
                                            <td class="px-0">1125-037551</td>
                                            <td class="px-0">aqualine 00</td>
                                            <td class="px-0">pedro duarte</td>
                                            <td class="px-0">aqualine@mail.com</td>
                                            <td class="px-0"><button class="btn btn-success btn-xs">Sel</button>
                                            </td>
                                            <td class="px-0"><button class="btn btn-secondary btn-xs">Del</button></td>
                                        </tr>
                                        <tr class="">
                                            <td class="px-0">1</td>
                                            <td class="px-0">bue001</td>
                                            <td class="px-0">51420003</td>
                                            <td class="px-0">refrigerios</td>
                                            <td class="px-0">materiales y suministros</td>
                                            <td class="px-0">1125-037551</td>
                                            <td class="px-0">aqualine 00</td>
                                            <td class="px-0">pedro duarte</td>
                                            <td class="px-0">aqualine@mail.com</td>
                                            <td class="px-0"><button class="btn btn-success btn-xs">Sel</button>
                                            </td>
                                            <td class="px-0"><button class="btn btn-secondary btn-xs">Del</button></td>
                                        </tr>
                                        <tr class="">
                                            <td class="px-0">1</td>
                                            <td class="px-0">bue001</td>
                                            <td class="px-0">51420003</td>
                                            <td class="px-0">refrigerios</td>
                                            <td class="px-0">materiales y suministros</td>
                                            <td class="px-0">1125-037551</td>
                                            <td class="px-0">aqualine 00</td>
                                            <td class="px-0">pedro duarte</td>
                                            <td class="px-0">aqualine@mail.com</td>
                                            <td class="px-0"><button class="btn btn-success btn-xs">Sel</button>
                                            </td>
                                            <td class="px-0"><button class="btn btn-secondary btn-xs">Del</button></td>
                                        </tr>
                                        <tr class="">
                                            <td class="px-0">1</td>
                                            <td class="px-0">bue001</td>
                                            <td class="px-0">51420003</td>
                                            <td class="px-0">refrigerios</td>
                                            <td class="px-0">materiales y suministros</td>
                                            <td class="px-0">1125-037551</td>
                                            <td class="px-0">aqualine 00</td>
                                            <td class="px-0">pedro duarte</td>
                                            <td class="px-0">aqualine@mail.com</td>
                                            <td class="px-0"><button class="btn btn-success btn-xs">Sel</button>
                                            </td>
                                            <td class="px-0"><button class="btn btn-secondary btn-xs">Del</button></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- tabla dentro del modal ↑ -->
                            <div class="modal-action">
                                <form method="dialog">
                                    <button class="btn">Cancelar</button>
                                </form>
                            </div>
                            <!-- MODAL BODY ENDS -->
                        </div>
                </dialog>
            </div>
        </div>
    </div>


    {{-- ! modal para creacion de 'CC' cuenta contable --}}
    <dialog id="my_modal_5" class="modal">
        <div class="card bg-base-100 w-96 shadow-xl">
            <div class="card-body items-center">
                <div>
                    <p class="mb-5 text-start text-2xl w-full">Nueva Cuenta Contable</p>
                    <div class="divider"></div>
                    <form action="" class="w-80">
                        <span class="label-text">Rubro</span>
                        <Select class="select w-full select-bordered mb-5">
                            <option value="">Aranceles</option>
                            <option value="">Materiales y suministros</option>
                            <option value="">Operativos</option>
                            <option value="">Mantenimiento</option>
                            <option value="">Seguros</option>
                            <option value="">Muebles y utiles</option>
                            <option value="">Servicios profesionales</option>
                            <option value="">Servicios</option>
                            <option value="">Personal</option>
                        </Select>

                        <span class="label-text">Descripcion</span>
                        <input type="text" placeholder="Description" class="input input-bordered w-full mb-5">

                        <div class="flex justify-start w-full input input-bordered items-center">
                            <p>Tipo</p>
                            <div class="">
                                <label for="in" class="mr-3">
                                    In
                                    <input type="radio" name="tipo" class="radio radio-primary" checked="checked"
                                        id="in" />
                                </label>

                                <label for="out">
                                    Out
                                    <input type="radio" name="tipo" class="radio radio-primary" id="out" />
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-actions w-full">
                    <button class="btn w-full mt-5 btn-primary">Crear</button>
                </div>
            </div>
        </div>
    </dialog>
    {{-- ! modal para 'Nuevo Banco' --}}
    <dialog id="my_modal_6" class="modal">
        <div class="card bg-base-100 w-96 shadow-xl">
            <div class="card-body items-center">
                <div>
                    <p class="mb-5 text-start text-2xl w-full">Nueva Banco</p>
                    <div class="divider"></div>
                    <form action="" class="w-80">
                        <span class="label-text">Nombre del Banco</span>
                        <input type="text" class="input input-sm w-full select-bordered mb-5" />
                        <span class="label-text">Cuenta asociada</span>
                        <input type="text" class="input input-sm input-bordered w-full mb-5">
                    </form>
                </div>
                <div class="card-actions w-full">
                    <button class="btn w-full mt-5 btn-primary ">Crear</button>
                </div>
            </div>
        </div>
    </dialog>
    {{-- ! modal para 'Carga masiva de datos' --}}
    <dialog id="upload1" class="modal">
        <div class="card bg-base-100 shadow-xl">
            <p class="px-5 mt-3 text-2xl">Carga de proveedores <br><span class="text-xs">Puedes subir archivos xls y las
                    columnas tienen que tener encabezados</span></p>
            <div class="card-body items-center w-[500px] ">
                <figure>
                    <img class="w-full" src="{{ asset('build/assets/img/ejemploTabla.png') }}" alt="example table" />
                </figure>
                <form action="" class="w-full">
                    <div class="w-full">
                        <input type="file" class="file-input file-input-bordered file-input-xs w-full" />
                    </div>
                    <div class="card-actions w-full">
                        <button class="btn btn-primary btn-sm mt-5 w-full ">Subir</button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>

    <div>
        {{-- !TODO livewire table --}}
        @livewire('tabla-base-general-component')
    </div>
</x-app-layout>