@extends('layouts.principal')

@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="{{url('consultas')}}">Consulta</a></li>
    <li class="breadcrumb-item active">Información</li>
    <li class="breadcrumb-item active">Crear</li>
</ol>

<a type="button" class="btn btn-sm btn-warning" href="{{url('consultas')}}">
    <i class="fas fa-arrow-left"></i>&nbsp;Atrás
</a>

<br>
<br>

<div class="panel panel-inverse">

    <div class="panel-heading">
        <h4 class="panel-title">Creando Información del paciente</h4>
    </div>
    
    <div class="panel-body">
        <form action="{{url('informacion/store')}}" method="POST" enctype="multipart/form-data">
            @csrf
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
            <input type="hidden" name="idconsulta" id="idconsulta" value="{{$consulta->id}}">
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <div class="input-group">
                        <label class="form-label">Peso:&nbsp;&nbsp;</label>
                        <input type="number" max="400" min="0" class="form-control" name="peso" id="peso" value="{{old('peso')}}">
                        <span class="input-group-text">kg</span>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <div class="input-group">
                        <label class="form-label">Estatura:&nbsp;&nbsp;</label>
                        <input type="number" step=".01" max="2.5" min="0.00" class="form-control" name="estatura" id="estatura" value="{{old('estatura')}}">
                        <span class="input-group-text">m</span>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <div class="input-group">
                        <label class="form-label">Frecuencia Cardíaca:&nbsp;&nbsp;</label>
                        <input type="number" max="220" min="0"  class="form-control" name="frecu_cardi" id="frecu_cardi" value="{{old('frecu_cardi')}}">
                        <span class="input-group-text">bpm</span>
                    </div>
                </div>
            </div>
            &nbsp;
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <div class="input-group">
                        <label class="form-label">Frecuencia Respiratoria:&nbsp;&nbsp;</label>
                        <input type="number" max="90" min="0" class="form-control" name="frecu_respi" id="frecu_respi" value="{{old('frecu_respi')}}">
                        <span class="input-group-text">r/m</span>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <div class="input-group">
                        <label class="form-label">Temperatura:&nbsp;&nbsp;</label>
                        <input type="number" max="45" min="0" class="form-control" name="temperatura" id="temperatura" value="{{old('temperatura')}}">
                        <span class="input-group-text">C</span>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <div class="input-group">
                        <label class="form-label">Sistólica:&nbsp;&nbsp;</label>
                        <input type="number" max="200" min="0" class="form-control" name="sistolica" id="sistolica" value="{{old('sistolica')}}">
                        <span class="input-group-text">mmHg</span>
                    </div>
                </div>
            </div>
            &nbsp;
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <div class="input-group">
                        <label class="form-label">Diastólica:&nbsp;&nbsp;</label>
                        <input type="number" max="130" min="0" class="form-control" name="diastolica" id="diastolica" value="{{old('diastolica')}}">
                        <span class="input-group-text">mmHg</span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <br>
                    <button class="btn btn-primary" type="submit">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
            
    </div>
</div>
@endsection
@push('scripts')
<script>
</script>
@endpush