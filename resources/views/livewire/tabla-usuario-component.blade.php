{{-- TABLAS PARA CRUD EN USUARIOS ZONA DE EDITAR Y BORRAR--}}
<div>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Rol</th>
                <th>Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listaUsuarios as $listaUsuarios)
            <tr>
                <td><input class="input input-sm w-full" type="text" value="{{$listaUsuarios->role}}">
                </td>
                <td><input class="input input-sm w-full" type="text" value="{{$listaUsuarios->name}}">
                </td>
                <td><input class="input input-sm w-full" type="text" value="{{$listaUsuarios->email}}">
                </td>
                <td><button class="btn btn-sm btn-primary w-full" type="button">Editar</button></td>
                <td><button class="btn btn-sm btn-secondary w-full" type="button">Borrar</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>