<div>
	<button type="button" class="btn btn-accent btn-outline" onclick="nuevoProveedor.showModal()">Proveedor</button>

	{{-- ! modal 'nuevo proveedor' --}}
	<dialog id="nuevoProveedor" class="modal" wire:ignore.self>
		<div class="modal-box max-w-full w-screen max-h-screen h-screen">
			<h3 class="font-bold text-lg">Proveedor</h3>
			<div class="card-body card-bordered px-3">
				<div class="grid grid-cols-4 gap-2">
					<input wire:model='id_proveedor' type="text" placeholder="ID" class="input input-sm input-bordered w-full"
						disabled />
					<input wire:model='proveedor_name' type="text"
						placeholder="@error('proveedor_name'){{ $message }} @else NOMBRE @enderror"
						class="input input-sm input-bordered w-full @error('proveedor_name') border-red-500 text-red-500 @enderror" />

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
							@foreach ($numerosCC as $numeroCC)
							<option {{-- wire:key='{{$numeroCC->id}}' --}}value="{{$numeroCC}}"></option>
							@endforeach
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