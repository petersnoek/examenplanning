@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/select2-bootstrap.min.css')}}">
@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Examens
                    <small>Aanmaken</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Examens</li>
                    <li><a class="link-effect" href="">Aanmaken</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content">
        <h2 class="content-heading">Examens aanmaken</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-content">
                        <form class="form-horizontal push-10-t push-10" action="/exams"
                              method="post">
                            @csrf
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <select class="js-select2 form-control select2-hidden-accessible"
                                                id="student" name="students[]"
                                                style="width: 100%;" data-placeholder="Kies student"
                                                tabindex="-1" aria-hidden="true" required>
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach($students as $student)
                                                <option value="{{$student->id}}">{{$student->achternaam . ', ' . $student->voornaam . ' ' . $student->tussenvoegsel . ' (' . $student->davinci_id . ')'}}</option>
                                            @endforeach
                                        </select>
                                        <label for="student">Naam van student</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <select class="form-control" id="kwalificatiedossier"
                                                name="kwalificatiedossier" size="1">
                                            @foreach($kwalificatiedossiers as $kwalificatiedossier)
                                                <option value="{{$kwalificatiedossier->id}}">{{$kwalificatiedossier->crebo}}</option>
                                            @endforeach
                                        </select>
                                        <label for="pvb">Crebo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <select class="form-control" id="pvb"
                                                name="pvb" size="1">
                                            {{--@foreach($pvbs as $pvb)--}}
                                            {{--<option value="{{$pvb->id}}">{{$pvb->kerntaak}}</option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                        <label for="pvb">Proeve van Bekwaamheid</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                                <textarea class="form-control" id="opmerking" name="opmerking"
                                                          rows="7" placeholder="Schrijf een opmerking"></textarea>
                                        <label for="contact2-msg">Opmerking</label>
                                    </div>
                                    <div class="help-block text-right">
                                        Vul hier een opmerking in betreffende het examen.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-sm btn-info" type="submit"><i
                                                class="fa fa-send push-5-r"></i> Maak examen aan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        jQuery(function () {
            App.initHelpers(['select2']);
        });

        $('#kwalificatiedossier').change(function () {
            getPvbs();
        });
        $(document).ready(function () {
            getPvbs();
            $("#tags").select2({
                maximumSelectionLength: 3
            });
        });

        function getPvbs() {
            if ($("#kwalificatiedossier").val() != '') {
                $.ajax({
                    url: '/getPvbs/' + $("#kwalificatiedossier").val(),
                    type: 'GET',
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.fail) {
                            alert(data.message.error);
                            console.log(data.message.message);
                        }
                        else {
                            $('#pvb').empty();
                            data.message.pvbs.forEach(function (element) {
                                $('#pvb')
                                    .append($("<option></option>")
                                        .attr("value", element.id)
                                        .text(element.kerntaak));
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            }
            else {
                $('#pvb').empty();
            }
        }
    </script>
@endpush