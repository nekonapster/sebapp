<div>
    <dialog id="pagar" class="modal" wire:ignore.self>
		<div class="modal-box">
			<h3 class="text-lg font-bold mb-4">Va a pagar una factura</h3>
				<div class="grid grid-cols-2 gap-4">

					<!-- Tipo de Pago -->
					<div class="text-base-content">
						<label  for="tipoPago" class="text-sm font-medium">Tipo de Pago</label>
						<select wire:model='tipoPago' id="tipoPago" name="tipoPago" class="select select-bordered select-sm pt-0  w-full">
							<option value="" disabled>Seleccionar</option>
							<option value="cheque">Cheque</option>
							<option value="efectivo">Efectivo</option>
							<option value="transferencia">Transferencia</option>
							<option value="digital">Digital</option>
						</select>
					</div>

					<!-- Fecha de Pago -->
					<div>
						<label for="fechaPago" class="text-sm font-medium">Fecha de Pago</label>
						<input  wire:model='fechaPago' type="text" id="fechaPago" placeholder="Fecha de pago"
							class="input input-sm pt-0 pb-0 input-bordered w-full" onfocus="(this.type='date')" />
					</div>

					<!-- Banco -->
					<div>
						<label for="banco" class="text-sm font-medium">Banco</label>
						<select wire:model='banco' id="banco" name="banco" class="select select-bordered select-sm pt-0 w-full">
									<option value="Seleccionar">Seleccionar</option>
								@foreach ($bancos as $banco)
									<option  wire:key='{{$banco->id}}' value="{{$banco->nombre_banco}}">
										{{$banco->nombre_banco}}</option>
								@endforeach
						</select>
					</div>

					<!-- Cuenta de Banco -->
					<div>
						<label for="cuentaBanco" class="text-sm font-medium">Cuenta de Banco</label>
						<select wire:model='cuentaBanco' id="cuentaBanco" name="cuentaBanco" class="select select-bordered select-sm pt-0 w-full">
							<option value="Seleccionar">Seleccionar</option>
                            @foreach ($bancos as $banco)
							<option  wire:key='{{$banco->id}}' value="{{$banco->cuentaAsociada}}">{{$banco->cuentaAsociada}}</option>
                            @endforeach
						</select>
					</div>

					<!-- Nº Cheque -->
					<div>
						<label for="numCheque" class="text-sm font-medium">Nº Cheque</label>
						<input wire:model='nCheque' type="text" id="numCheque" class="input input-sm input-bordered w-full" placeholder="Nº Cheque" />
					</div>

					<!-- Orden de Pago -->
					<div>
						<label for="ordenPago" class="text-sm font-medium">Orden de Pago</label>
						<input wire:model='ordenPago' type="text" id="ordenPago" class="input input-sm input-bordered w-full"
							placeholder="Orden de Pago" />
					</div>
				</div>

				<!-- Modal Actions -->
				<div class="modal-action mt-7">
					<button wire:click='pagar' class="btn btn-primary btn-block">Pagar</button>
				</div>
		</div>
	</dialog>
</div>
