<div class="col-lg-6">
    <div class="block block-bordered">
        <div class="block-header">
            <h3 class="block-title">{{ $exam->proevevanbekwaamheids->kerntaak}} - {{$exam->project->company->naam}}</h3>
        </div>
        <div class="block-content">
            <div class="pull-r-l pull-t push">
                <table class="block-table text-center bg-gray-lighter border-b">
                    <tbody>
                    <tr>
                        <td class="border-r col-lg-4">
                            <div><i class="fa fa-fw fa-4x fa-calendar push-5-r"></i></div>
                            <div class="h5 text-muted text-uppercase push-5-t">{{\Carbon\Carbon::parse($exam->slots->datum)->format('d-m-Y')}}</div>
                        </td>
                        <td class="border-r col-lg-4">
                            <div><i class="fa fa-fw fa-4x fa-clock-o push-5-r"></i></div>
                            <div class="h5 text-muted text-uppercase push-5-t">{{\Carbon\Carbon::parse($exam->slots->starttijd)->format('H:i') . '-' . \Carbon\Carbon::parse($exam->slots->eindtijd)->format('H:i')}}</div>
                        </td>
                        <td class="col-lg-4">
                            <div><i class="si fa-fw fa-4x si-pointer push-5-r"></i></div>
                            <div class="h5 text-muted push-5-t">{{$exam->project->company->straat}}, {{$exam->project->company->huisnummer}}, {{$exam->project->company->postcode}}, {{$exam->project->company->plaats}}</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="list-group">
                <div class="list-group-item active" href="#">
                    <span class="badge">{{$exam->users->count()}}</span>
                    <i class="fa fa-fw fa-user push-5-r"></i> Genodigden
                </div>
                @foreach($exam->users as $invitee)
                        <a @if(in_array($invitee->role_id, [3, 2]))class="list-group-item cursor_hand" href="/agenda/{{$invitee->davinci_id}}/show" @else class="list-group-item" @endif>
                            <i class="fa fa-fw fa-address-card push-5-r"></i> <span
                                    @if($invitee->id == $loggedInUser->id) class="text-success" @endif>{{$invitee->achternaam . ", " . $invitee->voornaam . " " . $invitee->tussenvoegsel . " - " . $invitee->pivot->user_role}}</span>
                        </a>
                @endforeach
            </div>
        </div>
    </div>
</div>