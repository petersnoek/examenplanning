@extends('layouts.master')
@section('head_links')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/fullcalendar/fullcalendar.min.css')}}">
@endsection

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Beheer uw afspraken en examens
                    <small>Hier kunt u uw afspraken en examenmomenten inzien en beheren</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Afspraken</li>
                    <li><a class="link-effect" href="">Afspraken beheren</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <div class="col-md-4 col-md-push-8 col-lg-4 col-lg-push-8 push-15-t">
        <!-- Add Event Form -->
        <form class="js-form-add-event push-30" action="base_comp_calendar.html" method="post">
            <div class="input-group">
                <input class="js-add-event form-control" type="text" placeholder="Add event..">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </form>
        <!-- END Add Event Form -->

        <!-- Event List -->
        <ul class="js-events list list-events">
            <li style="background-color: #fac5a5;" class="ui-draggable ui-draggable-handle">Work</li>
            <li style="background-color: #b5d0eb;" class="ui-draggable ui-draggable-handle">Relax</li>
            <li style="background-color: #faeab9;" class="ui-draggable ui-draggable-handle">Gym</li>
            <li style="background-color: #fac5a5;" class="ui-draggable ui-draggable-handle">Secret Project</li>
            <li style="background-color: #c8e2b3;" class="ui-draggable ui-draggable-handle">Cinema</li>
            <li style="background-color: #b6d1ec;" class="ui-draggable ui-draggable-handle">Biking</li>
            <li style="background-color: #c8e2b3;" class="ui-draggable ui-draggable-handle">Trip</li>
            <li style="background-color: #faeab9;" class="ui-draggable ui-draggable-handle">Swimming</li>
        </ul>
        <div class="text-center text-muted">
            <small><em><i class="fa fa-arrows"></i> Drag and drop events on the calendar</em></small>
        </div>
        <!-- END Event List -->
    </div>

    <div class="col-md-8 col-md-pull-4 col-lg-8 col-lg-pull-4">
        <!-- Calendar Container -->
        <div class="js-calendar fc fc-unthemed fc-ltr push-15-t">

        </div>
    </div>
@endsection

@section('page_plugins')
    <script src="{{asset('assets/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/fullcalendar/gcal.min.js')}}"></script>

    <script src="{{asset('assets/js/calenders/base_comp_calendar.js')}}"></script>
@endsection
