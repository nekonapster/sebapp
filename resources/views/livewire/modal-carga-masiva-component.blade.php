<div>
    {{-- ! boton para abrir modal --}}
    <button class="btn btn-sm btn-outline btn-accent" onclick="modalCargaMasiva.showModal()">
        <svg class="w-6 h-6 text-gray-800 dark:text-teal-500" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
            viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                clip-rule="evenodd" />
        </svg>
        Cargar</button>   
    {{-- ! modal para 'Carga masiva de datos' --}}
       <dialog id="modalCargaMasiva" class="modal">
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
</div>
