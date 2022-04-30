@extends('layouts.principal')

@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="{{url('consultas')}}">Consultas</a></li>
    <li class="breadcrumb-item active">Receta</li>
    <li class="breadcrumb-item active">Editar</li>
</ol>

<a type="button" class="btn btn-sm btn-warning" href="{{url('consultas')}}">
    <i class="fas fa-arrow-left"></i>&nbsp;Atrás
</a>

<br>
<br>

<div class="panel panel-inverse">

    <div class="panel-heading">
        <h4 class="panel-title">Editando Receta</h4>
    </div>
    
    <div class="panel-body">
        <form action="{{url('receta/update')}}" method="POST" enctype="multipart/form-data">
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
            <input type="hidden" name="id" id="id" value="{{$receta->id}}">
            <input type="hidden" name="idconsulta" id="idconsulta" value="{{$receta->idconsulta}}">
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Medicamentos: </label>
                    <textarea name="medicamento" id="medicamento">{!!$receta->medicamento!!}</textarea>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label class="form-label">Tratamiento: </label>
                    <textarea name="tratamiento" id="tratamiento">{!!$receta->tratamiento!!}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                    <label class="form-label">Conclusion: <span style="color: red">*</span></label>
                    <textarea name="conclusion" id="conclusion" required>{!!$receta->conclusion!!}</textarea>
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
    CKEDITOR.replace('medicamento');
    CKEDITOR.replace('tratamiento');
    CKEDITOR.replace('conclusion');
    CKEDITOR.config.height = 100;
</script>
@endpush