@extends('layouts.master')
@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Maak een student aan.
                    <small> Docenten kunnen hier een studentaccount aanmaken.</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Student</li>
                    <li><a class="link-effect" href="">Student aanmaken</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content col-lg-12">
        <!-- Creation -->
        <div class="block block-themed col-lg-7 remove-padding animated @if($errors->isEmpty()) bounceInLeft @else shake @endif">
            <div class="block-header bg-success">
                <h3 class="block-title">Student aanmaken</h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" action="/students" method="POST"
                      onsubmit="">
                    @csrf
                    <div class="form-group">
                        <div class="col-lg-4">
                            <div class="form-material">
                                <label for="voornaam">Voornaam</label>
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" id="voornaam" name="voornaam"
                                           placeholder="Vul de voornaam in..." required>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>

                            </div>
                            @if ($errors->has('voornaam'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('voornaam') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-lg-3">
                            <div class="form-material">
                                <label for="tussenvoegsel">Tussenvoegsel</label>
                                <div class="form-material input-group">
                                    <input class="form-control" type="text" id="tussenvoegsel" name="tussenvoegsel"
                                           placeholder="Vul tussenvoegsel in...">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-material">
                                <label for="achternaam">Achternaam</label>
                                <div class="input-group form-material">
                                    <input class="form-control" type="text" id="achternaam" name="achternaam"
                                           placeholder="Vul de achternaam in..." required>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            @if ($errors->has('achternaam'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('achternaam') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="form-material input-group">
                                <input class="form-control" type="email" id="email" name="email"
                                       placeholder="Vul het email-adres in..." required>
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
                        <div class="col-lg-12">
                            <div class="form-material">
                                <label for="adres">Adres</label>
                                <div class="form-material input-group">
                                    <input class="form-control" type="text" id="adres" name="adres"
                                           placeholder="Vul het adres in..." required>
                                    <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                </div>
                            </div>
                            @if ($errors->has('adres'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('adres') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="form-material">
                                <label for="ovnummer">OV-nummer</label>
                                <div class="form-material input-group">
                                    <input class="form-control" type="text" id="ovnummer" name="ovnummer"
                                           placeholder="Vul het OV-nummer in..." required>
                                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                </div>

                            </div>
                            @if ($errors->has('ovnummer'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ovnummer') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <div class="form-material">
                                <label>Geslacht</label>
                            </div>
                            <div>
                                <label class="css-input css-radio css-radio-warning push-10-r">
                                    <input type="radio" checked="checked" value="vrouw" name="geslacht"
                                           required><span></span>
                                    Vrouw
                                </label>
                                <label class="css-input css-radio css-radio-warning">
                                    <input type="radio" value="man" name="geslacht"><span></span> Man
                                </label>
                            </div>
                            @if ($errors->has('geslacht'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('geslacht') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-plus push-5-r"></i>Maak
                                student aan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END creation -->

        <div class="col-lg-5 animated bounceInRight">
            @include('students.all_students', ['students' => $students])
        </div>
    </div>
    <!-- END Page Content -->
@endsection