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
                    Beheer examens
                    <small>Examinatoren kunnen hier examens aanmaken</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Examens</li>
                    <li><a class="link-effect" href="">Examen aanmaken</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content col-lg-12">
        <div class="col-lg-7">
            <!-- Material Contact -->
            <div class="block block-themed">
                <div class="block-header bg-info">
                    <h3 class="block-title">Material</h3>
                </div>
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
                                            <option value="{{$student->id}}">{{$student->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="student">Naam van student</label>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-material">
                                    <select class="form-control" id="pvb"
                                            name="pvb" size="1">
                                        @foreach($pvbs as $pvb)
                                            <option value="{{$pvb->id}}">{{$pvb->name}}</option>
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
                                        id="kts" name="kts[]"
                                        style="width: 100%;" data-placeholder="Kies KT's" multiple=""
                                        tabindex="-1" aria-hidden="true" required>
                                    <option></option>
                                    <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach($kerntaken as $kerntaak)
                                        <option value="{{$kerntaak->id}}">{{$kerntaak->name . " (" . $kerntaak->identifier . ")"}}</option>
                                    @endforeach
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
            <!-- END Material Contact -->
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        jQuery(function () {
            App.initHelpers(['select2']);
        });
    </script>
@endpush