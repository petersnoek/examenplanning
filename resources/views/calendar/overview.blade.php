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
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1"
                                aria-label="Kerntaak: activate to sort column ascending">Kerntaak
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1"
                                aria-label="Status: activate to sort column ascending">Status
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1"
                                aria-label="Voorlopige uitslag: activate to sort column ascending">Voorlopige uitslag
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="Student: activate to sort column ascending">Student
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="Examinator: activate to sort column ascending">Examinator
                            </th>
                            <th class="sorting sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="Datum: activate to sort column ascending">Datum (yyy-mm-dd)
                            </th>
                            <th class="sorting sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="Bedrijf: activate to sort column ascending">Bedrijf
                            </th>
                            <th class="sorting sorting" tabindex="0" aria-controls="DataTables_Table_2"
                                rowspan="1"
                                colspan="1" aria-label="Plaats: activate to sort column ascending">Plaats
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
                                <td class="font-w600 sorting_1">{{$exam->proevevanbekwaamheids->kerntaak}}</td>
                                <td class="sorting_1">{{ isset($exam->status->naam) ? $exam->status->naam : '-'  }}</td>
                                <td class="sorting_1">{{$exam->voorlopige_uitslag}}</td>
                                <td class="sorting_1">@if($exam->student->first()){{$exam->student->first()->achternaam . ", " . $exam->student->first()->voornaam . " " . $exam->student->first()->tussenvoegsel}} <a href="/agenda/{{$exam->student->first()->davinci_id}}/show"> ({{$exam->student->first()->davinci_id}})</a>  @else Geen student @endif</td>
                                <td class="sorting_1">@if($exam->examinators->isNotEmpty()) @foreach($exam->examinators as $examinator) {{$examinator->achternaam . ', ' . $examinator->voornaam . ' ' . $examinator->tussenvoegsel}} <a href="/agenda/{{$examinator->davinci_id}}/show">({{$examinator->davinci_id}})</a>;<br>@endforeach @else Niet toegewezen @endif</td>
                                <td class="sorting_1">@if($exam->slots) {{\Carbon\Carbon::parse($exam->slots["datum"])->format('Y-m-d'). ' (' . \Carbon\Carbon::parse($exam->slots["datum"])->format('D') . ') '}} @else Niet gepland @endif</td>
                                <td class="sorting_1">{{ isset($exam->project->company->naam) ? $exam->project->company->naam : '-'  }}</td>
                                <td class="sorting_1">{{isset($exam->project->company->plaats) ? $exam->project->company->plaats : '-'}}</td>
                                <td class="sorting_1">{{\Carbon\Carbon::parse($exam->slots["starttijd"])->format('H:i') . '-' . \Carbon\Carbon::parse($exam->slots["eindtijd"])->format('H:i')}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-xs btn-default" href=""
                                           data-toggle="tooltip"
                                           title=""
                                           data-original-title="Bekijk examen"><i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-xs btn-default" href=""
                                           data-toggle="tooltip"
                                           title=""
                                           data-original-title="Bewerk examen"><i class="fa fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-xs btn-default" href=""
                                           data-toggle="tooltip"
                                           title=""
                                           data-original-title="Verwijder examen"><i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Kerntaak</th>
                            <th>Status</th>
                            <th>Voorlopige uitslag</th>
                            <th>Student</th>
                            <th>Examinatoren</th>
                            <th>Datum</th>
                            <th>Bedrijf</th>
                            <th>Plaats</th>
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