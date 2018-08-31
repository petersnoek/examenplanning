@extends('layouts.master')

@push('style')

@endpush

@section('content')
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Slots beheren
                    <small>Selecteer een periode waarin je slots wilt aanmaken</small>
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
    <div class="content col-lg-3">
        <div class="block block-bordered">
            <div class="block-header bg-gray-lighter">
                <h3 class="block-title">Selecteer een periode</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="js-table-sections table table-hover">
                        <thead>
                        <tr>
                            <th style="width: 30px;"></th>
                            <th>Maak een keuze</th>
                        </tr>
                        </thead>
                        <tbody class="js-table-sections-header">
                        <tr>
                            <td class="text-center">
                                <i class="fa fa-angle-right"></i>
                            </td>
                            <td class="font-w600" colspan="3">schooljaar</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <td class="text-center"></td>
                            <td class="font-w600">Periodenaam</td>
                            <td>
                                <small>Paypal</small>
                            </td>
                            <td class="hidden-xs">
                                <small class="text-muted">June 16, 2015 12:16</small>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        jQuery(function () {
            // Init page helpers (Table Tools helper)
            App.initHelpers('table-tools');
        });
    </script>
@endpush