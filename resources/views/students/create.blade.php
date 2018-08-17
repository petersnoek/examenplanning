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
                    <li><a class="link-effect" href="">Aanmaken</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <!-- Creation -->
        <div class="block block-themed animated bounceInLeft">
            <div class="block-header bg-success">
                <h3 class="block-title">Student aanmaken</h3>
            </div>
            <div class="block-content">
                <form class="form-horizontal push-10-t push-10" action="/students" method="POST"
                      onsubmit="">
                    @csrf
                    <div class="form-group">
                        <div class="col-xs-2">
                            <div class="form-material">
                                <input class="form-control" type="text" id="voornaam" name="voornaam"
                                       placeholder="Vul de voornaam in..." required>
                                <label for="voornaam">Voornaam</label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-material">
                                <input class="form-control" type="text" id="tussenvoegsel" name="tussenvoegsel"
                                       placeholder="Vul het tussenvoegsel in...">
                                <label for="tussenvoegsel">Tussenvoegsel</label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-material">
                                <input class="form-control" type="text" id="achternaam" name="achternaam"
                                       placeholder="Vul de achternaam in..." required>
                                <label for="achternaam">Achternaam</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-material input-group">
                                <input class="form-control" type="email" id="email" name="email"
                                       placeholder="Vul het email-adres in..." required>
                                <label for="email">Email</label>
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-material">
                                <input class="form-control" type="text" id="adres" name="adres"
                                       placeholder="Vul het adres in..." required>
                                <label for="adres">Adres</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-material">
                                <input class="form-control" type="text" id="ovnummer" name="ovnummer"
                                       placeholder="Vul het OV-nummer in..." required>
                                <label for="ovnummer">OV-nummer</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-material">
                                <label>Geslacht</label>
                            </div>
                            <label class="css-input css-radio css-radio-warning push-10-r">
                                <input type="radio" checked="checked" value="vrouw" name="geslacht" required><span></span> Vrouw
                            </label>
                            <label class="css-input css-radio css-radio-warning">
                                <input type="radio" value="man" name="geslacht"><span></span> Man
                            </label>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-plus push-5-r"></i>Maak aan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END creation -->
    </div>
    <!-- END Page Content -->
@endsection