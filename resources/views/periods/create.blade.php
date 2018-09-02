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
                    Beheer examenperioden
                    <small>Examinatoren kunnen hier examenperiode aanmaken</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Examens</li>
                    <li><a class="link-effect" href="">Examenperiode aanmaken</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content col-lg-12">
        <div class="col-lg-7">
            <!-- Material Register -->
            <div class="block block-themed animated @if(!$errors->isEmpty()) shake @endif">
                <div class="block-header bg-success">
                    <h3 class="block-title">Examenperioden beheren</h3>
                </div>
                <div class="block-content">


                    <form class="form-horizontal push-10-t push-10" action="/periods" method="POST">
                        @csrf
                        <div class="form-group form-material">
                            <div class="col-lg-4">
                                <div class="form-material">
                                    <select class="js-select2 form-control select2-hidden-accessible"
                                            id="example2-select2" name="schooljaar" style="width: 100%;"
                                            data-placeholder="Kies een schooljaar..." tabindex="-1" aria-hidden="true">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach ($schoolyears as $schoolyear)
                                            <option value="{{$value = $schoolyear->id}}">{{$schoolyear->schooljaar}}</option>
                                        @endforeach
                                    </select>
                                    <span class="select2 select2-container select2-container--default select2-container--below select2-container--focus"
                                          dir="ltr" style="width: 100%;">
                                                <span class="selection">

                                                </span>
                                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                                        </span>
                                    <label for="example2-select2">Kies een schooljaar</label>
                                </div>
                                @if ($errors->has('schooljaar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('schooljaar') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <div class="form-material">
                                    <div class="input-daterange input-group input-group-sm"
                                         data-date-format="dd-mm-yyyy">
                                        <input autocomplete="false" class="form-control" type="text" id="example-daterange1"
                                               name="startdatum"
                                               placeholder="Startdatum">
                                        <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                                        <input autocomplete="false" class="form-control" type="text" id="example-daterange2" name="einddatum"
                                               placeholder="Einddatum">
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
                            <div class="col-lg-4">
                                <div class="form-material input-group-sm">
                                    <input class="form-control" type="text" id="material-text" name="periodenaam"
                                           placeholder="Periodenaam...">
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
                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-plus push-5-r"></i>Maak
                                    examenperiode aan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Material Register -->
        </div>
        <div class="col-lg-5">
            @include('periods.show', ['periods' => $periods])
        </div>
    </div>

@endsection

@push('scripts')

    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

    <script src="{{asset('assets/js/datatables/base_tables_datatables.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datepickers/change_startdate.min.js')}}"></script>
    <script>
        jQuery(function () {
            // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs + AutoNumeric plugins)
            App.initHelpers(['select2', 'datepicker']);
        });


    jQuery(document).ready(function(){


    });
    </script>
@endpush