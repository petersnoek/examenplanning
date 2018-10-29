@extends('layouts.master')
@push('style')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/fullcalendar/fullcalendar.min.css')}}">

    <link rel="stylesheet"
          href="{{asset('assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet"
          href="{{asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/select2-bootstrap.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Beheer uw afspraken en examens
                    <small>Hier kunt u uw afspraken en examenmomenten inzien en beheren</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Afspraken</li>
                    <li><a class="link-effect" href="">Afspraken beheren</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <div class="col-md-4 col-md-push-8 col-lg-4 col-lg-push-8 push-15-t">
        <!-- Add Event Form -->
        {{--class=js-form-add-event--}}
        <div class="block block-bordered">
            <div class="block-header bg-gray-lighter">
                <h3 class="block-title">Afspraken maken</h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" action="/appointments" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group form-material col-lg-12">
                                <label for="titel">Titel</label>
                                <input id="titel" type="text"
                                       class="form-control{{ $errors->has('titel') ? ' is-invalid' : '' }}" name="titel"
                                       placeholder="Vul afspraaktitel in..." required autofocus>
                            </div>
                            @if ($errors->has('titel'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('titel') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-material col-lg-6">
                            <div class="js-datetimepicker form-material input-group date" data-show-today-button="true"
                                 data-show-clear="true" data-show-close="true" data-side-by-side="true">
                                <label for="example-datetimepicker8">Startdatum</label>
                                <input class="form-control" type="text" id="example-datetimepicker8"
                                       name="start" placeholder="Kies een startdatum...">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                        <div class="form-material col-lg-6">
                            <div class="js-datetimepicker form-material input-group date" data-show-today-button="true"
                                 data-show-clear="true" data-show-close="true" data-side-by-side="true">
                                <label for="example-datetimepicker8">Einddatum</label>
                                <input class="form-control" type="text" id="example-datetimepicker8"
                                       name="eind" placeholder="Kies een einddatum...">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="css-input switch switch-sm switch-primary">
                            <input name="hele_dag" type="checkbox"><span></span> Gehele dag?
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="form-material">
                                <input class="js-colorpicker form-control colorpicker-element" type="text"
                                       id="example-colorpicker5" name="hex_color" value="#5c90d2">
                                <label for="example-colorpicker5">Kies een kleur</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tag_list">Genodigden</label>
                        <select id="tag_list" name="genodigden" class="form-control col-lg-12" multiple>
                            @foreach($contacts as $contact)
                                <option value="{{$contact->email}}">{{$contact->voornaam}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-material">
                        <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i></button>
                    </div>

                </form>
            </div>
        </div>

        <!-- END Add Event Form -->

        <!-- Event List -->
        <ul class="js-events list events list-events">
            @foreach($appointments as $appointment)
                <li class="animated fadeInDown ui-draggable ui-draggable-handle input-group">
                    <span class="js-add-event" type="text" name="titel"
                          placeholder="Afspraak aanmaken...">{{$appointment->titel}}</span>
                    <div class="input-group-btn">
                        <a class="btn" type="submit" href="/appointments/{{ $appointment->id }}/remove"><i
                                    class="fa fa-times"></i></a>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="text-center text-muted">
            <small><em><i class="fa fa-arrows"></i>Sleep de afspraken op de kalender en laat ze los</em></small>
        </div>
        <!-- END Event List -->
    </div>

    <div class="col-md-8 col-md-pull-4 col-lg-8 col-lg-pull-4">
        <!-- Calendar Container -->
        <div class="js-calendar fc fc-unthemed fc-ltr push-15-t">

        </div>
    </div>

    <div class="colorpicker dropdown-menu colorpicker-right colorpicker-hidden" style="top: 1794px; left: 1416.45px;">
        <div class="colorpicker-saturation" style="background-color: rgb(0, 112, 255);"><i
                    style="top: 17.6471px; left: 56.1905px;"><b></b></i></div>
        <div class="colorpicker-hue"><i style="top: 40.678px;"></i></div>
        <div class="colorpicker-alpha" style="background-color: rgb(92, 144, 210);"><i style="top: 0px;"></i></div>
        <div class="colorpicker-color" style="background-color: rgb(92, 144, 210);">
            <div style="background-color: rgb(92, 144, 210);"></div>
        </div>
        <div class="colorpicker-selectors"></div>
    </div>

@endsection

@push('scripts')
    <script src="{{asset('assets/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/fullcalendar/gcal.min.js')}}"></script>

    <script src="{{asset('assets/js/calenders/base_comp_calendar.js')}}"></script>

    {{--datetimepicker--}}
    <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>

    {{--colorpicker--}}
    <script src="{{asset('assets/js/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>

    {{--pick many--}}
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>

    <script>
        jQuery(function () {
            // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs + AutoNumeric plugins)
            App.initHelpers(['datetimepicker', 'colorpicker', 'select2 ' ]);
        });
    </script>

    <script>
        $('#tag_list').select2({
            placeholder: "Typ een naam...",
            minimumInputLength: 1,
        });
    </script>
@endpush
