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
                    Deletions
                    <small>Overzicht</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Deletions</li>
                    <li><a class="link-effect" href="">Read</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content">
        <h2 class="content-heading">Deletions</h2>
        <div class="block">
            <div class="block-content">
                <div class="table-responsive">
                    <div id="DataTables_Table_2_wrapper"
                         class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <table class="table table-hover js-dataTable-full-pagination_custom_deletions dataTable no-footer"
                                   id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                                <thead>
                                <tr>
                                    <th class="">Model</th>
                                    <th class="">Id</th>
                                    <th class="">Verwijderd op</th>
                                    <th class="">Verwijderd door</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($deletions as $deletion)
                                    <tr>
                                        {{--<td class="">{{get_class($deletion)}}</td>--}}
                                        <td class="">{{$deletion->revisionHistory->where('key', 'deleted_at')->first()->revisionable_type}}</td>
                                        <td class="">{{$deletion->id}}</td>
                                        <td class="">{{$deletion->deleted_at}}</td>
                                        <td class="">{{$deletion->revisionHistory->where('key', 'deleted_at')->first()->userResponsible()->achternaam}}, {{$deletion->revisionHistory->where('key', 'deleted_at')->first()->userResponsible()->voornaam }} {{$deletion->revisionHistory->where('key', 'deleted_at')->first()->userResponsible()->ttussenvoegsel}} ({{$deletion->revisionHistory->where('key', 'deleted_at')->first()->userResponsible()->davinci_id }})</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Id</th>
                                    <th>Verwijderd op</th>
                                    <th>Verwijderd door</th>
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