@extends("layouts.site")
@section("content")



<div class="text-right" id="whatsappIcon" style="position: fixed;z-index: 112; bottom:13px;left:15px">
        <a target="_blank" href="https://api.whatsapp.com/send?phone=966564207393"><img
                src="{{asset('looz/loozLandingPage/img/2w.png')}}" style="z-index: 100;width:45px"></a>
    </div>


    <div class="block_page_st2" style="position: relative;top:100px ;padding:0 0 200px 0 ;">
        <div class="container">
            <div class="head_title_page">
                <div class="row justify-content-md-center">
                    <div class="col-lg-9 col-md-10">
                        <div class="section-header text-center onle-way-h2">
                            <br>
                            <h2 class="section-title " data-wow-delay="0.3s" style="color: #004c3f; ">
                                {{__('Affiliate Marketing Program')}}
                            </h2>

                            <div class="shape wow " data-wow-delay="0.3s"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_nw_page">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img_marketing">
                            <img
                                src="{{asset('looz/loozLandingPage/img/marketing_2.png')}}">
                        </div>
                        <div class="box_beneficiaries" style="position: relative;top:-25px">
                            <h3>{{__('Advantages of the affiliate marketing program')}}</h3>
                            <div class="list_bene">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="bene_item clearfix">
                                            <div class="icon_bene">
                                                <img src="{{asset('looz/loozLandingPage/img/dssd3.svg')}}"
                                                     alt=" التسويق بالعمولة - منصة متاجر "
                                                     style="position: relative;top:-10px">
                                            </div>
                                            <div class="txt_bene">
                                                <h3>المدوّنون </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bene_item clearfix">
                                            <div class="icon_bene">
                                                <img src="{{asset('looz/loozLandingPage/img/marketing.png')}}"
                                                     alt=" التسويق بالعمولة - منصة متاجر "
                                                     style="position: relative;top:-10px">
                                            </div>
                                            <div class="txt_bene">
                                                <h3>المُسوقون</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bene_item clearfix">
                                            <div class="icon_bene">
                                                <img src="{{asset('looz/loozLandingPage/img/you.svg')}}"
                                                     alt=" التسويق بالعمولة - منصة متاجر ">
                                            </div>
                                            <div class="txt_bene">
                                                <h3>اليوتيوبرز </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bene_item clearfix">
                                            <div class="icon_bene" style="position: relative;top:-6px">
                                                <img src="{{asset('looz/loozLandingPage/img/data.png')}}"
                                                     alt=" التسويق بالعمولة - منصة متاجر ">
                                            </div>
                                            <div class="txt_bene">
                                                <h3>صُناع المحتوى</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="block_feature_market_programe">
                            <h2 class="title_ft_m" style="color: #353a43">{{__('Advantages of the affiliate marketing program')}}</h2>
                            <div class="programe_features_list">
                                <div class="feature_programe_box d-flex align-items-center clearfix">
                                    <div class="icon_ft_market">
                                        <img src="{{asset('looz/loozLandingPage/img/1-1.svg')}}"
                                             alt=" التسويق بالعمولة - منصة متاجر ">
                                    </div>
                                    <div class="txt_ft_market">
                                        <p>الانضمام للبرنامج مجاني لأي شخص و لايتطلب شروط </p>
                                    </div>
                                </div>
                                <div class="feature_programe_box d-flex align-items-center clearfix">
                                    <div class="icon_ft_market">
                                        <img src="{{asset('looz/loozLandingPage/img/2-2.svg')}}"
                                             alt=" التسويق بالعمولة - منصة متاجر ">
                                    </div>
                                    <div class="txt_ft_market">
                                        <p>سيتوفر لك حساب خاص لمتابعة ادائك و معرفة المتاجر المشتركة عن طريقك و في أي
                                            باقة</p>
                                    </div>
                                </div>
                                <div class="feature_programe_box d-flex align-items-center clearfix">
                                    <div class="icon_ft_market">
                                        <img src="{{asset('looz/loozLandingPage/img/3-3.svg')}}"
                                             alt=" التسويق بالعمولة - منصة متاجر ">
                                    </div>
                                    <div class="txt_ft_market">
                                        <p>دعم فني مباشر و مساعدة لك في استفساراتك حول المنصة</p>
                                    </div>
                                </div>
                                <div class="feature_programe_box d-flex align-items-center clearfix">
                                    <div class="icon_ft_market">
                                        <img src="{{asset('looz/loozLandingPage/img/4-4.svg')}}"
                                             alt=" التسويق بالعمولة - منصة متاجر ">
                                    </div>
                                    <div class="txt_ft_market">
                                        <p>معرفة رصيدك الحالي و إمكانية طلب سحب الرصيد لحسابك الخاص مباشرة على شكل حوالة
                                            بنكية</p>
                                    </div>
                                </div>
                                <div class="feature_programe_box d-flex align-items-center clearfix">
                                    <div class="icon_ft_market">
                                        <img src="{{asset('looz/loozLandingPage/img/5-5.svg')}}"
                                             alt=" التسويق بالعمولة - منصة متاجر ">
                                    </div>
                                    <div class="txt_ft_market">
                                        <p> قيمة العمولة قابلة للزيادة للمسوقين ذوي الأداء الجيد و قد تصل الى 50%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box_white_cn bg_front">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="txt_box_white">
                                <h3 style="font-weight:400">{{__('Start earning now')}}</h3>
                                <p>{{__('Get your affiliate link and collect up to 1000 riyals for every sale you make')}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="#" data-toggle="modal" data-target="#marketerModal" data-toggle="modal"
                               class="btn btn-common btn-block"
                               style=";border-radius: 100px;margin:auto; padding:10px 40px; max-width: 200px;">{{__('Register now')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="marketerModal" class="modal fade me-custom-modal marketerModall" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="  border-radius: 3px">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="head_modal_title">
                        <h2 style="font-weight:400;position: relative;top:0px;padding: 10px"> تقدم على برنامج التسويق
                            بالعمولة </h2>

                    </div>
                    <div>
                        <form class="form_st1" id="marketerMod" action="sendMarketerMessage"
                              method="POST">
                            <input type="hidden" name="_token" value="bu8b9CefClwfeDSC1b7j4eC5pOdDjAE9hXeVYycs">                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="الإسم" name="name"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="البريد الإلكتروني"
                                       name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" minlength="10" maxlength="10" class="form-control"
                                       placeholder="رقم الجوال"
                                       name="mobile" required>
                            </div>
                          

                            <div class=" text-left">
                                <button type="submit" class="btn btn-common block  "
                                        style=";border-radius: 100px;margin:auto; padding:9px 25px;font-weight:400;">
                                    إرسال
                                    الآن
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->





@endsection