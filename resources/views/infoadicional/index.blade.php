@extends('layouts.principal')

@section('content')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item">
        <a href="{{url('dashboard')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Médicos</li>
</ol>
<h1 class="page-header">Médicos</h1>

<div class="panel panel-inverse">

    <div class="panel-heading">
        <h4 class="panel-title">Listado de los médicos</h4>
        <div class="panel-heading-btn">
            <a href="{{url('medico/create')}}" class="btn btn-xs btn-icon btn-primary" title="Añadir Nuevo Médico"><i
                    class="fa fa-plus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                    class="fa fa-expand"></i></a>
            {{-- <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                    class="fa fa-redo"></i></a> --}}
            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                    class="fa fa-minus"></i></a>
            {{-- <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                    class="fa fa-times"></i></a> --}}
        </div>
    </div>


    <div class="panel-body" id="cuerpo">
        @include('medico.datos')
    </div>
</div>

@endsection
@push('scripts')
<script>
    function eliminar(id) {
        Swal.fire({
            title: 'Estás seguro de eliminar esto?',
            text: "No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminalo!',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: "POST",
                    url: "{{url('medico/eliminar')}}",
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        // console.log(response);
                        
                        Swal.fire({
                            title: 'Eliminado!',
                            text: response.mensaje,
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "{{url('medicos')}}";
                            }
                        });
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown ) {
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown );
                        Swal.fire({
                            title: 'Oops...',
                            text: jqXHR.responseJSON.mensaje,
                            icon: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                
                            }
                        });
                    }
                });
            }
        });
        
    }
</script>
@endpush