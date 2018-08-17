<div class="block block-themed">
    <div class="block-header bg-success">
        <h3 class="block-title">Studenten beheren</h3>
    </div>
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
                            aria-label="Name: activate to sort column ascending" style="width: 402px;">Name
                        </th>
                        <th class="hidden-xs sorting" tabindex="0" aria-controls="DataTables_Table_2"
                            rowspan="1"
                            colspan="1" aria-label="Email: activate to sort column ascending"
                            style="width: 551px;">
                            Email
                        </th>
                        <th class="hidden-xs sorting" tabindex="0" aria-controls="DataTables_Table_2"
                            rowspan="1"
                            colspan="1" aria-label="OV-nummer: activate to sort column ascending"
                            style="width: 551px;">
                            OV-nummer
                        </th>
                        <th class="text-center sorting_disabled" style="width: 137px;" rowspan="1"
                            colspan="1"
                            aria-label="Actions">Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr role="row" class="odd">
                            <td class="text-center sorting_1">{{$student->id}}</td>
                            <td class="font-w600">{{$student->voornaam . " " }} @if($student->tussenvoegsel != null) {{$student->tussenvoegsel . " "}} @endif {{$student->achternaam}}</td>
                            <td class="hidden-xs text-wrap">{{$student->email}}</td>
                            <td class="hidden-xs">{{$student->ovnummer}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                            title=""
                                            data-original-title="Edit Client"><i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                                            title=""
                                            data-original-title="Remove Client"><i class="fa fa-times"></i>
                                    </button>
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