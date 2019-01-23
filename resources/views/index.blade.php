@extends ('layouts.landing.master')

@section ('content')
    <!-- Content -->
    {{--<div class="bg-white">--}}
        {{--<section class="content content-boxed">--}}
            {{--<!-- Section Content -->--}}
            {{--<div class="row animated fadeInLeft" data-class="animated fadeInLeft">--}}
                {{--<div class="col-lg-6 bg-image landing-image"--}}
                     {{--style="background-image: url('{{asset('images/landings_image.jpg')}}');">--}}
                {{--</div>--}}
                {{--<div class="col-lg-6">--}}
                    {{--<h2>Afspraken maken</h2>--}}
                    {{--<p>--}}
                        {{--Gebruik Examenplanning om gemakkelijk afspraken en examens in te plannen. Maak gemakkelijk een--}}
                        {{--nieuwe gebeurtenis aan en voeg verschillende genodigden toe. De genodigden krijgen een--}}
                        {{--notificatie van de afspraak!--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row animated fadeInRight push-15-t" data-class="animated fadeInLeft">--}}
                {{--<div class="col-lg-7">--}}
                    {{--<h2>Afspraken wijzigen</h2>--}}
                    {{--<p>--}}
                        {{--Komt er onverwachts iets tussen, kunt u onverholpen het bezoek niet bijwonen? wijzig simpel uw--}}
                        {{--afspraak binnen examenplanning. Iedere genodigde wordt direct op de hoogte gesteld. Zo is er--}}
                        {{--tevens de mogelijkheid om direct een nieuw examen in te plannen.--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4 bg-image landing-image"--}}
                     {{--style="background-image: url('{{asset('images/landings_image1.jpg')}}');">--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row animated fadeInLeft push-15-t" data-class="animated fadeInLeft">--}}
                {{--<div class="col-lg-5 bg-image landing-image bg-image-cover"--}}
                     {{--style="background-image: url('{{asset('images/landings_image2.jpg')}}');">--}}
                {{--</div>--}}
                {{--<div class="col-lg-7">--}}
                    {{--<h2>Afspraken inzien</h2>--}}
                    {{--<p>--}}
                        {{--Examenplanning bied een overzichtelijke agenda waarin alle bestaande afspraken te zien zijn.--}}
                        {{--Tevens zijn deze vanuit hier te wijzigen. Alles overzichtelijk bij elkaar!--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row animated fadeInRight push-15-t" data-class="animated fadeInLeft">--}}
                {{--<div class="col-lg-6">--}}
                    {{--<h2>Persoonlijke agenda</h2>--}}
                    {{--<p>--}}
                        {{--U hoeft nooit meer een afspraak te missen. Examenplanning biedt u de mogelijkheid om alle--}}
                        {{--afspraken te synchroniseren met uw google-calender. Zo krijgt u altijd tijdig een melding voor--}}
                        {{--opkomende afspraken!--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="col-lg-6 bg-image landing-image bg-image-cover"--}}
                     {{--style="background-image: url('{{asset('images/landings_image3.jpg')}}');">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- END Section Content -->--}}
        {{--</section>--}}
    {{--</div>--}}
        <div class="">
            <div class="bg-white">
                <!-- Header -->
                <section class="content content-full content-boxed overflow-hidden">
                    <div class="push-150-t push-150">
                        <h1 class="font-s48 font-w700 text-uppercase text-gray-dark push-10 text-center animated bounceIn" data-toggle="appear" data-class="animated bounceIn">Examens plannen als nooit tevoren</h1>
                        <h2 class="h3 font-w400 text-gray push-50 text-center animated fadeIn" data-toggle="appear" data-class="animated fadeIn" data-timeout="750">Blijf up to date met alle veranderingen in jouw planning</h2>
                    </div>
                </section>
                <!-- END Header -->

                <!-- Features -->
                <div class="bg-flat-op">
                    <section class="content content-boxed">
                        <div class="push-30">
                            <div class="row items-push text-center">
                                <div class="col-xs-6 col-md-3 animated flipInY" data-toggle="appear" data-offset="-100" data-class="animated flipInY" data-timeout="200">
                                    <div class="item item-2x item-circle push-10">
                                        <i class="fa fa-bolt text-white"></i>
                                    </div>
                                    <div class="font-w600 text-white-op text-uppercase">Fast</div>
                                </div>
                                <div class="col-xs-6 col-md-3 animated flipInY" data-toggle="appear" data-offset="-100" data-class="animated flipInY" data-timeout="400">
                                    <div class="item item-2x item-circle push-10">
                                        <i class="fa fa-lock text-white"></i>
                                    </div>
                                    <div class="font-w600 text-white-op text-uppercase">Secure</div>
                                </div>
                                <div class="col-xs-6 col-md-3 animated flipInY" data-toggle="appear" data-offset="-100" data-class="animated flipInY" data-timeout="600">
                                    <div class="item item-2x item-circle push-10">
                                        <i class="fa fa-bell text-white"></i>
                                    </div>
                                    <div class="font-w600 text-white-op text-uppercase">Up to date</div>
                                </div>
                                <div class="col-xs-6 col-md-3 animated flipInY" data-toggle="appear" data-offset="-100" data-class="animated flipInY" data-timeout="800">
                                    <div class="item item-2x item-circle push-10">
                                        <i class="fa fa-thumbs-up text-white"></i>
                                    </div>
                                    <div class="font-w600 text-white-op text-uppercase">Easy</div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- END Features -->
            </div>
        </div>
        <!-- END Hero Content -->

        <!-- Explore -->
        <div class="bg-white overflow-hidden">
            <section class="content content-full content-boxed">
                <!-- Section Content -->
                <div class="text-center push-100-t push-30">
                    {{--<div>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                    {{--</div>--}}
                    <h2 class="h1 text-black">Examens plannen</h2>
                </div>
                <div class="row push-50">
                    <div class="col-sm-6 col-sm-offset-3 nice-copy-story">
                        <p>
                            Gebruik Examenplanning om gemakkelijk examens in te plannen. Koppel simpelweg een examen aan een moment en de rest gaat vanzelf.
                            De genodigden krijgen een notificatie van de afspraak en kunnen deze goed of af keuren!
                            Bij wijzigingen in de planning wordt iedereen op de hoogte gesteld.
                        </p>
                    </div>
                </div>
                <!-- END Section Content -->
            </section>
            <div class="">
                <img class="bg-video" src="{{asset('videos/tech.mp4')}}"  alt="">
            </div>
        </div>
        <!-- END Explore -->

        <!-- Flights -->
        <div class="bg-white overflow-hidden">
            <section class="content content-full content-boxed">
                <!-- Section Content -->
                <div class="text-center push-100-t push-30">
                    {{--<div>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                    {{--</div>--}}
                    <h2 class="h1 text-black">Minder adminstratie, meer focus.</h2>
                </div>
                <div class="row push-50">
                    <div class="col-sm-6 col-sm-offset-3 nice-copy-story">
                        <p>
                            Examenplanning neemt veel voorheen handmatige acties uit handen. Het verstuurd geautomatiseerde mails, maakt automatisch examens van een gebruiker aan en maakt het mogelijk om velen slots met één druk op de knop aan te maken.
                        </p>
                    </div>
                </div>
                <!-- END Section Content -->
            </section>
            <div class="img-overlay">
                <img class="img-responsive" src="{{asset('images/automatic.jpg')}}" alt="">
            </div>
        </div>
        <!-- END Flights -->

        <!-- Hotels -->
        <div class="bg-white overflow-hidden">
            <section class="content content-full content-boxed">
                <!-- Section Content -->
                <div class="text-center push-100-t push-30">
                    {{--<div>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                        {{--<span class="fa fa-star text-warning"></span>--}}
                    {{--</div>--}}
                    <h2 class="h1 text-black">Creëer overzicht</h2>
                </div>
                <div class="row push-50">
                    <div class="col-sm-6 col-sm-offset-3 nice-copy-story">
                        <p>
                            Uw persoonlijke agenda binnen Examenplanning. In één oogopslag alle informatie over uw afspraken. Vraag direct een routebeschrijving op wanneer u onderweg bent, neem telefonisch contact op om de last-minute zaken te spreken of vraag een lijst met genodigden op. Het is nog nooit zo makkelijk geweest!
                        </p>
                    </div>
                </div>
                <!-- END Section Content -->
            </section>
            <div class="img-overlay img-overlay-bottom">
                <img class="img-responsive" src="{{asset('images/overview.jpg')}}" alt="">
            </div>
        </div>
        <!-- END Hotels -->

        <!-- Call to action -->
        <div class="bg-white">
            <section class="content content-full content-boxed">
                <!-- Section Content -->
                <div class="push-50-t push-50 text-center">
                    <h3 class="h4 push-20 animated fadeIn" data-toggle="appear">Het gemak van plannen wacht op u. Waar wacht u op?</h3>
                    <a class="btn btn-rounded btn-noborder btn-lg btn-success animated bounceIn" data-toggle="appear" data-class="animated bounceIn" href="/home">Start met plannen!</a>
                </div>
                <!-- END Section Content -->
            </section>
        </div>
        <!-- END Call to action -->

        <!-- More packages -->
        <div class="bg-gray-lighter">
            <section class="content content-full content-boxed">
                <!-- Section Content -->
                <div class="text-center push-50-t push-50">
                    <div>Interesse over andere diensten van ons?</div>
                    <h2 class="h1 text-black">Bekijk ook eens de volgende...</h2>
                </div>
                <div class="row push-50">
                    <div class="col-sm-6 col-md-4">
                        <a class="block block-themed block-link-hover2 bg-image diensten" style="background-image: url('{{asset('images/davinci-logo.jpg')}}');" target="_blank" href="https://www.davinci.nl">
                            <div class="block-header text-right push-150">
                                <span class="text-white"><i class="fa fa-heart"></i></span>
                            </div>
                            <div class="block-content bg-flat-op">
                                <h2 class="font-w700 h3 push-10 text-white text-uppercase">Davinci College</h2>
                                <p class="text-white-op">Middelbaar beroepsonderwijs</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <a class="block block-themed block-link-hover2 bg-image diensten" style="background-image: url('{{asset('images/vavo.png')}}');" href="https://www.davinci.nl/vavo">
                            <div class="block-header text-right push-150">
                                <span class="text-white-op"><i class="fa fa-heart"></i></span>
                            </div>
                            <div class="block-content bg-amethyst-op">
                                <h2 class="font-w700 h3 push-10 text-white text-uppercase">Vavo</h2>
                                <p class="text-white-op">Voortgezet algemeen volwassenenonderwijs</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-0">
                        <a class="block block-themed block-link-hover2 bg-image bg" style="background-image: url('{{asset('images/hbo_drechtsteden.jpg')}}');" href="https://www.hbodrechtsteden.nl">
                            <div class="block-header text-right push-150">
                                <span class="text-white"><i class="fa fa-heart"></i></span>
                            </div>
                            <div class="block-content diensten_opacity">
                                <h2 class="font-w700 h3 push-10 text-white text-uppercase">HBO Drechtsteden</h2>
                                <p class="text-white-op">Hoger beroepsonderwijs</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- END Section Content -->
            </section>
        </div>





@endsection