@component('mail::message')

<center> <a href="https://cnsunification.org">
<img src="{{ asset('assets/images/logo.png') }}" width="144" height="144" title="Unification Campus Fellowship logo" alt="Unification Campus Fellowship logo" /></a>
</center> 

<br>

# Dear {{ $like->post->user->name }}  

I am writing to inform you that one of our members has liked your recent post. We believe that this is a great achievement and we want to congratulate you on creating content that resonates with our community members.

It is always heartening to see our members engaging with each other's posts and supporting each other's work. We hope that this like will motivate you to continue creating more valuable content for our platform.

Thank you for being an active member of our community, and we look forward to seeing more of your contributions in the future.

@component('mail::button', ['url' => 'https://cnsunification.org/login'])
View Post
@endcomponent

Your Alagba Femi Ajayi,<br>
{{ config('app.name') }}
@endcomponent
