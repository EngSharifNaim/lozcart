@component('mail::message')

![Image]({{asset('photo/111.jpg')}} "icon")
<div align="center">
{{__('You have been successfully registered on the LozCart platform. Now you have your own online store that you can sell through. We have removed the hassles of design, programming and linking with payment and shipping, and we will make you focus on your trade')}}

</div>

@component('mail::panel')
    {{__('Market Name : ')}} {{App::IsLocale('en') ?$market['market_name']??$market['market_name_ar'] : $market['market_name_ar']}}

    {{__('Market Link : ')}} [{{$market['link']}}](http://market.lozcart.com/ar/{{$market['link']}}).
@endcomponent
![Image]({{asset('photo/2222.jpg')}} "icon")
@component('mail::button', ['url' => 'http://lozcart.com/market/login'])
{{__('Market Login')}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
