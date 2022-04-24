@extends('layouts.principal')

@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="{{url('historiales')}}">Historial</a></li>
    <li class="breadcrumb-item active">Editar</li>
</ol>

<a type="button" class="btn btn-sm btn-warning" href="{{url('historiales')}}">
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
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <label class="form-label">Documento: <span style="color: red">*</span></label>
                    <input type="file" class="form-control" name="documento" id="documento" value="{{$historial->documento}}" alt="Click aquí para subir" 
                    title="Click aquí para subir">
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <label class="form-label">Nombre del documento: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="nota" id="nota" placeholder="Nombre..." value="{{$historial->nota}}" required>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <label class="form-label">Paciente: <span style="color: red">*</span></label>
                    <select class="form-select" name="idpaciente" id="idpaciente" required>
                        @foreach ($pacientes as $paciente)
                            @if ($historial->idpaciente == $paciente->id)
                                <option selected value="{{$paciente->id}}">{{$paciente->nombre}} {{$paciente->apellido}}</option>
                            @else
                            <option value="{{$paciente->id}}">{{$paciente->nombre}} {{$paciente->apellido}}</option>
                            @endif
                        @endforeach
                    </select>
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
    var paciente = {!! json_encode($paciente) !!};

    if (paciente.imagen != "") {
        $('#file-upload-contentImagen').show();
        $('#image-upload-wrapImagen').hide();
    }
    readURLImagen = function (input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-upload-wrapImagen').hide();

                $('#file-upload-imageImagen').attr('src', e.target.result);
                $('#file-upload-contentImagen').show();
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    removeUploadImagen = function () {
        $('#file-upload-inputImagen').replaceWith($('#file-upload-inputImagen').clone());
        $('#file-upload-contentImagen').hide();
        $('#image-upload-wrapImagen').show();
        $('#file-upload-inputImagen').val('');

        $('#image-upload-wrapImagen').removeClass('image-dropping');

        // $('#file-upload-inputImagen').prop('required', true);
    }
    $('#image-upload-wrapImagen').bind('dragover', function () {
        $('#image-upload-wrapImagen').addClass('image-dropping');
    });
    $('#image-upload-wrapImagen').bind('dragleave', function () {
        $('#image-upload-wrapImagen').removeClass('image-dropping');
    });
</script>
@endpush