@component('mail::message')
<div align="center">
    {{__('Congratulations, you have become a new employee for the store : ')}} {{App::islocale('en') ?$market_now->market_name:$market_now->market_name_ar}}
</div>
@component('mail::panel')
    {{__('email : ')}} {{$data['email']}}<br>
    {{__('password : ')}} {{$data['new_password']}}<br>
    {{__('Market Link  : ')}} http://lozcart.com/market/login
@endcomponent
@component('mail::button', ['url' => 'http://lozcart.com/market/login'])
    {{__('Market Login')}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
