<div class="table-responsive">
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">Nombres</th>
                <th style="text-align: center">CI</th>
                <th style="text-align: center">Dirección</th>
                <th style="text-align: center">Teléfono</th>
                <th style="text-align: center">Imagen</th>
                <th style="text-align: center">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicos as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->ci}}</td>
                    <td>{{$item->direccion}}</td>
                    <td>{{$item->telefono}}</td>
                    <td style="text-align: center">
                        @if ($item->imagen != "")
                        <img src="{{asset($item->imagen)}}" alt="Imagen" width="100px">
                        @else
                        No hay imagen
                        @endif
                    </td>
                    {{-- <td style="text-align: center">
                        @if ($item->estado == 'activo')
                        <span style="border-radius: 30px 30px 30px 30px !important;width: 100%;padding: 3px 7px 3px 7px;background-color: #14C061;color: white">
                            Activo
                        </span>
                        @endif
                        @if ($item->estado == 'inactivo')
                        <span style="border-radius: 30px 30px 30px 30px !important;width: 100%;padding: 3px 7px 3px 7px;background-color: red;color: white">
                            Inactivo
                        </span>
                        @endif
                    </td> --}}
                    <td style="text-align: center">
                        <a class="btn btn-sm btn-primary me-1" href="{{url('medico/edit/'.$item->id)}}">
                            <i class="fas fa-pencil-alt fa-fw"></i> Editar
                        </a>

                        {{-- <a class="btn btn-sm btn-danger me-1" onclick="eliminar({{$item->id}})">
                            <i class="fa fa-trash fa-fw" aria-hidden="true"></i>
                            Eliminar
                        </a> --}}

                        <a class="btn btn-sm btn-yellow me-1" href="{{url('especialidad/index/'.$item->id)}}">
                            <i class="ion-md-eye" aria-hidden="true"></i>
                            Ver Especialidad
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    {{ $medicos->links() }}
</div>