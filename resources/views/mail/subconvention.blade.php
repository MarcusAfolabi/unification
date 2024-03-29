@component('mail::message')
<center> <a href="https://cnsunification.org">
<img src="{{ asset('assets/images/logo.png') }}" width="144" height="144" title="Unification Campus Fellowship logo" alt="Unification Campus Fellowship logo" /></a>
</center> 

# Dear {{ $subconvention->firstname }} {{ $subconvention->lastname }}

Greetings of peace in the name of our Lord and Savior Jesus Christ!

We are writing to acknowledge your interest in participating in the upcoming Cherubim and Seraphim Church Unification Campus Fellowship subconvention 2023, with the theme "PEACE." We are excited to have you as part of this year's subconvention and look forward to sharing the love of Christ with you.

In order to complete your registration and access the subconvention ground, we kindly request that you proceed to make a payment to enable you to download your ID. This ID will serve as your entry ticket to all the events and sessions planned for the subconvention.

Once we have received confirmation of your payment, we will enable the link to download your ID from your dashboard and all the necessary information you need to access the subconvention ground.

We are grateful for your support and look forward to having you join us for this exciting power-filled PEACE subconvention. 

If you have any questions, please do not hesitate to reach out to us at <a href="mailto:support@cnsunification.org">support@cnsunification.org</a>.

May the peace of Christ reign in your heart as you prepare for this year's subconvention.

@component('mail::button', ['url' => 'https://cnsunification.org/payment'])
Payment link
@endcomponent

2023 Organizing Team,<br>
{{ config('app.name') }}
@endcomponent
