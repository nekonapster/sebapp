<x-app-layout>
    <div class="card overflow-hidden shadow-sm sm:rounded-lg">
        <div class="card-body bg-neutral rounded-xl mx-10">
            <div class="primerDiv flex items-center justify-between ">
                <input type="text" placeholder="ID" class="input input-sm input-bordered max-w-xs w-40" />
                <select name="" id="" class="select select-bordered select-sm max-w-xs w-full text-xs">
                    <option value="0">PROVEEDOR</option>
                    <option value="1">MARTIN</option>
                    <option value="2">SEBASTIAN</option>
                    <option value="3">MARIA EMILIA</option>
                    <option value="4">GRACIELA</option>
                    <option value="5">ALEJANDRO</option>
                    <option value="5">ANTONIO</option>
                </select>

                <input type="text" placeholder="Fecha de factura" name="" id=""
                    class="input input-sm input-bordered max-w-xs w-40" onfocus="(this.type='date')" />
                <input type="text" placeholder="Fecha de vencimiento" name="" id=""
                    class="input input-sm input-bordered max-w-xs w-40" onfocus="(this.type='date')" />
                <input type="text" placeholder="Auxiliar" class="input input-sm input-bordered max-w-xs w-40" />
            </div>

            <!-- /////////////////////////////////// -->

            <div class="segundoDIV flex items-center justify-between mt-5">
                <input type="text" class="input input-sm input-bordered max-w-xs w-40" placeholder="Pto. Venta" />
                <input type="text" class="input input-sm input-bordered max-w-xs w-40" placeholder="Nº Factura" />
                <input type="number" step="0.1" class="input input-sm input-bordered max-w-xs w-40"
                    placeholder="Importe" />

                <select name="" id="" class="select select-bordered select-sm max-w-xs w-48 text-xs">
                    <option value="">GASTOS</option>
                    <option value="">Gastos 1</option>
                    <option value="">Gastos 2</option>
                    <option value="">Gastos 3</option>
                </select>
                <select name="" id="" class="select select-bordered select-sm max-w-xs w-48 text-xs">
                    <option value="">PROYECTO</option>
                    <option value="">Proyecto 1</option>
                    <option value="">Proyecto 2</option>
                    <option value="">Proyecto 3</option>
                </select>
                <label class="cursor-pointer label w-28">Activacion
                    <input type="checkbox" class="checkbox checkbox-secondary" />
                </label>
            </div>

            <div class="tercerDIV flex items-center justify-between mt-5">
                <select name="" id="" class="select select-bordered select-sm max-w-xs w-48 text-xs">
                    <option value="">PAGO</option>
                    <option value="">pago 1</option>
                    <option value="">pago 2</option>
                    <option value="">pago 3</option>
                </select>

                <input type="text" placeholder="Fecha de pago" name="" id=""
                    class="input input-sm input-bordered max-w-xs w-40" onfocus="(this.type='date')" />
                <select name="" id="" class="select select-bordered select-sm max-w-xs w-40 text-xs">
                    <option value="">BANCOS</option>
                    <option value="">Proincia</option>
                    <option value="">Frances</option>
                    <option value="">Itahu</option>
                    <option value="">Santander</option>
                </select>
                <select name="" id="" class="select select-bordered select-sm max-w-xs w-full text-xs">
                    <option value="">Cuenta de banco</option>
                    <option value="">bue2424000314772024</option>
                    <option value="">bue0909000314772024</option>
                    <option value="">bue1515000314772024</option>
                </select>
                <input type="text" class="input input-sm input-bordered max-w-xs w-40" placeholder="Nº Cheque" />
                <input type="text" class="input input-sm input-bordered max-w-xs w-40" placeholder="Orden de Pago" />
            </div>

            <textarea placeholder="Observaciones" class="textarea textarea-bordered mt-3"></textarea>

            <div class="divider divider-primary mt-5"></div>

            <div class="flex justify-between">
                <button class="btn btn-primary" onclick="my_modal_4.showModal()">Nuevo Proveedor</button>
                <button class="btn btn-accent">Guardar</button>


                {{-- ? MODAL BODY START --}}
                <dialog id="my_modal_4" class="modal">
                    <div class="modal-box max-w-6xl">
                        <h3 class="font-bold text-lg">Proveedor</h3>

                        <div class="card-body card-bordered">
                            <div class="grid grid-cols-4 gap-2">
                                <input type="text" placeholder="ID" class="input input-sm input-bordered w-full"
                                    value="BUE001" />
                                    
                                    <input type="text" placeholder="DESCRIPCION"
                                    class="input input-sm input-bordered w-full" required />
                                    <input type="text" placeholder="RUBRO" class="input input-sm input-bordered w-full"
                                    required />
                                    <input type="tel" placeholder="TEL" class="input input-sm input-bordered w-full"
                                    required />
                                    <input type="text" placeholder="PROVEEDOR" class="input input-sm input-bordered w-full"
                                    required />
                                    <input type="text" placeholder="CONTACTO" class="input input-sm input-bordered w-full"
                                    required />
                                    <input type="email" placeholder="CORREO" class="input input-sm input-bordered w-full"
                                    required />
                                    <div class="flex items-center gap-3">
                                        <input list="cc" placeholder="Cuenta Contable"
                                        class="select select-bordered select-sm text-xs w-72">
                                    <datalist name="" id="cc">
                                        <option value="5,1420006"></option>
                                        <option value="5,1420007"></option>
                                        <option value="5,1510003"></option>
                                        <option value="5,1520003"></option>
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

                                <div class="card-actions justify-start py-3">
                                    <button class="btn btn-sm btn-primary">Modificar</button>
                                    <button class="btn btn-sm btn-secondary">Agregar</button>
                                </div>
                            </div>

                            <!-- tabla dentro del modal ↓ -->
                            <div class="mt-2">
                                <table class="table text-center" id="myTable">
                                    <!-- head -->
                                    <thead>
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
                                        </tr>
                                    </thead>
                                    <tbody class="text-xs">
                                        <tr class="">
                                            <td class="px-0">1</td>
                                            <td class="px-0">BUE001</td>
                                            <td class="px-0">51420003</td>
                                            <td class="px-0">REFRIGERIOS</td>
                                            <td class="px-0">MATERIALES Y SUMINISTROS</td>
                                            <td class="px-0">1125-037551</td>
                                            <td class="px-0">AQUALINE 00</td>
                                            <td class="px-0">PEDRO DUARTE</td>
                                            <td class="px-0">AQUALINE@MAIL.COM</td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">2</td>
                                            <td class="px-0">BUE002</td>
                                            <td class="px-0">73542005</td>
                                            <td class="px-0">SNACKS</td>
                                            <td class="px-0">MATERIALES Y SUMINISTROS</td>
                                            <td class="px-0">1125-059873</td>
                                            <td class="px-0">SNACKDELIGHT 02</td>
                                            <td class="px-0">JUAN PEREZ</td>
                                            <td class="px-0">JUAN.PEREZ@MAIL.COM</td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">3</td>
                                            <td class="px-0">BUE003</td>
                                            <td class="px-0">84653006</td>
                                            <td class="px-0">ALMUERZOS</td>
                                            <td class="px-0">MATERIALES Y SUMINISTROS</td>
                                            <td class="px-0">1125-070984</td>
                                            <td class="px-0">LUNCHBOX 03</td>
                                            <td class="px-0">ANA GARCIA</td>
                                            <td class="px-0">ANA.GARCIA@MAIL.COM</td>
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


    {{-- ! modal para creacion de cuenta contable --}}
    <dialog id="my_modal_5" class="modal">
        <div class="card bg-base-100 w-96 shadow-xl">
            <div class="card-body items-center">
                <div>
                    <p class="mx-10 text-center my-5">Nueva Cuenta Contable</p>
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
                        {{-- <select name="" id="" class="select w-full select-bordered mb-5">
                            <option value="">Enseñanzas extra programatica</option>
                            <option value="">Reincorporaciones</option>
                            <option value="">Suscripciones publicas</option>
                            <option value="">Suscripciones publicas</option>
                            <option value="">Egresos servicios de comedor</option>
                            <option value="">Mantenimiento Inst.Mueble y Utiles Materiales</option>
                            <option value="">Aporte GCBA</option>
                            <option value="">Refrigerios</option>
                            <option value="">Seguros</option>
                            <option value="">Equipos de computacion</option>
                            <option value="">Contables</option>
                            <option value="">Agua</option>
                            <option value="">Libros de texto</option>
                            <option value="">Insumo y acc de computacion</option>
                            <option value="">Muebles y utiles</option>
                            <option value="">Cargas sociales</option>
                            <option value="">ETC</option>
                        </select> --}}
                        
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
                <div class="card-actions">
                    <button class="btn btn-primary btn-block">Crear</button>
                </div>
            </div>
        </div>
    </dialog>
    {{-- ! modal para cuenta contable --}}
</x-app-layout>