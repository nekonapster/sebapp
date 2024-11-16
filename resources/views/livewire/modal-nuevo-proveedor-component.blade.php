<div>
	<button type="button" class="btn btn-accent btn-outline" onclick="nuevoProveedor.showModal()">Proveedor</button>

	{{-- ! modal 'nuevo proveedor' --}}
	<dialog id="nuevoProveedor" class="modal" wire:ignore.self>
		<div class="modal-box max-w-full w-screen max-h-screen h-screen">
			<h3 class="font-bold text-lg">Proveedor</h3>
			<div class="card-body card-bordered px-3">
				<div class="grid grid-cols-4 gap-3">
					<label class="text-xs">ID
						<input wire:model='id_proveedor' type="text" placeholder="ID" class="input input-sm input-bordered w-full"
							disabled />
					</label>
					<label class="text-xs">Proveedor
						<input wire:model='proveedor_name' type="text"
							placeholder="@error('proveedor_name'){{ $message }} @else NOMBRE @enderror"
							class="input input-sm input-bordered w-full @error('proveedor_name') border-red-500 text-red-500 @enderror" />
					</label>

					<label class="text-xs">Telefono

						<input wire:model='tel' type="tel" placeholder="@error('tel'){{ $message }} @else TELEFONO @enderror"
							class="input input-sm input-bordered w-full @error('tel') border-red-500 text-red-500 @enderror" />
					</label>
					<label class="text-xs">Email
						<input wire:model='email' type="email" placeholder="@error('email'){{ $message }} @else EMAIL @enderror"
							class="input input-sm input-bordered w-full @error('email') border-red-500 text-red-500 @enderror" />
					</label>
					<label class="text-xs">Contacto
						<input wire:model='contacto' type="text"
							placeholder="@error('contactp'){{ $message }} @else CONTACTO @enderror"
							class="input input-sm input-bordered w-full @error('contacto') border-red-500 text-red-500 @enderror" />
					</label>
					<label class="text-xs">Descripcion
						<input wire:model='descripcion' type="text"
							placeholder="@error('descripcion'){{ $message }} @else DESCRIPCION @enderror"
							class="input input-sm input-bordered w-full @error('descripcion') border-red-500 text-red-500 @enderror" />
					</label>
					<label class="text-xs">Rubro
						<input wire:model='rubro' type="text" placeholder="@error('rubro'){{ $message }} @else RUBRO @enderror"
							class="input input-sm input-bordered w-full @error('rubro') border-red-500 text-red-500 @enderror" />
					</label>

					<div class="flex gap-3">
							<label class="text-xs">CC
								<input wire:model='cc' list="cc" placeholder="@error('cc'){{ $message }} @else CC @enderror"
								class="input input-sm input-bordered w-full @error('cc') border-red-500 text-red-500 @enderror" />
							</label>
								<datalist name="cc" id="cc">
								@foreach ($numerosCC as $numeroCC)
								<option {{-- wire:key='{{$numeroCC->id}}' --}}value="{{$numeroCC}}"></option>
								@endforeach
							</datalist>
						<div class="mt-4">
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