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
                    Slots
                    <small>Overzicht</small>
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
    <div class="content">
        <h2 class="content-heading">
            Overzicht van slots per periode
        </h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="block">
                    <div class="table-responsive">
                        <div id="DataTables_Table_2_wrapper"
                             class="dataTables_wrapper form-inline dt-bootstrap no-footer block block-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-striped js-dataTable-full-pagination_custom dataTable no-footer"
                                           id="DataTables_Table_2" role="grid"
                                           aria-describedby="DataTables_Table_2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Kerntaak: activate to sort column ascending">Naam
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Kerntaak: activate to sort column ascending">Email
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Kerntaak: activate to sort column ascending">Telefoonnummer
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Kerntaak: activate to sort column ascending">Adres
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Kerntaak: activate to sort column ascending">Status
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Kerntaak: activate to sort column ascending">Rol
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Kerntaak: activate to sort column ascending">Davinci id
                                            </th>
                                            <th class="text-center sorting_disabled" rowspan="1"
                                                colspan="1"
                                                aria-label="Actions">Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr role="row" class="odd">
                                                <td class="font-w600 sorting_1">{{$user->achternaam}}, {{$user->voornaam}} {{$user->tussenvoegsel}}</td>
                                                <td class="sorting_1">{{$user->email}}</td>
                                                <td class="sorting_1">{{$user->telefoonnummer}}</td>
                                                <td class="sorting_1">{{$user->straat}} {{$user->huisnummer}}{{$user->toevoeging}} {{$user->postcode}} {{$user->plaats}} {{$user->land}}</td>
                                                <td class="sorting_1">{{$user->active == 1 ? 'Actief' : 'Niet actief'}}</td>
                                                <td class="sorting_1">{{$user->role->naam}}</td>
                                                <td class="sorting_1">{{$user->davinci_id}}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a class="btn btn-xs btn-default"
                                                           href="/users/{{$user->id}}/edit"
                                                           data-toggle="tooltip"
                                                           title=""
                                                           data-original-title="Bewerk schooljaar"><i
                                                                    class="fa fa-pencil"></i>
                                                        </a>
                                                        <a class="btn btn-xs btn-default"
                                                           href="/users/{{$user->id}}/remove"
                                                           data-toggle="tooltip"
                                                           title=""
                                                           data-original-title="Verwijder schooljaar"><i
                                                                    class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Naam</th>
                                            <th>Email</th>
                                            <th>Telefoonnummer</th>
                                            <th>Adres</th>
                                            <th>Status</th>
                                            <th>Rol</th>
                                            <th>Davinci id</th>
                                            <th></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables/base_tables_datatables.js')}}"></script>

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