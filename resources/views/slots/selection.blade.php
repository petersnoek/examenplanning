@extends('layouts.master')

@push('style')

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
    <div class="content">
        <h2 class="content-heading">
            Selecteer een periode om de slots in te plannen
        </h2>
        <div class="block">
            @include('slots.select')
        </div>
    </div>

@endsection

@push('scripts')

@endpush