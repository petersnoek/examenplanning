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
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10%">Week</th>
                                    <th style="width: 18%">Maandag</th>
                                    <th style="width: 18%">Dinsdag</th>
                                    <th style="width: 18%">Woensdag</th>
                                    <th style="width: 18%">Donderdag</th>
                                    <th style="width: 18%">Vrijdag</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($calendarweeks as $wk)
                                    <tr>
                                        <td>{{$wk[0] . "- Week " . $wk[1]}}</td>
                                        @foreach($weekdays as $wd)
                                            <td>
                                                <b>{{$date->setISODate($wk[0], $wk[1], $wd)->format('d M')}}</b>
                                                <div class=" col-lg-12">
                                                    @foreach($slots as $slot)
                                                        @if( $slot->Weeknumber==$wk[1] && $slot->Daynumber==$wd && $slot->datum->format('Y')==$wk[0])
                                                            {{--create the slot viasually--}}
                                                            <div class="bg-gray-light col-lg-12 text-wrap slot text-center rounded cursor_hand">
                                                                <span class="font-w700" data-toggle="modal"
                                                                      data-target="#{{$slot->id}}">{{ \Carbon\Carbon::parse($slot->starttijd)->format('H:i') . "-" . \Carbon\Carbon::parse($slot->eindtijd)->format('H:i')}}</span>
                                                            </div>
                                                            {{--creating the hidden modal--}}
                                                            <div class="modal fade" id="{{$slot->id}}" tabindex="-1"
                                                                 role="dialog" aria-hidden="true"
                                                                 style="display: none;">
                                                                <div class="modal-dialog modal-dialog-popout">
                                                                    <div class="modal-content">
                                                                        <div class="block block-themed block-transparent remove-margin-b">
                                                                            <div class="block-header bg-primary-dark">
                                                                                <h3 class="block-title">{{$date->setISODate($wk[0], $wk[1], $wd)->format('d-M-Y') ." van ".\Carbon\Carbon::parse($slot->starttijd)->format('H:i') . " tot " . \Carbon\Carbon::parse($slot->eindtijd)->format('H:i')}}</h3>
                                                                            </div>
                                                                            <div class="block-content">
                                                                                <div class="block">
                                                                                    <div class="block-content block-content-full">
                                                                                        <span class="font-w600">Naam bedrijf hier - <i class="si si-envelope-open"></i> <a href="mailto:bedrijfsbegeleider@mail.com">Naam bedrijfsbegeleider</a> - <i class="si si-call-out"></i> <a href="tel:telnrbedrijfsbegeleider">Bedrijfsbegeleidertelnr</a> <br></span>
                                                                                    </div>
                                                                                    {{--creation oof map--}}
                                                                                        {{--@include('slots.location')--}}
                                                                                    <img class="img-responsive" src="{{asset('images/Full_image_placeholder.jpg')}}">
                                                                                    {{--end creation of map--}}
                                                                                    <div class="block-content block-content-full">
                                                                                        <h2 class="h4 push-10">Proeve van bekwaamheidnr/Examencode</h2>
                                                                                        <span>Genodigden</span>
                                                                                        <ul>
                                                                                            <li>Student</li>
                                                                                            <li>Bedrijfbegeleider</li>
                                                                                            <li>Examinator 1</li>
                                                                                            <li>Examinator 2</li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-sm btn-default"
                                                                                    type="button" data-dismiss="modal">
                                                                                Close
                                                                            </button>
                                                                            <button class="btn btn-sm btn-primary"
                                                                                    type="button" data-dismiss="modal">
                                                                                <i class="fa fa-check"></i> Ok
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{--{{ \Carbon\Carbon::parse($slot->starttijd)->format('H:i') . "-" . \Carbon\Carbon::parse($slot->eindtijd)->format('H:i')}}--}}
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </td>
                                        @endforeach()
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
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
