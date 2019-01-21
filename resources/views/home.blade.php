@extends('layouts.master')
@section('content')
    {{--<!-- Page Header -->--}}
    {{--<div class="content bg-gray-lighter">--}}
    {{--<div class="row items-push">--}}
    {{--<div class="col-sm-7">--}}
    {{--<h1 class="page-heading">--}}
    {{--Welcome--}}
    {{--<small>{{Auth::user()->voornaam}}</small>--}}
    {{--</h1>--}}
    {{--</div>--}}
    {{--<div class="col-sm-5 text-right hidden-xs">--}}
    {{--<ol class="breadcrumb push-10-t">--}}
    {{--<li>Home</li>--}}
    {{--<li><a class="link-effect" href="">Home</a></li>--}}
    {{--</ol>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- END Page Header -->--}}

    <div id="" style="min-height: 574px;">
        <!-- Hero Content -->
        <!-- jQuery Vide for video backgrounds, for more examples you can check out https://github.com/VodkaBears/Vide -->
        <div class="bg-video img-overlay">
            <div class="bg-banner-dashboard">
                <img class="fa" src="{{asset('/images/dashboard_placeholder.jpg')}}">
            </div>
            <div class="bg-black-op">
                <!-- Header -->
                <section class="content content-full content-boxed">
                    <div class="push-200-t push-200 text-center">
                        <h1 class="font-s48 font-w700 text-uppercase text-white push-10 animated fadeInDown"
                            data-toggle="appear" data-class="animated fadeInDown">Welkom op Examenplanning</h1>
                        <h2 class="h3 font-w400 text-white-op push-50 animated fadeInDown" data-toggle="appear"
                            data-class="animated fadeInDown" data-timeout="500">{{Auth::user()->fullName()}}</h2>
                        <a class="btn btn-rounded btn-noborder btn-lg btn-success animated fadeInUp"
                           data-toggle="appear" data-class="animated fadeInUp" data-timeout="750"
                           href="/agenda">
                            <i class="fa fa-eye push-5-r"></i> Bekijk planning
                        </a>
                    </div>
                </section>
                <!-- END Header -->
            </div>
        </div>
        <!-- END Hero Content -->

    @if($upcoming != null)
        <!-- Upcoming -->
            <div class="bg-white">
                <section class="overflow-hidden">
                    <!-- Section Content -->
                    <div class="text-center push-50-t push-50">
                        <div>Je eerstvolgende examen van deze week</div>
                        <h2 class="h1 text-black">Bekijk hem hieronder</h2>
                    </div>


                    <div class="col-sm-6 col-md-6 col-md-offset-3 animated fadeIn" data-toggle="appear"
                         data-offset="50"
                         data-class="animated fadeIn">
                        <div class="bg-image" style="background-image: url('{{asset('images/exam_card.jpg')}}');">
                            <div class="bg-black-op">
                                <div class="block block-themed block-transparent">
                                    <div class="block-header">
                                        <h3 class="block-title text-center">{{$upcoming->user->fullName()}}
                                            - {{$upcoming->proevevanbekwaamheids->kerntaak}}</h3>
                                    </div>
                                    <div class="block-content block-content-full">
                                        <div class="pull-left col-lg-4">
                                            <i class="fa fa-5x fa-fw fa-calendar text-white-op"></i>
                                            <div class="text-muted">{{isset($upcoming->slot) ? \Carbon\Carbon::parse($upcoming->slot->datum)->format('Y-m-d') . ' ' . \Carbon\Carbon::parse($upcoming->slot->starttijd)->format('H:i') . ' ' . \Carbon\Carbon::parse($upcoming->slot->eindtijd)->format('H:i') : 'Nog niet ingepland'}}</div>
                                        </div>
                                        <div class="push-10-t col-lg-8">
                                            <div class="font-w600 push-5 text-amethyst-dark">{{isset($upcoming->project) ? $upcoming->project->company->naam  : "Geen bedrijf"}}</div>
                                            @if(isset($upcoming->project))
                                                <div class="text-muted">{{$upcoming->project->company->straat}} {{$upcoming->project->company->huisnummer}} {{$upcoming->project->company->toevoeging}}
                                                    <br> {{$upcoming->project->company->postcode}} {{$upcoming->project->company->plaats}}
                                                    <br> {{$upcoming->project->company->land}}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="block-content block-content-full text-center">
                                        <a class="btn btn-sm btn-default" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-plus"></i> Add friend
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Section Content -->
                </section>
            </div>
            <!-- END Upcoming -->
    @endif

    <!-- Mini Stats -->
        <div class="bg-gray-lighter">
            <section class="content content-boxed">
                <div class="text-center push-50-t push-50">
                    <div>De meest complete Examenplanning die er is</div>
                    <h2 class="h1 text-black">Mis nooit meer een examen en blijf up to date!</h2>
                </div>
                <!-- Section Content -->
                <div class="row items-push push-20-t push-20 text-center">
                    <div class="col-xs-6 col-sm-4">
                        <a class="item item-2x item-circle bg-white border push-10 animated bounceIn cursor_hand"
                           data-toggle="appear" data-offset="-100" data-class="animated bounceIn" href="/agenda">
                            <i class="fa fa-book text-amethyst"></i>
                        </a>
                        <div class="h1 push-5" data-toggle="countTo" data-to="{{Auth::user()->exams->count()}}"
                             data-after="">{{Auth::user()->exams->count()}}</div>
                        <div class="font-w600 text-uppercase text-muted">{{str_plural('Exam', Auth::user()->exams->count())}}</div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <a class="item item-2x item-circle bg-white border push-10 animated bounceIn cursor_hand"
                           data-toggle="appear" data-offset="-100" data-class="animated bounceIn"
                           href="javascript:void(0)">
                            <i class="fa fa-archive text-amethyst"></i>
                        </a>
                        <div class="h1 push-5" data-toggle="countTo" data-to="{{Auth::user()->projects->count()}}"
                             data-after="">{{Auth::user()->projects->count()}}</div>
                        <div class="font-w600 text-uppercase text-muted">{{str_plural('Project', Auth::user()->projects->count())}}</div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <a class="item item-2x item-circle bg-white border push-10 animated bounceIn cursor_hand"
                           data-toggle="appear" data-offset="-100" data-class="animated bounceIn"
                           href="javascript:void(0)">
                            <i class="fa fa-building text-amethyst"></i>
                        </a>
                        <div class="h1 push-5" data-toggle="countTo" data-to="{{Auth::user()->companies->count()}}"
                             data-after="">{{Auth::user()->companies->count()}}</div>
                        <div class="font-w600 text-uppercase text-muted">{{str_plural('Company', Auth::user()->companies->count())}}</div>
                    </div>
                </div>
                <!-- END Section Content -->
            </section>
        </div>
        <!-- END Mini Stats -->

    @if(Auth::user()->hasRole([1,2]))
        <!-- Features -->
            <div class="bg-white overflow-hidden">
                <section class="content content-full content-boxed">
                    <!-- Section Content -->
                    <div class="text-center push-50-t push-50">
                        <div>Een overzicht voor examinatoren</div>
                        <h2 class="h1 text-black">Alles op een rijtje...</h2>
                    </div>
                    <div class="row items-push-2x text-center push-20">
                        <div class="col-sm-4">
                            <a class="item item-3x item-circle bg-image push-20 animated fadeIn cursor_hand"
                               data-toggle="appear"
                               data-class="animated fadeIn"
                               style="background-image: url({{asset('/images/agenda.jpg')}});" href="/agenda"></a>
                            <h3 class="h5 font-w600 text-uppercase animated fadeInUp" data-toggle="appear"
                                data-class="animated fadeInUp">Agenda</h3>
                        </div>

                        <div class="col-sm-4">
                            <a class="item item-3x item-circle bg-image push-20 animated fadeIn cursor_hand"
                               data-toggle="appear"
                               data-class="animated fadeIn"
                               style="background-image: url({{asset('/images/plan.jpg')}});"
                               href="/slots/assignable/show"></a>
                            <h3 class="h5 font-w600 text-uppercase animated fadeInUp" data-toggle="appear"
                                data-class="animated fadeInUp">Plannen</h3>
                        </div>

                        <div class="col-sm-4">
                            <a class="item item-3x item-circle bg-image push-20 animated fadeIn cursor_hand"
                               data-toggle="appear"
                               data-class="animated fadeIn"
                               style="background-image: url({{asset('/images/exam.jpg')}});" href="/exams/show"></a>
                            <h3 class="h5 font-w600 text-uppercase animated fadeInUp" data-toggle="appear"
                                data-class="animated fadeInUp">Examens</h3>
                        </div>

                        <div class="col-sm-4">
                            <a class="item item-3x item-circle bg-image push-20 animated fadeIn cursor_hand"
                               data-toggle="appear"
                               data-class="animated fadeIn"
                               style="background-image: url({{asset('/images/kwalificatiedossier.jpg')}});"
                               href="/kwalificatiedossiers"></a>
                            <h3 class="h5 font-w600 text-uppercase animated fadeInUp" data-toggle="appear"
                                data-class="animated fadeInUp">Kwalificatiedossiers</h3>
                        </div>

                        <div class="col-sm-4">
                            <a class="item item-3x item-circle bg-image push-20 animated fadeIn cursor_hand"
                               data-toggle="appear"
                               data-class="animated fadeIn"
                               style="background-image: url({{asset('/images/calendar.jpg')}});"
                               href="/schoolyears"></a>
                            <h3 class="h5 font-w600 text-uppercase animated fadeInUp" data-toggle="appear"
                                data-class="animated fadeInUp">Schooljaren</h3>
                        </div>

                        <div class="col-sm-4">
                            <a class="item item-3x item-circle bg-image push-20 animated fadeIn cursor_hand"
                               data-toggle="appear"
                               data-class="animated fadeIn"
                               style="background-image: url({{asset('/images/period.jpg')}});" href="/periods"></a>
                            <h3 class="h5 font-w600 text-uppercase animated fadeInUp" data-toggle="appear"
                                data-class="animated fadeInUp">Perioden</h3>
                        </div>

                        <div class="col-sm-4">
                            <a class="item item-3x item-circle bg-image push-20 animated fadeIn cursor_hand"
                               data-toggle="appear"
                               data-class="animated fadeIn"
                               style="background-image: url({{asset('/images/slot.jpg')}});" href="/slots"></a>
                            <h3 class="h5 font-w600 text-uppercase animated fadeInUp" data-toggle="appear"
                                data-class="animated fadeInUp">Slots</h3>
                        </div>

                        <div class="col-sm-4">
                            <a class="item item-3x item-circle bg-image push-20 animated fadeIn cursor_hand"
                               data-toggle="appear"
                               data-class="animated fadeIn"
                               style="background-image: url({{asset('/images/user.jpg')}});" href="/users"></a>
                            <h3 class="h5 font-w600 text-uppercase animated fadeInUp" data-toggle="appear"
                                data-class="animated fadeInUp">Gebruikers</h3>
                        </div>

                        <div class="col-sm-4">
                            <a class="item item-3x item-circle bg-image push-20 animated fadeIn cursor_hand"
                               data-toggle="appear"
                               data-class="animated fadeIn"
                               style="background-image: url({{asset('/images/company.jpg')}});" href="/companies"></a>
                            <h3 class="h5 font-w600 text-uppercase animated fadeInUp" data-toggle="appear"
                                data-class="animated fadeInUp">Bedrijven</h3>
                        </div>

                        <div class="col-sm-12">
                            <a class="item item-3x item-circle bg-image push-20 animated fadeIn cursor_hand"
                               data-toggle="appear"
                               data-class="animated fadeIn"
                               style="background-image: url({{asset('/images/project.jpg')}});" href="/projects"></a>
                            <h3 class="h5 font-w600 text-uppercase animated fadeInUp" data-toggle="appear"
                                data-class="animated fadeInUp">Projecten</h3>
                        </div>
                    </div>
                    <!-- END Section Content -->
                </section>
            </div>
            <!-- END Features -->
    @endif

    <!-- Ratings -->
        <div class="bg-image img-overlay" style="background-image: url('{{asset('/images/rock.jpg')}}');">
            <div class="bg-black-op">
                <section class="content content-full content-boxed">
                    <!-- Section Content -->
                    <div class="row items-push-2x push-50-t text-center">
                        <div class="col-sm-4 animated fadeIn" data-toggle="appear" data-offset="-150">
                            <i class="fa fa-4x fa-check text-success"></i>
                            <div class="h4 text-white-op push-5">Duidelijke communicatie
                            </div>
                        </div>
                        <div class="col-sm-4 animated fadeIn" data-toggle="appear" data-offset="-150">
                            <i class="fa fa-4x fa-check text-success"></i>
                            <div class="h4 text-white-op push-5">Veilig
                            </div>
                        </div>
                        <div class="col-sm-4 animated fadeIn" data-toggle="appear" data-offset="-150">
                            <i class="fa fa-4x fa-check text-success"></i>
                            <div class="h4 text-white-op push-5">Snel & Gemakkelijk
                            </div>
                        </div>
                    </div>
                    <!-- END Section Content -->
                </section>
            </div>
        </div>
        <!-- END Ratings -->
    </div>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/jquery/jquery.countTo.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery/jquery.appear.min.js')}}"></script>
@endpush