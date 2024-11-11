<div class="px-5">
	<div
		class="py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
		<!-- Input -->
		<div class="sm:col-span-1">
			<label for="hs-as-table-product-review-search" class="sr-only">Search</label>
			<div class="relative">
				<input wire:model.live.debounce.300ms="search" type="text" id="hs-as-table-product-review-search"
					name="hs-as-table-product-review-search"
					class="py-2 px-3 ps-11 block w-full bg-gray-50 border border-gray-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 input-sm"
					placeholder="Search">
				<div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
					<svg class="flex-shrink-0 size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
						width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
						stroke-linecap="round" stroke-linejoin="round">
						<circle cx="11" cy="11" r="8" />
						<path d="m21 21-4.3-4.3" />
					</svg>
				</div>
			</div>
		</div>
		<!-- End Input -->
	</div>
	<!-- End Header -->

	{{-- !table --}}
	<div class="-m-1.5 overflow-x-auto">
		<div class="p-1.5 min-w-full inline-block align-middle">
			<div class="overflow-x-auto">
				<table class="table table-xs">
					<thead class="text-center">
						<tr>
							<th scope="col" class="">ID</th>
							<th scope="col" class="">Nº FACTURA</th>
							<th scope="col" class="">PROV.</th>
							{{-- <th scope="col" class="">FECHA FAC.</th> --}}
							<th scope="col" class="">VENCE</th>
							{{-- <th scope="col" class="">AUXILIAR</th> --}}
							{{-- <th scope="col" class="">PTO.VENTA</th> --}}
							<th scope="col" class="">IMPORTE</th>
							{{-- <th scope="col" class="">GASTOS</th> --}}
							{{-- <th scope="col" class="">PROYECTO</th> --}}
							{{-- <th scope="col" class="">ACTIVACION</th> --}}
							{{-- <th scope="col" class="">PAGO</th> --}}
							<th scope="col" class="">FECHA PAGO</th>
							{{-- <th scope="col" class="">BANCO</th> --}}
							{{-- <th scope="col" class="">C. BANCO</th> --}}
							<th scope="col" class="">Nº CHEQUE</th>
							<th scope="col" class="">ORDEN PAGO</th>
							<th scope="col" class="w-48">ACCION</th>
						</tr>
					</thead>
					<tbody>
						<tr class="text-center">
							<td>1</td>
							<td>1</td>
							<td>1</td>
							<td>1</td>
							<td>1</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td class="py-1">
								<button type="button" class="mx-3"><svg class="w-5 h-5 text-gray-800 dark:text-teal-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
									<path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
									<path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
								</svg>
								</button>
								<button type=" button" class="mx-3" wire:confirm="Estas seguro?"><svg class="w-5 h-5 text-gray-800 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
									<path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
								</svg>
								</button>
								<button type=" button" class="mx-3" onclick="pagar.showModal()"><svg class="w-5 h-5 text-gray-800 dark:text-orange-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
									<path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
								</svg>
								</button>
							</td>
						<tr>
						<tr class="text-center">
							<td>1</td>
							<td>1</td>
							<td>1</td>
							<td>1</td>
							<td>1</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td class="py-1">
								<button type="button" class="mx-3"><svg class="w-5 h-5 text-gray-800 dark:text-teal-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
									<path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
									<path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
								</svg>
								</button>
								<button type=" button" class="mx-3" wire:confirm="Estas seguro?"><svg class="w-5 h-5 text-gray-800 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
									<path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
								</svg>
								</button>
								<button type=" button" class="mx-3" onclick="pagar.showModal()"><svg class="w-5 h-5 text-gray-800 dark:text-orange-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
									<path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
								</svg>
								
								</button>
							</td>
						<tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	{{--! MODAL 'PAGAR FACTURAS' --}}
	<dialog id="pagar" class="modal">
		<div class="modal-box">
			<h3 class="text-lg font-bold mb-4">Va a pagar una factura</h3>
			<form method="dialog">
				<div class="grid grid-cols-2 gap-4">

					<!-- Tipo de Pago -->
					<div>
						<label for="tipoPago" class="text-sm font-medium">Tipo de Pago</label>
						<select id="tipoPago" name="tipoPago" class="select select-bordered select-sm pt-0  w-full">
							<option value="">Seleccionar</option>
							<option value="pago1">Pago 1</option>
							<option value="pago2">Pago 2</option>
							<option value="pago3">Pago 3</option>
						</select>
					</div>

					<!-- Fecha de Pago -->
					<div>
						<label for="fechaPago" class="text-sm font-medium">Fecha de Pago</label>
						<input type="text" id="fechaPago" placeholder="Fecha de pago"
							class="input input-sm pt-0 pb-0 input-bordered w-full" onfocus="(this.type='date')" />
					</div>

					<!-- Banco -->
					<div>
						<label for="banco" class="text-sm font-medium">Banco</label>
						<select id="banco" name="banco" class="select select-bordered select-sm pt-0 w-full">
							<option value="">Seleccionar</option>
							<option value="provincia">Provincia</option>
							<option value="frances">Frances</option>
							<option value="itau">Itau</option>
							<option value="santander">Santander</option>
						</select>
					</div>

					<!-- Cuenta de Banco -->
					<div>
						<label for="cuentaBanco" class="text-sm font-medium">Cuenta de Banco</label>
						<select id="cuentaBanco" name="cuentaBanco" class="select select-bordered select-sm pt-0 w-full">
							<option value="">Seleccionar</option>
							<option value="cuenta1">BUE2424000314772024</option>
							<option value="cuenta2">BUE0909000314772024</option>
							<option value="cuenta3">BUE1515000314772024</option>
						</select>
					</div>

					<!-- Nº Cheque -->
					<div>
						<label for="numCheque" class="text-sm font-medium">Nº Cheque</label>
						<input type="text" id="numCheque" class="input input-sm input-bordered w-full" placeholder="Nº Cheque" />
					</div>

					<!-- Orden de Pago -->
					<div>
						<label for="ordenPago" class="text-sm font-medium">Orden de Pago</label>
						<input type="text" id="ordenPago" class="input input-sm input-bordered w-full"
							placeholder="Orden de Pago" />
					</div>
				</div>

				<!-- Modal Actions -->
				<div class="modal-action mt-7">
					<button type="submit" class="btn btn-primary btn-block">Pagar</button>
				</div>
			</form>
		</div>
	</dialog>
	{{--! --}}
</div>