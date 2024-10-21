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
														<button class="btn btn-square btn-sm inline btn-primary" onclick="my_modal_5.showModal()">CC</button>
												</div>
										</div>

										<div class="card-actions justify-start py-3">
												<button class="btn btn-sm btn-primary">Modificar</button>
												<button class="btn btn-sm btn-secondary">Agregar</button>
										</div>
								</div>

								<!-- tabla dentro del modal ↓ -->
								<div class="mt-2">
										<table class="table" id="myTable" style="width:100%;">
												<!-- head -->
												<thead class="">
														<tr>
																<th></th>
																<th class="">ID</th>
																<th class="">CC</th>
																<th class="">DESCRIPCION</th>
																<th class="">RUBRO</th>
																<th class="">TEL</th>
																<th class="">PROVEEDOR</th>
																<th class="">CONTACTO</th>
																<th class="">CORREO</th>
														</tr>
												</thead>
												<tbody>
														<tr>
																<td>1</td>
																<td>BUE001</td>
																<td>51420003</td>
																<td>REFRIGERIOS</td>
																<td>MATERIALES Y SUMINISTROS</td>
																<td>1125-037551</td>
																<td>AQUALINE 00</td>
																<td>PEDRO DUARTE</td>
																<td>AQUALINE@MAIL.COM</td>
														</tr>
														<tr>
																<td>2</td>
																<td>BUE002</td>
																<td>73542005</td>
																<td>SNACKS</td>
																<td>MATERIALES Y SUMINISTROS</td>
																<td>1125-059873</td>
																<td>SNACKDELIGHT 02</td>
																<td>JUAN PEREZ</td>
																<td>JUAN.PEREZ@MAIL.COM</td>
														</tr>
														<tr>
																<td>3</td>
																<td>BUE003</td>
																<td>84653006</td>
																<td>ALMUERZOS</td>
																<td>MATERIALES Y SUMINISTROS</td>
																<td>1125-070984</td>
																<td>LUNCHBOX 03</td>
																<td>ANA GARCIA</td>
																<td>ANA.GARCIA@MAIL.COM</td>
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