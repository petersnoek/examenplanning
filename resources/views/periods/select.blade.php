<div class="content col-lg-3">
    <div class="block block-bordered">
        <div class="block-header bg-gray-lighter">
            <h3 class="block-title">Selecteer een periode</h3>
        </div>
        <div class="block-content remove-padding-t">
            <div class="table-responsive">
                <table class="js-table-sections table table-hover">
                    <thead>
                    <tr>
                        <th style="width: 30px;"></th>
                        <th colspan="3">Maak een keuze</th>
                    </tr>
                    </thead>
                    @foreach($schoolyears as $schoolyear)
                        <tbody class="js-table-sections-header">

                        <tr>
                            <td class="text-center">
                                <i class="fa fa-angle-right"></i>
                            </td>
                            <td class="font-w600" colspan="3">{{$schoolyear->schooljaar}}</td>
                        </tr>
                        </tbody>
                        <tbody>
                        @foreach($schoolyear->periods as $schoolyearPeriod)
                            <tr class="cursor_hand"
                                onclick="window.location.href='/slots/{{$schoolyearPeriod->id}}';">
                                <td class="text-center"></td>
                                <td class="font-w600">{{$schoolyearPeriod->periodenaam}}</td>
                                <td class="hidden-xs">
                                    <small class="text-muted">{{$schoolyearPeriod->startdatum->format('d-m-Y')}}
                                        tot {{$schoolyearPeriod->einddatum->format('d-m-Y')}}</small>
                                </td>
                            </tr>

                        @endforeach
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        jQuery(function () {
            App.initHelpers(['table-tools']);
        });
    </script>
@endpush
