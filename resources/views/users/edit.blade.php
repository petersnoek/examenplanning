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
                    Users
                    <small>Aanpassen</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Users</li>
                    <li><a class="link-effect" href="">Aanpassen</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content">
        <h2 class="content-heading">Pas "{{$user->achternaam}}, {{$user->voornaam}} {{$user->tussenvoegsel}}" aan</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-content">
                        <form class="form-horizontal push-10-t push-10" method="POST" action="/users/{{$user->id}}"
                              aria-label="">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="col-lg-4 col-xs-8">
                                    <div class="form-material input-group">
                                        <input class="form-control {{ $errors->has('voornaam') ? ' is-invalid' : '' }}"
                                               type="text" id="voornaam" name="voornaam"
                                               placeholder="Vul je voornaam in..."
                                               autofocus required value="{{$user->voornaam}}">
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
                                               placeholder="Vul je tussenvoegsel in..."
                                               value="{{$user->tussenvoegsel}}">
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
                                               placeholder="Vul je achternaam in..." required
                                               value="{{$user->achternaam}}">
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
                                               required value="{{$user->davinci_id}}">
                                        <label for="davinci_id">Davinci id</label>
                                        <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                    </div>
                                    @if ($errors->has('davinci_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('davinci_id') }}</strong>
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
                                               required value="{{$user->email}}">
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
                                               required value="{{$user->telefoonnummer}}">
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
                                               required value="{{$user->straat}}">
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
                                               required value="{{$user->huisnummer}}">
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
                                               value="{{$user->toevoeging}}">
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
                                               required value="{{$user->postcode}}">
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
                                               required value="{{$user->plaats}}">
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
                                               required value="{{$user->land}}">
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
                                               required value="{{$user->password}}">
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
                                               name="password_confirmation" placeholder="Herhaal wachtwoord..." required
                                               value="{{$user->password}}">
                                        <label for="password-confirm">Herhaal wachtwoord</label>
                                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12">Roltype</label>
                                <div class="col-xs-12">
                                    <label class="radio-inline" for="example-inline-radio1">
                                        <input class="other_radio" type="radio" id="example-inline-radio1"
                                               @if($user->role_id == 1) checked="" @endif name="role_id" value="1">
                                        Administrator
                                    </label>
                                    <label class="radio-inline" for="example-inline-radio2">
                                        <input class="other_radio" type="radio" id="example-inline-radio2"
                                               @if($user->role_id == 2) checked="" @endif name="role_id" value="2">
                                        Examinator
                                    </label>
                                    <label class="radio-inline" for="example-inline-radio3">
                                        <input class="other_radio" type="radio" id="example-inline-radio3"
                                               @if($user->role_id == 3) checked="" @endif name="role_id" value="3">
                                        Student
                                    </label>
                                    <label class="radio-inline" for="example-inline-radio4">
                                        <input type="radio" id="example-inline-radio4"
                                               @if($user->role_id == 4) checked="" @endif name="role_id" value="4">
                                        Bedrijfsmedewerker
                                    </label>
                                    <label class="radio-inline" for="example-inline-radio5">
                                        <input class="other_radio" type="radio" id="example-inline-radio5"
                                               @if($user->role_id == 5) checked="" @endif name="role_id" value="5">
                                        Examencomissie
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 select-company">

                                </div>
                                @if ($errors->has('bedrijf'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bedrijf') }}</strong>
                                    </span>
                                @endif
                                <div class="provide-role">

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="actief">
                                        Actief?<br>
                                        <div class="css-input switch switch-success push-5-t">
                                            <input type="checkbox" checked="checked" id="actief"
                                                   name="actief"><span></span>
                                        </div>
                                    </label>
                                    @if ($errors->has('actief'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('actief') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-sm btn-info" type="submit"><i
                                                class="fa fa-pencil push-5-r"></i>Aanpassen
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('revisionable.personal_timeline', ['histories' => $user->revisionHistory->reverse()])

    </div>

@endsection

@push('scripts')
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        var data = {_token: '{{csrf_token()}}'};

        function getCompanies() {
            $.ajax({
                type: "GET",
                url: '/companies/all',
                data: data,
                success: function (data) {
                    $('.select-company').append('<div class="form-material">\n' +
                        '                                        <select class="js-select2 form-control select2-hidden-accessible"\n' +
                        '                                                id="companies" name="bedrijf" style="width: 100%;"\n' +
                        '                                                data-placeholder="Kies een bedrijf..." tabindex="-1"\n' +
                        '                                                aria-hidden="true">\n' +
                        '                                            <option></option>\n' +
                        '                                        </select>\n' +
                        '                                        <span class="select2 select2-container select2-container--default select2-container--below select2-container--focus"\n' +
                        '                                              dir="ltr" style="width: 100%;">\n' +
                        '                                                <span class="selection">\n' +
                        '\n' +
                        '                                                </span>\n' +
                        '                                            <span class="dropdown-wrapper" aria-hidden="true"></span>\n' +
                        '                                        </span>\n' +
                        '                                        <label for="example2-select2">Kies een bedrijf</label>\n' +
                        '                                    </div>');

                    $('.provide-role').append('<div class="col-lg-12 col-xs-12">\n' +
                        '                                    <div class="form-material input-group">\n' +
                        '                                        <input class="form-control"\n' +
                        '                                               type="text" id="rol" name="rol"\n' +
                        '                                               placeholder="Vul je rol in..."\n' +
                        '                                               autofocus required ' +
                            {{--'                                               value="{{$user->companies()->first()->pivot->bedrijfsrol}}"'+--}}
                                '                                               >\n' +
                        '                                        <label for="rol">Rol binnen bedrijf</label>\n' +
                        '                                        <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>\n' +
                        '                                    </div>\n' +
                        '                                </div>');
                    App.initHelpers(['select2']);
                    $.each(data.msg, function (index, value) {
                        {{--if(value.id == {{$user->companies()->first()->id}})--}}
                        {{--{--}}
                        {{--$('#companies').append('<option value="' + value.id + '" selected>' + value.naam + '</option>');--}}
                        {{--}--}}
                        {{--else{--}}
                        $('#companies').append('<option value="' + value.id + '">' + value.naam + '</option>');
                        // }
                    });
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
        }

        $(document).ready(function () {
            if ($('#example-inline-radio4').is(':checked')) {
                getCompanies();
            }
        });

        $("#example-inline-radio4").change(function () {
            getCompanies();
        });

        $('.other_radio').click(function () {
            $('.select-company').empty();
            $('.provide-role').empty();
        });
    </script>
@endpush