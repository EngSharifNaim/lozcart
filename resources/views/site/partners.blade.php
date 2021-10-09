@extends("layouts.site")
@section("content")


<!--content code-->
<!------ Include the above in your HEAD tag ---------->

<div class="text-center space head_padding_page" style="position: relative;top:100px ">
    <h2 style="color: #353a43"> {{__('Partners')}} </h2>
    <div class="shape wow " data-wow-delay="0.3s"></div>
</div>


<!------ Include the above in your HEAD tag ---------->
<div class="container" style="position: relative;top:100px;padding:0 0 200px 0 ">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="shipping_box_item" style="padding:10px">
                    <div class="icon_shipping">
                        <img src="{{asset('looz/loozLandingPage/img/monshat.png')}}" width="" alt=" بوابة الدفع تاب ">
                    </div>
                    <h5 style="position: relative;top:-10px;font-weight: 400;color: #004c3f"> منشآت </h5>


                </div>
            </div>
            <div class="col-md-4">
                <div class="shipping_box_item" style="padding:10px">
                    <div class="icon_shipping">
                        <img src="{{asset('looz/loozLandingPage/img/bank_t.png')}}" width="" alt=" بوابة الدفع تاب ">
                    </div>
                    <h5 style="position: relative;top:-10px;font-weight: 400;color: #004c3f"> بنك التنمية </h5>


                </div>
            </div>
            <div class="col-md-4">
                <div class="shipping_box_item" style="padding:10px">
                    <div class="icon_shipping">
                        <img src="{{asset('looz/loozLandingPage/img/wade.png')}}" width="150" alt="  شركة وادي مكة">
                    </div>
                    <h5 style="position: relative;top:-10px;font-weight: 400;color: #004c3f"> شركة وادي مكة </h5>


                </div>
            </div>
            <div class="col-md-4">
                <div class="shipping_box_item" style="padding:10px">
                    <div class="icon_shipping">
                        <img src="{{asset('looz/loozLandingPage/img/ffff.png')}}" width="" alt=" بوابة الدفع تاب ">
                    </div>
                    <h5 style="position: relative;top:-10px;font-weight: 400;color: #004c3f"> بوابة الدفع تاب </h5>


                </div>
            </div>
            <div class="col-md-4">
                <div class="shipping_box_item" style="padding:10px">
                    <div class="icon_shipping">
                        <img src="{{asset('looz/loozLandingPage/img/eee3.png')}}" width="180" alt=" حاضنة نمو ">
                    </div>
                    <h5 style="position: relative;top:-10px;font-weight: 400;color: #004c3f"> حاضنة نمو </h5>


                </div>
            </div>
            <div class="col-md-4">
                <div class="shipping_box_item" style="padding:10px">
                    <div class="icon_shipping">
                        <img src="{{asset('looz/loozLandingPage/img/smsa.png')}}" width="160" alt=" شركة سمسا  ">
                    </div>
                    <h5 style="position: relative;top:-10px;font-weight: 400;color: #004c3f"> شركة سمسا </h5>


                </div>
            </div>
            <div class="col-md-4">
                <div class="shipping_box_item" style="padding:10px">
                    <div class="icon_shipping">
                        <img src="{{asset('looz/loozLandingPage/img/saudi_post.png')}}" width="180" alt=" البريد السعودي ">
                    </div>
                    <h5 style="position: relative;top:-10px;font-weight: 400;color: #004c3f"> البريد السعودي </h5>


                </div>
            </div>
            <div class="col-md-4">
                <div class="shipping_box_item" style="padding:10px">
                    <div class="icon_shipping">
                        <img src="{{asset('looz/loozLandingPage/img/aramex2.png')}}" width="160" alt=" أرامكس">
                    </div>
                    <h5 style="position: relative;top:-10px;font-weight: 400;color: #004c3f"> أرامكس </h5>
                </div>
            </div>

            <div class="col-md-4">
                <a href="mailto:info@mapp.sa">
                    <div class="shipping_box_item">
                        <div class="icon_shipping2">
                            <img src="{{asset('looz/loozLandingPage/img/new.png')}}" style="padding:0px;">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection