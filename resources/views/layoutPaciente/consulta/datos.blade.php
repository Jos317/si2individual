<div class="table-responsive">
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">Motivo</th>
                <th style="text-align: center">Fecha y hora de Inicio</th>
                <th style="text-align: center">Fecha y hora Fin</th>
                <th style="text-align: center">Paciente</th>
                <th style="text-align: center">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->motivo}}</td>
                    <td>{{$item->inicio}}</td>
                    <td>{{$item->fin}}</td>
                    <td>{{$item->paciente_nombre}}</td>
                    <td style="text-align: center">
                        @if ($item->estado == 1)
                            <a class="btn btn-sm btn-yellow me-1" href="{{url('recetaP/ver/'.$item->id)}}">
                                <i class="ion-md-eye"></i> Ver Receta
                            </a>
                        @endif
                        <a class="btn btn-sm btn-info me-1" href="{{url('diagnosticoP/ver/'.$item->id)}}">
                            <i class="ion-md-clipboard"></i> Ver Diagnóstico
                        </a>
                        @if ($item->estado_i == 1)
                            <a class="btn btn-sm btn-warning me-1" href="{{url('informacionP/ver/'.$item->id)}}">
                                <i class="ion-md-eye"></i> Ver Información del paciente
                            </a>
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
                      
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    {{ $consultas->links() }}
</div>