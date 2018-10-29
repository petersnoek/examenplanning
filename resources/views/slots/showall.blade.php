@if(!$period->slots->isEmpty())
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="text-center hidden-xs" style="width: 50px;">#</th>
            <th class="hidden-xs">Dag</th>
            <th class="">Datum</th>
            <th class="hidden-xs">Van-tot</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($period->slots as $slot)
            <tr>
                <td class="text-center hidden-xs">{{$slot->id}}</td>
                <td class="hidden-xs">{{$slot->datum->format('l')}}</td>
                <td class="">{{$slot->datum->format('d-m-Y')}}</td>
                <td class="hidden-xs">{{\Carbon\Carbon::parse($slot->starttijd)->format('H:i') . " tot " . \Carbon\Carbon::parse($slot->eindtijd)->format('H:i')}}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <a class="btn btn-xs btn-default" href="/slots/{{$slot->id}}/remove"
                           data-toggle="tooltip"
                           title=""
                           data-original-title="Verwijder slot"><i class="fa fa-times"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        @else
            <h3>Hierboven kun je slots aanmaken, deze verschijnen dan hier.</h3>
        @endif
    </table>
