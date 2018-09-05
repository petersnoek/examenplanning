@push('style')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/select2-bootstrap.min.css')}}">
@endpush
<div class="col-lg-9">
    <div class="content col-lg-12">
        <div class="block block-bordered">
            <div class="block-header bg-gray-lighter">
                @if(isset($period))
                    <h3 class="block-title">Je maakt slots aan voor periode "{{$period->periodenaam}}" <small class="pull-right">{{Carbon\Carbon::parse($period->startdatum)->format('d-m-Y')}}
                            tot {{Carbon\Carbon::parse($period->einddatum)->format('d-m-Y')}}</small></h3>
                @else
                    <h3 class="block-title">Nog geen period geselecteerd</h3>
                @endif
            </div>
            <div class="block-content">
                @if(isset($period))
                    <form class="form-horizontal push-10-t push-10 form-material" action="/slots/addtoperiod/{{$period->id}}"
                          method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-4">
                                        <label for="dagen">Selecteer dagen</label>
                                        <select class="js-select2 form-control select2-hidden-accessible"
                                                id="dagen" name="dagen[]"
                                                style="width: 100%;" data-placeholder="Kies dag(en)" multiple=""
                                                tabindex="-1" aria-hidden="true">
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            <option value="{{Carbon\Carbon::MONDAY}}">Maandag</option>
                                            <option value="{{Carbon\Carbon::TUESDAY}}">Dinsdag</option>
                                            <option value="{{Carbon\Carbon::WEDNESDAY}}">Woensdag</option>
                                            <option value="{{Carbon\Carbon::THURSDAY}}">Donderdag</option>
                                            <option value="{{Carbon\Carbon::FRIDAY}}">Vrijdag</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="col-xs-6">
                                            <label for="starttijd">Selecteer starttijd</label>
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <input class="form-control input-lg" type="text" id="starttijd"
                                                       name="starttijd" placeholder="">
                                                <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <label for="eindtijd">Selecteer eindtijd</label>
                                            <div class="input-group bootstrap-timepicker timepicker ">
                                                <input class="form-control input-lg" type="text" id="eindtijd"
                                                       name="eindtijd" placeholder="">
                                                <span class="input-group-addon"><i
                                                            class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </div>
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
    <div class="content col-lg-12">
        <div class="block block-bordered">
            <div class="block-header bg-gray-lighter">
                @if(isset($period))
                    <h3 class="block-title">Alle slots voor periode "{{$period->periodenaam}}"</h3>
                @else
                    <h3 class="block-title">Nog geen period geselecteerd</h3>
                @endif
            </div>
            <div class="block-content">
                @if(isset($period))
                    @include('slots.showall')
                @else
                    <h3 class="block-title">Selecteer eerst links een periode</h3>
                @endif
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    <script src="{{asset('assets/js/slots/create_slots.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        $('#starttijd').timepicker();
        $('#eindtijd').timepicker();
        jQuery(function () {
            App.initHelpers(['select2', 'datepicker']);
        });
    </script>
@endpush