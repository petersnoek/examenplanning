@push('style')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.css')}}">
@endpush

<div class="block block-themed">
    <div class="block-header bg-default-dark">
        <h3 class="block-title">Examens</h3>
    </div>
    <div class="table-responsive">
        <div id="DataTables_Table_2_wrapper"
             class="dataTables_wrapper form-inline dt-bootstrap no-footer block-content">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-striped js-dataTable-full-pagination_exams dataTable no-footer"
                           id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                        <thead>
                        <tr role="row">
                            <th class="hidden-xs sorting_desc" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="Id: activate to sort column descending">Id
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1"
                                aria-label="Kerntaak: activate to sort column ascending">Kerntaak
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="Aantal genodigden: activate to sort column ascending">Student
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="Aantal genodigden: activate to sort column ascending">Examinator
                            </th>
                            <th class="sorting sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="Datum: activate to sort column ascending">Datum (yyy-dd-mm)
                            </th>
                            <th class="sorting sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="Datum: activate to sort column ascending">Bedrijf
                            </th>
                            <th class="sorting sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="Tijd: activate to sort column ascending">Tijd
                            </th>
                            <th class="text-center sorting_disabled" rowspan="1"
                                colspan="1"
                                aria-label="Actions">Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allExams as $exam)
                            <tr role="row" class="odd">
                                <td class="sorting_1 hidden-xs">{{$exam->id}}</td>
                                <td class="font-w600 sorting_1">{{$exam->proevevanbekwaamheids->kerntaak}}</td>
                                <td class="sorting_1">@foreach($exam->student as $student)<a href="/agenda/{{$student->davinci_id}}/show">{{$student->davinci_id}}</a>{{" (" . $student->achternaam . ", " . $student->voornaam . " " . $exam->student->first()->tussenvoegsel . ")" }} @endforeach</td>
                                <td class="sorting_1">@foreach($exam->examinators as $examinator) <a href="/agenda/{{$examinator->davinci_id}}/show">{{$examinator->davinci_id}}</a>;@endforeach</td>
                                <td class="sorting_1">{{\Carbon\Carbon::parse($exam->slots["datum"])->format('Y-d-m'). ' (' . \Carbon\Carbon::parse($exam->slots["datum"])->format('D') . ') '}}  </td>
                                <td class="sorting_1">{{$exam->project->company->naam}}</td>
                                <td class="sorting_1">{{\Carbon\Carbon::parse($exam->slots["starttijd"])->format('H:i') . '-' . \Carbon\Carbon::parse($exam->slots["eindtijd"])->format('H:i')}}</td>
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
                        <tfoot>
                        <tr>
                            <th></th>
                            <th>Kerntaak</th>
                            <th>Examinatoren</th>
                            <th>Student</th>
                            <th>Datum</th>
                            <th>Bedrijf</th>
                            <th>Tijd</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables/base_tables_datatables.js')}}"></script>

    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#DataTables_Table_2 tfoot th').each(function () {
                var title = $(this).text();
                if (title != "") {
                    $(this).html('<input type="text" class="form-control" placeholder="Doorzoek ' + title + '" />');
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