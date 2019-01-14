@component('mail::message')
![Examenplanning]({{asset('/images/examenplanning_placeholder.svg')}})
# Planning veranderd!

Er is een wijziging geweest in je planning.

@component('mail::panel', ['url' => ''])
    Je volgende examens zijn gepland op {{$slot->datum->format('Y-d-m')}} van {{ \Carbon\Carbon::parse($slot->starttijd)->format('H:i')}} tot {{ \Carbon\Carbon::parse($slot->eindtijd)->format('H:i')}}:
    <ul>
        @foreach($slot->exams as $exam)
            <li>
                <b class="text-muted">{{$exam->user->achternaam}}, {{$exam->user->voornaam}} {{$exam->user->tussenvoegsel}}</b> - <b>{{$exam->proevevanbekwaamheids->kerntaak}}</b><br>
                De volgende personen zullen aanwezig zijn:
                <ul>
                    @foreach($exam->invitees() as $invitee)
                        <li>
                            {{$invitee->achternaam}}, {{$invitee->voornaam}} {{$invitee->tussenvoegsel}} {{isset($invitee->pivot->user_role) ? ' - ' . $invitee->pivot->user_role : 'Student'}}
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endcomponent



@component('mail::button', ['url' => $url])
Bekijk jouw planning
@endcomponent

Met vriendelijke groet,<br>
{{ config('app.name') }}
@endcomponent
