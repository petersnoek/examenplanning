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
                                        <select class="form-control" id="student"
                                                name="student" size="1">
                                            @foreach($students as $student)
                                                <option value="{{$student->id}}">{{$student->achternaam . ", " . $student->voornaam . " " . $student->tussenvoegsel . " (" . $student->davinci_id . ")" }} </option>
                                            @endforeach
                                        </select>
                                        <label for="student">Naam van student</label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <select class="form-control" id="schoolyear"
                                                name="schoolyear" size="1">
                                            @foreach($schoolyears as $schoolyear)
                                                <option value="{{$schoolyear->id}}">{{$schoolyear->schooljaar}}</option>
                                            @endforeach
                                        </select>
                                        <label for="pvb">Schooljaar</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <select class="form-control" id="pvb"
                                                name="pvb" size="1">
                                            @foreach($pvbs as $pvb)
                                                <option value="{{$pvb->id}}">{{$pvb->kerntaak}}</option>
                                            @endforeach
                                        </select>
                                        <label for="pvb">Proeve van Bekwaamheid</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="kts">Selecteer KT's</label>
                                    <select class="js-select2 form-control select2-hidden-accessible"
                                            id="kerntaken" name="kts[]"
                                            style="width: 100%;" data-placeholder="Kies KT's" multiple=""
                                            tabindex="-1" aria-hidden="true" required>
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        {{--@foreach($kerntaken as $kerntaak)--}}
                                            {{--<option value="{{$kerntaak->id}}">{{$kerntaak->name . " (" . $kerntaak->identifier . ")"}}</option>--}}
                                        {{--@endforeach--}}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                                <textarea class="form-control" id="opmerking" name="opmerking"
                                                          rows="7" placeholder="Schrijf een opmerking"></textarea>
                                        <label for="contact2-msg">Opmerking</label>
                                    </div>
                                    <div class="help-block text-right">Feel free to use common tags: &lt;blockquote&gt;,
                                        &lt;strong&gt;, &lt;em&gt;
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

        $('#pvb').change(function () {
            //ajax call to fetch selected pvb and its kerntaken
            //fill the select of kerntaken
        });
        $('#schoolyear').change(function () {
            //ajax call to fetch selected schoolyear and its proevevanbekwaamheid
            //fill the select of proevevanbekwaamheid
        });
    </script>
@endpush