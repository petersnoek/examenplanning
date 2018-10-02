@extends('layouts.master')
@push('style')

@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Afspraken
                    voor {{$loggedInUser->achternaam . ", " . $loggedInUser->voornaam . " " . $loggedInUser->tussenvoegsel}}
                    <small>Hier kunt u uw afspraken en examenmomenten inzien</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Agenda</li>
                    <li><a class="link-effect" href="">Afspraken inzien</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <div class="content col-lg-12">
        @if(in_array(Auth::user()->role_id, [1,2]))
            <div class="row col-lg-12">
                <form class="col-lg-2 form-horizontal push-10-t push-10" action="/requestagenda" method="POST">
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

        @include('calendar.overview')

        {{--@forelse($exams as $exam)--}}
            {{--@include('calendar.exam')--}}
        {{--@empty--}}
            {{--@include('calendar.empty')--}}
        {{--@endforelse--}}
    </div>

@endsection

@push('scripts')

@endpush
