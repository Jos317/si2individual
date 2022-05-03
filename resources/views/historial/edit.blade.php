@extends('layouts.principal')

@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="{{url('pacientes')}}">Pacientes</a></li>
    <li class="breadcrumb-item active">Historiales</li>
    <li class="breadcrumb-item active">Editar</li>
</ol>

<a type="button" class="btn btn-sm btn-warning" href="{{url('pacientes')}}">
    <i class="fas fa-arrow-left"></i>&nbsp;Atrás
</a>

<br>
<br>

<div class="panel panel-inverse">

    <div class="panel-heading">
        <h4 class="panel-title">Editando Historial</h4>
    </div>
    
    <div class="panel-body">
        <form action="{{url('historial/update')}}" method="POST" enctype="multipart/form-data">
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
            <input type="hidden" name="id" id="id" value="{{$historial->id}}">
            <input type="hidden" name="idpaciente" id="idpaciente" value="{{$historial->idpaciente}}">
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Documento: <span style="color: red">*</span></label>
                    <input type="file" class="form-control" name="documento" id="documento" value="{{$historial->documento}}" alt="Click aquí para subir" 
                    title="Click aquí para subir" required>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Nombre del documento: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="nota" id="nota" placeholder="Nombre..." value="{{$historial->nota}}" required>
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