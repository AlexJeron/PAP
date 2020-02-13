@extends('layouts.main')

@section('head')
<title>BiblioRaul - Atividades</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- DataTables CDN -->
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fh-3.1.6/kt-2.5.1/r-2.2.3/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css" />

@endsection

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
                    <div class="card-header py-3">
                        <div class="row">
                            <?php
                                $mesAtual = Carbon::now();
                                setlocale(LC_TIME, 'Portuguese');
                                $mesAtual = $mesAtual->formatLocalized('%B');
                            ?>
                            <h5 class="col-9 d-flex p-2 m-0 font-weight-bold text-primary">
                                Gerir Atividades de {{ $mesAtual }}
                                </h4>
                                <div class="col-3">
                                    <button type="button"
                                        class="float-right d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                        style="margin-top:0.3rem" data-toggle="modal" data-target="#newAtividadeModal">
                                        <i class="fas fa-plus-circle fa-sm text-white-50"></i> Adicionar
                                        Atividade</button>
                                </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table table-clear">
                            <table class="table zebra" id="dataTable" width="100%" cellspacing="0">
                                <thead class="transparency">
                                    <tr>
                                        <th>Dia</th>
                                        <th>Hora</th>
                                        <th>Atividade</th>
                                        <th>Local</th>
                                        <th>Recursos</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atividade as $atividade)
                                    <tr>
                                        <td data-target="#showAtividadeModal" @include('atividades.modals.data')
                                            style="cursor:pointer; font-size:14px">
                                            <b style="font-size:15px">{{ $atividade->inicio->format('d') }}</b>
                                            {{  ' | ' . $atividade->inicio->formatLocalized('%A') }}
                                        </td>
                                        <td data-target="#showAtividadeModal" @include('atividades.modals.data')
                                            style="cursor:pointer; font-size:15px">
                                            {{ $atividade->inicio->format('H:i') }}
                                            @isset($atividade->fim)
                                            {{ "- " . $atividade->fim->format('H:i') }}
                                            @endisset
                                        </td>
                                        <td data-target="#showAtividadeModal" @include('atividades.modals.data')
                                            style="cursor:pointer">
                                            {{ $atividade->nome }} </td>
                                        <td data-target="#showAtividadeModal" @include('atividades.modals.data')
                                            style="cursor:pointer">
                                            {{ $atividade->local->nome }} </td>
                                        <td data-target="#showAtividadeModal" @include('atividades.modals.data')
                                            style="cursor:pointer">
                                            @isset($atividade->recurso)
                                            {{ $atividade->num_recursos . " " . $atividade->recurso->nome }}
                                            @endisset
                                            <?php
                                            // $array = json_decode($atividade->turmas, true);
                                            // for ($i = 0; $i < count($array); $i++) {
                                            //     echo($array[$i]["nome"] . " ");
                                            // }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a type="button" id="btnEditAtividade" data-target="#editAtividadeModal"
                                                @include('atividades.modals.data')>
                                                <i class="far fa-edit" data-toggle="tooltip" data-placement="bottom"
                                                    title="Editar" style="color:#f6993f"></i>
                                            </a>
                                            <a type="button" data-ativ_id="{{ $atividade->id }}" data-toggle="modal"
                                                data-target="#deleteAtividadeModal">
                                                <i class="far fa-trash-alt" data-toggle="tooltip"
                                                    data-placement="bottom" title="Apagar"
                                                    style="color:#e3342f"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('layouts.footer')
    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- New Atividade Modal -->
@include('atividades.modals.new')

<!-- Show Atividade Modal -->
@include('atividades.modals.show')

<!-- Edit Atividade Modal -->
@include('atividades.modals.edit')

<!-- Delete Atividade Modal -->
@include('atividades.modals.delete')

@include('layouts.logout-modal')

@endsection

@section('scripts')

<!-- DataTables Core -->
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Datatables custom script -->
<script src="/js/datatable/atividade.js"></script>

<!-- DataTables CDN -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fh-3.1.6/kt-2.5.1/r-2.2.3/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js">
</script>

<!-- Bootstrap JS -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script src="/js/modals/atividade.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"></script>
<script src="{{ asset('js/bootstrap-select-pt_PT.js') }}"></script>
@endsection
