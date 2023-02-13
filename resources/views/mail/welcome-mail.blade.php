@component('mail::message')
<center> <a href="https://cnsunification.org">
<img src="{{ asset('assets/images/logo.png') }}" width="144" height="144" title="Unification Campus Fellowship logo" alt="Unification Campus Fellowship logo" /></a>
</center> 

# Dear {{ $user->name }} 

Greetings of peace and love in the name of our Lord and Savior Jesus Christ!

We are thrilled to welcome you to the Cherubim and Seraphim Church Unification Campus Fellowship! On behalf of the Church, I would like to extend a warm welcome to you and express our gratitude for choosing to join our fold.

As a member of the Cherubim and Seraphim Church Unification Campus Fellowship, you will be part of a vibrant and dynamic community of believers who are passionate about spreading the love of Christ to the world. Our Church is a place where you can deepen your faith, connect with like-minded individuals, and grow in your spiritual journey.

We believe that your membership is a significant step towards building a stronger and more vibrant Church community, and we are committed to providing you with all the support you need to grow and flourish in your faith.

Please feel free to reach out to me or any member of the Church if you have any questions or concerns. We are here to support you in any way we can.

Once again, welcome to the Cherubim and Seraphim Church Unification Campus Fellowship! We look forward to walking with you in this new chapter of your faith journey.
@component('mail::button', ['url' => 'https://cnsunification.org'])
Preview Profile
@endcomponent

Your Alagba Femi Ajayi,<br>
Central Executive Council Public Relations Officer,<br>
{{ config('app.name') }}
@endcomponent
