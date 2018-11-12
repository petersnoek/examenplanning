@extends('layouts.master')
<link rel="stylesheet" href="{{asset('assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css')}}">

@push('style')

@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Kwalificatiedossier
                    <small>Aanpassen</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Kwalificatiedossier</li>
                    <li><a class="link-effect" href="">Aanpassen</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content">
        <h2 class="content-heading">Kwalificatiedossier {{$kwalificatiedossier->crebo}} ({{$kwalificatiedossier->releasedatum}})</h2>
        <div class="block">
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10"
                      action="/kwalificatiedossiers/{{$kwalificatiedossier->id}}"
                      method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="crebonr"
                                               name="crebonr"
                                               placeholder="Crebonummer..." value="{{$kwalificatiedossier->crebo}}" required>
                                        <label for="crebonr">Crebonummer</label>
                                    </div>
                                    @if ($errors->has('crebonr'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('crebonr') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <div class="input-daterange form-material"
                                             data-date-format="yyyy-mm-dd">
                                            <input class="form-control" type="text" id="example-daterange1"
                                                   name="releasedatum"
                                                   placeholder="Releasedatum"
                                                   value="{{$kwalificatiedossier->releasedatum}}" required>
                                        </div>
                                        <label for="example-daterange1">Releasedatum</label>
                                        @if ($errors->has('releasedatum'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('releasedatum') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="vanaf_cohort"
                                               name="vanaf_cohort"
                                               placeholder="Vanaf Cohort..." value="{{$kwalificatiedossier->vanaf_cohort}}" required>
                                        <label for="vanaf_cohort">Vanaf cohort</label>
                                    </div>
                                    @if ($errors->has('vanaf_cohort'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('vanaf_cohort') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-info" type="submit"><i
                                                class="fa fa-plus push-5-r"></i>
                                        Pas kwalificatiedossier aan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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