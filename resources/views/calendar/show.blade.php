@extends('layouts.master')
@push('style')

@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Afspraken voor {{$loggedInUser->achternaam . ", " . $loggedInUser->voornaam . " " . $loggedInUser->tussenvoegsel}}
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
        @foreach($exams as $exam)
            <div class="col-lg-6">
                <div class="block block-bordered">
                    <div class="block-header">
                        <h3 class="block-title">{{ $exam->proevevanbekwaamheids->kerntaak}} - Je neemt deel als {{$exam->pivot->user_role}}</h3>
                    </div>
                    <div class="block-content">
                        <div class="pull-r-l pull-t push">
                            <table class="block-table text-center bg-gray-lighter border-b">
                                <tbody>
                                <tr>
                                    <td class="border-r" style="width: 50%;">
                                        <div><i class="fa fa-fw fa-4x fa-calendar push-5-r"></i></div>
                                        <div class="h5 text-muted text-uppercase push-5-t">{{\Carbon\Carbon::parse($exam->slots->datum)->format('d-m-Y')}}</div>
                                    </td>
                                    <td class="border-r" style="width: 50%;">
                                        <div><i class="fa fa-fw fa-4x fa-clock-o push-5-r"></i></div>
                                        <div class="h5 text-muted text-uppercase push-5-t">{{\Carbon\Carbon::parse($exam->slots->starttijd)->format('H:i') . '-' . \Carbon\Carbon::parse($exam->slots->eindtijd)->format('H:i')}}</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="list-group">
                            <div class="list-group-item active" href="#">
                                <span class="badge">{{$invitees = \App\User::whereHas("exams", function($q) use ($exam){
                                $q->where("exams.id","=", $exam->id);
                                })->count()}}</span>
                                <i class="fa fa-fw fa-user push-5-r"></i> Genodigden
                            </div>
                            @foreach(\App\User::whereHas("exams", function($q) use ($exam){
                                $q->where("exams.id","=", $exam->id);
                                })->get() as $invitee)
                                <a class="list-group-item" href="#">
                                    <i class="fa fa-fw fa-address-card push-5-r"></i> <span @if($invitee->id == $loggedInUser->id) class="text-success" @endif>{{$invitee->achternaam . ", " . $invitee->voornaam . " " . $invitee->tussenvoegsel}}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@push('scripts')

@endpush
