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
                    Slots
                    <small>Select period</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Slots</li>
                    <li><a class="link-effect" href="">Select period</a></li>
                </ol>
            </div>
        </div>
    </div>

    <!-- END Page Header -->
    <div class="content col-lg-12">
        <h2 class="content-heading">
            Selecteer een slot om deze in te plannen
        </h2>
        <div class="block block-bordered">
            <div class="block-header bg-gray-lighter">
                <h3 class="block-title">Je weergeeft de slots voor periode "{{$period->periodenaam}}"
                    - {{$period->slots->count()}} slots in deze periode
                    <small class="pull-right">{{Carbon\Carbon::parse($period->startdatum)->format('d-m-Y')}}
                        tot {{Carbon\Carbon::parse($period->einddatum)->format('d-m-Y')}}</small>
                </h3>
            </div>
            <div class="block-content">
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
                                                    <div class="bg-gray-light col-lg-12 text-wrap slot text-center rounded cursor_hand"
                                                         data-toggle="modal"
                                                         data-target="#slotModal"
                                                         data-id="{{ $slot->id }}"
                                                         data-examid="{{$slot->exams->pluck('id')}}"
                                                         data-date="{{ \Carbon\Carbon::parse($slot->datum)->format('Y-m-d')}}"
                                                         data-starttijd="{{ \Carbon\Carbon::parse($slot->starttijd)->format('H:i')}}"
                                                         data-eindtijd="{{ \Carbon\Carbon::parse($slot->eindtijd)->format('H:i')}}"
                                                         data-genodigden="{{$slot->exams->isNotEmpty() && $slot->exams->first()->users->isNotEmpty() ? $slot->exams->first()->users : 'Geen genodigden'}}"
                                                    >
                                                                <span class="font-w700" data-target="slotModal">
                                                                    {{ \Carbon\Carbon::parse($slot->starttijd)->format('H:i') . "-" . \Carbon\Carbon::parse($slot->eindtijd)->format('H:i')}}
                                                                </span>
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
            </div>
        </div>
    </div>

    {{--creating the hidden modal--}}
    @include('modals.slot_modal')

@endsection

@push('scripts')

    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script>

        jQuery(function () {
            App.initHelpers(['select2']);
        });

        $(document).ready(function () {
            $("#examinatoren").select2({
                maximumSelectionLength: 2
            });
        });

        $(document).ready(function () {
            $("#examens").select2({
                maximumSelectionLength: 2
            });
        });
    </script>

    <script>
        $(function () {
            $('#slotModal').on("show.bs.modal", function (e) {
                $('#planform').attr('action', '/slots/plan/' + $(e.relatedTarget).data('id'));
                $("#slotModalDatum").html($(e.relatedTarget).data('date'));
                $("#slotModalStarttijd").html($(e.relatedTarget).data('starttijd'));
                $("#slotModalEindtijd").html($(e.relatedTarget).data('eindtijd'));

                // console.log('array is', $(e.relatedTarget).data('examid'));
                // console.log($(e.relatedTarget).data('examid').includes(1));
                // if($(e.relatedTarget).data('examid').includes(1)){
                //     console.log('examen gekoppeld aan het slot heeft id: '+ value);
                // };


                var preselected = [];
                $('#examens').select2('val', []);
                $("#examens option").each(function()
                {
                    if($(e.relatedTarget).data('examid').includes(parseInt($(this).attr('value')))){
                        preselected.push($(this).attr('value'));
                    }
                });
                //select the options that were linked with the slot
                $('#examens').select2('val', preselected);

                if($.isArray($(e.relatedTarget).data('genodigden')))
                {
                    var genodigden = "";
                    $.each($(e.relatedTarget).data('genodigden'), function( index, value ) {
                        genodigden = genodigden +  "<li>" + value.voornaam + "</li>";
                    });
                    $("#slotModalGenodigden > ul").html(genodigden);

                }
                else{
                    $("#slotModalGenodigden").html($(e.relatedTarget).data('genodigden'));
                }
            });
        });



    </script>

@endpush
