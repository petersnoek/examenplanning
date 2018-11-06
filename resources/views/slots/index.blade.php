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
                    <small>Overzicht</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Slots</li>
                    <li><a class="link-effect" href="">Selecteer periode</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->
    <div class="content">
        <h2 class="content-heading">
            Overzicht van slots per periode
        </h2>
        <div class="row">
            <div class="col-lg-3">
                @include('slots.select')
            </div>

            <div class="col-lg-9">
                <div class="block block-bordered">
                    <div class="block-header bg-gray-lighter">
                        @if(isset($period))
                            <ul class="block-options">
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="" onclick="window.location='/slots/{{$period->id}}/create'" data-action-mode=""><i class="si si-plus"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Alle slots voor periode "{{$period->periodenaam}}" - {{$period->schoolyear->schooljaar}}</h3>
                        @else
                            <h3 class="block-title">Nog geen periode geselecteerd</h3>
                        @endif
                    </div>
                    <div class="block-content">
                        @if(isset($period))
                            @include('slots.showall')
                        @else
                            <h3 class="block-title push-20 font-w300">Selecteer eerst links een periode</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <span class=" font-w400 text-muted"><i class="si si-info"></i> Gebruik de plus in het overzicht blok om nieuwe slots aan te maken voor de geselecteerde periode</span>
            </div>
        </div>
    </div>


@endsection

@push('scripts')

@endpush