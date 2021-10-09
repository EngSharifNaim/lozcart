@component('mail::message')
# Hi {{$market['owner_name']}}


## {{__('Dear subscriber, your subscription has expired. Please renew as soon as possible so that you can enjoy our services')}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
