@extends('layouts.main')

@section('head')

<!-- Page Title -->
<title>BiblioRaul - Dashboard</title>

<!-- FullCalendar -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href='{{ asset('assets/fullcalendar/packages/core/main.css')}}' rel='stylesheet' />
<link href='{{ asset('assets/fullcalendar/packages/daygrid/main.css')}}' rel='stylesheet' />
<link href='{{ asset('assets/fullcalendar/packages/timegrid/main.css')}}' rel='stylesheet' />
<link href='{{ asset('assets/fullcalendar/packages/list/main.css')}}' rel='stylesheet' />
<link href="{{ asset('assets/fullcalendar/css/calendar.css')}}" rel='stylesheet' />
<link href="{{ asset('assets/fullcalendar/packages/bootstrap/main.css')}}" rel='stylesheet' />

<!-- Bootstrap Select -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css" />
@endsection

@if(session()->has('alert'))
<div id="message">
    <div style="padding: 5px;">
        <div id="inner-message" class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Já tem sessão iniciada!
        </div>
    </div>
</div>
@endif

@section('content')

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('layouts.topbar')

            <!-- Begin Page Content -->
            <div id='wrap'>

                <div id='external-events'>
                    <h4>Draggable Events</h4>

                    <div id='external-events-list'>
                        <div class='fc-event'>My Event 1</div>
                        <div class='fc-event'>My Event 2</div>
                        <div class='fc-event'>My Event 3</div>
                        <div class='fc-event'>My Event 4</div>
                        <div class='fc-event'>My Event 5</div>
                    </div>

                    <p>
                        <input type='checkbox' id='drop-remove' />
                        <label for='drop-remove'>remove after drop</label>
                    </p>
                </div>
                <div id='calendar' data-load-atividades="{{ route('loadAtividades') }}"
                    data-update-atividade="{{ route('updateAtividade') }}">
                </div>

                <div style='clear:both'></div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('layouts.footer')
    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

@include('dashboard.modals.show')
@include('dashboard.modals.new')
@include('layouts.logout-modal')

@endsection

@section('scripts')

<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
{{-- <script src="vendor/chart.js/Chart.min.js"></script> --}}

<!-- FullCalendar -->
<script src='{{ asset('assets/fullcalendar/packages/core/main.js')}}'></script>
<script src='{{ asset('assets/fullcalendar/packages/interaction/main.js')}}'></script>
<script src='{{ asset('assets/fullcalendar/packages/daygrid/main.js')}}'></script>
<script src='{{ asset('assets/fullcalendar/packages/timegrid/main.js')}}'></script>
<script src='{{ asset('assets/fullcalendar/packages/list/main.js')}}'></script>
<script src="{{asset('assets/fullcalendar/packages/core/locales/pt.js')}}"></script>
<script src="{{asset('assets/fullcalendar/js/script.js')}}"></script>
<script src="{{asset('assets/fullcalendar/js/calendar.js')}}"></script>
<script src="{{asset('assets/fullcalendar/packages/bootstrap/main.js')}}"></script>

<!-- MomentJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<!-- Bootstrap-Select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"></script>
<script src="{{ asset('js/bootstrap-select-pt_PT.js') }}"></script>
@endsection