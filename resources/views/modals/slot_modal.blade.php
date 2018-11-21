<div class="modal fade" id="slotModal" tabindex="-1"
     role="dialog" aria-labelledby="slotModalLabel">
    <div class="modal-dialog modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title"><span id="slotModalDatum"></span> van <span id="slotModalStarttijd"></span> tot <span id="slotModalEindtijd"></span></h3>
                </div>
                <div class="block-content">
                    <div class="block">
                        <div class="block-content block-content-full">
                                <span class="font-w600">Naam bedrijf hier - <i class="si si-envelope-open"></i> <a
                                            href="mailto:bedrijfsbegeleider@mail.com">Naam bedrijfsbegeleider</a> - <i
                                            class="si si-call-out"></i> <a href="tel:telnrbedrijfsbegeleider">Bedrijfsbegeleidertelnr</a> <br></span>
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