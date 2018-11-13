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
                    Beheer examenperioden
                    <small>Examinatoren kunnen hier examenperiode aanmaken</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Examens</li>
                    <li><a class="link-effect" href="">Examenperiode aanmaken</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="bg-lighter content">
        <h2 class="content-heading">Schooljaren inzien</h2>
        <div class="table-responsive">
            <div id="DataTables_Table_2_wrapper"
                 class="dataTables_wrapper form-inline dt-bootstrap no-footer block-content block">
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-bordered table-striped js-dataTable-full-pagination_custom dataTable no-footer"
                               id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                            <thead>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                    colspan="1"
                                    aria-label="Name: activate to sort column ascending" style="width: 402px;">
                                    Schooljaar
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                    rowspan="1"
                                    colspan="1" aria-label="Email: activate to sort column ascending"
                                    style="width: 551px;">
                                    Periode
                                </th>
                                <th class=" sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                    rowspan="1"
                                    colspan="1" aria-label="OV-nummer: activate to sort column ascending"
                                    style="width: 551px;">
                                    Periodenaam
                                </th>
                                <th class="text-center sorting_disabled" style="width: 137px;" rowspan="1"
                                    colspan="1"
                                    aria-label="Actions">Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($periods as $period)
                                <tr role="row" class="odd">
                                    <td class="font-w600 col-xs-3">{{isset($period->schoolyear) ? $period->schoolyear->schooljaar : 'Non-existent'}}</td>
                                    <td class="text-wrap col-xs-5">{{$period->startdatum->format('Y-m-d')}}
                                        tot {{$period->einddatum->format('Y-m-d')}}</td>
                                    <td class="col-xs-2">{{$period->periodenaam}}</td>
                                    <td class="text-center col-xs-1">
                                        <div class="btn-group">
                                            <a class="btn btn-xs btn-default" href="/periods/{{$period->id}}/edit"
                                               data-toggle="tooltip"
                                               title=""
                                               data-original-title="Bewerk periode"><i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-xs btn-default" href="/periods/{{$period->id}}/remove"
                                               data-toggle="tooltip"
                                               title=""
                                               data-original-title="Verwijder periode"><i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Schooljaar</th>
                                <th>Periode</th>
                                <th>Periodenaam</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
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