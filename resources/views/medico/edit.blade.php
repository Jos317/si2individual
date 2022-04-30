@extends('layouts.principal')

@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="{{url('medicos')}}">Médicos</a></li>
    <li class="breadcrumb-item active">Editar</li>
</ol>

<a type="button" class="btn btn-sm btn-warning" href="{{url('medicos')}}">
    <i class="fas fa-arrow-left"></i>&nbsp;Atrás
</a>

<br>
<br>

<div class="panel panel-inverse">

    <div class="panel-heading">
        <h4 class="panel-title">Editando Médico</h4>
    </div>
    
    <div class="panel-body">
        <form action="{{url('medico/update')}}" method="POST" enctype="multipart/form-data">
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
            <input type="hidden" name="id" id="id" value="{{$medico->id}}">
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Nombre: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre..." value="{{$medico->nombre}}" required>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">CI: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="ci" id="ci" placeholder="CI..." value="{{$medico->ci}}" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Dirección: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección..." value="{{$medico->direccion}}" required>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Teléfono: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono..." value="{{$medico->telefono}}" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Imagen</label>
                    <button style="margin: 0" class="file-upload-btn" type="button"
                        onclick="$('#file-upload-inputImagen').trigger('click');">
                        Agregar Imagen
                    </button>

                    <div class="image-upload-wrap" id="image-upload-wrapImagen">
                        @if($medico->imagen != '')
                            <input class="file-upload-input" id="file-upload-inputImagen" type='file' name="imagen"
                                    onchange="readURLImagen(this);"
                                    accept="image/jpg, image/jpeg, image/png"/>
                        @else
                            <input class="file-upload-input" id="file-upload-inputImagen" type='file' name="imagen"
                                    onchange="readURLImagen(this);"
                                    accept="image/jpg, image/jpeg, image/png"/>
                        @endif

                        <div class="drag-text">
                            <h3>Arrastra la imagen o selecciona</h3>
                        </div>
                    </div>
                    <div class="file-upload-content" id="file-upload-contentImagen">
                        @if($medico->imagen != '')
                            <img class="file-upload-image" id="file-upload-imageImagen" src="{{asset($medico->imagen)}}"
                                    alt="Imagen"/>
                        @else
                            <img class="file-upload-image" id="file-upload-imageImagen" src="#" alt="Imagen"/>
                        @endif
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUploadImagen()" class="remove-image">Eliminar
                                <!--<span class="image-title">Uploaded Image</span>--></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Email: <span style="color: red">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email..." value="{{$medico->email}}" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                    <label class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password...">
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
    var medico = {!! json_encode($medico) !!};

    if (medico.imagen != "") {
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