@component('mail::message')
![Examenplanning]
[Examenplanning]:{{asset('/images/examenplanning_placeholder.svg' )}} "Examenplanning"
# Welkom bij Examenplanning, {{$student->voornaam}}!
Een docent heeft een account voor je gecreeërd. Klik hieronder om een wachtwoord in te stellen voor je account!
@component('mail::button', ['url' => 'https://examenplanning.nl'])
    Stel een wachtwoord in
@endcomponent
Wanneer je een wachtwoord hebt ingesteld kun je inloggen en beginnen met het gebruiken van de handige tool Examenplanning!
@component('mail::panel', ['url' => ''])
    Examenplanning. Het plan is plannen!
@endcomponent
Met vriendelijke groet,<br>
{{ config('app.name') }}
@endcomponent


