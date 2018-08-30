@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.css')}}">
@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Slots beheren
                    <small>Selecteer een periode waarin je slots wilt aanmaken</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Slots</li>
                    <li><a class="link-effect" href="">Selecteer periode</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content col-lg-12">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">
                    <small>Full pagination</small>
                </h3>
            </div>
            <div class="block-content">
                <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/base_tables_datatables.js -->
                <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer table-vcenter">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-hover js-dataTable-full-pagination dataTable no-footer"
                                   id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                                <thead>
                                <tr>
                                    <th>Schooljaar</th>
                                    <th>Periodenaam</th>
                                    <th>Startdatum</th>
                                    <th>Einddatum</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

@push('scripts')
    <script>
        $(function () {

            $('#DataTables_Table_2').DataTable({
                ajax: '{!! route('periods:dt') !!}',
                // "pageLength": 1,
                "renderer": "bootstrap",
                "language": { // language settings
                    "infoEmpty": "Geen gegevens gevonden om weer te geven",
                    "emptyTable": "Geen gegevens beschikbaar in de database",
                    "zeroRecords": "Geen overeenkomstige gegevens beschikbaar",
                    "search": "<i class='fa fa-search'></i>",
                    "paginate": {
                        "previous": "Vorige",
                        "next": "Volgende",
                        "last": "Laatste",
                        "first": "Eerste",
                        "page": "Pagina",
                        "pageOf": "Van",
                    }
                },
                columns: [
                    {data: 'schooljaar', name: 'schooljaar'},
                    {data: 'periodenaam', name: 'periodenaam'},
                    {data: 'startdatum', name: 'startdatum'},
                    {data: 'einddatum', name: 'einddatum'}
                ]
            });
        });

        $(document).ready(function () {
            $('input').addClass('form-control');
            $('select').addClass('form-control');
        });
    </script>
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
@endpush