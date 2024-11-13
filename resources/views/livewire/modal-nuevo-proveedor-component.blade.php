<div>
	<button type="button" class="btn btn-accent btn-outline" onclick="nuevoProveedor.showModal()">Nuevo
		Proveedor</button>

	{{-- ! modal 'nuevo proveedor' --}}
	<dialog id="nuevoProveedor" class="modal">
		<div class="modal-box max-w-6xl">
			<h3 class="font-bold text-lg">Proveedor</h3>

			<div class="card-body card-bordered px-3">
				<div class="grid grid-cols-4 gap-2">
					<form wire:submit.prevent='crearProveedor'>
						@csrf
						<input wire:model='id_proveedor' type="text" placeholder="ID"
							class="input input-sm input-bordered w-full" />
						<input wire:model='proveedor_name' type="text" placeholder="NOMBRE"
							class="input input-sm input-bordered w-full" />
						<input wire:model='tel' type="tel" placeholder="TELEFONO" class="input input-sm input-bordered w-full" />
						<input wire:model='email' type="email" placeholder="EMAIL" class="input input-sm input-bordered w-full" />
						<input wire:model='contacto' type="text" placeholder="CONTACTO"
							class="input input-sm input-bordered w-full" />
						<input wire:model='descripcion' type="text" placeholder="DESCRIPCION"
							class="input input-sm input-bordered w-full" />
						<input wire:model='rubro' type="text" placeholder="RUBRO" class="input input-sm input-bordered w-full" />
						<div class="flex items-center gap-3">
							<input list="cc" placeholder="Cuenta Contable" class="select select-bordered select-sm text-xs w-72">
							<datalist name="cc" id="cc">
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
							{{-- ! boton para modal de CC cuenta contable --}}
							<div class="flex justify-start">
								<button class="btn btn-square btn-sm inline btn-primary" onclick="modalCC.showModal()">CC</button>
							</div>
						</div>
				</div>
				</form>

				<div class="flex justify-between mt-5">
					<div class="">
						<form>
							{{-- ! modal para la carga masiva de datos y su boton --}}
							@livewire('modal-carga-masiva-component')
					</div>
					<div class="">
						<button wire:click='editarProveedor' class="btn btn-sm btn-primary">Modificar</button>
						<button type="submit" class="btn btn-sm btn-secondary">Guardar</button>
					</div>
					</form>
				</div>

				{{-- /////////////////////////////////////////////////////////////////////// --}}

				<div class="divider"></div>

				<!-- tabla dentro del modal ↓ -->
				<div class="mt-2">
					<table class="table table-xs text-center" id="myTable">
						<!-- head -->
						<thead class="text-center">
							<tr>
								<th class="px-0">ID</th>
								<th class="px-0">PROVEEDOR</th>
								<th class="px-0">TEL</th>
								<th class="px-0">EMAIL</th>
								<th class="px-0">CONTACTO</th>
								<th class="px-0">DESCRIPCION</th>
								<th class="px-0">RUBRO</th>
								<th class="px-0">CC</th>
								<th class="px-0" colspan="2">ACCION</th>
							</tr>
						</thead>
						<tbody class="text-xs text-center">
							<tr class="">
								<td class="px-0">{{$id_proveedor}}</td>
								<td class="px-0">{{$proveedor_name}}</td>
								<td class="px-0">{{$tel}}</td>
								<td class="px-0">{{$email}}</td>
								<td class="px-0">{{$contacto}}</td>
								<td class="px-0">{{$descripcion}}</td>
								<td class="px-0">{{$rubro}}</td>
								<td class="px-0">{{$cc}}</td>
								<td class="px-0">
									<button type="button"><svg class="w-6 h-6 text-teal-600 aria-hidden=true" 
										xmlns="http://www.w3.org/2000/svg" 
										width="24" 
										height="24" 
										fill="currentColor"
											viewBox="0 0 24 24">
											<path fill-rule="evenodd"
												d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
												clip-rule="evenodd" />
											<path fill-rule="evenodd"
												d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
												clip-rule="evenodd" />
										</svg></button>
								</td>
								<td class="px-0">
									<button type="button"><svg
										class="w-6 h-6 text-red-500 aria-hidden=true" 
										xmlns="http://www.w3.org/2000/svg" 
										width="24" 
										height="24" 
										fill="currentColor"
											viewBox="0 0 24 24">
											<path fill-rule="evenodd"
												d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
												clip-rule="evenodd" />
										</svg></button></td>
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




	{{-- ! modal para creacion de 'CC' cuenta contable --}}
	<dialog id="modalCC" class="modal">
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
									<input type="radio" name="tipo" class="radio radio-primary" checked="checked" id="in" />
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
</div>