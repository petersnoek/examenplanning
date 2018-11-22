<div class="modal fade" id="slotModal" tabindex="-1"
     role="dialog" aria-labelledby="slotModalLabel">
    <div class="modal-dialog modal-dialog-popout">
        <div class="modal-content">
            <form class="form-horizontal push-10-t push-10" id="planform"
                  action="/slots/plan"
                  method="post">
                @csrf
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title"><span id="slotModalDatum"></span> van <span
                                    id="slotModalStarttijd"></span>
                            tot <span id="slotModalEindtijd"></span></h3>
                    </div>
                    <div class="block-content">
                        <div class="block">
                            <div class="block-content-full">
                                <span class="font-w600">Naam bedrijf hier - <i class="si si-envelope-open"></i> <a
                                            href="mailto:bedrijfsbegeleider@mail.com">Naam bedrijfsbegeleider</a> - <i
                                            class="si si-call-out"></i> <a href="tel:telnrbedrijfsbegeleider">Bedrijfsbegeleidertelnr</a> <br></span>
                            </div>
                            {{--creation oof map--}}
                            {{--@include('slots.location')--}}
                            <img class="img-responsive" src="{{asset('images/Full_image_placeholder.jpg')}}">
                            {{--end creation of map--}}
                            <div class="block-content block-content-full">

                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label for="examinatoren">Selecteer examinatoren</label>
                                            <select class="js-select2 form-control select2-hidden-accessible select2 select2-container-multi"
                                                    id="examinatoren" name="examinatoren[]"
                                                    style="width: 100%;" data-placeholder="Kies examinator(en)"
                                                    multiple="multiple"
                                                    tabindex="-1" aria-hidden="true">
                                                <option></option>
                                                <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                @foreach($examinators as $examinator)
                                                    <option value="{{$examinator->id}}">{{$examinator->achternaam}}
                                                        , {{$examinator->voornaam}} {{$examinator->tussenvoegsel}}
                                                        ({{$examinator->davinci_id}})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('examinatoren'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('examinatoren') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label for="examens">Selecteer Examens</label>
                                            <select class="js-select2 form-control select2-hidden-accessible select2 select2-container-multi"
                                                    id="examens" name="examens[]"
                                                    style="width: 100%;" data-placeholder="Kies examen(s)"
                                                    multiple="multiple"
                                                    tabindex="-1" aria-hidden="true">
                                                <option></option>
                                                <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                @foreach($examens as $exam)
                                                    <option value="{{$exam->id}}">{{$exam->student->isNotEmpty() ? $exam->student->first()->voornaam : 'Geen student gekoppeld'}} - {{$exam->proevevanbekwaamheids->kerntaak}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('examens'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('examens') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <h2 class="h4 push-10">Proeve van bekwaamheidnr/Examencode</h2>
                                <h5>Genodigden</h5>
                                <div id="slotModalGenodigden">
                                    <ul>

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
                                type="submit">
                            <i class="fa fa-check"></i> Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

