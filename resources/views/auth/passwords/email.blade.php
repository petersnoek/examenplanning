@extends('layouts.landing.master')

@section('content')
    <div class="col-lg-4 col-lg-push-4 push-30-t animated @if ($errors->has('email')) shake @else bounceInLeft @endif">
        <!-- Material Lock -->
        <div class="block block-themed">
            <div class="block-header bg-danger">
                <h3 class="block-title">Wachtwoord reset mail versturen</h3>
            </div>
            <div class="block-content">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal push-10" method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material input-group">
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" id="email" name="email"  placeholder="Vul je email in..." required autofocus>
                                <label for="email">Email</label>
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
                            <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-send push-5-r"></i>Stuur wachtwoord reset link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Material Lock -->
    </div>
@endsection
