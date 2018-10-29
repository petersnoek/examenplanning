<div class="block block-themed animated">
    <div class="block-header bg-success">
        <h3 class="block-title">Schooljaren beheren</h3>
    </div>
    <div class="table-responsive">
        <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer block-content">
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-bordered table-striped js-dataTable-full-pagination dataTable no-footer"
                           id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                        <thead>
                        <tr role="row">
                            <th class="hidden-xs text-center sorting_asc" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label=": activate to sort column descending" style="width: 104px;">Id</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1"
                                aria-label="Name: activate to sort column ascending" style="width: 402px;">Schooljaar
                            </th>
                            <th class="hidden-xs sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="Email: activate to sort column ascending"
                                style="width: 551px;">
                                Periode
                            </th>
                            <th class="text-center sorting_disabled" style="width: 137px;" rowspan="1"
                                colspan="1"
                                aria-label="Actions">Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schoolyears as $schoolyear)
                            <tr role="row" class="odd">
                                <td class="hidden-xs text-center sorting_1 col-xs-1">{{$schoolyear->id}}</td>
                                <td class="font-w600 col-xs-3">{{$schoolyear->schooljaar}}</td>
                                <td class="hidden-xs text-wrap col-xs-5">{{Carbon\Carbon::parse($schoolyear->startdatum)->format('d-m-Y')}} tot {{Carbon\Carbon::parse($schoolyear->einddatum)->format('d-m-Y')}}</td>
                                <td class="text-center col-xs-1">
                                    <div class="btn-group">
                                        <a class="btn btn-xs btn-default" href="/schoolyears/{{$schoolyear->id}}/edit" data-toggle="tooltip"
                                           title=""
                                           data-original-title="Bewerk schooljaar"><i class="fa fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-xs btn-default" href="/schoolyears/{{$schoolyear->id}}/remove" data-toggle="tooltip"
                                           title=""
                                           data-original-title="Verwijder schooljaar"><i class="fa fa-times"></i>
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