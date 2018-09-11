@extends('layouts.master')

@push('style')

@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Slots inplannen
                    <small>Selecteer een periode waarvan je slots wilt inplannen</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Slots</li>
                    <li><a class="link-effect" href="">Slots inplannen</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content col-lg-3">
        <div class="block block-bordered">
            <div class="block-header bg-gray-lighter">
                <h3 class="block-title">Selecteer een periode</h3>
            </div>
            <div class="block-content remove-padding-t">
                <div class="table-responsive">
                    <table class="js-table-sections table table-hover">
                        <thead>
                        <tr>
                            <th style="width: 30px;"></th>
                            <th colspan="3">Maak een keuze</th>
                        </tr>
                        </thead>
                        @foreach($schoolyears as $schoolyear)
                            <tbody class="js-table-sections-header">

                            <tr>
                                <td class="text-center">
                                    <i class="fa fa-angle-right"></i>
                                </td>
                                <td class="font-w600" colspan="3">{{$schoolyear->schooljaar}}</td>
                            </tr>
                            </tbody>
                            <tbody>
                            @foreach($schoolyear->periods as $schoolyearPeriod)
                                <tr class="cursor_hand"
                                    onclick="window.location.href='/slots/assignable/show/{{$schoolyearPeriod->id}}';">
                                    <td class="text-center"></td>
                                    <td class="font-w600">{{$schoolyearPeriod->periodenaam}}</td>
                                    <td class="hidden-xs">
                                        <small class="text-muted">{{Carbon\Carbon::parse($schoolyearPeriod->startdatum)->format('d-m-Y')}}
                                            tot {{Carbon\Carbon::parse($schoolyearPeriod->einddatum)->format('d-m-Y')}}</small>
                                    </td>
                                </tr>

                            @endforeach
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <div class="content col-lg-12">
            <div class="block block-bordered">
                <div class="block-header bg-gray-lighter">
                    @if(isset($period))
                        <h3 class="block-title">Je weergeeft de slots voor periode "{{$period->periodenaam}}"
                            <small class="pull-right">{{Carbon\Carbon::parse($period->startdatum)->format('d-m-Y')}}
                                tot {{Carbon\Carbon::parse($period->einddatum)->format('d-m-Y')}}</small>
                        </h3>
                    @else
                        <h3 class="block-title">Nog geen periode geselecteerd</h3>
                    @endif
                </div>
                <div class="block-content">
                    @if(isset($period))
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Week</th>
                                <th>Maandag</th>
                                <th>Dinsdag</th>
                                <th>Woensdag</th>
                                <th>Donderdag</th>
                                <th>Vrijdag</th>
                                <th>Zaterdag</th>
                                <th>Zondag</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($calendarweeks as $wk)
                            <tr>
                                <td>{{$wk}}</td>

                                @foreach($weekdays as $wd)
                                    <td>

                                    @foreach($slots as $slot)
                                        @if( $slot->Weeknumber==$wk && $slot->Daynumber==$wd)
                                            <li>{{ $slot->datum->format('d-m-Y') }}</li>
                                        @endif
                                    @endforeach
                                    </td>
                                @endforeach()
                            </tr>
                            @endforeach


                            </tbody>
                        </table>
                    @else
                        <h3 class="block-title">Selecteer eerst links een periode</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        jQuery(function () {
            App.initHelpers(['table-tools']);
        });
    </script>
@endpush
