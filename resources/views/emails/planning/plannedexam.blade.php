@component('mail::message')
![Examenplanning]({{asset('/images/examenplanning_placeholder.svg')}})
# Planning veranderd!

Beste {{$user->voornaam}}, <br>
Er is een wijziging geweest in je planning.

@component('mail::panel', ['url' => ''])
    Het volgende examen is gepland op {{$exam->slot->datum->format('Y-d-m')}} van {{ \Carbon\Carbon::parse($exam->slot->starttijd)->format('H:i')}} tot {{ \Carbon\Carbon::parse($exam->slot->eindtijd)->format('H:i')}}:
    <ul>
        <li>
            <b class="text-muted">{{$exam->user->achternaam}}, {{$exam->user->voornaam}} {{$exam->user->tussenvoegsel}}</b> - <b>{{$exam->proevevanbekwaamheids->kerntaak}}</b><br>
            De volgende personen zullen aanwezig zijn:
            <ul>
                @foreach($exam->invitees() as $invitee)
                    <li>
                        {{$invitee->achternaam}}, {{$invitee->voornaam}} {{$invitee->tussenvoegsel}} {{isset($invitee->pivot->user_role) ? ' - ' . $invitee->pivot->user_role : ''}}
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
@endcomponent

Het examen wordt afgerond binnen het project {{$exam->project->naam}} bij {{$exam->project->company->naam}}. <br> <br>
<b>Locatie:</b> {{$exam->project->company->straat}} {{$exam->project->company->huisnummer}}{{$exam->project->company->toevoeging}}, <br>
{{$exam->project->company->postcode}} {{$exam->project->company->plaats}} <br>
{{$exam->project->company->land}}



@component('mail::button', ['url' => $url])
Bekijk jouw planning
@endcomponent

Met vriendelijke groet,<br>
{{ config('app.name') }}
@endcomponent
