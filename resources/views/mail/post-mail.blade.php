@component('mail::message')
<center> <a href="https://cnsunification.org">
<img src="{{ asset('assets/images/logo.png') }}" width="144" height="144" title="Unification Campus Fellowship logo" alt="Unification Campus Fellowship logo" /></a>
</center> 

# Dear {{ $post->user->name }},

We are thrilled to inform you that your article - <b>{{ $post->title }}</b> on your chapter fellowship activities has been published on our Church website. Your article provides valuable insight and information about the events and activities that took place in your chapter and will be of great help to other chapters across the world.

As a reminder, when posting articles on our website, please ensure that they follow the guidelines set forth by the Church, which include:

<li>Maintaining a positive and respectful tone</li>
<li>Avoiding sensitive or controversial topics</li>
<li>Providing accurate and relevant information</li><br>

We appreciate your efforts in contributing to our Church community and are grateful for the information you have shared. Your post will help to encourage and inspire other members of the Church and will be a valuable resource for future reference.

If you have any questions or concerns, please do not hesitate to reach out to us.

Thank you for your continued support, and we look forward to seeing more of your contributions in the future.
@component('mail::button', ['url' => 'https://cnsunification.org/post'])
Share Post
@endcomponent

Your Alagba Femi Ajayi,<br>
Central Executive Council Public Relations Officer,<br>
{{ config('app.name') }}
@endcomponent
