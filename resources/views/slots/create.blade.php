@extends('layouts.master')

@push('style')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/select2-bootstrap.min.css')}}">
@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Slots
                    <small>Aanmaken</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Slots</li>
                    <li><a class="link-effect" href="">Aanmaken</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content">
        <h2 class="content-heading">
            Maak slots aan voor periode "{{$period->periodenaam}}" - {{$period->schoolyear->schooljaar}}
        </h2>
        <div class="block">
            <div class="block-content">
                @if(isset($period))
                    <form class="form-horizontal push-10-t push-10 form-material"
                          action="/slots/addtoperiod/{{$period->id}}"
                          method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="dagen">Selecteer dagen</label>
                                        <select class="js-select2 form-control select2-hidden-accessible"
                                                id="dagen" name="dagen[]"
                                                style="width: 100%;" data-placeholder="Kies dag(en)" multiple=""
                                                tabindex="-1" aria-hidden="true" required>
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            <option value="{{Carbon\Carbon::MONDAY}}">Maandag</option>
                                            <option value="{{Carbon\Carbon::TUESDAY}}">Dinsdag</option>
                                            <option value="{{Carbon\Carbon::WEDNESDAY}}">Woensdag</option>
                                            <option value="{{Carbon\Carbon::THURSDAY}}">Donderdag</option>
                                            <option value="{{Carbon\Carbon::FRIDAY}}">Vrijdag</option>
                                        </select>
                                        @if ($errors->has('dagen'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dagen') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="col-lg-6">
                                            <label for="starttijd">Selecteer starttijd</label>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input class="form-control input-lg" type="text" id="starttijd"
                                                       name="starttijd" placeholder="" required>
                                                <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                            @if ($errors->has('starttijd'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('starttijd') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="eindtijd">Selecteer eindtijd</label>
                                            <div class="input-group bootstrap-timepicker timepicker ">
                                                <input class="form-control input-lg" type="text" id="eindtijd"
                                                       name="eindtijd" placeholder="" required>
                                                <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="input-group">
                                            <label for="eyes">Aantal simultane slots</label>
                                            <input class="form-control input-lg" type="number" id="aantal" name="aantal"
                                                   placeholder="Min: 1"
                                                   min="1" required/>
                                        </div>
                                        @if ($errors->has('aantal'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('aantal') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label class="css-input switch switch-success">
                                            <input type="checkbox" checked="checked" id="herhaal"
                                                   name="gehele_periode"><span></span> Herhaal over de gehele periode?
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" id="moreOptions">

                            </div>
                            @if ($errors->has('datum'))
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('datum') }}</strong>
                                            </span>
                            @endif
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
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-default" type="submit"><i class="fa fa-plus push-5-r"></i>
                                    Maak slot(s) aan
                                </button>
                            </div>
                        </div>
                    </form>

                @else
                    <h3 class="block-title">Selecteer eerst links een periode</h3>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    <script src="{{asset('assets/js/slots/create_slots.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $('#starttijd').timepicker();
        $('#eindtijd').timepicker();
        jQuery(function () {
            App.initHelpers(['select2', 'datepicker, table-tools']);
        });
    </script>
@endpush


