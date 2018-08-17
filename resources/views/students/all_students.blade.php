<div class="block block-themed">
    <div class="block-header bg-success">
        <h3 class="block-title">Studenten beheren</h3>
    </div>
    <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer block-content">
        <div class="row">
            <div class="col-sm-2">
                <div class="dataTables_length" id="DataTables_Table_2_length"><label><select
                                name="DataTables_Table_2_length" aria-controls="DataTables_Table_2"
                                class="form-control">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select></label></div>
            </div>
            <div class="col-sm-10">
                <div id="DataTables_Table_2_filter" class="dataTables_filter">
                    <label class="pull-right">Search:<input type="search"
                                                            class="form-control push-5-l"
                                                            placeholder=""
                                                            aria-controls="DataTables_Table_2"></label>
                </div>
            </div>
        </div>
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
                        <th class="text-center sorting_disabled" style="width: 137px;" rowspan="1"
                            colspan="1"
                            aria-label="Actions">Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr role="row">
                            <td class="text-center sorting_1">{{$student->id}}</td>
                            <td class="font-w600">{{$student->voornaam . " "}}  @if($student->tussenvoegsel !=null) {{$student->tussenvoegsel . " "}} @endif {{$student->achternaam }}</td>
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
        <div class="row">
            <div class="col-sm-6">
                <div class="dataTables_info" id="DataTables_Table_2_info" role="status" aria-live="polite">
                    Showing
                    <strong>1</strong>-<strong>10</strong> of <strong>30</strong></div>
            </div>
            <div class="col-sm-6">
                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_2_paginate">
                    <ul class="pagination">
                        <li class="paginate_button first disabled" aria-controls="DataTables_Table_2"
                            tabindex="0"
                            id="DataTables_Table_2_first"><a href="#">First</a></li>
                        <li class="paginate_button previous disabled" aria-controls="DataTables_Table_2"
                            tabindex="0" id="DataTables_Table_2_previous"><a href="#"><i
                                        class="fa fa-angle-left"></i></a></li>
                        <li class="paginate_button active" aria-controls="DataTables_Table_2" tabindex="0">
                            <a
                                    href="#">1</a></li>
                        <li class="paginate_button " aria-controls="DataTables_Table_2" tabindex="0"><a
                                    href="#">2</a></li>
                        <li class="paginate_button " aria-controls="DataTables_Table_2" tabindex="0"><a
                                    href="#">3</a></li>
                        <li class="paginate_button next" aria-controls="DataTables_Table_2" tabindex="0"
                            id="DataTables_Table_2_next"><a href="#"><i class="fa fa-angle-right"></i></a>
                        </li>
                        <li class="paginate_button last" aria-controls="DataTables_Table_2" tabindex="0"
                            id="DataTables_Table_2_last"><a href="#">Last</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>