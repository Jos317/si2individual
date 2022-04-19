@extends('layouts.principal')

@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="{{url('pacientes')}}">Pacientes</a></li>
    <li class="breadcrumb-item active">Información Adicional</li>
    <li class="breadcrumb-item active">Editar</li>
</ol>

<a type="button" class="btn btn-sm btn-warning" href="{{url('pacientes')}}">
    <i class="fas fa-arrow-left"></i>&nbsp;Atrás
</a>

<br>
<br>

<div class="panel panel-inverse">

    <div class="panel-heading">
        <h4 class="panel-title">Editando Información Adicional</h4>
    </div>
    
    <div class="panel-body">
        <form action="{{url('paciente/update_info')}}" method="POST" enctype="multipart/form-data">
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
            <input type="hidden" name="idpaciente" id="idpaciente" value="{{$infoadicional->idpaciente}}">
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Alergias: <span style="color: red">*</span></label>
                    <textarea name="alergia" id="alergia">{!!$infoadicional->alergia!!}</textarea>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Antecedentes Heredofamiliares: <span style="color: red">*</span></label>
                    <textarea name="ante_here_fami" id="ante_here_fami">{!!$infoadicional->ante_here_fami!!}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Antecedentes no patológicos: <span style="color: red">*</span></label>
                    <textarea name="ante_no_pato" id="ante_no_pato">{!!$infoadicional->ante_no_pato!!}</textarea>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Antecedentes patológicos<span style="color: red">*</span></label>
                    <textarea name="ante_pato" id="ante_pato">{!!$infoadicional->ante_pato!!}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Antecedentes psiquiátricos: <span style="color: red">*</span></label>
                    <textarea name="ante_psiqui" id="ante_psiqui">{!!$infoadicional->ante_psiqui!!}</textarea>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Dieta Nutricional<span style="color: red">*</span></label>
                    <textarea name="dieta_nutri" id="dieta_nutri">{!!$infoadicional->dieta_nutri!!}</textarea>
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
<script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('alergia');
    CKEDITOR.replace('ante_here_fami');
    CKEDITOR.replace('ante_no_pato');
    CKEDITOR.replace('ante_pato');
    CKEDITOR.replace('ante_psiqui');
    CKEDITOR.replace('dieta_nutri');
    CKEDITOR.config.height = 100;
</script>
@endpush