@extends('layouts.master')
@push('style')

@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Examens @if(isset($loggedInUser))
                        van {{$loggedInUser->achternaam . ", " . $loggedInUser->voornaam . " " . $loggedInUser->tussenvoegsel}} @endif
                    <small>Hier kunt u alle examens inzien</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Agenda</li>
                    <li><a class="link-effect" href="">Overzicht Examens</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <div class="content">
        @if(in_array(Auth::user()->role_id, [1,2]))
            <div class="row">
                <form class="col-lg-4 col-md-5 form-horizontal push-10-t push-10" action="/requestagenda" method="POST">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Zoek</button>
                        </span>
                        <input class="form-control" type="text" id="ovnummer" name="ovnummer"
                               placeholder="Ovnummer..." required>
                    </div>
                </form>
            </div>
        @endif
        <h2 class="content-heading">Examens inzien</h2>
        @include('calendar.overview')

    </div>

@endsection

@push('scripts')

@endpush
