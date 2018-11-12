@extends('layouts.master')

@push('style')

@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Bedrijf
                    <small>Aanpassen</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Bedrijf</li>
                    <li><a class="link-effect" href="">Aanpassen</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content">
        <h2 class="content-heading">Maak bedrijf aan</h2>
        <div class="block">
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10"
                      action="/companies"
                      method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material input-group">
                                        <input class="form-control" type="text" id="naam"
                                               name="naam"
                                               placeholder="Naam..." required>
                                        <label for="crebonr">Naam</label>
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
                                <div class="col-xs-4">
                                    <div class="form-material input-group">
                                        <input class="form-control {{ $errors->has('straat') ? ' is-invalid' : '' }}"
                                               type="text" id="straat" name="straat"
                                               placeholder="Vul straat in..."
                                               required>
                                        <label for="straat">Straat</label>
                                        <span class="input-group-addon"><i class="si si-pointer"></i></span>
                                    </div>
                                    @if ($errors->has('straat'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('straat') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-material input-group">
                                        <input class="form-control {{ $errors->has('huisnummer') ? ' is-invalid' : '' }}"
                                               type="text" id="huisnummer" name="huisnummer"
                                               placeholder="Vul huisnummer in..."
                                               required>
                                        <label for="huisnummer">Huisnummer</label>
                                        <span class="input-group-addon"><i class="si si-pointer"></i></span>
                                    </div>
                                    @if ($errors->has('huisnummer'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('huisnummer') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-xs-4">
                                    <div class="form-material input-group">
                                        <input class="form-control {{ $errors->has('toevoeging') ? ' is-invalid' : '' }}"
                                               type="text" id="toevoeging" name="toevoeging"
                                               placeholder="Vul toevoeging in..."
                                               >
                                        <label for="toevoeging">Toevoeging</label>
                                        <span class="input-group-addon"><i class="si si-pointer"></i></span>
                                    </div>
                                    @if ($errors->has('toevoeging'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('toevoeging') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-4">
                                    <div class="form-material input-group">
                                        <input class="form-control {{ $errors->has('postcode') ? ' is-invalid' : '' }}"
                                               type="text" id="postcode" name="postcode"
                                               placeholder="Vul je postcode in..."
                                               required>
                                        <label for="postcode">Postcode</label>
                                        <span class="input-group-addon"><i class="si si-pointer"></i></span>
                                    </div>
                                    @if ($errors->has('postcode'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-xs-8">
                                    <div class="form-material input-group">
                                        <input class="form-control {{ $errors->has('plaats') ? ' is-invalid' : '' }}"
                                               type="text" id="plaats" name="plaats"
                                               placeholder="Vul je plaats in..."
                                               required>
                                        <label for="plaats">Plaats</label>
                                        <span class="input-group-addon"><i class="si si-pointer"></i></span>
                                    </div>
                                    @if ($errors->has('plaats'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('plaats') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material input-group">
                                        <input class="form-control {{ $errors->has('land') ? ' is-invalid' : '' }}"
                                               type="text" id="land" name="land"
                                               placeholder="Vul je land in..."
                                               required>
                                        <label for="land">Land</label>
                                        <span class="input-group-addon"><i class="si si-pointer"></i></span>
                                    </div>
                                    @if ($errors->has('land'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('land') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <div class="form-material input-group">
                                        <input class="form-control" type="text" id="example-daterange1"
                                               name="sector"
                                               placeholder="Sector"
                                               required>
                                        <label for="example-daterange1">Sector</label>
                                        <span class="input-group-addon"><i class="si si-pie-chart"></i></span>
                                    </div>
                                    @if ($errors->has('sector'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('sector') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="col-xs-6">
                                    <div class="form-material input-group">
                                        <input class="form-control" type="text" id="website"
                                               name="website"
                                               placeholder="Website..."
                                               >
                                        <label for="vanaf_cohort">Website</label>
                                        <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>
                                    </div>
                                    @if ($errors->has('website'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-success" type="submit"><i
                                                class="fa fa-plus push-5-r"></i>
                                        Maak company aan
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

@endpush