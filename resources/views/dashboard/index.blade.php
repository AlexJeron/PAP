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
<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}" />
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
            <div class="container-fluid">

                <div class="card shadow mb-4">
                    {{-- <div class="card-header py-3">
                        <h5 class="d-flex p-2 m-0 font-weight-bold text-primary">Calendário de Atividades</h5>
                    </div> --}}
                    <div class="card-body" style="height:87vh">
                        <div id="calendar" data-load-atividades="{{ route('loadAtividades') }}"
                            data-update-atividade="{{ route('updateAtividade') }}"
                            data-store-atividade="{{ route('storeAtividade') }}">
                        </div>

                        <div style='clear:both'></div>

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        {{-- @include('layouts.footer') --}}
    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

@include('dashboard.modals.master')
@include('dashboard.modals.delete')
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
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select-pt_PT.js') }}"></script>
@endsection