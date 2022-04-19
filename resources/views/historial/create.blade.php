@extends('layouts.principal')

@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="{{url('historiales')}}">Historial</a></li>
    <li class="breadcrumb-item active">Crear</li>
</ol>

<a type="button" class="btn btn-sm btn-warning" href="{{url('historiales')}}">
    <i class="fas fa-arrow-left"></i>&nbsp;Atrás
</a>

<br>
<br>

<div class="panel panel-inverse">

    <div class="panel-heading">
        <h4 class="panel-title">Creando Documento</h4>
    </div>
    
    <div class="panel-body">
        <form action="{{url('historial/store')}}" method="POST" enctype="multipart/form-data">
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
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <label class="form-label">Documento: <span style="color: red">*</span></label>
                    <input type="file" accept=".docx,.pdf"  alt="Click aquí para subir" title="Click aquí para subir" 
                    class="form-control" name="documento" id="documento" value="{{old('documento')}}" required>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <label class="form-label">Nombre del documento: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="nota" id="nota" placeholder="Nombre..." value="{{old('nota')}}" required>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-2">
                    <label class="form-label">Paciente: <span style="color: red">*</span></label>
                    <select class="form-select" name="idpaciente" id="idpaciente" required>
                        @foreach ($pacientes as $paciente)
                            <option value="" disabled selected>Seleccione una opción...</option>
                            <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
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
    readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image-upload-wrap').hide();

                $('#file-upload-image').attr('src', e.target.result);
                $('#file-upload-content').show();
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            removeUpload();
        }
    }

    removeUpload = function () {
        $('#file-upload-input').replaceWith($('#file-upload-input').clone());
        $('#file-upload-content').hide();
        $('#image-upload-wrap').show();
        $('#file-upload-input').val('');
        $('#image-upload-wrap').removeClass('image-dropping');
        // $('#file-upload-input').prop('required', true);
    }

    $('#image-upload-wrap').bind('dragover', function () {
        $('#image-upload-wrap').addClass('image-dropping');
    });

    $('#image-upload-wrap').bind('dragleave', function () {
        $('#image-upload-wrap').removeClass('image-dropping');
    });
</script>
@endpush