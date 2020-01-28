@extends('layouts.main')

@section('head')
<title>BiblioRaul - Professores</title>

<!-- DataTables CDN -->
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fh-3.1.6/kt-2.5.1/r-2.2.3/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fh-3.1.6/kt-2.5.1/r-2.2.3/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js">
</script>
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

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <h5 class="col-9 d-flex p-2 m-0 font-weight-bold text-primary">
                                Gerir Professores
                                </h4>
                                <div class="col-3">
                                    <button type="button"
                                        class="float-right d-flex d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                        style="margin-top:0.3rem" data-toggle="modal" data-target="#newProfessorModal">
                                        <i class="fas fa-plus-circle fa-sm text-white-50"></i> Adicionar
                                        Professor</button>
                                </div>
                        </div>
                        {{-- <h5 class="m-0 font-weight-bold text-primary"> --}}

                        {{-- </h5> --}}

                    </div>
                    <div class="card-body">
                        <div class="table table-clear">
                            <table class="table zebra" id="dataTable" width="100%" cellspacing="0">
                                <thead class="transparency">
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($professor as $professor)
                                    <tr>
                                        {{-- <td> {{ $professor->id }} </td> --}}
                                        <td> {{ $professor->nome }} </td>
                                        <td> {{ $professor->email }} </td>
                                        <td class="text-center">
                                            <i class="far fa-edit" style="color:#f6993f"></i>
                                            <i class="far fa-trash-alt" style="color:#e3342f"></i>
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

<div class="modal fade" id="newProfessorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Professor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/professor">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">{{ __('Nome') }}</label>
                        <div class="col-sm-10">
                            <input id="name" type="text" class="form-control @error('nome') is-invalid @enderror"
                                name="nome" value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('nome')
                            <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">{{ __('Email') }}</label>

                        <div class="col-sm-10">
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Adicionar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.logout-modal')

@endsection

@section('scripts')

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Datatables custom script -->
<script src="/js/datatables.js"></script>

@endsection

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
