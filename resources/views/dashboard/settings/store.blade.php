@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-user.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('dropify_cropper/cropper.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"  />

    @if(App::isLocale('en'))
        <style>
            .dropzone .dz-preview .dz-success-mark svg, .dropzone .dz-preview .dz-error-mark svg {
                width: 20px;
                height: 20px;
            }

            .cutomUploadZone .dropzone {
                min-height: 200px;
            }

            .userImage.Custom {
                width: 100%;
                border: 2px dashed #ced4da;
                border-radius: 0;
            }
            .upload-btn-wrapper {
                overflow: hidden;
                display: inline-block;
                position: absolute;
                top: 0;
                left: 0;
                cursor: pointer;
                right: 0;
                bottom: 0;
            }
            .userImage.Custom .upload-btn-wrapper {
                margin-top: 2rem;
            }

            .userImage.Custom .upload-btn-wrapper p {
                text-align: center;
            }
            .upload-btn-wrapper .btn {
                cursor: pointer;
                border: 1px solid #E1AB39;
                color: #fff;
                border-radius: 50px;
                font-size: 14px;
                width: 40px;
                height: 40px;
                padding: 0;
                text-align: center;
                line-height: 35px;
                background-color: #333744;
                border-color: #333743;
            }
            .upload-btn-wrapper .btn {
                position: absolute;
                top: 0;
                right: 0;
            }
            .userImage {
                position: relative;
                width: 160px;
                height: 160px;
                border-radius: 50%;
                margin: 0 auto;
                border: 1px dashed #e8cef5;
                padding: 10px;
                border-radius: 20px;
                display: flex;
                align-items: center;
            }
            .userImage img {
                max-width: 100%;
                max-height: 100%;
                border: 0 !important;
                padding: 0 !important;
                border-radius: 0 !important;
                display: block;
                margin: 0 auto;
            }
            .userImage.Custom .upload-btn-wrapper .btn {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                background-color: #6264b9;
                border-color: #6264b9;
            }
            .upload-btn-wrapper input[type=file] {
                width: 100%;
                height: 100%;
            }
            .logo {
                display: block;
                line-height: 70px;
            }
            .upload-btn-wrapper input[type=file] {
                font-size: 100px;
                position: absolute;
                left: 0;
                top: 0;
                opacity: 0;
                cursor: pointer;
            }

            .me-custom-modal .deBtn, .me-custom-modal .delete, .me-custom-modal .deleteOption, .me-custom-modal .deleteBtn {
                display: block;
                text-align: center;
                height: 37px;
                line-height: 37px;
            }
            #title {
                color: #fff;
                background-color: #4d90fe;
                font-size: 25px;
                font-weight: 500;
                padding: 6px 12px;
            }

            #target {
                width: 345px;
            }

            .img-container img {
                max-width: 100%;
            }

            .img-container, .img-container img {
                max-width: 100%;
            }

            .modal img {
                width: 100%;
            }

            #image-error {
                color: red;
                font-size: 11px;
            }

            .cropper-crop-box {
                height: 100%;
            }
            .modal .modal-header {
                background-color: #28c76f !important;
            }
            .modal-title{
                color: #ffffff;
            }
        </style>
        <style>
            #counter,#counter2{
                /*text-align: left;*/
                /*direction: ltr;*/
                line-height:60px;
                position:relative;
                bottom: 49px;
                right: 10px;
                width: max-content;
                float: right;
            }
            .success{
                border-radius:35px;
                -moz-border-radius: 35px;
                -webkit-border-radius: 35px;
                color:white;
                background-color: #7ab77a;
                padding: 8px;
                font-size: 11px
            }
            #link{
                margin-bottom: 10px;
            }
            #btn-map{
                height: 100%;
                line-height: 22px;
                position: absolute;
                right: 0;
                border:0;
                width:130px;
                border-bottom-left-radius:0;
                border-top-left-radius:0
            }
            .m-pop-up{
                line-height: 36px;
                text-align: right;
                padding: 0 10PX 0 0;
                display: flex;
                justify-content: space-between;
                width: 80%;
                font-size: 15px;
            }
            #map {
                width: 100% !important;
                height: 400px !important;
                position: relative !important;
                overflow: hidden !important;
            }
        </style>
    @else
        <style>
            .dropzone .dz-preview .dz-success-mark svg, .dropzone .dz-preview .dz-error-mark svg {
                width: 20px;
                height: 20px;
            }

            .cutomUploadZone .dropzone {
                min-height: 200px;
            }

            .userImage.Custom {
                width: 100%;
                border: 2px dashed #ced4da;
                border-radius: 0;
            }
            .upload-btn-wrapper {
                overflow: hidden;
                display: inline-block;
                position: absolute;
                top: 0;
                left: 0;
                cursor: pointer;
                right: 0;
                bottom: 0;
            }
            .userImage.Custom .upload-btn-wrapper {
                margin-top: 2rem;
            }

            .userImage.Custom .upload-btn-wrapper p {
                text-align: center;
            }
            .upload-btn-wrapper .btn {
                cursor: pointer;
                border: 1px solid #E1AB39;
                color: #fff;
                border-radius: 50px;
                font-size: 14px;
                width: 40px;
                height: 40px;
                padding: 0;
                text-align: center;
                line-height: 35px;
                background-color: #333744;
                border-color: #333743;
            }
            .upload-btn-wrapper .btn {
                position: absolute;
                top: 0;
                right: 0;
            }
            .userImage {
                position: relative;
                width: 160px;
                height: 160px;
                border-radius: 50%;
                margin: 0 auto;
                border: 1px dashed #e8cef5;
                padding: 10px;
                border-radius: 20px;
                display: flex;
                align-items: center;
            }
            .userImage img {
                max-width: 100%;
                max-height: 100%;
                border: 0 !important;
                padding: 0 !important;
                border-radius: 0 !important;
                display: block;
                margin: 0 auto;
            }
            .userImage.Custom .upload-btn-wrapper .btn {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                background-color: #6264b9;
                border-color: #6264b9;
            }
            .upload-btn-wrapper input[type=file] {
                width: 100%;
                height: 100%;
            }
            .upload-btn-wrapper .logo {
                display: block;
                line-height: 70px;
                background: #ffffff00;
                border: 1px solid #ffffff00;
                overflow: hidden;
                margin-left: unset;
                margin-right: unset;
                border-radius: 16px;
                max-width: unset;
                width: 100%;
                height: 100%;

            }
            .upload-btn-wrapper input[type=file] {
                font-size: 100px;
                position: absolute;
                left: 0;
                top: 0;
                opacity: 0;
                cursor: pointer;
            }

            .me-custom-modal .deBtn, .me-custom-modal .delete, .me-custom-modal .deleteOption, .me-custom-modal .deleteBtn {
                display: block;
                text-align: center;
                height: 37px;
                line-height: 37px;
            }
            #title {
                color: #fff;
                background-color: #4d90fe;
                font-size: 25px;
                font-weight: 500;
                padding: 6px 12px;
            }

            #target {
                width: 345px;
            }

            .img-container img {
                max-width: 100%;
            }

            .img-container, .img-container img {
                max-width: 100%;
            }

            .modal img {
                width: 100%;
            }

            #image-error {
                color: red;
                font-size: 11px;
            }

            .cropper-crop-box {
                height: 100%;
            }
            .modal .modal-header {
                background-color: #28c76f !important;
            }
            .modal-title{
                color: #ffffff;
            }
        </style>
        <style>
            #counter,#counter2{
                /*text-align: left;*/
                /*direction: ltr;*/
                line-height:60px;
                position:relative;
                bottom: 49px;
                left: 10px;
                width: max-content;
                float: left;
            }
            .success{
                border-radius:35px;
                -moz-border-radius: 35px;
                -webkit-border-radius: 35px;
                color:white;
                background-color: #7ab77a;
                padding: 8px;
                font-size: 11px
            }
            #link{
                margin-bottom: 10px;
            }
            #btn-map{
                height: 100%;
                line-height: 22px;
                position: absolute;
                right: 0;
                border:0;
                width:130px;
                border-bottom-left-radius:0;
                border-top-left-radius:0
            }
            .m-pop-up{
                line-height: 36px;
                text-align: right;
                padding: 0 10PX 0 0;
                display: flex;
                justify-content: space-between;
                width: 80%;
                font-size: 15px;
            }
            #map {
                width: 100% !important;
                height: 400px !important;
                position: relative !important;
                overflow: hidden !important;
            }
        </style>
    @endif
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{__('Store Setting')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('setting.index')}}">{{__('Settings')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Store Setting')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- brand edit start -->
                <section class="app-store-edit">
                    <div class="card">
                        <div class="card-body">
                            <form  >
                                <div class="flex-grow-1">
                                    <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">
                                                    {{__('Name Market Ar')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <input minlength="3" maxlength="30" type="text" class="form-control" required="" id="name_ar" name="market_name_ar" value="{{$market->market_name_ar}}" placeholder="{{__('Name Market Ar')}}">
                                                <div id="counter">
                                                </div>
                                            </div>
                                            @if(in_array('en',$language))
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">
                                                    {{__('Name Market En')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <input minlength="3" maxlength="30" type="text" class="form-control" required="" id="name_en" name="market_name" value="{{$market->market_name}}" placeholder="{{__('Name Market En')}}">
                                                <div id="counter2">
                                                </div>
                                            </div>
                                            @endif
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">
                                                    {{__('Link Market')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <input  type="text" class="form-control" required="" id="link" name="link" value="{{$market->link}}" placeholder="{{__('Link Market')}}">
                                                <div class="form-group col-md-9">
                                                    <span id="linkHint" class=" order-last linkHint" style="display: none">  {{__('Incorrect store name format')}}   </span>
                                                    <span id="unique-error" class="invalid-feedback order-last next_step step_two_inputs"> {{__('Store name require')}}   </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <div class="form-group">
                                    <button   type="button" id="edit_store"  class="edit_store btn btn-success waves-effect waves-light">
                                        {{__('Save')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">

                        <form method="POST" action="" enctype="multipart/form-data" id="LogoForm" novalidate="novalidate">
                            <div class="card-body">
                                <h4 class="header-title mb-3">{{__('Logo Store')}} </h4>
                                <div class="userImage" id="userLogoImage">

                                    <img src="{{asset('uploads/logoMarket/').'/'.$market->logo}}" alt="" id="preview_store_image" style="border: 1px dashed #e8cef5;;padding:10px;border-radius: 20px;">
                                    <div class="upload-btn-wrapper">
                                        <button class="btn" type="button"><i class="fa fa-upload"></i></button>
                                        <input type="file" id="fileLogoBtn" name="value_text" class="logo">
                                    </div>
                                </div>
                                <br>
                                <p class="text-center" style="color: #ee151f;font-size:12px">{{__('Width: 512px Length: 512px Size: 0.5Mega Supported Formats: .jpeg .jpg .png')}}</p>
                                <div class="form-group col-md-12 mt-2 text-right">
                                    <button class="btn btn-primary" style="display: none;" type="button" id="saveLogoImage">
                                        {{__('Save')}}
                                    </button>
                                </div>
                            </div> <!-- end card-body -->
                        </form>
                    </div>
                    <div class="card">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-3">{{__('Description Store')}} <span style="color: red"> * </span></h4>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <ul class="nav nav-tabs tab-floated quick-cutom-nav">
                                                    <li class="nav-item">
                                                        <a href="#ar" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                            {{__('Arabic')}}
                                                        </a>
                                                    </li>

                                                    @if(in_array('en',$language))
                                                        <li class="nav-item">
                                                            <a href="#en" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                                {{__('English')}}
                                                            </a>
                                                        </li>
                                                    @endif

                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active show" id="ar">
                                                        <textarea class="form-control" rows="2" required="" name="store_desc_ar" placeholder=" ضع وصف قصير لمتجرك مثال :  متجر عالم الاناقة للعطور حيث نقدم أفضل ماركات العطور الفرنسة ">{{$market->store_desc_ar}}</textarea>
                                                    </div>
                                                    @if(in_array('en',$language))
                                                    <div class="tab-pane" id="en">
                                                        <textarea required="" rows="2" class="form-control english-dir" name="store_desc_en" placeholder=" Put a short description of your store. Example: World of Perfumes Shop where we offer the best brands of French perfumes ">{{$market->store_desc_en}}</textarea>
                                                    </div>
                                                    @endif
                                                </div>
                                                <br>
                                                <div class="card col-md-12" >
                                                    <div class="card-body" style="padding: 8px;">
                                                        <h4 class="header-title mb-3">
                                                            {{__('Store Headquarters')}}
                                                            <a style="color: red"> * </a>
                                                        </h4>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="country" class="control-label">
                                                                    {{__('Owner Name')}}
                                                                    <span style="color: red"> * </span>
                                                                </label>
                                                                <input required="" value="{{$market->owner_name}}" id="owner_name" type="text" name="owner_name" class="form-control" placeholder="{{__('Owner Name')}}" aria-required="true">

                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="country" class="control-label">
                                                                    {{__('Address')}}
                                                                    <span style="color: red"> * </span>
                                                                </label>
                                                                <input required="" value="{{$market->address}}" id="address" type="text" name="address" class="form-control" placeholder="{{__('Address')}}" aria-required="true">

                                                            </div>
                                                            <div class="form-group  col-md-6">
                                                                <label for="country" class="control-label">
                                                                    {{__('State/Province')}}
                                                                    <span style="color: red"> * </span>
                                                                </label>
                                                                <input required="" value="{{$market->state}}" id="state" type="text" name="state" class="form-control" placeholder="{{__('State/Province')}}" aria-required="true">

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="country" class="control-label">
                                                                    {{__('City')}}
                                                                    <span style="color: red"> * </span>
                                                                </label>
                                                                <input required="" value="{{$market->city}}" id="city" type="text" name="city" class="form-control" placeholder="{{__('City')}}" aria-required="true">

                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="country" class="control-label">
                                                                    {{__('Country')}}
                                                                    <span style="color: red"> * </span>
                                                                </label>
                                                                <select class="select2 w-100" name="country_id" id="country_id_modal">
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="country" class="control-label">
                                                                    {{__('Postal code')}}
                                                                    <span style="color: red"> * </span>
                                                                </label>
                                                                <input required="" value="{{$market->postal_code}}" id="postal_code" type="text" name="postal_code" class="form-control" placeholder="{{__('Postal code')}}" aria-required="true">

                                                            </div>
                                                        </div>


{{--                                                        <div class="input-group yourLocationPopup" style="border:1px solid #cdd3d9;border-radius:.2rem;cursor:pointer;">--}}
{{--                                                            <div class="input-group-prepend" style="height:42.39px;">--}}
{{--                                                                <span class="input-group-text" id="basic-addon1" >--}}
{{--                                                                    <i class="fas fa-map-marker-alt"></i>--}}
{{--                                                                </span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="m-pop-up" >--}}
{{--                                                                <a style="height:40px;overflow:hidden;"> {{$market->address??'#'}} </a>--}}
{{--                                                                <a href="#staticsServ" id="btn-map" data-toggle="modal" data-target="#staticsServ" class="btn btn-success" >--}}
{{--                                                                    {{__('Determine')}}--}}
{{--                                                                </a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <br>--}}
                                                    </div> <!-- end card-body -->
                                                </div> <!-- end card-->


                                            </div>
                                            <div class="form-group col-md-12 ">
                                                <button class="btn btn-success" id="save_description" type="button">{{__('Save')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- end card-->
                        </div>
                    </div>
                    <div class="card">

                        <form >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 form-group">
                                        <label for="twitter-input">{{__('Twitter')}}</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">
                                                    <i data-feather="twitter" class="font-medium-2"></i>
                                                </span>
                                            </div>
                                            <input id="twitter-input" type="text" name="twitter" class="form-control" value="{{$market->links->twitter ??__('')}}" placeholder="https://www.twitter.com/" aria-describedby="basic-addon3" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                        <label for="facebook-input">{{__('Facebook')}}</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon4">
                                                    <i data-feather="facebook" class="font-medium-2"></i>
                                                </span>
                                            </div>
                                            <input id="facebook-input" type="text" name="facebook" class="form-control" value="{{$market->links->facebook ??__('')}}" placeholder="https://www.facebook.com/" aria-describedby="basic-addon4" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                        <label for="instagram-input">{{__('Instagram')}}</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">
                                                    <i data-feather="instagram" class="font-medium-2"></i>
                                                </span>
                                            </div>
                                            <input id="instagram-input" type="text" name="instagram" class="form-control" value="{{$market->links->instagram ??__('')}}" placeholder="https://www.instagram.com/" aria-describedby="basic-addon5" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                        <label for="instagram-input">{{__('Snapchat')}}</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">
                                                    <i class="fab fa-snapchat-ghost font-medium-2"></i>
{{--                                                            <i data-feather="instagram" class="font-medium-2"></i>--}}
                                                </span>
                                            </div>
                                            <input id="instagram-input" type="text" name="snapchat" class="form-control" value="{{$market->links->snapchat ??__('')}}" placeholder="https://www.instagram.com/" aria-describedby="basic-addon5" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                        <label for="instagram-input">{{__('Whatsapp')}}</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">
                                                    <i class="fab fa-whatsapp font-medium-2"></i>
                                                </span>
                                            </div>
                                            <input id="whatsapp-input" type="text" name="whatsapp" class="form-control" value="{{$market->links->whatsapp ??__('')}}" placeholder="https://www.whatsapp.com/" aria-describedby="basic-addon5" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                        <label for="instagram-input">{{__('Google Play')}}</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">
                                                    <i class="fab fa-google-play font-medium-2"></i>
                                                </span>
                                            </div>
                                            <input id="google-play-input" type="text" name="googlePlay" class="form-control" value="{{$market->links->googlePlay ??__('')}}" placeholder="https://www.googlePlay.com/" aria-describedby="basic-addon5" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                        <label for="instagram-input">{{__('App Store')}}</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">
                                                    <i class="fab fa-app-store font-medium-2"></i>
                                                </span>
                                            </div>
                                            <input id="app-store-input" type="text" name="appStore" class="form-control" value="{{$market->links->appStore ??__('')}}" placeholder="https://www.appStore.com/" aria-describedby="basic-addon5" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                        <label for="instagram-input">{{__('Maroof')}}</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">
                                                    <i data-feather="globe" class="font-medium-2"></i>
                                                </span>
                                            </div>
                                            <input id="maroof-input" type="text" name="m3roof" class="form-control" value="{{$market->links->m3roof ??__('')}}" placeholder="https://www.appStore.com/" aria-describedby="basic-addon5" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                        <label for="instagram-input">{{__('Phone')}}</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">
                                                    <i data-feather="smartphone" class="font-medium-2"></i>
                                                </span>
                                            </div>
                                            <input id="phone-input" type="text" name="phone" class="form-control" value="{{$market->links->phone ??__('')}}" placeholder="+0592555309" aria-describedby="basic-addon5" />
                                        </div>
                                    </div>

                                    <div class="col-12 ">
                                        <button type="button" class="btn btn-success " id="save_link" >{{__('Save Changes')}}</button>
                                    </div>
                                </div>
                            </div> <!-- end card-body -->
                        </form>
                    </div>
                </section>
                <!-- brand edit ends -->

            </div>
        </div>
    </div>
    <div class="modal fade storeLogoEdit" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">{{__('Edit Logo Store')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <input type="hidden" value="" name="logoDone" class="logoDone" id="logoDone" required>
                        <div id="LogoImageArea" style="width: auto;">
                            <img id="LogoImage" src="{{asset('photo/defaultLogo.png')}}" alt="Picture">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="crop" type="button" class="btn btn-success bg-purple" >
                        {{__('Save')}}
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" >
                        {{__('Close')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
{{--    <div id="staticsServ" class="modal fade me-custom-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
{{--                </div>--}}
{{--                <div class="modal-body p-2 text-center">--}}
{{--                    <form id="locationForm"  >--}}
{{--                        <div class="row">--}}
{{--                            <div class="form-group col-md-12">--}}
{{--                                <div class="tab-content">--}}
{{--                                    <input required="" name="latitude" id="latitude" value="31.4856" type="hidden" class="form-control" placeholder="Latitude">--}}
{{--                                    <input required="" name="longitude" id="longitude" value="34.448" type="hidden" class="form-control" placeholder="Longitude">--}}
{{--                                    <input required="" name="city" id="city" value="" type="hidden" class="form-control" placeholder="city">--}}
{{--                                    <input required="" name="address" id="address" value="" type="hidden" class="form-control" placeholder="address">--}}

{{--                                    <div class="tab-pane active show" id="ar">--}}
{{--                                        <div id="map" ></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-12 text-right">--}}
{{--                                <button class="btn btn-secondary" type="button" onclick="initialize();">--}}
{{--                                    {{__('Withdrawal current location')}}--}}
{{--                                </button>--}}
{{--                                <button class="btn btn-success" id="save_location" type="button">{{__('Save')}}</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- END: Content-->
@endsection
@section('Scripts')
    <script>
        var UrlForScripts = "{{url('/')}}";

    </script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/pages/app-user-edit.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/components/components-navs.js')}}"></script>
    <!-- END: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/custom/market-validation.js')}}"></script>
    <!-- END: Page JS-->

    <script src="{{asset('dropify_cropper/dropzone.min.js')}}"></script>
    <script src="{{asset('dropify_cropper/cropper.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" ></script>

    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
{{--    <script src="{{asset('app-assets/custom/store.js')}}"></script>--}}
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwWXHYqVIpNRevJmhATImppUwKZfkwbtE&language=en"></script>
    <script src="{{asset('app-assets/custom/gmaps.js')}}"></script>
{{--    <script>--}}
{{--        var map, marker;--}}
{{--        var lt = "{{$market->latitude ??'31.4856'}}";--}}
{{--        var lg = "{{$market->longitude ??'34.448'}}";--}}
{{--        var latlng = new google.maps.LatLng(lt, lg);--}}
{{--        var geocoder = new google.maps.Geocoder;--}}
{{--        map = new GMaps({--}}
{{--            el: '#map',--}}
{{--            lat: lt,--}}
{{--            lng: lg,--}}
{{--            zoom: 12,--}}
{{--            center: latlng,--}}
{{--            dragend: function (e) {--}}
{{--                var latlng = new google.maps.LatLng(e.center.lat(), e.center.lng());--}}
{{--                map.setCenter(e.center.lat(), e.center.lng());--}}
{{--                marker.setPosition(latlng);//console.log(e.center.lat());--}}
{{--                $('#latitude').val(e.center.lat());--}}
{{--                $('#longitude').val(e.center.lng());--}}

{{--                geocoder.geocode({'location': latlng}, function (results, status) {--}}
{{--                    if (status === 'OK') {--}}
{{--                        if (results[0]) {--}}
{{--                            for (var i = 0; i < results[0].address_components.length; i++) {--}}
{{--                                for (var b = 0; b < results[0].address_components[i].types.length; b++) {--}}
{{--                                    if (results[0].address_components[i].types[b] == "administrative_area_level_2") {--}}
{{--                                        city = results[0].address_components[i];--}}
{{--                                        break;--}}
{{--                                    }--}}
{{--                                }--}}
{{--                            }--}}
{{--                            //city data--}}
{{--                            $('#city').val(city.short_name);--}}
{{--                            $('#address').val(results[0].formatted_address);--}}
{{--                        } else {--}}
{{--                            console.log('No results found');--}}
{{--                        }--}}
{{--                    } else {--}}
{{--                        console.log('Geocoder failed due to: ' + status);--}}
{{--                    }--}}
{{--                });--}}

{{--            }--}}
{{--        });--}}
{{--        marker = map.createMarker({--}}
{{--            lat: lt,--}}
{{--            lng: lg,--}}
{{--            title: 'موقع التسليم',--}}
{{--            draggable: true,--}}
{{--            icon: '{{asset('photo/gps.png')}}',--}}
{{--            dragend: function (event) {--}}
{{--                var lat = event.latLng.lat();--}}
{{--                var lng = event.latLng.lng();--}}
{{--                $('#latitude').val(lat);--}}
{{--                $('#longitude').val(lng);--}}
{{--                latlng = new google.maps.LatLng(lat, lng);--}}
{{--                geocoder.geocode({'location': latlng}, function (results, status) {--}}
{{--                    if (status === 'OK') {--}}
{{--                        if (results[0]) {--}}
{{--                            for (var i = 0; i < results[0].address_components.length; i++) {--}}
{{--                                for (var b = 0; b < results[0].address_components[i].types.length; b++) {--}}
{{--                                    if (results[0].address_components[i].types[b] == "administrative_area_level_2") {--}}
{{--                                        city = results[0].address_components[i];--}}
{{--                                        break;--}}
{{--                                    }--}}
{{--                                }--}}
{{--                            }--}}
{{--                            //city data--}}
{{--                            $('#city').val(city.short_name);--}}
{{--                            $('#address').val(results[0].formatted_address);--}}
{{--                        } else {--}}
{{--                            console.log('No results found');--}}
{{--                        }--}}
{{--                    } else {--}}
{{--                        console.log('Geocoder failed due to: ' + status);--}}
{{--                    }--}}
{{--                });--}}
{{--            },--}}
{{--        });--}}


{{--        map.addMarker(marker);--}}
{{--        geocoder.geocode({'location': latlng}, function (results, status) {--}}
{{--            if (status === 'OK') {--}}
{{--                if (results[0]) {--}}
{{--                    for (var i = 0; i < results[0].address_components.length; i++) {--}}
{{--                        for (var b = 0; b < results[0].address_components[i].types.length; b++) {--}}
{{--                            if (results[0].address_components[i].types[b] == "administrative_area_level_2") {--}}
{{--                                city = results[0].address_components[i];--}}
{{--                                break;--}}
{{--                            }--}}
{{--                        }--}}
{{--                    }--}}
{{--                    //city data--}}
{{--                    $('#city').val(city.short_name);--}}
{{--                    $('#address').val(results[0].formatted_address);--}}
{{--                } else {--}}
{{--                    $('#city').val('');--}}
{{--                    $('#address').val('');--}}
{{--                    console.log('No results found');--}}
{{--                }--}}
{{--            } else {--}}
{{--                $('#city').val('');--}}
{{--                $('#address').val('');--}}
{{--                console.log('Geocoder failed due to: ' + status);--}}
{{--            }--}}
{{--        });--}}

{{--        function initialize() {--}}
{{--            GMaps.geolocate({--}}
{{--                success: function (position) {--}}
{{--                    map.setCenter(position.coords.latitude, position.coords.longitude);--}}
{{--                    $('#latitude').val(position.coords.latitude);--}}
{{--                    $('#longitude').val(position.coords.longitude);--}}
{{--                    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);--}}
{{--                    marker.setPosition(latlng);--}}
{{--                    geocoder.geocode({'location': latlng}, function (results, status) {--}}
{{--                        if (status === 'OK') {--}}
{{--                            if (results[0]) {--}}
{{--                                for (var i = 0; i < results[0].address_components.length; i++) {--}}
{{--                                    for (var b = 0; b < results[0].address_components[i].types.length; b++) {--}}
{{--                                        if (results[0].address_components[i].types[b] == "administrative_area_level_2") {--}}
{{--                                            city = results[0].address_components[i];--}}
{{--                                            break;--}}
{{--                                        }--}}
{{--                                    }--}}
{{--                                }--}}
{{--                                //city data--}}
{{--                                $('#city').val(city.short_name);--}}
{{--                                $('#address').val(results[0].formatted_address);--}}
{{--                            } else {--}}
{{--                                $('#city').val('');--}}
{{--                                $('#address').val('');--}}
{{--                                console.log('No results found');--}}
{{--                            }--}}
{{--                        } else {--}}
{{--                            $('#city').val('');--}}
{{--                            $('#address').val('');--}}
{{--                            console.log('Geocoder failed due to: ' + status);--}}
{{--                        }--}}
{{--                    });--}}
{{--                },--}}
{{--                error: function (error) {--}}
{{--                    //   alert('Geolocation failed: '+error.message);--}}
{{--                },--}}
{{--                not_supported: function () {--}}
{{--                    //   alert("Your browser does not support geolocation");--}}
{{--                },--}}
{{--                always: function () {--}}
{{--                    //  alert("Done!");--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            $('.yourLocationPopup').on('click', function () {--}}
{{--                $('#staticsServ').modal('show');--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}
    {{--    get countries in modal--}}
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('#country_id_modal').select2()
            var isoCountries = [
                    @foreach($countries as $country)
                    {{--<option value="{{ $country->id}}" >{{$country->name}}</option>--}}
                { id: {{ $country->id}},selected: {{$country->id ==$market->country_id ?'true': 'false'}}, text: '{{ $country->name}}',key:'{{ $country->key}}' },
                // { id: 2, abbreviation: "us", text: 'United States' ,key:'+970'},
                @endforeach
            ];
            function formatCountry(country) {
                if (!country.id) { return country.text; }
                var $country = $(
                    {{--'<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+--}}
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.text + '</span>'
                );
                return $country;
            };
            function formatState2 (country) {

                if (!country.id) {
                    return country.text;
                }
                var $country = $(
                    {{--'<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+--}}
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.text + '</span>'
                );

                return $country;

            };
            $("#country_id_modal").select2({
                placeholder: "Please Select a country",
                templateResult: formatCountry,
                templateSelection:formatState2,
                data: isoCountries
            });

            $('#CountryOfBirth').on('change', function () {
                console.log($(this).val())
            })
        });
    </script>
{{--    save Location--}}

    <script>
        $(document).ready(function() {
            function myHandel(obj, id) {
                if ('responseJSON' in obj)
                    obj.messages = obj.responseJSON;
                $('input,select,textarea').each(function () {
                    var parent = "";
                    if ($(this).parents('.form-group').length > 0)
                        parent = $(this).parents('.form-group');
                    if ($(this).parents('.input-group').length > 0)
                        parent = $(this).parents('.input-group');
                    var name = $(this).attr("name");
                    if (obj.messages && obj.messages[name] && ($(this).attr('type') !== 'hidden')) {
                        var error_message = '<div class="col-md-8 offset-md-3 custom-error"><p style="color: red">' + obj.messages[name][0] + '</p></div>'
                        parent.append(error_message);
                    }
                });
            }

            $(document).on("click", "#save_location", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#save_location').html('');
                $('#save_location').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('setting.save_location')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#save_location').empty();
                        $('#save_location').html('{{__('Save')}}');

                        setTimeout(function () {
                            toastr['success'](
                                @if (App::isLocale('en'))
                                    response.message_en,
                                @else
                                    response.message_ar,

                                @endif
                                {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 200);
                        // document.getElementById("mainAdd").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#save_location').empty();
                        $('#save_location').html('{{__('Save')}}');
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof(response.responseJSON) != "undefined") {
                                // myHandel(response);
                                setTimeout(function () {
                                    toastr['error'](
                                        response.message,
                                        {
                                            closeButton: true,
                                            tapToDismiss: false
                                        }
                                    );
                                }, 2000);
                            }
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.message
                            });
                        }
                    }
                });
            });

        });

    </script>
{{--    save Description--}}
    <script>
        $(document).ready(function() {
            function myHandel(obj, id) {
                if ('responseJSON' in obj)
                    obj.messages = obj.responseJSON;
                $('input,select,textarea').each(function () {
                    var parent = "";
                    if ($(this).parents('.form-group').length > 0)
                        parent = $(this).parents('.form-group');
                    if ($(this).parents('.input-group').length > 0)
                        parent = $(this).parents('.input-group');
                    var name = $(this).attr("name");
                    if (obj.messages && obj.messages[name] && ($(this).attr('type') !== 'hidden')) {
                        var error_message = '<div class="col-md-8 offset-md-3 custom-error"><p style="color: red">' + obj.messages[name][0] + '</p></div>'
                        parent.append(error_message);
                    }
                });
            }

            $(document).on("click", "#save_description", function() {
                var $form = $(this.form);
                if(! $form.valid()) {
                    return false
                };
                if ($form.valid()) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    var postData = new FormData(this.form);
                    $('#save_description').html('');
                    $('#save_description').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                    $.ajax({
                        url: "{{ route('setting.save_description')}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#save_description').empty();
                            $('#save_description').html('{{__('Save')}}');

                            setTimeout(function () {
                                toastr['success'](
                                    @if (App::isLocale('en'))
                                        response.message_en,
                                    @else
                                        response.message_ar,

                                        @endif
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            // document.getElementById("mainAdd").reset();
                            $('.custom-error').remove();

                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#save_description').empty();
                            $('#save_description').html('{{__('Save')}}');
                            var response = data.responseJSON;
                            if (data.status == 422) {
                                if (typeof (response.responseJSON) != "undefined") {
                                    // myHandel(response);
                                    setTimeout(function () {
                                        toastr['error'](
                                            response.message,
                                            {
                                                closeButton: true,
                                                tapToDismiss: false
                                            }
                                        );
                                    }, 2000);
                                }
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: response.message
                                });
                            }
                        }
                    });
                }
            });

        });

    </script>

{{--    save Link--}}
    <script>
        $(document).ready(function() {
            function myHandel(obj, id) {
                if ('responseJSON' in obj)
                    obj.messages = obj.responseJSON;
                $('input,select,textarea').each(function () {
                    var parent = "";
                    if ($(this).parents('.form-group').length > 0)
                        parent = $(this).parents('.form-group');
                    if ($(this).parents('.input-group').length > 0)
                        parent = $(this).parents('.input-group');
                    var name = $(this).attr("name");
                    if (obj.messages && obj.messages[name] && ($(this).attr('type') !== 'hidden')) {
                        var error_message = '<div class="col-md-8 offset-md-3 custom-error"><p style="color: red">' + obj.messages[name][0] + '</p></div>'
                        parent.append(error_message);
                    }
                });
            }

            $(document).on("click", "#save_link", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#save_link').html('');
                $('#save_link').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('setting.save_link')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#save_link').empty();
                        $('#save_link').html('{{__('Save')}}');

                        setTimeout(function () {
                            toastr['success'](
                                @if (App::isLocale('en'))
                                    response.message_en,
                                @else
                                    response.message_ar,

                                    @endif
                                {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 200);
                        // document.getElementById("mainAdd").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#save_link').empty();
                        $('#save_link').html('{{__('Save')}}');
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof(response.responseJSON) != "undefined") {
                                // myHandel(response);
                                setTimeout(function () {
                                    toastr['error'](
                                        response.message,
                                        {
                                            closeButton: true,
                                            tapToDismiss: false
                                        }
                                    );
                                }, 2000);
                            }
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.message
                            });
                        }
                    }
                });
            });

        });

    </script>
{{--    edit Store--}}
    <script>
        $(document).ready(function() {
            function myHandel(obj, id) {
                if ('responseJSON' in obj)
                    obj.messages = obj.responseJSON;
                $('input,select,textarea').each(function () {
                    var parent = "";
                    if ($(this).parents('.form-group').length > 0)
                        parent = $(this).parents('.form-group');
                    if ($(this).parents('.input-group').length > 0)
                        parent = $(this).parents('.input-group');
                    var name = $(this).attr("name");
                    if (obj.messages && obj.messages[name] && ($(this).attr('type') !== 'hidden')) {
                        var error_message = '<div class="col-md-8 offset-md-3 custom-error"><p style="color: red">' + obj.messages[name][0] + '</p></div>'
                        parent.append(error_message);
                    }
                });
            }

            $(document).on("click", "#edit_store", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#edit_store').html('');
                $('#edit_store').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('setting.edit_store')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#edit_store').empty();
                        $('#edit_store').html('{{__('Save')}}');

                        setTimeout(function () {
                            toastr['success'](
                                @if (App::isLocale('en'))
                                    response.message_en,
                                @else
                                    response.message_ar,

                                    @endif
                                {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 200);
                        // document.getElementById("mainAdd").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#edit_store').empty();
                        $('#edit_store').html('{{__('Save')}}');
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof(response.responseJSON) != "undefined") {
                                // myHandel(response);
                                setTimeout(function () {
                                    toastr['error'](
                                        response.message,
                                        {
                                            closeButton: true,
                                            tapToDismiss: false
                                        }
                                    );
                                }, 2000);
                            }
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.message
                            });
                        }
                    }
                });
            });

        });

    </script>
{{--<script>--}}
{{--    var _URL = window.URL || window.webkitURL;--}}

{{--    function readURL(input) {--}}
{{--    $('#value_text-error').remove();--}}
{{--    $('#fileLogoBtn-error').remove();--}}
{{--    var file, img;--}}
{{--    var width, height;--}}
{{--    //  var input = document.getElementById('image');--}}

{{--    var my_files = input.files;--}}
{{--    var temp = my_files[0];--}}
{{--    var size = false;--}}
{{--    var type = false;--}}
{{--    var file_name = temp.name;--}}
{{--    var temp_size = parseInt(temp.size) / 1024;--}}
{{--    console.log(temp_size);--}}
{{--    $('#LogoForm input[name="value_text"]').data('imageSize', temp_size);//alert(this.width + " " + this.height);--}}

{{--    var extension = file_name.substr((file_name.lastIndexOf('.') + 1)).toLowerCase();--}}
{{--    if (extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'gif')--}}
{{--    type = true;--}}
{{--    console.log(type);--}}
{{--    $('#LogoForm input[name="value_text"]').data('imageType', type);//alert(this.width + " " + this.height);--}}

{{--    if (temp_size <= 2048)--}}
{{--    size = true;--}}
{{--    if (type) {--}}
{{--    if (input.files && input.files) {--}}
{{--    img = new Image();--}}
{{--    var objectUrl = _URL.createObjectURL(my_files[0]);--}}
{{--    img.src = objectUrl;--}}
{{--    img.onload = function () {--}}
{{--    width = this.width;--}}
{{--    height = this.height;--}}
{{--    $('#LogoForm input[name="value_text"]').data('imageHeight', height);//alert(this.width + " " + this.height);--}}
{{--    $('#LogoForm input[name="value_text"]').data('imageWidth', width);//alert(this.width + " " + this.height);--}}
{{--    _URL.revokeObjectURL(objectUrl);--}}
{{--    // if(width != 512 || height != 512 ){--}}
{{--    if ((width === height) && type && size) {--}}
{{--    var reader = new FileReader();--}}
{{--    reader.onload = function (e) {--}}
{{--    jQuery('#preview_store_image')--}}
{{--    .attr('src', e.target.result)--}}
{{--    .width(134)--}}
{{--    .height(134);--}}
{{--    };--}}
{{--    reader.readAsDataURL(input.files[0]);--}}
{{--    }--}}

{{--    if (size === false) {--}}
{{--    $('.logo').parent().parent(".userImage").after().append('<div id="value_text-error" class="abs_error help-block has-error">يجب أن لا يتجاوز حجم الصورة عن 2048KB</div>');--}}
{{--    //  return false;--}}
{{--    } else if (width !== height) {--}}
{{--    $('.logo').parent().parent(".userImage").after().append('<div id="value_text-error" class="abs_error help-block has-error">يجب أن يكون عرض الصورة بنفس الطول مثل 512px * 512px</div>');--}}
{{--    //  return false;--}}
{{--    }--}}

{{--    };--}}
{{--    }--}}
{{--    } else {--}}
{{--    $('.logo').parent().parent(".userImage").after().append('<div id="value_text-error" class="abs_error help-block has-error">يجب أن تكون صورة</div>');--}}
{{--    //  return false;--}}
{{--    }--}}
{{--    }--}}

{{--    var validator = $('#LogoForm').validate({--}}
{{--    errorElement: 'div', //default input error message container--}}
{{--    errorClass: 'abs_error help-block has-error',--}}
{{--    rules: {--}}
{{--    value_text: {--}}
{{--    required: true,--}}
{{--    imageFile: true,--}}
{{--    minImageSize: 500,--}}
{{--    sameDimensions: true,--}}
{{--    }--}}
{{--    },--}}
{{--    messages: {--}}
{{--    value_text: {--}}
{{--    required: 'يجب أن يتم رفع صورة',--}}
{{--    imageFile: 'يجب أن تكون صورة',--}}
{{--    sameDimensions: 'يجب أن يكون عرض الصوره بنفس الطول مثل 512px * 512px',--}}
{{--    minImageSize: 'يجب أن لا يتجاوز حجم الصورة عن 500KB',--}}
{{--    },--}}

{{--    },--}}
{{--    errorPlacement: function (error, element) {--}}
{{--    //Custom position: first name--}}
{{--    $('#value_text-error').remove();--}}
{{--    $('#fileLogoBtn-error').remove();--}}

{{--    console.log(error);--}}
{{--    //error.addClass("invalid-feedback");--}}
{{--    if (element.hasClass("selecta")) {//attr("name") == "categories[]") {--}}
{{--    //     $("#mySelect2-error").text(error);--}}
{{--    //  error.appendTo(element.parent("div").next("div"));--}}
{{--    error.insertAfter(element.siblings(".select2-container"));--}}
{{--    } else if (element.hasClass("logo")) {--}}
{{--    $('#value_text-error').remove();--}}
{{--    error.insertAfter(element.parent().parent(".userImage").after());--}}

{{--    } else {--}}
{{--    error.insertAfter(element);--}}
{{--    }--}}

{{--    },--}}
{{--    }).init();--}}
{{--    $.validator.addMethod('sameDimensions', function (value, element, maxWidth) {--}}
{{--    console.log($(element).data('imageWidth'));--}}
{{--    console.log($(element).data('imageHeight'));--}}
{{--    return ($(element).data('imageWidth') || 0) == ($(element).data('imageHeight') || 0);--}}
{{--    });--}}
{{--    $.validator.addMethod('minImageSize', function (value, element, minSize) {--}}
{{--    console.log($(element).data('imageSize'));--}}
{{--    return ($(element).data('imageSize') || 0) <= minSize;--}}
{{--    });--}}
{{--    $.validator.addMethod('imageFile', function (value, element, minSize) {--}}
{{--    console.log($(element).data('imageType'));--}}
{{--    return ($(element).data('imageType') || 0);--}}
{{--    });--}}

{{--    </script>--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            var _URL = window.URL || window.webkitURL;--}}

{{--            $('#save').click(function (e) {--}}
{{--                var file, img;--}}
{{--                var width, height;--}}
{{--                var input = document.getElementById('image');--}}
{{--                if (!input) {--}}
{{--                    alert("Um, couldn't find the fileinput element.");--}}
{{--                } else if (!input.files) {--}}
{{--                    alert("This browser doesn't seem to support the `files` property of file inputs.");--}}
{{--                } else if (!input.files[0]) {--}}
{{--                    alert("Please select a file before clicking 'Load'");--}}
{{--                } else {--}}
{{--                    if ((file = input.files)) {--}}
{{--                        img = new Image();--}}
{{--                        var objectUrl = _URL.createObjectURL(file[0]);--}}
{{--                        img.onload = function () {--}}
{{--                            width = this.width;--}}
{{--                            height = this.height;--}}
{{--                            console.log(width);--}}
{{--                            console.log(height);            //alert(this.width + " " + this.height);--}}
{{--                            _URL.revokeObjectURL(objectUrl);--}}
{{--                            if (width != 1500 || height != 500) {--}}
{{--                                swal({--}}
{{--                                    type: 'error',--}}
{{--                                    title: 'خطأ',--}}
{{--                                    text: 'يجب أن تكون امتدا الصورة 1500*500'--}}
{{--                                });--}}
{{--                            } else {--}}
{{--                                $('#form').submit();--}}
{{--                            }--}}
{{--                        };--}}
{{--                        img.src = objectUrl;--}}


{{--                    }--}}
{{--                }--}}


{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}

{{--        var validator =$('#editBrandForm').validate({--}}
{{--            errorElement: 'div', //default input error message container--}}
{{--            errorClass: 'abs_error help-block has-error',--}}
{{--            rules:{--}}
{{--                brand_name_ar: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--                brand_name_en: {--}}
{{--                    required: true,--}}
{{--                },--}}

{{--                'categories[]': 'required',--}}
{{--            },--}}
{{--            messages: {--}}
{{--                brand_name_ar: {--}}
{{--                    required: 'هذا الحقل مطلوب',--}}
{{--                },--}}

{{--                brand_name_en: {--}}
{{--                    required: 'هذا الحقل مطلوب',--}}
{{--                },--}}

{{--                "categories[]": 'اختر تصنيف واحد على الاقل',--}}

{{--                image: {--}}

{{--                },--}}

{{--            },--}}
{{--            errorPlacement: function (error, element) {--}}
{{--                //Custom position: first name--}}
{{--                console.log(error);--}}
{{--                if (element.hasClass("select2")){--}}

{{--                    error.insertAfter(element.siblings(".select2-container"));--}}
{{--                }--}}
{{--                else if (element.hasClass("dropify")) {--}}
{{--                    error.insertAfter(element.parent(".dropify-wrapper"));--}}

{{--                } else {--}}
{{--                    error.insertAfter(element);--}}
{{--                }--}}

{{--            },--}}
{{--        }).init();--}}
{{--        var _URL = window.URL || window.webkitURL;--}}


{{--    </script>--}}

{{--    prevent enter any things just no--}}
    <script>
        function isInputNumber(evt, value) {

            var ch = String.fromCharCode(evt.which);

            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
            }

        }
    </script>
{{--    add Counter to input--}}
    <script>
        $(document).ready(function () {
            @if(in_array('en',$language))
            var Characters2 = $('#name_en').val().length; // '$' is missing from the selector

            $("#counter2").html((30 - Characters2) + '/30');
            $("#name_en").on('keyup', function () {
                var last_Chars = '';
                var Characters2 = this.value.length; // '$' is missing from the selector
                $("#counter2").html((30 - Characters2) + '/30');
                //update();

            });
            @endif
            //document.querySelector('.rect').style.backgroundColor = '#' + $('#primary_color').val();
            var Characters = $('#name_ar').val().length; // '$' is missing from the selector

            $("#counter").html((30 - Characters) + '/30');


            $("#name_ar").on('keyup', function () {
                var last_Chars = '';
                var Characters = this.value.length; // '$' is missing from the selector
                $("#counter").html((30 - Characters) + '/30');
                //update();

            });


        });
    </script>
{{--    validate Enter input in link--}}
    <script>
        $(document).ready(function () {
            $('#link').inputFilter(function (value) {
                return /^[0-9a-zA-Z._]*$/.test(value);    // Allow digits only, using a RegExp
            });
        });
        // Restricts input for the set of matched elements to the given inputFilter function.
        (function ($) {
            $.fn.inputFilter = function (inputFilter) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            };
        }(jQuery));
    </script>
{{--    check if market name found--}}
    <script>
        var link = $('#link');
        var linkHint = $('#linkHint');
        link.on('input', function (e) {
            //validate link
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
            e.preventDefault();
            const link_value = $(this).val();
            $.ajax({
                type: "post",
                url: "{{route('checkLinkMyStore',$market->id)}}",
                data: {link: link_value},
                success: function (data) {
                    $('#unique-error').hide();
                    $('#unique-error1').hide();


                    linkHint.css('background', 'transparent!important;');

                    linkHint.html(data.success + '<br><br><span style="color:gray;font-size: 13px"><span class="fa fa-globe"></span> {{__('Your store link is as follows')}}: ' + "http://market.lozcart.com/ar" + '/' + link_value + '</span>');
                    // linkHint1.hide();


                },
                error: function (data) {
                    var response = data.responseJSON;
                    console.log(data.responseJSON)
                    var messages = "<span class=' text-danger'><span class='fa fa-times-circle'></span> ";

                    messages += response.message + '';

                    messages += '</span>';
                    linkHint.html(messages);
                    linkHint1.hide();
                    linkHint.hide();
                },
                /* error: function( jqXHR, textStatus, errorThrown ) {
                     console.log( 'Could not get posts, server response: ' + textStatus + ': ' + errorThrown );
                 },*/
                complete: function () {
                    linkHint.show();
                }
            });
        });
    </script>
{{--    update logo--}}
    <script>
        var input = document.getElementById('fileLogoBtn');
        var image = document.getElementById('LogoImage');
        var crop = document.getElementById('crop');
        var logo_formData;
        var cropBoxData = document.querySelector('#LogoImageArea');
        var image = document.getElementById('LogoImage');
        var cropper;
        var avatar = $('#preview_store_image');
        $('#LogoImage').css('opacity', 0);
        var canvasData;

        input.addEventListener('change', function (e) {

            $('#LogoImage').css('opacity', 0);
            $('#image-error').remove();
            var files = e.target.files;
            var done = function (url) {
                input.value = '';
                image.src = url;
                // $alert.hide();
                //  $modal.modal('show');
            };
            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }


            $('#modal').modal('show');
        });
        $('#modal').on('shown.bs.modal', function () {

            cropper = new Cropper(image, {
                //autoCropArea:1,
                dragMode: 'crop',
                //  aspectRatio: 1,
                viewMode: 3,
                autoCropArea: 1,
                restore: false,
                guides: true,
                center: false,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
                responsive: true,
                /* minContainerWidth: 320,
                 minContainerHeight: 320,*/
                ready: function () {
                    //Should set crop box data first here
                    cropper.setCropBoxData(cropBoxData);//.setCanvasData(canvasData);

                },

            });
        }).on('hidden.bs.modal', function () {
            cropBoxData = cropper.getCropBoxData();
            canvasData = cropper.getCanvasData();
            cropper.destroy();
        });
        crop.addEventListener('click', function (e) {
            $('#LogoImage').css('opacity', 0);
            var initialAvatarURL;
            var canvas;

            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 512,
                    height: 512,
                });
                initialAvatarURL = avatar.src;
                imf = $('#userLogoImage').find('img');
                imf.remove();
                $('#userLogoImage').append("<img src='" + canvas.toDataURL() + "' alt='' id='preview_store_image' style='border: 1px dashed #e8cef5;;padding:10px;border-radius: 20px;' />");

                logo_formData = new FormData();
                canvas.toBlob(function (blob) {
                    logo_formData.append('image', blob, 'avatar.jpg');
                    $('#logoDone').val('done');
                    ///  $('#saveLogoImage').trigger('click');
                    cropBoxData = cropper.getCropBoxData();
                    canvasData = cropper.getCanvasData();
                    cropper.destroy();
                    saveLogoImage();
                });


            }

            cropBoxData = cropper.getCropBoxData();
            canvasData = cropper.getCanvasData();
            cropper.destroy();
            $('#modal').modal('hide');

        });

        $(document).ready(function () {
        });
        var loader = $('#loader-modal');

        function saveLogoImage() {
            loader.fadeIn(200);
            $('#image-error').remove();
            if ($('#logoDone').val() == '') {
                $('#userLogoImage').append('  <div id="image-error" style="display: block" >يجب حفظ الصورة</div>');
                loader.fadeOut(100);
                return false;
            } else /*if ($('#wide_banner_form').valid()) */{

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.has-error').remove();


                $.ajax("{{route('setting.updateLogo')}}", {
                    method: 'post',
                    data: logo_formData,
                    processData: false,
                    contentType: false,

                    xhr: function () {
                        var xhr = new XMLHttpRequest();

                        xhr.upload.onprogress = function (e) {
                            var percent = '0';
                            var percentage = '0%';

                            if (e.lengthComputable) {
                                percent = Math.round((e.loaded / e.total) * 100);
                                percentage = percent + '%';
                                //$progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                            }
                        };

                        return xhr;
                    },

                    success: function (data) {
                        if (data.status == 1) {
                            swal.fire({
                                    @if (App::isLocale('en'))
                                    title: data.message_en,
                                    @else
                                    title: data.message_ar,
                                    @endif
                                type: 'success',
                                icon: 'success'
                            });
                            // , function () {
                            //     window.location.href = 'https://mapp.sa/admin/store';
                            // });
                            // window.location.href = 'https://mapp.sa/admin/store';

                        } else {
                            swal.fire({
                                title: data.message,
                                type: 'error'
                            });
                            // loader.fadeOut(200);
                        }
                    },

                    error: function (jqXhr, json, errorThrown) {// this are default for ajax errors
                        var errors = jqXhr.responseJSON;
                        console.log(errors);
                        var errorsHtml = '';
                        $.each(errors['errors'], function (index, value) {
                            console.log('.wide_banner_' + index);
                            $('.wide_banner_' + index).parent().parent().append('<span class="help-block has-error"> <strong>' + value + '</strong></span>');
                        });
                    },

                    complete: function () {
                        //$progress.hide();
                    },
                });
                /*   } else {
                       loader.fadeOut(100);
                       return false;*/
            }

        }

    </script>
    <script>
        $(document).ready(function() {

            // $form = $('#form_data');
//             $(function () {
//                 'use strict';
//
//                 var addLozcart = $('#add_lozcart');
// // console.log(addClient)
//                 // jQuery Validation
//                 // --------------------------------------------------------------------
//                 if (addLozcart.length) {
//                     addLozcart.validate({
//
//                         // rules: {
//                         //     'street_address': {
//                         //         required: true,
//                         //     },
//                         //     'email': {
//                         //         required: true,
//                         //         email: true
//                         //     },
//                         //     password: {
//                         //         required: true,
//                         //         minlength: 9
//                         //     },
//                         //     'password_confirmation': {
//                         //         required: true,
//                         //         equalTo: '#password'
//                         //     },
//                         //     country_id: {
//                         //         required: true
//                         //     },
//                         //     mobile: {
//                         //         required: true,
//                         //         minlength: 10
//                         //     },
//                         //
//                         // }
//                     });
//                 }
//             });

            jQuery.extend(jQuery.validator.messages, {
                required: "{{__('This field is required.')}}",
                remote: "{{__('Please fix this field.')}}",
                email: "{{__('Please enter a valid email address.')}}",
                url: "{{__('Please enter a valid URL.')}}",
                date: "{{__('Please enter a valid date.')}}",
                dateISO: "{{__('Please enter a valid date (ISO).')}}",
                number: "{{__('Please enter a valid number.')}}",
                digits: "{{__('Please enter only digits.')}}",
                creditcard: "{{__('Please enter a valid credit card number.')}}",
                equalTo: "{{__('Please enter the same value again.')}}",
                accept: "{{__('Please enter a value with a valid extension.')}}",
                maxlength: jQuery.validator.format("{{__('Please enter no more than {0} characters.')}}"),
                minlength: jQuery.validator.format("{{__('Please enter at least {0} characters.')}}"),
                rangelength: jQuery.validator.format("{{__('Please enter a value between {0} and {1} characters long.')}}"),
                range: jQuery.validator.format("{{__('Please enter a value between {0} and {1}.')}}"),
                max: jQuery.validator.format("{{__('Please enter a value less than or equal to {0}.')}}"),
                min: jQuery.validator.format("{{__('Please enter a value greater than or equal to {0}.')}}")
            });
        });

    </script>
@endsection
