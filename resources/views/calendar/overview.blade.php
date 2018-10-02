<table id="exams-table"></table>

@push('scripts')
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script>
        $('#exams-table').DataTable({
            processing: false,
            serverSide: false,
            ajax: '{!! route('exams:dt') !!}',
            columns: [
                {data: 'id', name: 'id'},
            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            }
        });
    </script>
@endpush