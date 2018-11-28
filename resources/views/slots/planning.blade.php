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
                                                         data-genodigden="{{$slot->users ? $slot->users : 'Geen genodigden'}}"
                                                         data-user="{{$slot->exams->isNotEmpty() ? $slot->exams->first()->user : ''}}"
                                                    >
                                                                <span class="font-w700" data-target="slotModal">
                                                                    {{ \Carbon\Carbon::parse($slot->starttijd)->format('H:i') . "-" . \Carbon\Carbon::parse($slot->eindtijd)->format('H:i')}}
                                                                </span>
                                                    </div>
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
                // maximumSelectionLength: 2
                multiple: true
            });
        });

        $(document).ready(function () {
            $("#examens").select2({
                // maximumSelectionLength: 2
                multiple: true
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

                $('#examens').val(null);
                $('#examinatoren').val(null).trigger('change');
                $('#examens').val($(e.relatedTarget).data('examid')).trigger('change');

                if($(e.relatedTarget).data('examid') != ""){


                //fetch all invitees
                $.ajax({
                    url: '/exams/invitees',
                    type: 'POST',
                    data: {message:$(e.relatedTarget).data('examid'), _token: '{{csrf_token()}}'},
                    success: function (data) {
                        if (data.fail) {
                            alert(data.message.error);
                            console.log(data.message.message);
                        }
                        else {
                            $('#slotModalGenodigden > ul').empty();
                            var genodigden = "";
                            data.message.invitees.forEach(function (element) {
                                genodigden = genodigden + "<li>" + element.voornaam + "</li>";
                            });
                            $("#slotModalGenodigden > ul").html(genodigden);

                            $('#examinatoren').val(null);
                            $('#examinatoren').val(data.message.examinators).trigger('change');
                        }
                    },
                    error: function (xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
                }
            });
        });


    </script>

@endpush
