@component('mail::message')
![Examenplanning]
[Examenplanning]:{{asset('/images/examenplanning_placeholder.svg' )}} "Examenplanning"
# Reset je wachtwoord voor examenplanning.
Je hebt een aanvraag gedaan om je wachtwoord te resetten. Klik op de onderstaande link om je wachtwoord opnieuw in te stellen.

@component('mail::button', ['url' => $actionUrl, 'color' => 'blue'])
    {{ $actionText }}
@endcomponent
Wanneer je je wachtwoord opnieuw hebt ingesteld kun je weer inloggen binnen de handige tool Examenplanning!
@component('mail::panel', ['url' => ''])
    Examenplanning. Het plan is plannen!
@endcomponent
Met vriendelijke groet,<br>
{{ config('app.name') }}

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
    @lang(
        "Als je moeite hebt met het klikken op de knop, kun je ook de onderstaande link kopiëren\n".
        'en plakken in je browser: [:actionURL](:actionURL)',
        [
            'actionText' => $actionText,
            'actionURL' => $actionUrl
        ]
    )
@endcomponent
@endisset
@endcomponent


