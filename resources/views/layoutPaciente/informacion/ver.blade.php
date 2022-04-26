@extends('layoutPaciente.layouts.principal')

@section('content_paciente')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="{{url('consultasP')}}">Consultas</a></li>
    <li class="breadcrumb-item active">Informacion</li>
    <li class="breadcrumb-item active">Ver</li>
</ol>

<a type="button" class="btn btn-sm btn-warning" href="{{url('consultasP')}}">
    <i class="fas fa-arrow-left"></i>&nbsp;Atrás
</a>

<br>
<br>

<div class="panel panel-inverse">

    <div class="panel-heading">
        <h4 class="panel-title">Ver Informacion del paciente</h4>
    </div>
    
    <div class="panel-body">
        @if ($errors->any())
        <div class="form-group row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="alert alert-danger">
                    <ul style="margin-bottom: 0px">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        <input type="hidden" name="idconsulta" id="idconsulta" value="{{$informacion->idconsulta}}">
        <div class="form-group row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                <div class="input-group">
                    <label class="form-label">Peso:&nbsp;&nbsp;</label>
                    <input type="number" class="form-control" name="peso" id="peso" value="{{$informacion->peso}}" disabled>
                    <span class="input-group-text">kg</span>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                <div class="input-group">
                    <label class="form-label">Estatura:&nbsp;&nbsp;</label>
                    <input type="number" step=".01" class="form-control" name="estatura" id="estatura" value="{{$informacion->estatura}}" disabled>
                    <span class="input-group-text">m</span>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                <div class="input-group">
                    <label class="form-label">Frecuencia Cardíaca:&nbsp;&nbsp;</label>
                    <input type="number" class="form-control" name="frecu_cardi" id="frecu_cardi" value="{{$informacion->frecu_cardi}}" disabled>
                    <span class="input-group-text">bpm</span>
                </div>
            </div>
        </div>
        &nbsp;
        <div class="form-group row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                <div class="input-group">
                    <label class="form-label">Frecuencia Respiratoria:&nbsp;&nbsp;</label>
                    <input type="number" class="form-control" name="frecu_respi" id="frecu_respi" value="{{$informacion->frecu_respi}}" disabled>
                    <span class="input-group-text">r/m</span>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                <div class="input-group">
                    <label class="form-label">Temperatura:&nbsp;&nbsp;</label>
                    <input type="number" class="form-control" name="temperatura" id="temperatura" value="{{$informacion->temperatura}}" disabled>
                    <span class="input-group-text">C</span>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                <div class="input-group">
                    <label class="form-label">Sistólica:&nbsp;&nbsp;</label>
                    <input type="number" class="form-control" name="sistolica" id="sistolica" value="{{$informacion->sistolica}}" disabled>
                    <span class="input-group-text">mmHg</span>
                </div>
            </div>
        </div>
        &nbsp;
        <div class="form-group row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                <div class="input-group">
                    <label class="form-label">Diastólica:&nbsp;&nbsp;</label>
                    <input type="number"class="form-control" name="diastolica" id="diastolica" value="{{$informacion->diastolica}}" disabled>
                    <span class="input-group-text">mmHg</span>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <br>
                {{-- <button class="btn btn-primary" type="submit">
                    Editar
                </button> --}}
                <a class="btn btn-sm btn-primary me-1" href="{{url('informacionP/edit/'.$informacion->id)}}">
                    <i class="fas fa-pencil-alt fa-fw"></i> Editar
                </a>
            </div>
        </div>
            
    </div>
</div>
@endsection
@push('scripts')
<script>
    
</script>
@endpush