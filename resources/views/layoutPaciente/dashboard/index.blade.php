@extends('layoutPaciente.layouts.principal')

@section('content_paciente')
<ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item">
        <a href="javascript:;">Home</a>
    </li>
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="row">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-5">Calendario para las consultas</h1>
                <div class="col-md-11 offset-1 mt-5 mb-5">

                    <div id="calendar">

                    </div>

                </div>
            </div>
        </div>
    </div>
                
</div>
    
@endsection
@push('scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.js'></script>
        <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" />
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var booking = @json($events);
        $('#calendar').fullCalendar({
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month',
            },
            editable: true,
            events: booking,
        });
    });
</script>
@endpush