@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.css')}}">

@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Schooljaren
                    <small>Aanpassen</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Schooljaren</li>
                    <li><a class="link-effect" href="">Aanpassen</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content">
        <h2 class="content-heading">Pas {{$schoolyear->schooljaar}} aan</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-content">
                        <form class="form-horizontal push-10-t push-10" action="/schoolyears/{{$schoolyear->id}}"
                             method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group form-material">
                                <div class="col-lg-6">
                                    <div class="form-material input-group-sm">
                                        <input class="form-control" type="text" id="material-text" name="schooljaar"
                                               placeholder="Schooljaarnaam..." value="{{$schoolyear->schooljaar}}">
                                        <label for="material-text">Schooljaarnaam</label>
                                    </div>
                                    @if ($errors->has('schooljaarnaam'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('schooljaarnaam') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group form-material">
                                <div class="col-lg-6">
                                    <div class="form-material">
                                        <div class="input-daterange input-group input-group-sm"
                                             data-date-format="dd-mm-yyyy">
                                            <input class="form-control" type="text" id="example-daterange1"
                                                   name="startdatum"
                                                   placeholder="Startdatum"
                                                   value="{{$schoolyear->startdatum->format('d-m-Y')}}">
                                            <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                            <input class="form-control" type="text" id="example-daterange2"
                                                   name="einddatum"
                                                   placeholder="Einddatum"
                                                   value="{{$schoolyear->einddatum->format('d-m-Y')}}">
                                        </div>
                                        @if ($errors->has('startdatum'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('startdatum') }}</strong>
                                            </span>
                                        @endif
                                        @if ($errors->has('einddatum'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('einddatum') }}</strong>
                                            </span>
                                        @endif
                                        <label for="example-daterange1">Periode</label>
                                    </div>
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <button class="btn btn-sm btn-warning" type="submit"><i
                                            class="fa fa-pencil push-5-r"></i>Pas
                                    schooljaar aan
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('revisionable.history_feed', ['histories' => $schoolyear->revisionHistory->reverse()])
    </div>

@endsection

@push('scripts')
    <script src="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script>
        jQuery(function () {
            // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs + AutoNumeric plugins)
            App.initHelpers(['datepicker']);
        });
    </script>
@endpush