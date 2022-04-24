<div class="table-responsive">
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">Médico</th>
                <th style="text-align: center">Paciente</th>
                <th style="text-align: center">Acción</th>
                <th style="text-align: center">Tabla</th>
                <th style="text-align: center">Fecha y Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bitacoras as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    @if($item->idusuario)
                        <td>{{$item->user->nombre}}</td>
                    @else
                        <td></td>
                    @endif
                    @if($item->idpaciente)
                        <td>{{$item->paciente->nombre}}</td>
                    @else
                        <td></td>
                    @endif
                    <td>{{$item->accion}}</td>
                    <td>{{$item->tabla}}</td>
                    <td>{{$item->created_at}}</td>
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
    {{ $bitacoras->links() }}
</div>