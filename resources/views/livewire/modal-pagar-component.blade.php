<div>
    <dialog id="pagar" class="modal">
		<div class="modal-box">
			<h3 class="text-lg font-bold mb-4">Va a pagar una factura</h3>
			<form wire:submit.prevent="pagarFacturas_toBd">
				<div class="grid grid-cols-2 gap-4">

					<!-- Tipo de Pago -->
					<div>
						<label for="tipoPago" class="text-sm font-medium">Tipo de Pago</label>
						<select id="tipoPago" name="tipoPago" class="select select-bordered select-sm pt-0  w-full">
							<option value="">Seleccionar</option>
							<option value="pago1">Cheque</option>
							<option value="pago2">Efectivo</option>
							<option value="pago3">Transferencia</option>
							<option value="pago3">Digital</option>
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
									<option value="Seleccionar">Seleccionar</option>
								@foreach ($bancos as $banco)
									<option wire:key='{{$banco->id}}' value="{{$banco->nombre_banco}}">{{$banco->nombre_banco}}</option>
								@endforeach
						</select>
					</div>

					<!-- Cuenta de Banco -->
					<div>
						<label for="cuentaBanco" class="text-sm font-medium">Cuenta de Banco</label>
						<select id="cuentaBanco" name="cuentaBanco" class="select select-bordered select-sm pt-0 w-full">
							<option value="Seleccionar">Seleccionar</option>
                            @foreach ($bancos as $banco)
							<option wire:key='{{$banco->id}}' value="{{$banco->cuentaAsociada}}">{{$banco->cuentaAsociada}}</option>
                            @endforeach
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
</div>
