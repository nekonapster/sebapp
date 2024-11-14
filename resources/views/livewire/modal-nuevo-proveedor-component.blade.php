<div>
	<button type="button" class="btn btn-accent btn-outline" onclick="nuevoProveedor.showModal()">Nuevo
		Proveedor</button>

	{{-- ! modal 'nuevo proveedor' --}}
	<dialog id="nuevoProveedor" class="modal" wire:ignore.self>
		<div class="modal-box max-w-6xl">
			<h3 class="font-bold text-lg">Proveedor</h3>
			<div class="card-body card-bordered px-3">
				<div class="grid grid-cols-4 gap-2">
					<input wire:model='id_proveedor' type="text" placeholder="ID" class="input input-sm input-bordered w-full" />
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
						<input wire:model='cc' list="cc" placeholder="Cuenta Contable"
							class="select select-bordered select-sm text-xs w-72">
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
						<div class="flex justify-start">
							{{-- ! boton para modal de CC cuenta contable --}}
							@livewire('modal-nuevo-cc-component')
						</div>
					</div>
				</div>

				<div class="flex justify-between mt-5">
					{{-- ! modal para la carga masiva de datos y su boton --}}
					@livewire('modal-carga-masiva-component')
					<div>
						<button wire:click='editarProveedor' class="btn btn-sm btn-warning mr-5">Modificar</button>
						<button wire:click='crearProveedor' class="btn btn-sm btn-accent">Guardar</button>
					</div>
				</div>

				{{-- /////////////////////////////////////////////////////////////////////// --}}

				<div class="divider"></div>

				<!-- tabla dentro del modal ↓ -->
				<div class="mt-2">
					@livewire('tabla-nuevo-proveedores-component')
				</div>

				<!-- tabla dentro del modal ↑ -->
				
				{{-- ! retiro boton 'cancelar' por mejorar el espacio --}}
				{{-- <div class="modal-action"> --}}
					{{-- <form method="dialog"> --}}
						{{-- <button class="btn">Cancelar</button> --}}
					{{-- </form> --}}
				{{-- </div> --}}
			</div>
	</dialog>
</div>