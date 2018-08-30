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
                <h3 class="block-title">Dynamic Table
                    <small>Full pagination</small>
                </h3>
            </div>
            <div class="block-content">
                <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/base_tables_datatables.js -->
                <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
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
                processing: true,
                serverSide: false,
                ajax: '{!! route('periods:dt') !!}',
                columns: [
                    {data: 'schooljaar', name: 'schooljaar'},
                    {data: 'periodenaam', name: 'periodenaam'},
                    {data: 'startdatum', name: 'startdatum'},
                    {data: 'einddatum', name: 'einddatum'}
                ]
            });
        });
    </script>
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
@endpush