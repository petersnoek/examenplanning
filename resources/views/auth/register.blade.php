@extends('layouts.landing.master')

@section('content')
    <div class="col-lg-4 push-30-t col-lg-push-4">
        <!-- Material Register -->
        <div class="block block-themed">
            <div class="block-header bg-success">
                <h3 class="block-title">Registreren</h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control" type="text" id="name" name="name" {{ $errors->has('name') ? ' is-invalid' : '' }} placeholder="Vul je naam in..." autofocus required>
                                <label for="name">Naam</label>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control" type="email" id="register2-email" name="email" {{ $errors->has('name') ? ' is-invalid' : '' }} placeholder="Vul je email in..." required>
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
                                <input class="form-control" type="password" id="password" name="password" {{ $errors->has('password') ? ' is-invalid' : '' }} placeholder="Vul je wachtwoord in..." required>
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
                                <input class="form-control" type="password" id="password-confirm" name="password_confirmation" placeholder="Herhaal wachtwoord..." required>
                                <label for="password-confirm">Herhaal wachtwoord</label>
                                <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-plus push-5-r"></i>Registreren</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Material Register -->
    </div>
@endsection
