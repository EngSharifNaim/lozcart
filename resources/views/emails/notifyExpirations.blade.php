@component('mail::message')
# Hi {{$market['owner_name']}}


## {{__('Dear subscriber, your subscription has expired and two days have been added, please subscribe quickly during them')}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
