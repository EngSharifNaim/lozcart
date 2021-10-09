@extends("layouts.site")
@section("content")



<div class="text-center head_padding_page" style="position: relative;top:100px "  >

<h2 style="color: #353a43;font-weight: normal;">{{__('Common Questions')}}</h2>
<div class="shape wow " data-wow-delay="0.3s"></div>
</div>


<div class="container" style="position: relative;top:100px ;padding:0 0 200px 0  ">
<div id="accordion">

    @foreach($faqs as $item)
    <div class="card"
         style="border:0px  ; box-shadow: 0px 6px 30px 5px rgba(89,91,181,0.1);padding:10px 0;background: #fafafa; ">


        <a class="card-link" data-toggle="collapse" href="#menu{{$item->id}}" aria-expanded="false" aria-controls="menu2">
            <div class="card-header" style="background: #fafafa;border: 0 ;color: #004c3f ">
                @if(App::isLocale('en'))
                    {{$item->question}}
                @else
                    {{$item->question_ar}}
                @endif
                    <i class="fa fa-angle-down" style="font-size:24px;position: relative;top:4px;right:8px"></i>

            </div>
        </a>
        <div id="menu{{$item->id}}" class="collapse ">
            <div class="card-body "
                 style="border-top:1px solid #eee;font-family: 'SST Arabic';font-weight: normal;font-style: normal;">
                @if(App::isLocale('en'))
                    {{$item->answer}}
                @else
                    {{$item->answer_ar}}
                @endif
            </div>
        </div>
    </div>

    <br>
    @endforeach







</div>
</div>



@endsection
