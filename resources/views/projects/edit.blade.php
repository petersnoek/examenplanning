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
                    Projecten
                    <small>Aanpassen</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Projecten</li>
                    <li><a class="link-effect" href="">Aanpassen</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content">
        <h2 class="content-heading">Pas {{$project->naam}} aan</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-content">
                        <form class="form-horizontal push-10-t push-10" action="/projects/{{$project->id}}"
                             method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="form-material">
                                        <select class="js-select2 form-control select2-hidden-accessible"
                                                id="example2-select2" name="bedrijf" style="width: 100%;"
                                                data-placeholder="Kies een bedrijf..." tabindex="-1"
                                                aria-hidden="true" required size="1">
                                            <option></option>
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}" {{$project->company->id == $company->id ? 'selected=""' : ''}}>{{$company->naam}}</option>
                                            @endforeach
                                        </select>
                                        <span class="select2 select2-container select2-container--default select2-container--below select2-container--focus"
                                              dir="ltr" style="width: 100%;">
                                                <span class="selection">

                                                </span>
                                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                                        </span>
                                        <label for="example2-select2">Kies een bedrijf</label>
                                        @if ($errors->has('bedrijf'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bedrijf') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material input-group">
                                        <input class="form-control" type="text" id="naam"
                                               name="naam"
                                               placeholder="Projectnaam..." required value="{{$project->naam}}">
                                        <label for="crebonr">Projectnaam</label>
                                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                    </div>
                                    @if ($errors->has('naam'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('naam') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <button class="btn btn-sm btn-success" type="submit"><i
                                                class="fa fa-plus push-5-r"></i>Maak
                                        project aan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('revisionable.history_feed', ['histories' => $project->revisionHistory->reverse()])
    </div>

@endsection

@push('scripts')
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        jQuery(function () {
            // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs + AutoNumeric plugins)
            App.initHelpers(['select2']);
        });
    </script>
@endpush