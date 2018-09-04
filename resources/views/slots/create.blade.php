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
                    <form class="form-horizontal push-10-t push-10 form-material" action="base_forms_premade.html"
                          method="post"
                          onsubmit="return false;">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-4">
                                        <label for="example2-select2-multiple">Selecteer dagen</label>
                                        <select class="js-select2 form-control select2-hidden-accessible"
                                                id="example2-select2-multiple" name="example2-select2-multiple"
                                                style="width: 100%;" data-placeholder="Choose many.." multiple=""
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
                                                       name="startijd" placeholder="">
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
                                            <input type="checkbox" checked="checked" id="gehele_dag"
                                                   name="gehele_dag"><span></span> Gehele periode?
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
                    <form class="form-horizontal push-10-t push-10 form-material" action="base_forms_premade.html"
                          method="post"
                          onsubmit="return false;">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Name</th>
                                        <th class="hidden-xs" style="width: 15%;">Access</th>
                                        <th class="text-center" style="width: 100px;">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Rebecca Gray</td>
                                        <td class="hidden-xs">
                                            <span class="label label-success">VIP</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="fa fa-times"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Roger Hart</td>
                                        <td class="hidden-xs">
                                            <span class="label label-danger">Disabled</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="fa fa-times"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>Keith Simpson</td>
                                        <td class="hidden-xs">
                                            <span class="label label-success">VIP</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="fa fa-times"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>Roger Hart</td>
                                        <td class="hidden-xs">
                                            <span class="label label-info">Business</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="fa fa-times"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td>Denise Watson</td>
                                        <td class="hidden-xs">
                                            <span class="label label-primary">Personal</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="fa fa-times"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td>Ashley Welch</td>
                                        <td class="hidden-xs">
                                            <span class="label label-info">Business</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Client"><i class="fa fa-times"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>

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