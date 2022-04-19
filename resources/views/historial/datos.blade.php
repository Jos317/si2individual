<div class="table-responsive">
    <table id="data-table-default" class="table table-striped table-bordered align-middle">
        <thead>
            <tr>
                <th style="text-align: center">#</th>
                <th style="text-align: center">Nombre del documento</th>
                <th style="text-align: center">Fecha Registrada</th>
                <th style="text-align: center">Nombre del paciente</th>
                <th style="text-align: center">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historiales as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nota}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->paciente_nombre}}</td>
                    <td style="text-align: center">
                        <a class="btn btn-sm btn-primary me-1" href="{{url('historial/edit/'.$item->id)}}">
                            <i class="fas fa-pencil-alt fa-fw"></i> Editar
                        </a>
                        <a class="btn btn-sm btn-green me-1" href="{{url($item->documento)}}" download="{{$item->nota}}" target="_blank">
                            <i class="ion-md-cloud-download"></i> Descargar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    {{ $historiales->links() }}
</div>