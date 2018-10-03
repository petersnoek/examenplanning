@push('style')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.css')}}">
@endpush

<div class="block block-themed">
    <div class="block-header bg-success">
        <h3 class="block-title">Examens inzien</h3>
    </div>
    <div class="table-responsive">
        <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer block-content">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-striped js-dataTable-full-pagination dataTable no-footer"
                           id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                        <thead>
                        <tr role="row">
                            <th class="text-center sorting_asc" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label=": activate to sort column descending" style="width: 104px;"></th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1"
                                aria-label="Name: activate to sort column ascending" style="width: 402px;">Kerntaak
                            </th>
                            <th class="sorting hidden-xs sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="Email: activate to sort column ascending"
                                style="width: 551px;">
                                Email
                            </th>
                            <th class="sorting hidden-xs sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="OV-nummer: activate to sort column ascending"
                                style="width: 551px;">
                                OV-nummer
                            </th>
                            <th class="sorting text-center sorting_disabled" style="width: 137px;" rowspan="1"
                                colspan="1"
                                aria-label="Actions">Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allExams as $exam)
                            <tr role="row" class="odd">
                                <td class="text-center sorting_1">{{$exam->id}}</td>
                                <td class="font-w600 sorting_1">{{$exam->proevevanbekwaamheids->kerntaak}}</td>
                                <td class="sorting_1">{{$exam->slots}}</td>
                                <td class="sorting_1">{{$exam->}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-xs btn-default" href="/students/{{$exam->id}}/edit"
                                           data-toggle="tooltip"
                                           title=""
                                           data-original-title="Bewerk student"><i class="fa fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-xs btn-default" href="/students/{{$exam->id}}/remove"
                                           data-toggle="tooltip"
                                           title=""
                                           data-original-title="Verwijder student"><i class="fa fa-times"></i>
                                        </a>
                                    </div>
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

@push('scripts')
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables/base_tables_datatables.js')}}"></script>
@endpush