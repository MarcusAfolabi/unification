@component('mail::message')
<center> <a href="https://cnsunification.org">
<img src="{{ asset('assets/images/logo.png') }}" width="144" height="144" title="Unification Campus Fellowship logo" alt="Unification Campus Fellowship logo" /></a>
</center> 

# Dear {{ $user->name }} 

Warm greetings in the name of Jesus Christ!

Welcome to the Cherubim and Seraphim Church Unification Campus Fellowship! We're delighted you've chosen to join us.

As part of our vibrant community, you'll connect with fellow believers, deepen your faith, and spread Christ's love. Your membership strengthens our church family, and we're here to support your spiritual growth.

Feel free to reach out with any questions. We're excited to walk alongside you on your faith journey!

@component('mail::button', ['url' => 'https://cnsunification.org'])
Preview Profile
@endcomponent

Your Alagba Femi Ajayi,<br>
Central Executive Council, Public Relations Officer<br>
{{ config('app.name') }}
@endcomponent
