@extends("layouts.site")

@section("title","منصة لوز")

<!-- @section("homeActive","active") -->

@section("header-nav")
 
<div id="hero-area" class="hero-area-bg">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="contents new-word">
                            <h2 class="head-title" style="color: #004c3f;">منصة لوز </h2>
                            تحّول إلى التجارة الالكترونية بسهولة و سرعة و أمتلك متجر إلكتروني خاص بك بجميع مزايا التجارة
                            الإلكترونية مع توفير الخدمات المساندة له </p>
                            <div class="header-button       ">
                                <div class="dfiif">
                                    <a href="{{asset('login')}}" class="btn btn-common text-center">ابدأ الآن </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12  ">
                        <div class="intro-img">
                            <img class="img-responsive " style="width: 105%;margin:-20px 0 0 0 "
                                src="{{asset('/looz/loozLandingPage/img/main.png')}}"
                                alt="  متجر إلكتروني جاهز ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section("content")


    <!-- Features Section start -->
    <section class="section_features_nw section-padding">
        <div class="container">
            <div class="section-header text-center onle-way-h2">
                <br>
                <h2 class="section-title " data-wow-delay="0.3s">ما يُميز لوز</h2>
                <div class="shape wow " data-wow-delay="0.3s"></div>
            </div>
        </div>
        <div class="block_features_list">
            <div class="box_item_feature">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6 order-md-12">
                            <div class="ftur_thumb">
                                <img src="{{asset('/looz/loozLandingPage/img/feature_1.png')}}"
                                    alt=" مميزات منصة لوز ">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 order-md-1">
                            <div class="ftur_txt col-12">
                                <h3>إدارة كل شيء بسهولة</h3>
                                <p> تستطيع من جوالك متابعة طلبات المتجر و عملائك بكل سهولة و في أي وقت و بخطوات بسيطة
                                </p>
                                <a href="management" class="link_arrow">اكتشف كيف تدير متجرك بسهولة<i
                                        class="fa fa-angle-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_item_feature">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6 ">
                            <div class="ftur_thumb img-left-2img">
                                <img src="{{asset('/looz/loozLandingPage/img/feature_2.png')}}"
                                    alt=" مميزات منصة لوز  ">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 ">
                            <div class="ftur_txt col-12">
                                <h3 class="tex">الدفع</h3>
                                <p>وفّر لعملائك خيارات متعددة للشراء من متجرك و فعّلها بكل سهولة
                                    ( مدى , Apple Pay , فيزا , ماستركارد ) </p>
                                <a href="payment" class="link_arrow"> اكتشف المزيد عن الدفع الالكتروني<i
                                        class="fa fa-angle-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_item_feature">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6 order-md-12">
                            <div class="ftur_thumb">
                                <img src="{{asset('/looz/loozLandingPage/img/feature_3.png')}}"
                                    alt=" مميزات منصة لوز ">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 order-md-1">
                            <div class="ftur_txt col-12">
                                <h3>الشحن</h3>
                                <p> استخدم خيارات شحن متنوعة مع عملائك و بسعر مخفّض خاص بلوز و اشحن بكل بساطة عبر
                                    (سمسا ,
                                    ارمكس , البريد السعودي) </p>
                                <a href="shipping" class="link_arrow">اكتشف الخيارات و المزايا الشحن <i
                                        class="fa fa-angle-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_item_feature">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6 ">
                            <div class="ftur_thumb   img-left-2img">
                                <img src="{{asset('/looz/loozLandingPage/img/feature_4.png')}}"
                                    alt=" مميزات منصة لوز  ">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 ">
                            <div class="ftur_txt col-12">
                                <h3>خدمات الشُركاء</h3>
                                <p> من خلال شُركائنا وفّرنا للتاجر نخبة من أفضل مقدمي الخدمات و بسعر خاص ( تصميم
                                    الجرافيك,
                                    التصوير , ادوات التغليف , التسويق ... )</p>
                                <a href="partnersServices" class="link_arrow">تعرف على خدمات الشُركاء<i
                                        class="fa fa-angle-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section End -->


    <!-- Features Section Start -->
    <section id="features">
        <div class="container">
            <div class="section-header text-center">
                <br> <br> <br>
                <h2 class="section-tite  " style="color: #333a45;font-size:28px;  font-weight: normal;"
                    data-wow-delay="0.3s"> أمثلة لللوز </h2>
                <div class="shape " style="margin:20px auto" data-wow-delay="0.3s"></div>
            </div>
            <section class=" screens">
                <br>
                <div id="owl-demo" class="owl-carousel">

                    <div class="item car-ex"
                        style=" box-shadow: 0px 6px 30px 0px rgba(89,91,181,0.1);position: relative;top: 10px">
                        <br>
                        <div class="logo-icon " style="padding:5px;">
                            <img src="{{asset('/looz/loozLandingPage/img/market.png')}}"
                                alt=" متجر الكتروني  ">
                        </div>
                        <h6 class="text-center" style="font-weight: 400;"> مفروشات بيت العروس </h6>
                        <div class="social-overlap process-scetion ">
                            <div class="container">
                                <div class="row ">
                                    <div class="social-icons  text-center">
                                        <a target="_blank"
                                            href="https://play.google.com/store/apps/details?id=com.matajer.baytalaroos&hl=ar"
                                            class="slider-nav-item"><img data-toggle="tooltip" data-placement="bottom"
                                                title="جوجل بلاي " style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/rtee.png')}}"></a>
                                        <a href="https://apps.apple.com/us/app/%D8%A8%D9%8A%D8%AA-%D8%A7%D9%84%D8%B9%D8%B1%D9%88%D8%B3/id1333190404"
                                            target="_blank" class="slider-nav-item"><img data-toggle="tooltip"
                                                data-placement="bottom" title="اب ستور  "
                                                style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/er.png')}}"></a>
                                        <a href="https://baytalaroos.sa" target="_blank" class="slider-nav-item"><img
                                                data-toggle="tooltip" data-placement="bottom" title="متجر ويب "
                                                style="width:20px;margin:7px auto;"
                                                src="{{asset('/looz/loozLandingPage/img/rfdcc.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item car-ex"
                        style=" box-shadow: 0px 6px 30px 0px rgba(89,91,181,0.1);position: relative;top: 10px">
                        <br>
                        <div class="logo-icon " style="padding:5px;">
                            <img src="{{asset('/looz/loozLandingPage/img/market.png')}}" alt="متجر الكتروني  ">
                        </div>
                        <h6 class="text-center" style="font-weight: 400;"> زنهار | Znhar </h6>
                        <div class="social-overlap process-scetion ">
                            <div class="container">
                                <div class="row ">
                                    <div class="social-icons  text-center">
                                        <a target="_blank"
                                            href="https://play.google.com/store/apps/details?id=com.matajer.matajer7a23as8jporhdg7"
                                            class="slider-nav-item"><img data-toggle="tooltip" data-placement="bottom"
                                                title="جوجل بلاي " style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/rtee.png')}}"></a>
                                        <a href="https://apps.apple.com/us/app/id1530952507" target="_blank"
                                            class="slider-nav-item"><img data-toggle="tooltip" data-placement="bottom"
                                                title="اب ستور  " style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/er.png')}}"></a>
                                        <a href="https://znhar.com/" target="_blank" class="slider-nav-item"><img
                                                data-toggle="tooltip" data-placement="bottom" title="متجر ويب "
                                                style="width:20px;margin:7px auto;"
                                                src="{{asset('/looz/loozLandingPage/img/rfdcc.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item car-ex"
                        style=" box-shadow: 0px 6px 30px 0px rgba(89,91,181,0.1);position: relative;top: 10px">
                        <br>
                        <div class="logo-icon " style="padding:5px;">
                            <img src="{{asset('/looz/loozLandingPage/img/market.png')}}"
                                alt="متجر الكتروني  ">
                        </div>
                        <h6 class="text-center" style="font-weight: 400;"> MVPG1 | جيمر ون </h6>
                        <div class="social-overlap process-scetion ">
                            <div class="container">
                                <div class="row ">
                                    <div class="social-icons  text-center">
                                        <a target="_blank"
                                            href="https://play.google.com/store/apps/details?id=com.matajer.matajerb60dol6v0bika0s"
                                            class="slider-nav-item"><img data-toggle="tooltip" data-placement="bottom"
                                                title="جوجل بلاي " style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/rtee.png')}}"></a>
                                        <a href="https://apps.apple.com/us/app/id1532722763" target="_blank"
                                            class="slider-nav-item"><img data-toggle="tooltip" data-placement="bottom"
                                                title="اب ستور  " style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/er.png')}}"></a>
                                        <a href="https://mvpg1.com/" target="_blank" class="slider-nav-item"><img
                                                data-toggle="tooltip" data-placement="bottom" title="متجر ويب "
                                                style="width:20px;margin:7px auto;"
                                                src="{{asset('/looz/loozLandingPage/img/rfdcc.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item car-ex"
                        style=" box-shadow: 0px 6px 30px 0px rgba(89,91,181,0.1);position: relative;top: 10px">
                        <br>
                        <div class="logo-icon " style="padding:5px;">
                            <img src="{{asset('/looz/loozLandingPage/img/market.png')}}" alt="متجر الكتروني  ">
                        </div>
                        <h6 class="text-center" style="font-weight: 400"> شاكر لزينة السيارات </h6>
                        <div class="social-overlap process-scetion ">
                            <div class="container">
                                <div class="row ">
                                    <div class="social-icons  text-center">
                                        <a target="_blank"
                                            href="https://play.google.com/store/apps/details?id=com.matajer.shaker"
                                            class="slider-nav-item"><img data-toggle="tooltip" data-placement="bottom"
                                                title="جوجل بلاي " style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/rtee.png')}}"></a>
                                        <a href="https://apps.apple.com/us/app/%D8%B4%D8%A7%D9%83%D8%B1/id1506456309"
                                            target="_blank" class="slider-nav-item"><img data-toggle="tooltip"
                                                data-placement="bottom" title="اب ستور  "
                                                style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/er.png')}}"></a>
                                        <a href="https://saakeer.com/" target="_blank" class="slider-nav-item"><img
                                                data-toggle="tooltip" data-placement="bottom" title="متجر ويب "
                                                style="width:20px;margin:7px auto;"
                                                src="{{asset('/looz/loozLandingPage/img/rfdcc.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item car-ex"
                        style=" box-shadow: 0px 6px 30px 0px rgba(89,91,181,0.1);position: relative;top: 10px">
                        <br>
                        <div class="logo-icon " style="padding:5px;">
                            <img src="{{asset('/looz/loozLandingPage/img/shatlah.jpg')}}" alt="متجر الكتروني  "
                                style=" box-shadow: 0px 6px 30px 0px rgba(89,91,181,0.1);width: auto;
                             height: 100px;">
                        </div>
                        <h6 class="text-center" style="font-weight: 400"> شتلة للخضار و الفواكة </h6>
                        <div class="social-overlap process-scetion ">
                            <div class="container">
                                <div class="row ">
                                    <div class="social-icons  text-center">
                                        <a target="_blank"
                                            href="https://play.google.com/store/apps/details?id=com.matajer.matajerhkzkz0sltrfvq49"
                                            class="slider-nav-item"><img data-toggle="tooltip" data-placement="bottom"
                                                title="جوجل بلاي " style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/rtee.png')}}"></a>
                                        <a href="https://apps.apple.com/us/app/%D8%B4%D8%AA%D9%84%D8%A9-shatlah/id1535786876"
                                            target="_blank" class="slider-nav-item"><img data-toggle="tooltip"
                                                data-placement="bottom" title="اب ستور  "
                                                style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/er.png')}}"></a>
                                        <a href="https://shatlah.sa/" target="_blank" class="slider-nav-item"><img
                                                data-toggle="tooltip" data-placement="bottom" title="متجر ويب "
                                                style="width:20px;margin:7px auto;"
                                                src="{{asset('/looz/loozLandingPage/img/rfdcc.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item car-ex"
                        style=" box-shadow: 0px 6px 30px 0px rgba(89,91,181,0.1);position: relative;top: 10px">
                        <br>
                        <div class="logo-icon " style="padding:5px;">
                            <img src="{{asset('/looz/loozLandingPage/img/متجر_كادي.jpg')}}" alt="متجر الكتروني  ">
                        </div>
                        <h6 class="text-center" style="font-weight: 400"> كادي | Cadi </h6>
                        <div class="social-overlap process-scetion ">
                            <div class="container">
                                <div class="row ">
                                    <div class="social-icons  text-center">
                                        <a target="_blank"
                                            href="https://play.google.com/store/apps/details?id=com.matajer.matajerk5kptt72sm9dhcy"
                                            class="slider-nav-item"><img data-toggle="tooltip" data-placement="bottom"
                                                title="جوجل بلاي " style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/rtee.png')}}"></a>
                                        <a href="https://apps.apple.com/us/app/id1522679588" target="_blank"
                                            class="slider-nav-item"><img data-toggle="tooltip" data-placement="bottom"
                                                title="اب ستور  " style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/er.png')}}"></a>
                                        <a href="https://cadi.com.sa/" target="_blank" class="slider-nav-item"><img
                                                data-toggle="tooltip" data-placement="bottom" title="متجر ويب "
                                                style="width:20px;margin:7px auto;"
                                                src="{{asset('/looz/loozLandingPage/img/rfdcc.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item car-ex"
                        style=" box-shadow: 0px 6px 30px 0px rgba(89,91,181,0.1); position: relative;top: 10px">

                        <br>
                        <div class="logo-icon " style="padding:5px;">
                            <img src="{{asset('/looz/loozLandingPage/img/mev.jpg')}}" alt="متجر الكتروني  "
                                style=" box-shadow: 0px 6px 30px 0px rgba(89,91,181,0.1);">
                        </div>
                        <h6 class="text-center" style="font-weight: 400"> متجر MEV </h6>
                        <div class="social-overlap process-scetion ">
                            <div class="container">
                                <div class="row ">
                                    <div class="social-icons  text-center">
                                        <a target="_blank"
                                            href="https://play.google.com/store/apps/details?id=com.matajer.matajerdxttk97bvkczlta"
                                            class="slider-nav-item"><img data-toggle="tooltip" data-placement="bottom"
                                                title="جوجل بلاي " style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/rtee.png')}}"></a>
                                        <a href="https://apps.apple.com/us/app/id1533653446" target="_blank"
                                            class="slider-nav-item"><img data-toggle="tooltip" data-placement="bottom"
                                                title="اب ستور  " style="width:20px;margin:7px auto"
                                                src="{{asset('/looz/loozLandingPage/img/er.png')}}"></a>
                                        <a href="https://store.mev.sa/" target="_blank" class="slider-nav-item"><img
                                                data-toggle="tooltip" data-placement="bottom" title="متجر ويب "
                                                style="width:20px;margin:7px auto;"
                                                src="{{asset('/looz/loozLandingPage/img/rfdcc.png')}}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <!-- Statics -->
    <section class="statics-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="item">
                        <h6><img src="{{asset('/looz/loozLandingPage/img/7-2.png')}}" alt="متجر الكتروني  "></h6>
                        <div class="count-statics">+<span class="counter">500</span></div>
                        <p>متجر الكتروني نشط</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <h6><img src="{{asset('/looz/loozLandingPage/img/money.png')}}" alt="Sales"></h6>
                        <div class="count-statics">+<span class="counter">700</span>K</div>
                        <p>أكثر من 700 ألف ريال مبيعات التٌجار </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <h6><img src="{{asset('/looz/loozLandingPage/img/encapsulation.png')}}" alt="Orders"></h6>
                        <div class="count-statics">+<span class="counter">3500</span></div>
                        <p>طلب مكتمل للتٌاجر</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Statics -->

    <!-- Pricing section Start -->
    <section id="pricing" class="section-padding   packages_onle_1 ">
        <div class="container">
            <div class="section-header text-center fbhhd2">
                <a class="section-title " data-wow-delay="0.3s" style="color: #333a45"> باقات لوز </a>
                <div class="shape " data-wow-delay="0.3s"></div>
            </div>
            <div class="row">

                <div class="col-lg-4 col-md-6 col-xs-12 active ">
                    <div class="table " id="active-tb" data-wow-delay="1.2s">
                        <div class="title">
                            <h3 style="font-weight: normal;font-weight: 400"> البداية </h3>
                            <div class="shape " data-wow-delay="0.3s"></div>
                        </div>
                        <div class="pricing-header">
                            <p class="price-value"
                                style="position:relative;top:15px;font-weight: normal;font-weight: 400">
                                مجانا <span> </span></p>
                            <p style="position: relative;top:10px;color: #004c3f;padding:0 0  10px 0 "> خليها علينا </p>


                        </div>

                        <ul class="description">
                            <li> المتجر يعمل على الويب</li>
                            <li> متجر الكتروني متكامل بهويتك</li>
                            <li> عدد العملاء و الطلبات لا محدود</li>
                            <li> الدفع عند الاستلام أو الحوالة البنكية</li>
                            <li> عدد المنتجات 50</li>
                            <br>
                            <li><a href="packages" style=" color: #004c3f;text-decoration: none;"> المزيد من
                                    المميزات <i class="fa fa-angle-left"
                                        style="font-size:24px;position:relative;top:4px;right:3px; color: #004c3f;"></i>
                                </a></li>
                        </ul>

                    </div>
                </div>


                <div class="col-lg-4 col-md-6 col-xs-12 active ">

                    <div class="table " id="active-tb" data-wow-delay="1.2s"
                        style=" background: linear-gradient(to left, rgba(1, 111, 93,0.95) 0%, rgba(0, 76, 63, 0.95) 90%)">

                        <div class="title">
                            <h3 style="color: #fff;font-weight: normal;font-weight: 400"> المتقدمة </h3>
                            <div style="color: #fff;background: #fff" class="shape " data-wow-delay="0.3s"></div>
                        </div>

                        <div class="pp-switch">
                            <label class="toggler" id="filt-monthly"> سنوي </label>
                            <div class="toggle">
                                <input type="checkbox" id="switcher" class="check">
                                <b class="b switch"></b>
                            </div>
                            <label class="toggler toggler--is-active" id="filt-yearly"> شهري</label>
                        </div>


                        <div class="pricing-header hide" id="monthly">
                            <p class="price-value"
                                style="font-size:24px;font-weight: normal;font-weight: 400;color: #fff;position: relative;top:10px;padding:5px">
                                <a style="   text-decoration-line: line-through;margin:0 10px "> 300 </a> 199 <span
                                    style="color: #fff ;"> ر.س </span></p>
                        </div>
                        <div class="pricing-header" id="yearly">
                            <p class="price-value"
                                style="font-size:24px;font-weight: normal;font-weight: 400;color: #fff;position: relative;top:10px;padding:5px">
                                <a style="   text-decoration-line: line-through;margin:0 10px "> 3,600 </a> 1999 <span
                                    style="color: #fff ;"> ر.س </span></p>
                        </div>


                        <ul class="description" style="margin:9px auto">
                            <li style=";color: #fff"> جميع مميزات باقة البداية</li>
                            <li style=";color: #fff"> الحصول على التحديثات للمتجر بشكل مجاني</li>
                            <li style=";color: #fff"> الربط بالدفع الإلكتروني (مدى , فيزا , ماستر)</li>
                            <li style=";color: #fff"> خاصية ضريبة القيمة المضافة</li>
                            <li style=";color: #fff"> الربط مع شركات الشحن</li>
                            <br>
                            <li><a href="packages" style=" color: #fff;text-decoration: none;"> المزيد من
                                    المميزات <i class="fa fa-angle-left"
                                        style="font-size:24px;position:relative;top:4px;right:3px; color: #fff;"></i>
                                </a></li>
                        </ul>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-xs-12 active ">
                    <div class="table " id="active-tb" data-wow-delay="1.2s">
                        <div class="title">
                            <h3 style="font-weight: normal;font-weight: 400"> الإحترافية </h3>
                            <div class="shape " data-wow-delay="0.3s"></div>
                        </div>

                        <div class="pricing-header">
                            <p class="price-value" style="font-size:24px;font-weight: normal;font-weight: 400"><a
                                    style="   text-decoration-line: line-through;margin:0 10px "> 6,400 </a> 4,800<span>
                                    ر.س سنوياً </span>
                            </p>
                            <p class="price-value" style="font-size:10px;margin:-8px 0 0 0;">ما يعادل 400 ر.س شهرياً
                            </p>
                        </div>
                        <div style="padding:20px"></div>


                        <ul class="description">
                            <li> جميع مميزات الباقة المتقدمة</li>
                            <li> تطبيقات جوال Native ( اندرويد و iOS ) لمتجرك</li>
                            <li> تجهيز المتجر الالكتروني قبل الاطلاق</li>
                            <li> انشاء حسابات لفريق العمل بعدد 10</li>
                            <li> عدد المنتجات لا محدود</li>
                            <br>
                            <li><a href="packages" style=" color: #004c3f;text-decoration: none;"> المزيد من
                                    المميزات <i class="fa fa-angle-left"
                                        style="font-size:24px;position:relative;top:4px;right:3px; color: #004c3f;"></i>
                                </a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="customized_package">
                        <div class="row align-items-center">
                            <div class="col-md-6 ">
                                <div class="custom_title">
                                    <h3 style="font-weight: 400; color: #004c3f"> للطلبات الخاصة </h3>
                                    <p style="padding: 5px 0 "> نوفر لك إحتياجتك الخاصة لإنشاء متجر إلكتروني متكامل </p>
                                </div>
                            </div>

                            <div class="col-md-6   bottom_customized_2w2 ">
                                <a href="mailto:info@mapp.sa" class="btn btn-common "
                                    style=";border-radius: 100px;margin:15px 0 0 0;padding:10px 80px;"> اتصل بنا </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br> <br>
            <div class="header-button " style="position:relative;top:20px">
                <a href="packages" class="btn btn-common"
                    style=";border-radius: 100px;margin:15px 0 0 0;padding:12px 50px; "> قارن بين الباقات </a>
            </div>
            <br>
        </div>
    </section>

   
    <!-- Pricing Table Section End -->
    <div id="home-div1316" class="pfblock-image-div12">
        <div class="home-overlay-div1316">
            <div class="text-center  botton-2 ">
                <h2>ركز على نمو تجارتك و اترك لنا مهمة تشغيل متجرك الإلكتروني</h2>
                <br>
                <a href="{{asset('login')}}" class="btn btn-common "> ابدأ الآن </a>
            </div>
        </div>
    </div>



@endsection