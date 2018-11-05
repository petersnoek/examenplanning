@push('style')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.css')}}">
@endpush

@if(!$period->slots->isEmpty())
    <div class="table-responsive">
        <div id="DataTables_Table_2_wrapper"
             class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            <div class="row">
                <table class="table table-hover js-dataTable-full-pagination_custom dataTable no-footer"
                       id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
                    <thead>
                    <tr>
                        <th class="">Dag</th>
                        <th class="">Datum (jjjj-mm-dd)</th>
                        <th class="">Van-tot</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($period->slots as $slot)
                        <tr>
                            <td class="">{{$slot->datum->format('l')}}</td>
                            <td class="">{{$slot->datum->format('Y-m-d')}}</td>
                            <td class="">{{\Carbon\Carbon::parse($slot->starttijd)->format('H:i') . " tot " . \Carbon\Carbon::parse($slot->eindtijd)->format('H:i')}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-xs btn-default" href="/slots/{{$slot->id}}/remove"
                                       data-toggle="tooltip"
                                       title=""
                                       data-original-title="Verwijder slot"><i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Dag</th>
                        <th>Datum</th>
                        <th>Van-Tot</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@else
    <h4 class="h4 font-w300 push-20">Er bestaan nog geen slots voor deze periode, druk op de plus rechtsboven in dit
        blok
        om slots aan te maken.</h4>
@endif

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