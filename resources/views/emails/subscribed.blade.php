@component('mail::message')
# Hi {{$market['owner_name']}}


## {{__('Dear subscriber, a subscription has been renewed on the same previous plan')}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
