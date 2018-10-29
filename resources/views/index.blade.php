@extends ('layouts.landing.master')

@section ('content')
    <!-- Content -->
    <div class="bg-white">
        <section class="content content-boxed">
            <!-- Section Content -->
            <div class="row animated fadeInLeft" data-class="animated fadeInLeft">
                <div class="col-lg-6 bg-image landing-image"
                     style="background-image: url('{{asset('images/landings_image.jpg')}}');">
                </div>
                <div class="col-lg-6">
                    <h2>Afspraken maken</h2>
                    <p>
                        Gebruik Examenplanning om gemakkelijk afspraken en examens in te plannen. Maak gemakkelijk een
                        nieuwe gebeurtenis aan en voeg verschillende genodigden toe. De genodigden krijgen een
                        notificatie van de afspraak!
                    </p>
                </div>
            </div>

            <div class="row animated fadeInRight push-15-t" data-class="animated fadeInLeft">
                <div class="col-lg-7">
                    <h2>Afspraken wijzigen</h2>
                    <p>
                        Komt er onverwachts iets tussen, kunt u onverholpen het bezoek niet bijwonen? wijzig simpel uw
                        afspraak binnen examenplanning. Iedere genodigde wordt direct op de hoogte gesteld. Zo is er
                        tevens de mogelijkheid om direct een nieuw examen in te plannen.
                    </p>
                </div>
                <div class="col-lg-4 bg-image landing-image"
                     style="background-image: url('{{asset('images/landings_image1.jpg')}}');">
                </div>
            </div>

            <div class="row animated fadeInLeft push-15-t" data-class="animated fadeInLeft">
                <div class="col-lg-5 bg-image landing-image bg-image-cover"
                     style="background-image: url('{{asset('images/landings_image2.jpg')}}');">
                </div>
                <div class="col-lg-7">
                    <h2>Afspraken inzien</h2>
                    <p>
                        Examenplanning bied een overzichtelijke agenda waarin alle bestaande afspraken te zien zijn.
                        Tevens zijn deze vanuit hier te wijzigen. Alles overzichtelijk bij elkaar!
                    </p>
                </div>
            </div>

            <div class="row animated fadeInRight push-15-t" data-class="animated fadeInLeft">
                <div class="col-lg-6">
                    <h2>Persoonlijke agenda</h2>
                    <p>
                        U hoeft nooit meer een afspraak te missen. Examenplanning biedt u de mogelijkheid om alle
                        afspraken te synchroniseren met uw google-calender. Zo krijgt u altijd tijdig een melding voor
                        opkomende afspraken!
                    </p>
                </div>
                <div class="col-lg-6 bg-image landing-image bg-image-cover"
                     style="background-image: url('{{asset('images/landings_image3.jpg')}}');">
                </div>
            </div>
            <!-- END Section Content -->
        </section>
    </div>
@endsection