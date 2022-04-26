@extends('layoutPaciente.layouts.principal')

@section('content_paciente')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="{{url('pacientesP')}}">Paciente</a></li>
    <li class="breadcrumb-item active">Información Adicional</li>
    <li class="breadcrumb-item active">Ver</li>
</ol>

<a type="button" class="btn btn-sm btn-warning" href="{{url('pacientesP')}}">
    <i class="fas fa-arrow-left"></i>&nbsp;Atrás
</a>

<br>
<br>

<div class="panel panel-inverse">

    <div class="panel-heading">
        <h4 class="panel-title">Información Adicional</h4>
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
        <input type="hidden" name="idpaciente" id="idpaciente" value="{{$infoadicional->idpaciente}}">
        <div class="form-group row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label class="form-label">Alergias: </label>
                <textarea name="alergia" id="alergia" disabled>{!!$infoadicional->alergia!!}</textarea>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label class="form-label">Antecedentes Heredofamiliares: </label>
                <textarea name="ante_here_fami" id="ante_here_fami" disabled>{!!$infoadicional->ante_here_fami!!}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label class="form-label">Antecedentes no Patológicos: </label>
                <textarea name="ante_no_pato" id="ante_no_pato" disabled>{!!$infoadicional->ante_no_pato!!}</textarea>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label class="form-label">Antecedentes Patológicos: </label>
                <textarea name="ante_pato" id="ante_pato" disabled>{!!$infoadicional->ante_pato!!}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label class="form-label">Antecedentes Psiquiátricos: </label>
                <textarea name="ante_psiqui" id="ante_psiqui" disabled>{!!$infoadicional->ante_psiqui!!}</textarea>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label class="form-label">Dieta Nutricional: </label>
                <textarea name="dieta_nutri" id="dieta_nutri" disabled>{!!$infoadicional->dieta_nutri!!}</textarea>
            </div>
        </div>
        {{-- <div class="form-group row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <br>
                <button class="btn btn-primary" type="submit">
                    Editar
                </button>
                <a class="btn btn-sm btn-primary me-1" href="{{url('paciente/edit_info/'.$infoadicional->id)}}">
                    <i class="fas fa-pencil-alt fa-fw"></i> Editar
                </a>
            </div>
        </div> --}}
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