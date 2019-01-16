

@component('mail::message')
![Examenplanning]({{asset('/images/examenplanning_placeholder.svg')}})

# Welkom bij Examenplanning, {{$user->voornaam}}!

Examenplanning is een tool ontwikkeld door het Da Vinci College, en bied een oplossing voor het plannen en organiseren van examens.
Of het nu gaat om het inplannen, het bezoeken of gemakkelijke communicatie tussen bedrijf, student en school, Examenplanning ondersteund het allemaal!

@component('mail::panel', ['url' => ''])
    Examenplanning. Het plan is plannen!

@endcomponent

@component('mail::button', ['url' => $url])
Start met plannen
@endcomponent

Met vriendelijke groet,<br>
{{ config('app.name') }}
@endcomponent


