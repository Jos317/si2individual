<div class="table-responsive">
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">Motivo</th>
                <th style="text-align: center">Fecha Registro</th>
                <th style="text-align: center">Hora de Inicio</th>
                <th style="text-align: center">Hora Fin</th>
                <th style="text-align: center">Paciente</th>
                <th style="text-align: center">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->motivo}}</td>
                    <td>{{$item->fecha_registro}}</td>
                    <td>{{$item->hora_inicio}}</td>
                    <td>{{$item->hora_fin}}</td>
                    <td>{{$item->paciente_nombre}}</td>
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
                    @if ($item->estado == 1)
                        <td style="text-align: center">
                            <a class="btn btn-sm btn-primary me-1" href="{{url('consulta/anadir/'.$item->id)}}">
                                <i class="ion-md-clipboard"></i> Añadir Receta
                            </a>
                        </td>
                    @else
                        <td style="text-align: center">
                            <a class="btn btn-sm btn-yellow me-1" href="{{url('receta/ver/'.$item->id)}}">
                                <i class="ion-md-eye"></i> Ver Receta
                            </a>
                        </td>
                    @endif    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    {{ $consultas->links() }}
</div>