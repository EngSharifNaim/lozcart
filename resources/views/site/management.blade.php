@extends("layouts.site")
@section("content")
<!--content code-->
<!------ Include the above in your HEAD tag ---------->
    <div class="block_page_st2 head_padding_page" style="position: relative;top:100px ">
        <div class="">
            <div class="head_title_page">
                <div class="row justify-content-md-center">
                    <div class="col-lg-9 col-md-10">
                        <div class="section-header text-center onle-way-h2">
                            <h2 class="section-title " data-wow-delay="0.3s" style="color: #004c3f; ">
                                @if (App::isLocale('en'))
                                    {{$feature_page->title_page}}
                                @else
                                    {{$feature_page->title_page_ar}}
                                @endif
                            </h2>
                            <p style="color: #353a43">
                                @if (App::isLocale('en'))
                                    {{$feature_page->desc_page}}
                                @else
                                    {{$feature_page->desc_page_ar}}
                                @endif
                            </p>
                            <div class="shape wow " data-wow-delay="0.3s"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_nw_page" style="padding-top: 0;">
                <div class="">
                    <div class="list_management_boxs ">
                        <div class="item_box_management ">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-md-12">
                                        <div class="mag_img">
                                            <img src="{{env('ATTACH_URL_ADMIN').'feature_page/'.$feature_page->sub_photo_1}}"
                                                 alt=" متجر الكتروني ">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 order-md-1">
                                        <div class="txt_mag ftur_txt">
                                            <h3>
                                                @if (App::isLocale('en'))
                                                    {{$feature_page->sub_title_1}}
                                                @else
                                                    {{$feature_page->sub_title_1_ar}}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (App::isLocale('en'))
                                                    {{$feature_page->sub_desc_1}}
                                                @else
                                                    {{$feature_page->sub_desc_1_ar}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item_box_management " style="background: #f9f9f9 ;border:0">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6">
                                        <div class="mag_img">
                                            <img src="{{env('ATTACH_URL_ADMIN').'feature_page/'.$feature_page->sub_photo_2}}"
                                                 alt=" متجر الكتروني ">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <div class="txt_mag ftur_txt">
                                            <h3>
                                                @if (App::isLocale('en'))
                                                    {{$feature_page->sub_title_2}}
                                                @else
                                                    {{$feature_page->sub_title_2_ar}}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (App::isLocale('en'))
                                                    {{$feature_page->sub_desc_2}}
                                                @else
                                                    {{$feature_page->sub_desc_2_ar}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item_box_management">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-md-12">
                                        <div class="mag_img">
                                            <img src="{{env('ATTACH_URL_ADMIN').'feature_page/'.$feature_page->sub_photo_3}}"
                                                 alt=" متجر الكتروني ">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 order-md-1">
                                        <div class="txt_mag ftur_txt">
                                            <h3>
                                                @if (App::isLocale('en'))
                                                    {{$feature_page->sub_title_3}}
                                                @else
                                                    {{$feature_page->sub_title_3_ar}}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (App::isLocale('en'))
                                                    {{$feature_page->sub_desc_3}}
                                                @else
                                                    {{$feature_page->sub_desc_3_ar}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item_box_management" style="background: #f9f9f9 ;border:0">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6">
                                        <div class="mag_img">
                                            <img src="{{env('ATTACH_URL_ADMIN').'feature_page/'.$feature_page->sub_photo_4}}"
                                                 alt=" متجر الكتروني ">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <div class="txt_mag ftur_txt">
                                            <h3>
                                                @if (App::isLocale('en'))
                                                    {{$feature_page->sub_title_4}}
                                                @else
                                                    {{$feature_page->sub_title_4_ar}}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (App::isLocale('en'))
                                                    {{$feature_page->sub_desc_4}}
                                                @else
                                                    {{$feature_page->sub_desc_4_ar}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-lg-9 col-md-10">
                            <div class="section-header text-center onle-way-h2">
                                <br>
                                <h2 class="section-title " data-wow-delay="0.3s" style="color: #353a43">{{__('Additional Features')}}</h2>
                                <div class="shape wow " data-wow-delay="0.3s"></div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="features_plus_list pay_options_list">
                            <div class="row">
                                @foreach($additional_features as $additional_feature)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="option_pay_item d-flex align-items-center clearfix">
                                        <div class="icon_ppy">
                                            <img src="{{env('ATTACH_URL_ADMIN').'additional_feature/'.$additional_feature->icon}}"
                                                 alt=" متجر الكتروني ">
                                        </div>
                                        <div class="txt_ppy">
                                            <p>
                                                @if (App::isLocale('en'))
                                                    {{$additional_feature->desc}}
                                                @else
                                                    {{$additional_feature->desc_ar}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
