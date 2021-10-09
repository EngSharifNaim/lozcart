@component('mail::message')
<div align="center" style="font-weight: bold ;color: black ;font-size: 27px">
 {{__('Password Reset')}}
</div>


{{__('Dear Trader : ')}} {{App::IsLocale('en') ?$market['market_name']??$market['market_name_ar'] : $market['market_name_ar']}}<br>
{{__('A password reset code has been sent to your request')}}
@component('mail::panel')
    {{__('The password recovery code is:')}}<br>
    <div align="center">
        **{{$code}}**
    </div>

@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
