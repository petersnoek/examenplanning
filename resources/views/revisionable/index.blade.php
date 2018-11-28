@extends('layouts.master')
<link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.css')}}">
@push('style')

@endpush

@section('content')


    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Revision
                    <small>Overzicht</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Revision</li>
                    <li><a class="link-effect" href="">Read</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content">
        <h2 class="content-heading">Revisions</h2>
        <div class="block">
            <div class="block-content">
                <div class="table-responsive">
                    <div id="DataTables_Table_2_wrapper"
                         class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <table class="table table-hover js-dataTable-full-pagination_custom_revisionable dataTable no-footer"
                                   id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                                <thead>
                                <tr>
                                    <th class="">Model</th>
                                    <th class="">Gebruiker</th>
                                    <th class="">Veld</th>
                                    <th class="">Oude waarde</th>
                                    <th class="">Nieuwe waarde</th>
                                    <th class="">Aangepast op</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($revisions as $revision)
                                    <tr>
                                        <td class="">{{$revision->revisionable_type}}</td>
                                        <td class="">{{$revision->userResponsible() ? $revision->userResponsible()->achternaam .', '. $revision->userResponsible()->voornaam .' '.$revision->userResponsible()->tussenvoegsel : 'Deze resource is gegenereerd'}}</td>
                                        <td class="">{{$revision->fieldname()}}</td>
                                        <td class="">{{$revision->oldValue()}}</td>
                                        <td class="">{{$revision->newValue()}}</td>
                                        <td class="">{{$revision->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Model</th>
                                    <th>Gebruiker</th>
                                    <th>Veld</th>
                                    <th>Oude waarde</th>
                                    <th>Nieuwe waarde</th>
                                    <th>Aangepast op</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')

    <script src="{{asset('assets/js/datatables/base_tables_datatables.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#DataTables_Table_2 tfoot th').each(function () {
                var title = $(this).text();
                if (title != "") {
                    $(this).html('<input type="text" class="form-control small" placeholder="Doorzoek ' + title + '" />');
                }
            });

            // DataTable
            var table = $('#DataTables_Table_2').DataTable();

            // Apply the search
            table.columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
@endpush