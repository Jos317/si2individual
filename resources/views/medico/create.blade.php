@extends('layouts.principal')

@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="{{url('medicos')}}">Médicos</a></li>
    <li class="breadcrumb-item active">Crear</li>
</ol>

<a type="button" class="btn btn-sm btn-warning" href="{{url('medicos')}}">
    <i class="fas fa-arrow-left"></i>&nbsp;Atrás
</a>

<br>
<br>

<div class="panel panel-inverse">

    <div class="panel-heading">
        <h4 class="panel-title">Creando Médico</h4>
    </div>
    
    <div class="panel-body">
        <form action="{{url('medico/store')}}" method="POST" enctype="multipart/form-data">
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
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Nombre: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre..." value="{{old('nombre')}}" required>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">CI: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="ci" id="ci" placeholder="CI..." value="{{old('ci')}}" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Dirección: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección..." value="{{old('direccion')}}" required>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Teléfono: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono..." value="{{old('telefono')}}" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label>Imagen:</label>
                    <div class="image-upload-wrap" id="image-upload-wrap">
                        <input class="file-upload-input" type='file' id="file-upload-input" name="imagen"
                                onchange="readURL(this);"
                                accept="image/jpg, image/jpeg, image/png" />
                        <div class="drag-text">
                            <h3>Arrastra la imagen o selecciona</h3>
                        </div>
                    </div>
                    <div class="file-upload-content" id="file-upload-content">
                        <img class="file-upload-image" id="file-upload-image" src="#" alt="fotografia"/>
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Eliminar
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Email: <span style="color: red">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email..." value="{{old('email')}}" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                    <label class="form-label">Password: <span style="color: red">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password..." required>
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