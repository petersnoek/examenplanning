@extends('layouts.landing.master')

@section('content')
    <div class="col-lg-6 push-30-t col-lg-push-3 js-animation-object animated @if(!$errors->isEmpty()) shake @endif">
        <!-- Material Register -->
        <div class="block block-themed">
            <div class="block-header bg-success">
                <h3 class="block-title">Registreren</h3>
            </div>

            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" method="POST" action="{{ route('register') }}"
                      aria-label="{{ __('Register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-lg-4 col-xs-8">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('voornaam') ? ' is-invalid' : '' }}"
                                       type="text" id="voornaam" name="voornaam"
                                       placeholder="Vul je voornaam in..."
                                       autofocus required>
                                <label for="voornaam">Voornaam</label>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                            @if ($errors->has('voornaam'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('voornaam') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-lg-4 col-xs-4">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('tussenvoegsel') ? ' is-invalid' : '' }}"
                                       type="text" id="tussenvoegsel" name="tussenvoegsel"
                                       placeholder="Vul je tussenvoegsel in...">
                                <label for="tussenvoegsel">Tussenvoegsel</label>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                            @if ($errors->has('tussenvoegsel'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tussenvoegsel') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="col-lg-4 col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('achternaam') ? ' is-invalid' : '' }}"
                                       type="text" id="achternaam" name="achternaam"
                                       placeholder="Vul je achternaam in..." required>
                                <label for="achternaam">Achternaam</label>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                            @if ($errors->has('achternaam'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('achternaam') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('davinci_id') ? ' is-invalid' : '' }}"
                                       type="text" id="davinci_id" name="davinci_id"
                                       placeholder="Vul je davinci_id in..."
                                       required>
                                <label for="davinci_id">Davinci id</label>
                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                            </div>
                            @if ($errors->has('land'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('land') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       type="email" id="register2-email" name="email"
                                       placeholder="Vul je email in..."
                                       required>
                                <label for="register2-email">Email</label>
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('telefoonnummer') ? ' is-invalid' : '' }}"
                                       type="text" id="telefoonnummer" name="telefoonnummer"
                                       placeholder="Vul je telefoonnummer in..."
                                       required>
                                <label for="telefoonnummer">Telefoonnummer</label>
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            </div>
                            @if ($errors->has('telefoonnummer'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefoonnummer') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-4">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('straat') ? ' is-invalid' : '' }}"
                                       type="text" id="straat" name="straat"
                                       placeholder="Vul je straat in..."
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
                                       placeholder="Vul je huisnummer in..."
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
                                       placeholder="Vul je toevoeging in..."
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
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       type="password" id="password" name="password"
                                       placeholder="Vul je wachtwoord in..."
                                       required>
                                <label for="password">Wachtwoord</label>
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control" type="password" id="password-confirm"
                                       name="password_confirmation" placeholder="Herhaal wachtwoord..." required>
                                <label for="password-confirm">Herhaal wachtwoord</label>
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-12">Roltype</label>
                        <div class="col-xs-12">
                            <label class="radio-inline" for="example-inline-radio1">
                                <input type="radio" id="example-inline-radio1" checked="" name="role_id" value="1"> Administrator
                            </label>
                            <label class="radio-inline" for="example-inline-radio2">
                                <input type="radio" id="example-inline-radio2" name="role_id" value="2"> Examinator
                            </label>
                            <label class="radio-inline" for="example-inline-radio3">
                                <input type="radio" id="example-inline-radio3" name="role_id" value="3"> Student
                            </label>
                            <label class="radio-inline" for="example-inline-radio4">
                                <input type="radio" id="example-inline-radio4" name="role_id" value="4"> Bedrijfsmedewerker (Begeleider)
                            </label>
                            <label class="radio-inline" for="example-inline-radio5">
                                <input type="radio" id="example-inline-radio5" name="role_id" value="5"> Examencomissie
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-plus push-5-r"></i>Registreren
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Material Register -->
    </div>
@endsection
