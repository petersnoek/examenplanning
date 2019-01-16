@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/select2-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.css')}}">

@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Perioden
                    <small>Aanpassen</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Perioden</li>
                    <li><a class="link-effect" href="">Aanpassen</a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="content">
        <h2 class="content-heading">Pas {{$period->periodenaam}} aan - ({{$period->startdatum->format('Y-m-d')}} - {{$period->einddatum->format('Y-m-d')}})</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-content">
                        <form class="form-horizontal push-10-t push-10" action="/periods/{{$period->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="form-material">
                                        <select class="js-select2 form-control select2-hidden-accessible"
                                                id="example2-select2" name="schooljaar" style="width: 100%;"
                                                data-placeholder="Kies een schooljaar..." tabindex="-1"
                                                aria-hidden="true">
                                            {{--<option></option>--}}
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach($schoolyears as $schoolyear)
                                                <option value="{{$schoolyear->id}}"
                                                        @if($schoolyear->id == $period->schoolyear_id) selected="selected" @endif>{{$schoolyear->schooljaar}} ({{$schoolyear->startdatum->format('Y-m-d')}} - {{$schoolyear->einddatum->format('Y-m-d')}})</option>
                                            @endforeach
                                        </select>
                                        <span class="select2 select2-container select2-container--default select2-container--below select2-container--focus"
                                              dir="ltr" style="width: 100%;">
                                                <span class="selection">

                                                </span>
                                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                                        </span>
                                        <label for="example2-select2">Kies een schooljaar</label>
                                        @if ($errors->has('schooljaar'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('schooljaar') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="form-material">
                                        <div class="input-daterange input-group"
                                             data-date-format="yyyy-mm-dd">
                                            <input class="form-control" type="text" id="example-daterange1"
                                                   name="startdatum"
                                                   placeholder="Startdatum"
                                                   value="{{$period->startdatum->format('Y-m-d')}}">
                                            <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                            <input class="form-control" type="text" id="example-daterange2"
                                                   name="einddatum"
                                                   placeholder="Einddatum"
                                                   value="{{$period->einddatum->format('d-m-Y')}}">
                                        </div>
                                        <label for="example-daterange1">Periode</label>
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
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="form-material input-group-sm">
                                        <input class="form-control" type="text" id="material-text" name="periodenaam"
                                               placeholder="Periodenaam..." value="{{$period->periodenaam}}">
                                        <label for="material-text">Periodenaam</label>
                                    </div>
                                    @if ($errors->has('periodenaam'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('periodenaam') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button class="btn btn-sm btn-success" type="submit"><i
                                                class="fa fa-plus push-5-r"></i>Pas
                                        examenperiode aan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('revisionable.history_feed', ['histories' => $period->revisionHistory->reverse()])
    </div>
@endsection

@push('scripts')

    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    {{--<script src="{{asset('assets/js/datepickers/change_startdate.min.js')}}"></script>--}}
    <script>
        jQuery(function () {
            // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs + AutoNumeric plugins)
            App.initHelpers(['select2', 'datepicker']);
        });
    </script>
@endpush