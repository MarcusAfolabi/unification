@component('mail::message')
<center> <a href="https://cnsunification.org">
<img src="{{ asset('assets/images/logo.png') }}" width="144" height="144" title="Unification Campus Fellowship logo" alt="Unification Campus Fellowship logo" /></a>
</center> 

# Dear {{ $convention->firstname }} {{ $convention->lastname }}

Greetings of peace in the name of our Lord and Savior Jesus Christ!

We are writing to acknowledge your interest in participating in the upcoming Cherubim and Seraphim Church Unification Campus Fellowship Convention 2024, with the theme "PEACE." We are excited to have you as part of this year's convention and look forward to sharing the love of Christ with you.

If you have any questions, please do not hesitate to reach out to us at <a href="mailto:support@cnsunification.org">support@cnsunification.org</a>.

May the peace of Christ reign in your heart as you prepare for this year's convention.

@component('mail::button', ['url' => 'https://cnsunification.org/payment'])
Payment link
@endcomponent

2023 Organizing Team,<br>
{{ config('app.name') }}
@endcomponent
