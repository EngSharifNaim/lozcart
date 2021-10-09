@extends('dashboard.layouts.app')
@section('style')
    <script type="text/javascript">
        // Notice how this gets configured before we load Font Awesome
        window.FontAwesomeConfig = { autoReplaceSvg: false }
    </script>
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css" integrity="sha512-vIgFb4o1CL8iMGoIF7cYiEVFrel13k/BkTGvs0hGfVnlbV6XjAA0M0oEHdWqGdAVRTDID3vIZPOHmKdrMAUChA==" crossorigin="anonymous" />

        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('dropify_cropper/cropper.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"  />

        <style>
            .dropify-wrapper .dropify-message p {
                font-size: 17px;
            }
        </style>
        @if(App::isLocale('en'))
            <style>
                .modal .modal-header {
                    background-color: #096d3e !important;
                }
                .modal-title{
                    color: #ffffff;
                }
                .modal-slide-in .modal-dialog.sidebar-sm {
                    width: 40rem !important;
                }
                .add_item{
                    display: block !important;
                    text-align: right !important;
                    background-color: #f1f5f7 !important;
                    color: #6c757d !important;
                    border-color: #f1f5f7 !important;
                    border: 0 !important;
                    color: #6c757d !important;
                    margin-right: 12px !important;
                }
                .caret{
                    position: absolute;
                    z-index: 22;
                    left: 10px;
                    top: 50%;
                    width: 10px;
                    height: 10px;
                    border-color: transparent;
                    border-style: solid;
                    border-width: 5px 0 5px 5px;
                    border-left-color: #6c757d;
                    transform: rotate(90deg) translateY(-50%);
                }
                .multi-level{
                    box-shadow: rgba(198, 198, 198, 0.6) 0px 2px 10px 0px;
                    position: absolute;
                    will-change: transform;
                    top: 0px;
                    left: 0px;
                    transform: translate3d(0px, 0px, 0px);
                }
                #customize-list .deleteBtn {
                    position: absolute;
                    right: 10px;
                    top: 50%;
                    transform: translateY(-50%);
                    background: #de3333;
                    color: #fff;
                    display: flex;
                    align-items: center;
                    width: 33px;
                    justify-content: center;
                    font-size: 17px;
                    cursor: pointer;
                    border-radius: 1px;
                }
                .mdi-square-edit-outline{
                    cursor: pointer!important;
                    position: absolute;
                    right: 51px;
                    top: 50%;
                    transform: translateY(-50%);
                    color: #fff;
                    display: flex;
                    background: #80808096;
                    align-items: center;
                    width: 33px;
                    height: 25px;
                    justify-content: center;
                    font-size: 17px;
                    cursor: pointer;
                    border-radius: 1px;
                }
                .infoHintMsg{
                    font-size: 13px; font-weight: 400; color:#ee151f;position: relative;display: block;margin-bottom: 10px;
                }
            </style>
    @else
            <style>
                .modal .modal-header {
                    background-color: #096d3e !important;
                }
                .modal-title{
                    color: #ffffff;
                }
                .modal-slide-in .modal-dialog.sidebar-sm {
                    width: 40rem !important;
                }
                .add_item{
                    display: block !important;
                    text-align: right !important;
                    background-color: #f1f5f7 !important;
                    color: #6c757d !important;
                    border-color: #f1f5f7 !important;
                    border: 0 !important;
                    color: #6c757d !important;
                    margin-right: 12px !important;
                }
                .caret{
                    position: absolute;
                    z-index: 22;
                    right: 10px;
                    top: 50%;
                    width: 10px;
                    height: 10px;
                    border-color: transparent;
                    border-style: solid;
                    border-width: 5px 0 5px 5px;
                    border-left-color: #6c757d;
                    transform: rotate(90deg) translateY(-50%);
                }
                .multi-level{
                    box-shadow: rgba(198, 198, 198, 0.6) 0px 2px 10px 0px;
                    position: absolute;
                    will-change: transform;
                    top: 0px;
                    right: 0px;
                    transform: translate3d(0px, 0px, 0px);
                }
                #customize-list .deleteBtn {
                    position: absolute;
                    left: 10px;
                    top: 50%;
                    transform: translateY(-50%);
                    background: #de3333;
                    color: #fff;
                    display: flex;
                    align-items: center;
                    width: 33px;
                    justify-content: center;
                    font-size: 17px;
                    cursor: pointer;
                    border-radius: 1px;
                }
                .mdi-square-edit-outline{
                    cursor: pointer!important;
                    position: absolute;
                    left: 51px;
                    top: 50%;
                    transform: translateY(-50%);
                    color: #fff;
                    display: flex;
                    background: #80808096;
                    align-items: center;
                    width: 33px;
                    height: 25px;
                    justify-content: center;
                    font-size: 17px;
                    cursor: pointer;
                    border-radius: 1px;
                }
                .infoHintMsg{
                    font-size: 13px; font-weight: 400; color:#ee151f;position: relative;display: block;margin-bottom: 10px;
                }
            </style>
    @endif

        <style>
            #loader-modal, .loader-modal {
                z-index: 222222222222;
            }

            #customize-list {
                width: 100%;
                list-style: none;
                padding: 0 12px !important;
            }

            #customize-list li {
                height: auto;
                border: none;
                padding: 8px 16px 8px 8px;
                background: #f1f5f7;
                /*
                            font-weight: 600;
                */
                margin-bottom: 10px;
                position: relative;
            }

            #customize-list a {
                color: #333;
                display: block;
            }

            /*#customize-list i {*/
            /*    color: #7275d2;*/
            /*    vertical-align: middle;*/
            /*    font-size: 15px;*/
            /*    margin-left: 5px;*/
            /*}*/



            body.dragging, body.dragging * {
                cursor: move !important;
            }

            .dragged {
                position: absolute;
                opacity: 1;
                top: 0 !important;
                left: 0 !important;
                z-index: 2000;
            }

            #customize-list li.placeholder {
                position: relative;
                /** More li styles **/
            }

            #customize-list li.placeholder:before {
                position: absolute;
                /** Define arrowhead **/
            }

            #customize-list .placeholder {
                visibility: visible;
                height: 3em;
                background: #e8ebed;
                color: #5052a4;
            }

            #customize-list .placeholder::after {
                content: "وضعة هنا";
                position: absolute;
                top: 50%;
                right: 13px;
                transform: translateY(-50%);
                font-size: 13px;
            }

            @media(min-width: 767px) {
                #customize-list .arrows {
                    display: none;
                }
            }

            @media(max-width: 767px) {
                /* #customize-list {
                    padding: 0 !important;
                } */

                .p-m-view {
                    padding: 0 12px;
                }

                #customize-list li {
                    padding: 8px 10px 8px 46px;
                }

                .arrows {
                    margin-left: 10px;
                }

            }

            @media (max-width: 767.98px) {
                .content-page, .enlarged .content-page {
                    margin-right: 0 !important;
                    margin-left: 0 !important;
                    padding: 0;
                }
                .card-box {
                    padding: 1.5rem .5rem;
                }
            }

            .customDropify {
                max-width: 75%;
                margin: 1rem auto;
            }

            .customDropify .dropify-wrapper {

                height: 150px;
            }

            /*
                    .customDropify .dropify-wrapper .dropify-message {
                        position: relative;
                        top: 50%;
                        -webkit-transform: translateY(-70%);
                        transform: translateY(-70%);
                    }
            */

            .btn-danger {
                background-color: #de3333;
                border-color: #de3333;
            }

            .infoHintMsg {
                /*                right: 140px !important;*/
                top: -12px !important;
            }

            @media (max-width: 567px) {
                .infoHintMsg {
                    right: 0 !important;
                    top: -13px !important;
                }
            }


            @media (min-width: 576px) {
                .CustomBigMod .modal-dialog {
                    max-width: 800px;
                }
            }


            .dropify-render img {
                width: 100%;
                height: 100%;
            }

            .img-container img {
                max-width: 100%;
            }

            #image-error, #image1-error, #image2-error {
                color: red;
                font-size: 11px;
            }

            .cropper-container {
                margin-bottom: 15px;
            }


            .control.control--checkbox {
                padding-left: 0;
                padding-right: 20px;
                display: inline-block;
            }
            .control.control--checkbox span {
                vertical-align: top;
                font-size: 14px;
                position: relative;
                top: -2px;
            }
            .control.control--checkbox .control__indicator {
                left: auto;
                right: 0;
            }
            .cropper-point,
            .cropper-point.point-se {
                height: 20px;
                opacity: .7;
                width: 20px;
                border-radius: 50px;
                background-color:#39f;
            }


            .cropper-point.point-w,
            .cropper-point.point-n,
            .cropper-point.point-s,
            .cropper-point.point-e {
                display: none;
            }
            .cropper-point.point-nw {
                cursor: nwse-resize;
                left: -10px;
                top: -7px;
            }
            .cropper-point.point-ne {
                cursor: nesw-resize;
                right: -10px;
                top: -7px;
            }
            .cropper-point.point-sw {
                bottom: -10px;
                cursor: nesw-resize;
                left: -10px;
            }
            .cropper-point.point-se {
                bottom: -9px;
                right: -8px;
            }
            @media(min-width: 767px) {
                .cropper-point,
                .cropper-point.point-se {
                    height: 10px;
                    opacity: .7;
                    width: 10px;
                    border-radius: 50px;
                    background-color:#39f;
                }
                .cropper-point.point-ne {
                    cursor: nesw-resize;
                    right: -5px;
                    top: -5px;
                }
                .cropper-point.point-nw {
                    cursor: nwse-resize;
                    left: -5px;
                    top: -5px;
                }
                .cropper-point.point-sw {
                    bottom: -5px;
                    cursor: nesw-resize;
                    left: -5px;
                }
                .cropper-point.point-se {
                    bottom: -5px;
                    right: -5px;
                }
            }
        </style>

        <style>
            .list-group-item {
                display: flex;
                align-items: center;
            }

            .highlight {
                background: #f7e7d3;
                min-height: 30px;
                list-style-type: none;
            }

            .handle {
                min-width: 90%;
                /*background: transparent;*/
                height: /*15px*/ auto;
                /*color: #7275d2;*/
                display: inline-block;
                cursor: move;
                /*
                            margin-right: 10px;
                */
            }

            @media (max-width: 767px) {
                .handle {
                    min-width: 70%;
                }
            }

            #multipleSquare .dropify-wrapper {
                max-width: 300px;
                margin: .3rem auto;
            }

            @media(max-width: 620px) {
                .previewBtnWrap {
                    width: 100%;
                }
                .dropdown.custom-dropdown-filter a {
                    margin-right: 0 !important;
                }
            }

            /*.cropper-crop-box,.cropper-canvas,*/.cropper-canvas img{
                                                      width: 100% !important;
                                                  }
        </style>
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
                            <h2 class="content-header-title float-left mb-0">{{__('Store Design')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('setting.index')}}">{{__('Settings')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Store Design')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <h4 class="header-title mb-3">{{__('Design')}} </h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-8 mb-2">
                                                    <label style="margin: 4px 0 15px 15px;">{{__('Color button')}} </label>
                                                    <input id="primary_color" name="primary_color" required="" class="jscolor form-control float-right" onchange="update(this.jscolor)" style="max-width: 120px; display: inline-block;  color: rgb(255, 255, 255);" value="{{$market->additional_setting->primary_color }}" autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-8 mb-2">
                                                    <label style="margin: 4px 0 15px 15px;">{{__('Color Text')}}</label>
                                                    <input id="font_color" name="font_color" required="" class="jscolor form-control float-right" onchange="update3(this.jscolor)" style="max-width: 120px; display: inline-block;  color: rgb(255, 255, 255);" value="{{$market->additional_setting->font_color }}" autocomplete="off">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="previewColrs">
                                                    <div>
                                                        <button disabled="" type="button" class="btn rect" style=" opacity: 1; padding: 11px 40px;  border-radius: 3px;  color: #ffffff;">
                                                            <img src="{{asset('photo/ic_cart.svg')}}" alt="" style="width: 22px;margin-left: 8px; margin-right:8px;vertical-align: middle;">
                                                            <span>{{__('Add To Cart')}}</span>
                                                        </button>
                                                    </div>
                                                    <div class="mt-3">
                                                        <p id="rectText" style="font-size: 16px; ">{{__('Text preview of desired color')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12 mt-2 text-right">
                                                <button class="btn btn-success" type="button" id="market_setting">{{__('Save')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <h4 class="header-title mb-4 mx-3">{{__('Design Store')}}

                                                    <span class="btn btn-dark p-0  waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" title="{{__('Move items up or down to rearrange')}}" style="border-radius: 25px;">
                                                        <i data-feather='alert-circle' ></i>
                                                    </span>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="row p-m-view">
                                            <div class="col-md-3 col-6">
                                                <div class="dropdown custom-dropdown-filter mb-2">
                                                    <a role="button" data-toggle="dropdown" class="add_item btn" data-target="#" href="javascript:void(0)"  aria-expanded="false">
                                                        <i class="mdi mdi-plus" style="font-size:17px;margin-left:5px;"></i>
                                                        {{__('Add Element')}}
                                                        <span class="caret" ></span>
                                                    </a>
                                                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu"  x-placement="top-start">
                                                        <li class="dropdown-submenu">
                                                            <a class="dropdown-item" href="javascript:void(0)" id="pictures" data-toggle="modal" data-target="#exampleModal">
                                                                <i class="dripicons-photo-group" style="position: unset!important;"></i>
                                                                {{__('Animated Banner')}}
                                                            </a>
                                                            <a class="dropdown-item" href="javascript:void(0)" id="banner" data-toggle="modal" data-target="#bannerModal">
                                                                <i class="far fa-images" style="position: unset!important;"></i>
                                                                {{__('Wide Rectangular Banner')}}
                                                            </a>
                                                            <span id="clients_rates_div">
                                                                @if(!$rates)
                                                                <a class="dropdown-item clientsRatesAddButton" href="javascript:void(0)" id="clientsRates" >
                                                                    <i class="dripicons-conversation"style="position: unset!important;"></i>
                                                                    {{__("Customer reviews")}}
                                                                </a>
                                                                @endif
                                                            </span>
                                                            <a class="dropdown-item" href="javascript:void(0)" id="youtube-video" data-toggle="modal" data-target="#youtube-videoModal">
                                                                <i class="fab fa-youtube" style="position: unset!important;"></i>
                                                                {{__('YouTube Video')}}
                                                            </a>
                                                            <a class="dropdown-item" href="javascript:void(0)" id="square-pictures" data-toggle="modal" data-target="#square-picturesModal">
                                                                <i class="far fa-images" style="position: unset!important;"></i>
                                                                {{__('Rectangular Banner')}}
                                                            </a>
                                                            <a class="dropdown-item" href="javascript:void(0)" id="moving-products" data-toggle="modal" data-target="#moving-productsModal">
                                                                <i class="dripicons-photo-group" style="position: unset!important;"></i>
                                                                {{__('Slider Products')}}
                                                            </a>
{{--                                                            <a class="dropdown-item" href="javascript:void(0)" id="moving-products" data-toggle="modal" data-target="#multipleSquare">--}}
{{--                                                                <i class="far fa-images" style="position: unset!important;"></i>--}}
{{--                                                                {{__('Square Photos')}}--}}
{{--                                                            </a>--}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-6 text-left mb-2">
                                                <a href="http://market.lozcart.com/ar/{{Auth::user()->link}}" target="_blank" class="btn btn-success previewBtnWrap" style="margin-left: 14px;">
                                                    <i class="mdi mdi-eye"></i>
                                                    {{__('Preview My Store')}} </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="sort_menu list-group mt-3 ui-sortable" id="customize-list">
                                                    @foreach($designs as $item)

                                                    <li title="{{__('Move items up or down to rearrange')}}" id="item-{{$item['id']}}" class="list-group-item" data-id="{{$item['id']}}">
                                                        <div class="arrows">
                                                            <span title="{{__('Transfer')}}" class="mdi mdi-arrow-down" onclick="moveDown($(this).parent().parent());" style="padding: 0 0 0 5px;cursor: pointer;  "></span>
                                                            <span title="{{__('Transfer')}}" class="mdi mdi-arrow-up" onclick="moveUp($(this).parent().parent());" style="padding: 0 0 0 5px;cursor: pointer;"></span>
                                                        </div>
                                                        <span style="position: unset!important;" class="@if ( $item['type'] == 'youtube_link')
                                                            fab fa-youtube
                                                        @endif
                                                        @if ($item['type']  == 'slider_product'|| $item['type'] == 'slider')
                                                            dripicons-photo-group
                                                        @endif
                                                        @if ($item['type']  == 'rates')
                                                            dripicons-conversation
                                                        @endif
                                                        @if ($item['type']  =='multiple_square'||$item['type']  =='fixed_wide_banner'||$item['type']  =='rectangular_banner')
                                                            far fa-images
                                                        @endif handle ui-sortable-handle"> &nbsp;
                                                        <span style="color:#6c757d!important;">
                                                            @if(App::isLocale('en'))
                                                                {{$item['title'] ??__('Not Found')}}
                                                            @else
                                                                {{$item['title_ar'] ??__('Not Found')}}
                                                            @endif
                                                        </span>
                                                        </span>
                                                        <span title="{{__('Delete')}}" class="mdi mdi-delete deleteBtn" data-url="{{route('design.deleteHomeSection',$item['id'])}}" data-id="{{$item['id']}}"></span>
{{--                                                        <span title="{{__('Edit')}}" class="mdi mdi-square-edit-outline"  onclick="window.location = '{{route('design.storeHomeSection',$item['id'])}}';"><span class=""></span></span>--}}
                                                    </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <!-- end card-box -->
                            </div>
                            <!-- end col -->
                        </div>
                    </div>
                    <!-- Modal to add new record -->

                </section>
                <!--/ Basic table -->



            </div>
        </div>
    </div>
    <div id="exampleModal" class="modal fade me-custom-modal CustomBigMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <form action="" method="POST" enctype="multipart/form-data" multiple="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('Animated Banner')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div id="sliderElements">

                        <div class="modal-body p-4 " style="padding-bottom:0 !important;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <select class="form-control slider_model" name="model[]">
                                            <option value=""> {{__('Select Link')}}</option>
                                            <option value="product">{{__('Product Link')}}</option>
                                            <option value="category"> {{__('Category Link')}}</option>
                                            <option value="brand"> {{__('Brand Link')}}</option>
                                            <option value="mostOrdered">{{__('Best seller')}}</option>
                                            <option value="newest">{{__('Latest Products')}}</option>
                                            <option value="offers"> {{__('Sale Products')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="model_id[]" class="form-control slider_model_id">

                                            <option value=""> {{__('Choose the type first')}}</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <input type="checkbox" name="is_external_link[]" class="slider_is_external_link" data-target="banner">
                                    <label for="" class="">{{__('External link!')}}</label>

                                </div>
                                <div class="input-group slider_external_link_div" id="" style="display: none">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input name="external_link[]" type="text" class="form-control slider_external_link" placeholder="{{__('External link')}}">

                                </div>
                            </div>
                            <div class="picture-item mt-3">
                                <div class="customDropify1">
                                    <span class="mx-1 infoHintMsg" >{{__(' The required size is (1500px * 500px) and the size is 0.5 MB')}}</span>
                                    <input type="hidden" value="" name="imageDone" class="sliderDone" id="sliderDone1" required="">
                                    <div class="dropify-wrapper" ><div class="dropify-message"><span class="file-icon"></span> <p><span style="font-family:SSTArabic-Roman !important">{{__('Click here to choose')}} {{__('Image')}}</span></p><p class="dropify-error"><span style="font-family:SSTArabic-Roman !important">{{__('Click here to choose')}} {{__('Image')}}</span></p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input required="" accept="image/*" id="sliderFile1" type="file" class="dropify sliderFile" data-count="1" name="image[]"><button type="button" class="dropify-clear" style="font-family: &quot;SST Arabic&quot;;">{{__('Delete')}}</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">اسحب واسقط الملف هنا للاستبدال</p></div></div></div></div>
                                    <span class="hint"></span>
                                    <div id="imageSliderArea1" style="display: none;">
                                        <div style="max-height: 245px;    margin: 0px auto 30px;">
                                            <img id="imageSlider1" src="https://mapp.sa/assets/images/defaultLogo.png" alt="Picture">

                                        </div>

                                        <div style="margin:1rem 0">
                                            <button type="button" class="btn btn-success cropSlider" data-count="1" style="margin: 5px" id="cropSlider1"> {{__('Save')}} {{__('Image')}}
                                            </button>
                                            <button type="button" class="btn btn-dark undoSlider" data-count="1" id="undoSlider1">{{__('Back')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="pl-4 mb-2 mt-2">
                        <a href="javascript:void(0);" data-count="1" class="btn btn-success addSliderElement">
                            <i class="mdi mdi-plus" style="color: #fff; "></i>{{__('Add')}}
                        </a>

                    </div>

                    <div class="modal-footer">
                        <button id="saveSlider" type="button" class="btn btn-success bg-purple waves-effect waves-light">
                            {{__('Save')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="multipleSquare" class="modal fade me-custom-modal CustomBigMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="multipleSquare-form" action="" method="POST" enctype="multipart/form-data" multiple="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('Square Photos')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div id="multipleSquareElements">
                        <div class="modal-body p-4">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required="" name="label_ar" id="label_ar" type="text" class="form-control" placeholder="{{__('Headline: Example Categories')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input required="" name="label_en" id="label_en" type="text" class="form-control" placeholder="{{__('The title is in English')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body p-4" style="padding-top:0 !important;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <select class="form-control slider_model" name="model[]">
                                                <option value=""> {{__('Select Link')}}</option>
                                                <option value="product">{{__('Product Link')}}</option>
                                                <option value="category"> {{__('Category Link')}}</option>

                                                <option value="brand"> {{__('Brand Link')}}</option>
                                                <option value="mostOrdered">{{__('Best seller')}}</option>
                                                <option value="newest">{{__('Latest Products')}}</option>
                                                <option value="offers"> {{__('Sale Products')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="model_id[]" class="form-control slider_model_id">

                                                <option value=""> {{__('Choose the type first')}}</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mb-2">
                                    <input type="checkbox" name="is_external_link[]" class="slider_is_external_link" data-target="banner">
                                    <label for="" class="">{{__('External link!')}}</label>



                                </div>
                                <div class="input-group slider_external_link_div" id="" style="display: none">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input name="external_link[]" type="text" class="form-control slider_external_link" placeholder="{{__('External link')}}">

                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="input-group" id="" style="margin-top:10px;">
                                    <input name="inner_text[]" type="text" class="form-control inner_text" placeholder="{{__('Text on image')}}">

                                </div>
                            </div>
                            <div class="picture-item mt-3">
                                <input type="hidden" value="" name="imageDone" class="squareImageDone" id="squareImageDone1">
                                <div class="customSquareImageDropify1">
                                    <div class="dropify-wrapper" ><div class="dropify-message"><span class="file-icon"></span> <p><span style="font-family:SSTArabic-Roman !important">{{__('Click here to choose')}} {{__('Image')}}</span></p><p class="dropify-error"><span style="font-family:SSTArabic-Roman !important">{{__('Click here to choose')}} {{__('Image')}}</span></p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input required="" accept="image/*" id="squareImageFile1" type="file" class="dropify  squareImageFile" data-count="1" name="image[]"><button type="button" class="dropify-clear" style="font-family: &quot;SST Arabic&quot;;">{{__('Delete')}}</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">اسحب واسقط الملف هنا للاستبدال</p></div></div></div></div>
                                    <span class="hint"></span>
                                    <div id="squareImageArea1" style="display: none;width: 544px;max-height: 180px;    margin: 0px auto 30px;">
                                        <img id="squareImage1" src="https://mapp.sa/assets/images/defaultLogo.png" alt="Picture">
                                        <button type="button" class="btn btn-success cropSquareImage" data-count="1" style="margin: 5px;
                                                position: relative;
                                                z-index: 2222;
                                            " id="cropSquareImage1"> {{__('Save')}} {{__('Image')}}
                                        </button>
                                        <button type="button" class="btn btn-dark undoSquareImage" data-count="1" id="undoSquareImage1" style="
                                                position: relative;
                                                z-index: 2222;
                                            ">{{__('Back')}}
                                        </button>
                                    </div>
                                </div>
                                <span class="mx-1 infoHintMsg" >{{__('The required size is (416px * 248px) and the size is 0.5Mega')}}</span>
                            </div>
                        </div>
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <select class="form-control slider_model" name="model[]">
                                            <option value=""> {{__('Select Link')}}</option>
                                            <option value="product">{{__('Product Link')}}</option>
                                            <option value="category"> {{__('Category Link')}}</option>

                                            <option value="brand"> {{__('Brand Link')}}</option>
                                            <option value="mostOrdered">{{__('Best seller')}}</option>
                                            <option value="newest">{{__('Latest Products')}}</option>
                                            <option value="offers"> {{__('Sale Products')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="model_id[]" class="form-control slider_model_id">

                                            <option value=""> {{__('Choose the type first')}}</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class=" mb-2">
                                    <input type="checkbox" name="is_external_link[]" class="slider_is_external_link" data-target="banner">
                                    <label for="" class="">{{__('External link!')}}</label>

                                </div>
                                <div class="input-group slider_external_link_div" id="" style="display: none">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input name="external_link[]" type="text" class="form-control slider_external_link" placeholder="{{__('External link')}}">

                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="input-group" id="" style="margin-top:10px;">
                                    <input name="inner_text[]" type="text" class="form-control inner_text" placeholder="{{__('Text on image')}}">

                                </div>
                            </div>
                            <div class="picture-item mt-3">
                                <input type="hidden" value="" name="imageDone" class="squareImageDone" id="squareImageDone2">
                                <div class="customSquareImageDropify2">
                                    <div class="dropify-wrapper" >
                                        <div class="dropify-message"><span class="file-icon"></span>
                                            <p><span >{{__('Click here to choose')}} {{__('Image')}}</span></p><p class="dropify-error"><span style="font-family:SSTArabic-Roman !important">{{__('Click here to choose')}} {{__('Image')}}</span></p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input required="" accept="image/*" id="squareImageFile2" type="file" class="dropify  squareImageFile" data-count="2" name="image[]"><button type="button" class="dropify-clear" style="font-family: &quot;SST Arabic&quot;;">{{__('Delete')}}</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">اسحب واسقط الملف هنا للاستبدال</p></div></div></div></div>
                                    <span class="hint"></span>
                                    <div id="squareImageArea2" style="display: none;width: 544px;max-height: 180px;    margin: 0px auto 30px;">
                                        <img id="squareImage2" src="https://mapp.sa/assets/images/defaultLogo.png" alt="Picture">
                                        <button type="button" class="btn btn-success cropSquareImage" data-count="2" style="margin: 5px" id="cropSquareImage2"> {{__('Save')}} {{__('Image')}}
                                        </button>
                                        <button type="button" class="btn btn-dark undoSquareImage" data-count="2" id="undoSquareImage2">{{__('Back')}}
                                        </button>
                                    </div>
                                </div>
                                <span class="mx-1 infoHintMsg" >{{__('The required size is (416px * 248px) and the size is 0.5Mega')}}</span>
                            </div>
                        </div>
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <select class="form-control slider_model" name="model[]">
                                            <option value=""> {{__('Select Link')}}</option>
                                            <option value="product">{{__('Product Link')}}</option>
                                            <option value="category"> {{__('Category Link')}}</option>

                                            <option value="brand"> {{__('Brand Link')}}</option>
                                            <option value="mostOrdered">{{__('Best seller')}}</option>
                                            <option value="newest">{{__('Latest Products')}}</option>
                                            <option value="offers"> {{__('Sale Products')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="model_id[]" class="form-control slider_model_id">

                                            <option value=""> {{__('Choose the type first')}}</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" mb-2">
                                    <input type="checkbox" name="is_external_link[]" class="slider_is_external_link" data-target="banner">
                                    <label for="" class="">{{__('External link!')}}</label>

                                </div>
                                <div class="input-group slider_external_link_div" id="" style="display: none">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input name="external_link[]" type="text" class="form-control slider_external_link" placeholder="{{__('External link')}}">

                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="input-group" id="" style="margin-top:10px;">
                                    <input name="inner_text[]" type="text" class="form-control inner_text" placeholder="{{__('Text on image')}}">

                                </div>
                            </div>
                            <div class="picture-item mt-3">
                                <input type="hidden" value="" name="imageDone" class="squareImageDone" id="squareImageDone3">
                                <div class="customSquareImageDropify3">
                                    <div class="dropify-wrapper" style="font-family: &quot;SST Arabic&quot;;"><div class="dropify-message"><span class="file-icon"></span> <p><span style="font-family:SSTArabic-Roman !important">{{__('Click here to choose')}} {{__('Image')}}</span></p><p class="dropify-error"><span style="font-family:SSTArabic-Roman !important">{{__('Click here to choose')}} {{__('Image')}}</span></p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input required="" accept="image/*" id="squareImageFile3" type="file" class="dropify  squareImageFile" data-count="3" name="image[]"><button type="button" class="dropify-clear" style="font-family: &quot;SST Arabic&quot;;">{{__('Delete')}}</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">اسحب واسقط الملف هنا للاستبدال</p></div></div></div></div>
                                    <span class="hint"></span>
                                    <div id="squareImageArea3" style="display: none;width: 544px;max-height: 180px;    margin: 0px auto 30px;">
                                        <img id="squareImage3" src="https://mapp.sa/assets/images/defaultLogo.png" alt="Picture">
                                        <button type="button" class="btn btn-success cropSquareImage" data-count="3" style="margin: 5px" id="cropSquareImage3"> {{__('Save')}} {{__('Image')}}
                                        </button>
                                        <button type="button" class="btn btn-dark undoSquareImage" data-count="3" id="undoSquareImage3">{{__('Back')}}
                                        </button>
                                    </div>
                                </div>
                                <span class="mx-1 infoHintMsg" >{{__('The required size is (416px * 248px) and the size is 0.5Mega')}}</span>
                            </div>
                        </div>
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <select class="form-control slider_model" name="model[]">
                                            <option value=""> {{__('Select Link')}}</option>
                                            <option value="product">{{__('Product Link')}}</option>
                                            <option value="category"> {{__('Category Link')}}</option>

                                            <option value="brand"> {{__('Brand Link')}}</option>
                                            <option value="mostOrdered">{{__('Best seller')}}</option>
                                            <option value="newest">{{__('Latest Products')}}</option>
                                            <option value="offers"> {{__('Sale Products')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="model_id[]" class="form-control slider_model_id">

                                            <option value=""> {{__('Choose the type first')}}</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class=" mb-2">
                                    <input type="checkbox" name="is_external_link[]" class="slider_is_external_link" data-target="banner">
                                    <label for="" class="">{{__('External link!')}}</label>

                                </div>
                                <div class="input-group slider_external_link_div" id="" style="display: none">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input name="external_link[]" type="text" class="form-control slider_external_link" placeholder="{{__('External link')}}">

                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="input-group" id="" style="margin-top:10px;">
                                    <input name="inner_text[]" type="text" class="form-control inner_text" placeholder="{{__('Text on image')}}">

                                </div>
                            </div>
                            <div class="picture-item mt-3">
                                <input type="hidden" value="" name="imageDone" class="squareImageDone" id="squareImageDone4">
                                <div class="customSquareImageDropify4">
                                    <div class="dropify-wrapper" style="font-family: &quot;SST Arabic&quot;;"><div class="dropify-message"><span class="file-icon"></span> <p><span style="font-family:SSTArabic-Roman !important">{{__('Click here to choose')}} {{__('Image')}}</span></p><p class="dropify-error"><span style="font-family:SSTArabic-Roman !important">{{__('Click here to choose')}} {{__('Image')}}</span></p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input required="" accept="image/*" id="squareImageFile4" type="file" class="dropify  squareImageFile" data-count="4" name="image[]"><button type="button" class="dropify-clear" style="font-family: &quot;SST Arabic&quot;;">{{__('Delete')}}</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">اسحب واسقط الملف هنا للاستبدال</p></div></div></div></div>
                                    <span class="hint"></span>
                                    <div id="squareImageArea4" style="display: none;width: 544px;max-height: 180px;    margin: 0px auto 30px;">
                                        <img id="squareImage4" src="https://mapp.sa/assets/images/defaultLogo.png" alt="Picture">
                                        <button type="button" class="btn btn-success cropSquareImage" data-count="4" style="margin: 5px" id="cropSquareImage4"> {{__('Save')}} {{__('Image')}}
                                        </button>
                                        <button type="button" class="btn btn-dark undoSquareImage" data-count="4" id="undoSquareImage4">{{__('Back')}}
                                        </button>
                                    </div>
                                </div>
                                <span class="mx-1 infoHintMsg" >{{__('The required size is (416px * 248px) and the size is 0.5Mega')}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="pl-4 mb-2 mt-2">
                        <a href="javascript:void(0);" data-count="4" class="btn btn-success addSquareElement">
                            <i class="mdi mdi-plus" style="color: #fff;"></i>{{__('Add')}}
                        </a>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success bg-purple waves-effect waves-light" id="saveSquareImages">
                            {{__('Save')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="bannerModal" class="modal fade me-custom-modal CustomBigMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Wide Rectangular Banner')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <form id="wide_banner_form" action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="type" value="fixed_wide_banner" required="">

                            <div class="col-md-6">
                                <div class="form-group">

                                    <select class="form-control model wide_banner_model" name="model" data-type="fixed_wide_banner">
                                        <option value=""> {{__('Select Link')}}</option>
                                        <option value="product">{{__('Product Link')}}</option>
                                        <option value="category"> {{__('Category Link')}}</option>

                                        <option value="brand"> {{__('Brand Link')}}</option>
                                        <option value="mostOrdered">{{__('Best seller')}}</option>
                                        <option value="newest">{{__('Latest Products')}}</option>
                                        <option value="offers"> {{__('Sale Products')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="model_id" class="form-control wide_banner_model_id" id="fixed_wide_banner">
                                        <option value=""> {{__('Choose the type first')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class=" mb-2">

                                    <label class="control control--checkbox">
                                        <input type="checkbox" name="is_external_link" class="is_external_link CheckedItem" data-target="banner">
                                        <div class="control__indicator"></div>
                                        <span>{{__('External link!')}}</span>
                                    </label>
                                </div>
                                <div class="input-group" id="banner_external_link_div" style="display: none">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input id="banner_external_link" value="" name="external_link" type="text" class="form-control wide_banner_external_link" placeholder="{{__('External link')}}">

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="customDropify">
                                        <div class="dropify-wrapper" style="font-family: &quot;SST Arabic&quot;;"><div class="dropify-message"><span class="file-icon"></span> <p><span style="font-family:SSTArabic-Roman !important">{{__('Click here to choose')}} {{__('Image')}}</span></p><p class="dropify-error"><span style="font-family:SSTArabic-Roman !important">{{__('Click here to choose')}} {{__('Image')}}</span></p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input required="" accept="image/*" id="banner-image" type="file" class="dropify" name="image"><button type="button" class="dropify-clear" style="font-family: &quot;SST Arabic&quot;;">{{__('Delete')}}</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">اسحب واسقط الملف هنا للاستبدال</p></div></div></div></div>
                                        <span id="banner-image-hint" style="color: #ee151f"></span>
                                    </div>
                                </div>
                                <label for="image" class="control-label text-center" style="display:block;">
                                    <span class="mx-1 infoHintMsg" >{{__('The required size is (250px * 1750px) and the size is 0.5Mega')}}</span>
                                </label>
                                <div id="imageArea" style="display: none;width: 548px;max-height: 190px;    margin: 0px auto 30px;">
                                    <img id="imagea" src="https://mapp.sa/assets/images/defaultLogo.png" alt="Picture" style="opacity: 0;">
                                    <button type="button" class="btn btn-success" style="margin: 5px" id="crop"> {{__('Save')}}
                                        {{__('Image')}}
                                    </button>
                                    <button type="button" class="btn btn-dark" id="undo">{{__('Back')}}</button>
                                </div>
                                <input type="hidden" value="" name="imageDone" id="imageDone" required="">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="bannerSave" class="btn btn-success bg-purple waves-effect waves-light">{{__('Save')}}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div id="youtube-videoModal" class="modal fade me-custom-modal CustomBigMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="modal-header">
                        <h4 class="modal-title"> {{__('Youtube Link')}} </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <input type="hidden" name="type" value="youtube_link" required="">
                    <div class="modal-body p-2">
                        <div class="input-group mb-2" style="padding: 30px">
                            <input required="" name="youtube_link" type="text" class="form-control" placeholder="{{__('Youtube Link')}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-purple btn-success waves-effect waves-light" id="youtubeSave">{{__('Save')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="moving-productsModal" class="modal fade me-custom-modal CustomBigMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" enctype="multipart/form-data">
{{--                    @csrf--}}
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('Slider Products')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <input type="hidden" name="type" value="slider_product" required="">
                    <div class="modal-body p-4">

                        <div class="input-group mb-2">
                            <select name="category_id" required="" class="form-control">
                                <option value=""> -- {{__('Select Category')}} --</option>
                                @foreach($categories as $category)
                                    <optgroup label="{{$category->name}}">
                                        @foreach($category->child as $child)
                                            <option value="{{ $child->id}}" >{{$child->name}}</option>
                                        @endforeach
                                    </optgroup>

                                @endforeach

                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success bg-purple waves-effect waves-light" id="movingProductSave">
                            {{__('Save')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="square-picturesModal" class="modal fade me-custom-modal CustomBigMod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Rectangular Banner')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form id="squarePicForm" action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body p-4">
                        <input type="hidden" name="type" value="rectangular_banner" required="">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control model square_first_model" name="first_model" data-type="first_squarePic_model_id">
                                                <option value=""> {{__('Select Link')}}</option>
                                                <option value="product">{{__('Product Link')}}</option>
                                                <option value="category"> {{__('Category Link')}}</option>

                                                <option value="brand"> {{__('Brand Link')}}</option>
                                                <option value="mostOrdered">{{__('Best seller')}}</option>
                                                <option value="newest">{{__('Latest Products')}}</option>
                                                <option value="offers"> {{__('Sale Products')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="first_model_id" class="form-control square_first_model_id" id="first_squarePic_model_id">
                                                <option value=""> {{__('Choose the type first')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="mb-2">


                                        <label class="control control--checkbox">
                                            <input type="checkbox" name="first_is_external_link" class="is_external_link square_is_external_link1 CheckedItem" data-target="first_squarePic">
                                            <div class="control__indicator"></div>
                                            <span>{{__('External link!')}}</span>
                                        </label>
                                    </div>
                                    <div class="input-group" id="first_squarePic_external_link_div" style="display: none">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input id="first_squarePic_external_link" value="" name="first_external_link" type="text" class="form-control square_first_external_link " placeholder="{{__('External link')}}">

                                    </div>
                                </div>

                                <div class="customDropify customDropify1 ">
                                    <label for="image" class="control-label">
                                        <span class="mx-1 infoHintMsg" >{{__('The required size is (870px * 330px) and the size is 0.5Mega')}}</span>
                                    </label>

                                    <input type="hidden" value="" name="imageDone1" id="imageDone1" required="">
                                    <div class="dropify-wrapper" >
                                        <div class="dropify-message"><span class="file-icon"></span>
                                            <p><span >{{__('Click here to choose')}} {{__('Image')}}</span></p>
                                            <p class="dropify-error"><span >{{__('Click here to choose')}} {{__('Image')}}</span></p></div><div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div><input required="" accept="image/*" id="first-squarePicSave-image" type="file" class="dropify" name="first_image"><button type="button" class="dropify-clear" style="font-family: &quot;SST Arabic&quot;;">{{__('Delete')}}</button><div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">اسحب واسقط الملف هنا للاستبدال</p></div></div></div></div>
                                    <span id="first-squarePicSave-image-hint" style="color: #ee151f"></span>
                                </div>
                                <div id="square_imageArea1" style="display: none;width: 500px;max-height: 180px;margin:0 auto 30px;">
                                    <img id="imagea1" src="https://mapp.sa/assets/images/defaultLogo.png" alt="Picture" style="opacity: 0;">
                                    <button type="button" class="btn btn-success" style="margin-bottom:15px;" id="crop1"> {{__('Save')}}
                                        {{__('Image')}}
                                    </button>
                                    <button type="button" class="btn btn-dark" id="undo1" style="margin-bottom:15px;">
                                        {{__('Back')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br> <br>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control model square_second_model" name="second_model" data-type="second_squarePic_model_id">
                                                <option value=""> {{__('Select Link')}}</option>
                                                <option value="product">{{__('Product Link')}}</option>
                                                <option value="category"> {{__('Category Link')}}</option>

                                                <option value="brand"> {{__('Brand Link')}}</option>
                                                <option value="mostOrdered">{{__('Best seller')}}</option>
                                                <option value="newest">{{__('Latest Products')}}</option>
                                                <option value="offers"> {{__('Sale Products')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="second_model_id" class="form-control square_second_model_id" id="second_squarePic_model_id">
                                                <option value=""> {{__('Choose the type first')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <div class="mb-2">

                                        <label class="control control--checkbox">
                                            <input type="checkbox" name="second_is_external_link" class="is_external_link square_is_external_link2 CheckedItem" data-target="second_squarePic">
                                            <div class="control__indicator"></div>
                                            <span>{{__('External link!')}}</span>
                                        </label>
                                    </div>
                                    <div class="input-group" id="second_squarePic_external_link_div" style="display: none">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input id="second_squarePic_external_link" value="" name="second_external_link" type="text" class="form-control square_second_external_link" placeholder="{{__('External link')}}">

                                    </div>
                                </div>

                                <div class="customDropify customDropify2">
                                    <label for="image" class="control-label">
                                        <span class="mx-1 infoHintMsg" >{{__('The required size is (870px * 330px) and the size is 0.5Mega')}}</span>
                                    </label>
                                    <input type="hidden" value="" name="imageDone2" id="imageDone2" required="">
                                    <div class="dropify-wrapper" >
                                        <div class="dropify-message"><span class="file-icon"></span>
                                            <p><span >{{__('Click here to choose')}} {{__('Image')}}</span></p>
                                            <p class="dropify-error"><span >{{__('Click here to choose')}} {{__('Image')}}</span></p>
                                        </div>
                                        <div class="dropify-loader"></div>
                                        <div class="dropify-errors-container"><ul></ul></div>
                                        <input required="" accept="image/*" id="second-squarePicSave-image" type="file" class="dropify" name="second_image">
                                        <button type="button" class="dropify-clear" >{{__('Delete')}}</button>
                                        <div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">اسحب واسقط الملف هنا للاستبدال</p></div></div></div></div>
                                    <span id="second-squarePicSave-image-hint" style="color: #ee151f"></span>
                                </div>
                                <div id="square_imageArea2" style="display: none;width: 500px;max-height: 180px;margin: 0px auto 30px;">
                                    <img id="imagea2" src="https://mapp.sa/assets/images/defaultLogo.png" alt="Picture" style="opacity: 0;">
                                    <button type="button" class="btn btn-success" style="margin-bottom:15px;" id="crop2"> {{__('Save')}}
                                        {{__('Image')}}
                                    </button>
                                    <button type="button" class="btn btn-dark" id="undo2" style="margin-bottom:15px;">
                                        {{__('Back')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="squareBannerSave" type="button" class="btn btn-success bg-purple waves-effect waves-light">
                            {{__('Save')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="loader-modal Loader" style="display: none" >
        <p style="color: white!important;
            background: linear-gradient(to left, rgb(8 123 69) 0%, rgb(9 109 62) 90%)!important;
            border: none!important;
position: relative;
top: 50%;
/*! right: 50%; */
text-align: center;width: 296px; margin: 0 auto;border-radius: 5px;-moz-border-radius: 5px;-webkit-border-radius: 5px;">
            <img src="{{asset('photo/load.gif')}}" alt="Loading..." size="50px" style="width: 41px;padding: 5px;">
            {{__('The redirect is in progress, please wait...')}}
        </p>
    </div>
    <!-- END: Content-->
@endsection
@section('Scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
<script>
    var UrlForScripts="{{url('/')}}"
</script>
    {{--edit data Market Setting--}}
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

            $(document).on("click", "#market_setting", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#market_setting').html('');
                $('#market_setting').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('design.marketSetting')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#market_setting').empty();
                        $('#market_setting').html('{{__('Save')}}');
                        // Toast.fire({
                        //     type: 'success',
                        //     title: response.success
                        // });
                        setTimeout(function () {
                            toastr['success'](
                                @if(App::isLocale('en'))
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
                        // document.getElementById("editData").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#market_setting').empty();
                        $('#market_setting').html('{{__('Save')}}');
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof(response.responseJSON) != "undefined") {
                                myHandel(response);
                                setTimeout(function () {
                                    toastr['error'](
                                        @if(App::isLocale('en'))
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
    {{--    Add new Slider Products--}}
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

            $(document).on("click", "#movingProductSave", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#movingProductSave').html('');
                $('#movingProductSave').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{route('design.storeSection')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('.loader-modal').fadeIn(200);
                    },
                    success: function( response ) {
                        $('#movingProductSave').empty();
                        $('#movingProductSave').html('{{__('Save')}}');
                        // Toast.fire({
                        //     type: 'success',
                        //     title: response.success
                        // });
                        setTimeout(function () {
                            toastr['success'](
                                @if(App::isLocale('en'))
                                    response.massage_en,
                                @else
                                    response.massage_ar,
                                    @endif
                                {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 200);
                        // document.getElementById("add_bank_account").reset();
                        window.location.href = '{{route('design.index')}}';
                        // // $('.datatables-basic').DataTable().ajax.reload();
                        // $('.custom-error').remove();
                        // $('#modals-slide-in').modal('hide');
                        $('.loader-modal').fadeOut(100)
                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#movingProductSave').empty();
                        $('#movingProductSave').html('{{__('Save')}}');
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof(response.responseJSON) != "undefined") {
                                myHandel(response);
                                setTimeout(function () {
                                    toastr['error'](
                                        response.message,
                                        {
                                            closeButton: true,
                                            tapToDismiss: false
                                        }
                                    );
                                }, 200);
                            }
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.message
                            });
                        }
                        $('.loader-modal').fadeOut(100)
                    }
                });
            });

        });

    </script> {{--    Add new Slider Products--}}
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

            $(document).on("click", "#youtubeSave", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#youtubeSave').html('');
                $('#youtubeSave').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{route('design.storeSection')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('.loader-modal').fadeIn(200);
                    },
                    success: function( response ) {
                        $('#youtubeSave').empty();
                        $('#youtubeSave').html('{{__('Save')}}');
                        // Toast.fire({
                        //     type: 'success',
                        //     title: response.success
                        // });
                        setTimeout(function () {
                            toastr['success'](
                                @if(App::isLocale('en'))
                                    response.massage_en,
                                @else
                                    response.massage_ar,
                                    @endif
                                {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 200);
                        // document.getElementById("add_bank_account").reset();
                        window.location.href = '{{route('design.index')}}';
                        // // $('.datatables-basic').DataTable().ajax.reload();
                        // $('.custom-error').remove();
                        // $('#modals-slide-in').modal('hide');
                        $('.loader-modal').fadeOut(100)
                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#youtubeSave').empty();
                        $('#youtubeSave').html('{{__('Save')}}');
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof(response.responseJSON) != "undefined") {
                                myHandel(response);
                                setTimeout(function () {
                                    toastr['error'](
                                        response.message,
                                        {
                                            closeButton: true,
                                            tapToDismiss: false
                                        }
                                    );
                                }, 200);
                            }
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.message
                            });
                        }
                        $('.loader-modal').fadeOut(100)
                    }
                });
            });

        });

    </script>

    <script>

        function updateToDatabase(idString) {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            $.ajax({
                url: '{{route('design.updateSorting')}}',
                method: 'POST',
                data: {ids: idString},
                success: function () {
                    swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: '{{__('Items have been reordered successfully')}}',
                        timer: 2000
                    });
                    //do whatever after success
                }, error: function (x) {
                    //alert(x.responseText);
                    swal.fire({
                        type: 'error',
                        title: '{{__('Sorry: an unexpected error occurred during the transmission process')}}',
                        timer: 2000
                    });
                }
            })
        }

        $(document).ready(function () {


            var target = $('.sort_menu');
            target.sortable({
                handle: '.handle',
                placeholder: 'ضعه هنا',
                axis: "y",
                touchStartThreshold: 5,
                forceFallback: true,
                delayOnTouchOnly: true,
                animation: 150,
                update: function (e, ui) {
                    var sortData = target.sortable('toArray', {attribute: 'data-id'})
                    updateToDatabase(sortData.join(','))
                }
            })

            // target.disableSelection();


        });

        /*****************************/
        function moveUp($item) {
            $before = $item.prev();
            $item.insertBefore($before);
            var ids=[];
            $('.sort_menu li').each(function(index){
                ids.push($(this).data('id'));
            });
            updateToDatabase(ids);
        }

        function moveDown($item) {
            $after = $item.next();
            $item.insertAfter($after);
            var ids=[];
            $('.sort_menu li').each(function(index){
                ids.push($(this).data('id'));
            });
            updateToDatabase(ids);
        }

    </script>
    <script src="https://mapp.sa/cPanel/libs/dropify/dropify.min.js"></script>
{{--    <script src="https://mapp.sa/cPanel/js/pages/form-fileuploads.init.js"></script>--}}
    <script src="{{asset('app-assets/custom/jscolor.js')}}"></script>
    <script src="https://mapp.sa/cPanel/libs/nestable2/jquery-sortable-min.js"></script>
    <script src="https://mapp.sa/cPanel/js/pages/nestable.init.js"></script>
    <script src="{{asset('dropify_cropper/cropper.js')}}"></script>


    <script type="text/javascript">
        $(document).on('click', '.deleteBtn', function (e) {
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
            e.preventDefault();
            var id = $(this).data('id');
            swal.fire({
                    title: "{{__('Confirm the deletion!')}}",
                    type: "warning",
                    cancelButtonColor: '#c54b42',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: true,
                    cancelButtonText: '{{__('Cancel')}}',
                    confirmButtonText: "{{__('Confirm !')}}",
                    showCancelButton: true
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{route('design.deleteHomeSection','').'/'}}" + id,
                        success: function (data) {
                            if (data.status === 0) {
                                swal.fire({
                                    type: 'warning',
                                    title: data.message,
                                    timer: 4000
                                });
                            } else {
                                if (data.type == "rates") {
                                    //append client rates to add list
                                    $('#clients_rates_div').html('<a class="dropdown-item clientsRatesAddButton" href="javascript:void(0)"' +
                                        '                                               id="clientsRates" >' +
                                        '                                                <i class="dripicons-conversation"' +
                                        '                                                   style="position: unset!important;"></i>' +
                                        '                                            {{__("Customer reviews")}}' +
                                        '                                            </a>');
                                }
                                const item = $('#item-' + id);
                                item.fadeOut(500);
                                item.remove();
                                swal.fire({
                                    type: 'success',
                                    icon: 'success',
                                    title: @if(App::isLocale('en'))
                                        data.massage_en
                                    @else
                                    data.massage_ar
                                    @endif,
                                    timer: 2000
                                });
                            }
                        },
                        error: function (data) {
                            swal.fire({
                                type: 'warning',
                                title: 'عذراً، حدث خلل أثناء عملية ال{{__('Delete')}}',
                                timer: 4000
                            });
                        }
                        /*error: function(xhr, status, error) {
                            alert(xhr.responseText);
                        }*/
                    });
                } else {
                e.dismiss;
            }

        });
        });

    </script>
    <script>
        $(document).ready(function () {
            document.querySelector('.rect').style.backgroundColor = '#' + $('#primary_color').val();
            document.querySelector('#rectText').style.color = '#' + $('#font_color').val();

        });

        function update(jscolor) {
            // 'jscolor' instance can be used as a string
            document.querySelector('.rect').style.backgroundColor = '#' + jscolor
        }

        function update2(jscolor) {
            // 'jscolor' instance can be used as a string
            document.querySelector('.rect').style.color = '#' + jscolor
        }

        function update3(jscolor) {
            // 'jscolor' instance can be used as a string
            document.querySelector('#rectText').style.color = '#' + jscolor
        }
    </script>
    <script>
        $(document).on('click', '#clientsRates', function (e) {
            let url = '{{route("design.clientsRates_enable")}}'
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
            $.ajax({
                type: "POST",
                url: url,
                beforeSend: function () {
                    $('.digitalContentLoader').fadeIn(200);
                },
                success: function (data) {
                    $('.digitalContentLoader').fadeOut(200);
                    if (data.status === 0) {
                        swal.fire({
                            type: 'warning',
                            title: data.message,
                            timer: 4000
                        });
                    } else {
                        /*swal.fire({
                            type: 'success',
                            title: data.message,
                            timer: 2000
                        });*/

                        $('#customize-list').append('<li  title="{{__('Move items up or down to rearrange')}}" id="item-' +
                            data.itemID + '" data-id="' + data.itemID + '" class="list-group-item">' +
                            '<div class="arrows">' +
                            '<span title="{{__('Transfer')}}" class="mdi mdi-arrow-down"onclick="moveDown($(this).parent().parent());" style="padding: 0 0 0 5px;cursor: pointer;  "></span>' +
                            '<span title="{{__('Transfer')}}" class="mdi mdi-arrow-up" onclick="moveUp($(this).parent().parent());" style="padding: 0 0 0 5px;cursor: pointer;"></span>' +
                            '</div>' +
                            '<span class="dripicons-conversation handle"> &nbsp; ' +
                            '<span >{{__('Customer reviews')}} </span>' +
                            '</span>' +
                            '<span title="{{__('Delete')}}" class="deleteBtn  mdi mdi-delete" data-url="{{route('design.deleteHomeSection','')}}'+"/"+ data.itemID +'"  data-title="{{__('Customer reviews')}}" data-id=' + data.itemID + '></span>' +
                            '</li>');
                    }
                },
                complete: function (data) {
                    $('.clientsRatesAddButton').remove();
                },
                error: function (data) {
                    $('.digitalContentLoader').fadeOut(200);
                    swal.fire({
                        type: 'warning',
                        title: 'عذراً، حدث خلل أثناء عملية الإرسال',
                        timer: 4000
                    });
                }
            });
        });
    </script>
    <script>


    </script>


    <script>
        $(document).on('change', '.model', function (e) {
            //alert('je');
            let model = $(this);
            let model_val = model.val();
            let model_id = $('#' + $(this).data('type'));
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
            if (model_val === "" || model_val === "mostOrdered" || model_val === "newest" || model_val === "offers") {
                model_id.removeAttr('required', true);
                model_id.fadeOut(200);

            } else {
                model_id.fadeIn(200);
                model_id.attr('required', true);
                $.ajax({
                    url: "{{route('design.getModelItems')}}",
                    method: 'post',
                    data: {'model_val': model_val},
                    success: function (response) {
                        model_id.empty();
                        model_id.append('<option value="">  {{__('Select')}}   </option>');
                        $.each(response, function (i, option) {
                            if (typeof (option["sub_categories"]) != "undefined" && option["sub_categories"].length > 0) {
                                model_id.append('<option style="font-weight:bold!important;" value="' + option["id"] + '">' + option["name"] + '</option>');
                                $.each(option["sub_categories"], function (index, value) {
                                    model_id.append('<option value="' + value["id"] + '">' + ' - ' + value["name"] + '</option>');
                                });
                            } else {
                                model_id.append('<option style="font-weight:bold!important;"  value="' + option["id"] + '">' + option["name"] + '</option>');
                            }
                        });
                    },
                    error: function (response) {
                        /*
                                        alert(response);
                        */
                    }
                });
            }
        });
    </script>
    <script>
        $(document).on('change', '.is_external_link', function () {
            let target = $(this).data('target');
            let external_link = $('#' + target + '_external_link_div');
            let external_link_input = $('#' + target + '_external_link');
            let is_external_link = $(this);
            if (is_external_link.prop('checked') === true) {
                //model_select.val("");
                //model_id_select.val("");
                external_link.show();
                external_link_input.attr('required', true);
            } else {
                external_link.hide();
                external_link_input.removeAttr('required')
            }
        });
    </script>

    <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
    <script>
        var _URL = window.URL || window.webkitURL;

        function readSquareURL(input) {
            let hint = $(input).parent().parent().children('.hint');
            $('#image-error').remove();
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var file = input.files[0];
                var my_files = input.files;
                //console.log(file.type);
                var file_name = file.name;
                var temp_size = parseInt(file.size) / 1024;
                //console.log(temp_size);
                var extension = file_name.substr((file_name.lastIndexOf('.') + 1)).toLowerCase();
                if (extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'gif') {
                    if (temp_size > 500) {
                        swal.fire({
                            type: 'error',
                            title: 'خطأ',
                            text: 'يجب أن لا يزيد حجم {{__('Image')}} عن 0.5MB'
                        });
                        //$('#image').parent().parent().parent().append('  <div id="image-error" style="display: block">يجب أن لا يزيد حجم {{__('Image')}} عن 0.5MB</div>');
                    } else {
                        if (input.files && input.files) {
                            img = new Image();
                            var objectUrl = _URL.createObjectURL(my_files[0]);
                            img.onload = function () {
                                width = this.width;
                                height = this.height;
                                /*console.log(width);
                                console.log(height); */           //alert(this.width + " " + this.height);
                                _URL.revokeObjectURL(objectUrl);
                                if (width == 416 && height == 248) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        jQuery('#preview_store_image')
                                            .attr('src', e.target.result).show();
                                    };
                                    reader.readAsDataURL(input.files[0]);
                                    $('#image-error').remove();
                                    $(input).data('img', true);
                                } else {
                                    swal.fire({
                                        type: 'error',
                                        title: 'خطأ',
                                        text: 'المقاس المطلوب (248px * 416px) والحجم 0.5 ميجا'
                                    });
                                    // hint.html('  <div id="image-error" style="display: block" >يجب أن يكون مقاس {{__('Image')}}  500 * 1500</div>');
                                    $(input).data('img', false);
                                    $(input).parent().children('.dropify-clear').trigger("click");
                                    $(input).val('');
                                }
                            };
                            img.src = objectUrl;
                        }
                    }
                } else {
                    $(input).data('img', false);
                    $(input).parent().children('.dropify-clear').trigger("click");
                    $(input).val('');
                    //$('#image').parent().parent().parent().append('  <div id="image-error" style="display: block" >يجب رفع صورة</div>');
                    swal.fire({
                        type: 'error',
                        title: 'خطأ',
                        text: 'يجب رفع صورة'
                    });

                }
            }
        }

        function readURL(input) {
            let hint = $(input).parent().parent().children('.hint');
            $('#image-error').remove();
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var file = input.files[0];
                var my_files = input.files;
                //console.log(file.type);
                var file_name = file.name;
                var temp_size = parseInt(file.size) / 1024;
                //console.log(temp_size);
                var extension = file_name.substr((file_name.lastIndexOf('.') + 1)).toLowerCase();
                if (extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'gif') {
                    if (temp_size > 500) {
                        swal.fire({
                            type: 'error',
                            title: 'خطأ',
                            text: 'يجب أن لا يزيد حجم {{__('Image')}} عن 0.5MB'
                        });
                        //$('#image').parent().parent().parent().append('  <div id="image-error" style="display: block">يجب أن لا يزيد حجم {{__('Image')}} عن 0.5MB</div>');
                    } else {
                        if (input.files && input.files) {
                            img = new Image();
                            var objectUrl = _URL.createObjectURL(my_files[0]);
                            img.onload = function () {
                                width = this.width;
                                height = this.height;
                                /*console.log(width);
                                console.log(height); */           //alert(this.width + " " + this.height);
                                _URL.revokeObjectURL(objectUrl);
                                if (width == 1500 && height == 500) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        jQuery('#preview_store_image')
                                            .attr('src', e.target.result).show();
                                    };
                                    reader.readAsDataURL(input.files[0]);
                                    $('#image-error').remove();
                                    $(input).data('img', true);
                                } else {
                                    swal.fire({
                                        type: 'error',
                                        title: 'خطأ',
                                        text: 'المقاس المطلوب (500px * 1500px) والحجم 0.5 ميجا'
                                    });
                                    // hint.html('  <div id="image-error" style="display: block" >يجب أن يكون مقاس {{__('Image')}}  500 * 1500</div>');
                                    $(input).data('img', false);
                                    $(input).parent().children('.dropify-clear').trigger("click");
                                    $(input).val('');
                                }
                            };
                            img.src = objectUrl;
                        }
                    }
                } else {
                    $(input).data('img', false);
                    $(input).parent().children('.dropify-clear').trigger("click");
                    $(input).val('');
                    //$('#image').parent().parent().parent().append('  <div id="image-error" style="display: block" >يجب رفع صورة</div>');
                    swal.fire({
                        type: 'error',
                        title: 'خطأ',
                        text: 'يجب رفع صورة'
                    });

                }
            }
        }

        function readFixedBannerURL(input) {
            let hint = $(input).parent().parent().children('.hint');
            $('#image-error').remove();
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var file = input.files[0];
                var my_files = input.files;
                //console.log(file.type);
                var file_name = file.name;
                var temp_size = parseInt(file.size) / 1024;
                //console.log(temp_size);
                var extension = file_name.substr((file_name.lastIndexOf('.') + 1)).toLowerCase();
                if (extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'gif') {
                    if (temp_size > 500) {
                        swal.fire({
                            type: 'error',
                            title: 'خطأ',
                            text: 'يجب أن لا يزيد حجم {{__('Image')}} عن 0.5MB'
                        });
                        //$('#image').parent().parent().parent().append('  <div id="image-error" style="display: block">يجب أن لا يزيد حجم {{__('Image')}} عن 0.5MB</div>');
                    } else {
                        if (input.files && input.files) {
                            img = new Image();
                            var objectUrl = _URL.createObjectURL(my_files[0]);
                            img.onload = function () {
                                width = this.width;
                                height = this.height;
                                /*console.log(width);
                                console.log(height); */           //alert(this.width + " " + this.height);
                                _URL.revokeObjectURL(objectUrl);
                                if (width == 1750 && height == 250) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        jQuery('#preview_store_image')
                                            .attr('src', e.target.result).show();
                                    };
                                    reader.readAsDataURL(input.files[0]);
                                    $('#image-error').remove();
                                    $(input).data('img', true);
                                } else {
                                    swal.fire({
                                        type: 'error',
                                        title: 'خطأ',
                                        text: 'المقاس المطلوب (250px * 1750px) والحجم 0.5 ميجا'
                                    });
                                    // hint.html('  <div id="image-error" style="display: block" >يجب أن يكون مقاس {{__('Image')}}  500 * 1500</div>');
                                    $(input).data('img', false);
                                    $(input).parent().children('.dropify-clear').trigger("click");
                                    $(input).val('');
                                }
                            };
                            img.src = objectUrl;
                        }
                    }
                } else {
                    $(input).data('img', false);
                    $(input).parent().children('.dropify-clear').trigger("click");
                    $(input).val('');
                    //$('#image').parent().parent().parent().append('  <div id="image-error" style="display: block" >يجب رفع صورة</div>');
                    swal.fire({
                        type: 'error',
                        title: 'خطأ',
                        text: 'يجب رفع صورة'
                    });

                }
            }
        }

        function readSquarePicURL(input) {
            let hint = $(input).parent().parent().children('.hint');
            $('#image-error').remove();
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var file = input.files[0];
                var my_files = input.files;
                //console.log(file.type);
                var file_name = file.name;
                var temp_size = parseInt(file.size) / 1024;
                //console.log(temp_size);
                var extension = file_name.substr((file_name.lastIndexOf('.') + 1)).toLowerCase();
                if (extension == 'jpg' || extension == 'jpeg' || extension == 'png' || extension == 'gif') {
                    if (temp_size > 500) {
                        swal.fire({
                            type: 'error',
                            title: 'خطأ',
                            text: 'يجب أن لا يزيد حجم {{__('Image')}} عن 0.5MB'
                        });
                        //$('#image').parent().parent().parent().append('  <div id="image-error" style="display: block">يجب أن لا يزيد حجم {{__('Image')}} عن 0.5MB</div>');
                    } else {
                        if (input.files && input.files) {
                            img = new Image();
                            var objectUrl = _URL.createObjectURL(my_files[0]);
                            img.onload = function () {
                                width = this.width;
                                height = this.height;
                                /*console.log(width);
                                console.log(height); */           //alert(this.width + " " + this.height);
                                _URL.revokeObjectURL(objectUrl);
                                if (width == 870 && height == 330) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        jQuery('#preview_store_image')
                                            .attr('src', e.target.result).show();
                                    };
                                    reader.readAsDataURL(input.files[0]);
                                    $('#image-error').remove();
                                    $(input).data('img', true);
                                } else {
                                    swal.fire({
                                        type: 'error',
                                        title: 'خطأ',
                                        text: 'المقاس المطلوب (330px * 870px) والحجم 0.5 ميجا'
                                    });
                                    // hint.html('  <div id="image-error" style="display: block" >يجب أن يكون مقاس {{__('Image')}}  500 * 1500</div>');
                                    $(input).data('img', false);
                                    $(input).parent().children('.dropify-clear').trigger("click");
                                    $(input).val('');
                                }
                            };
                            img.src = objectUrl;
                        }
                    }
                } else {
                    $(input).data('img', false);
                    $(input).parent().children('.dropify-clear').trigger("click");
                    $(input).val('');
                    //$('#image').parent().parent().parent().append('  <div id="image-error" style="display: block" >يجب رفع صورة</div>');
                    swal.fire({
                        type: 'error',
                        title: 'خطأ',
                        text: 'يجب رفع صورة'
                    });

                }
            }
        }
    </script>
    <script>
        $(document).on('change', '.model', function (e) {
            //alert('je');
            let model = $(this);
            let model_val = model.val();
            let model_id = $('#' + $(this).data('modelid'));
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
            if (model_val === "" || model_val === "mostOrdered" || model_val === "newest" || model_val === "offers") {
                model_id.removeAttr('required', true);
                model_id.fadeOut(200);

            } else {
                model_id.fadeIn(200);
                model_id.attr('required', true);
                $.ajax({
                    url: "{{route('design.getModelItems')}}",
                    method: 'post',
                    data: {'model_val': model_val},
                    success: function (response) {
                        model_id.empty();
                        model_id.append('<option value="">  {{__('Select')}}   </option>');
                        $.each(response, function (i, option) {
                            if (typeof (option["sub_categories"]) != "undefined" && option["sub_categories"].length > 0) {
                                model_id.append('<option style="font-weight:bold!important;" value="' + option["id"] + '">' + option["name"] + '</option>');
                                $.each(option["sub_categories"], function (index, value) {
                                    model_id.append('<option value="' + value["id"] + '">' + ' - ' + value["name"] + '</option>');
                                });
                            } else {
                                model_id.append('<option style="font-weight:bold!important;"  value="' + option["id"] + '">' + option["name"] + '</option>');
                            }
                        });
                    },
                    error: function (response) {
                        /*
                                        alert(response);
                        */
                    }
                });
            }

        });
    </script>
    <script>
        $(document).on('change', '.is_external_link', function () {
            let target = $(this).data('target');
            let external_link = $('#external_link_div-' + target);
            let external_link_input = $('#external_link-' + target);
            let is_external_link = $(this);
            if (is_external_link.prop('checked') === true) {
                //model_select.val("");
                //model_id_select.val("");
                external_link.show();
                external_link_input.attr('required', true);
            } else {
                external_link.hide();
                external_link_input.removeAttr('required')
            }
        });
    </script>
    <script !src="">
        $(document).on('click', '.addSliderElement', function (e) {
            const count = $(this).data('count') + 1;
            $(this).data('count', count);
            const logo = $('#imageSlider1').attr('src');
            $('#sliderElements').append('<div class="modal-body row p-4">' +
                '                            <div class="col-md-6">' +
                '                                <div class="form-group">' +
                '\n' +
                '                                    <select class="form-control slider_model" name="model[]">' +
                '                                        <option value=""> {{__('Select Link')}}</option>' +
                '                                        <option value="product">{{__('Product Link')}}</option>' +
                '                                        <option value="category"> {{__('Category Link')}}</option>' +
                '' +
                '                                        <option value="brand"> {{__('Brand Link')}}</option><option value="mostOrdered">{{__('Best seller')}}</option>' +
                '                                        <option value="newest">{{__('Latest Products')}}</option><option value="offers"> {{__('Sale Products')}}</option>' +
                '                                    </select>' +
                '                                </div>' +
                '                            </div>' +
                '                            <div class="col-md-6">' +
                '                                <div class="form-group">' +
                '                                    <select name="model_id[]" class="form-control slider_model_id">' +
                '                                        <div class="models">' +
                '                                            <option value=""> {{__('Choose the type first')}}ً</option>' +
                '                                        </div>' +
                '                                    </select>' +
                '                                </div>' +
                '                            </div>' +
                '                            <div class="col-md-12">' +
                '                                <div class=" mb-2">' +
                '                                    <input type="checkbox" name="is_external_link[]" class="slider_is_external_link"' +
                '                                           data-target="banner">' +
                '                                    <label for="" class="">{{__('External link!')}}</label>' +
                '                                </div>' +
                '                                <div class="input-group slider_external_link_div" id=""' +
                '                                     style="display: none">' +
                '                                    <div class="input-group-prepend">' +
                '                                    </div>' +
                '                                    <input name="external_link[]"' +
                '                                            type="text" class="form-control slider_external_link"' +
                '                                            placeholder="{{__('External link')}}">' +
                '                                </div>' +
                '                            </div>' +
                '                            <div class="picture-item mt-3 col-md-12     text-align: center;">' +
                '                                <span class="mx-1 infoHintMsg"' +
                '                                           style="">{{__(' The required size is (1500px * 500px) and the size is 0.5 MB')}}</span>' +
                '                                       <div class="customDropify' + count + '" data-count="' + count + '"> ' +
                '                                           <div class="dropify-wrapper" ><div class="dropify-message">' +
            '                                                       <span class="file-icon"></span>' +
                '                                                        <p><span >{{__('Click here to choose')}} {{__('Image')}}</span></p>' +
                '                                                           <p class="dropify-error"><span >{{__('Click here to choose')}} {{__('Image')}}</span></p>' +
                '                                           </div>' +
                '                                   <div class="dropify-loader"></div>  ' +
                '                                   <div class="dropify-errors-container">' +
                '                                           <ul></ul>' +
                '                                   </div>' +
                '                                       <input type="hidden" value="" name="imageDone" class="sliderDone" id="sliderDone' + count + '" required>' +
            '                                           <input required="" accept="image/*"  type="file" class="dropify sliderFile" data-count="' + count + '" name="image[]"   >' +
                '                                   <button type="button" class="dropify-clear">{{__('Delete')}}</button>' +
                '                                   <div class="dropify-preview"><span class="dropify-render"></span>' +
                '                                   <div class="dropify-infos"><div class="dropify-infos-inner">' +
                '                                   <p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>' +
                '                                       <p class="dropify-infos-message">اسحب واسقط الملف هنا للاستبدال</p></div></div></div></div> ' +
                '                                   <span style="color: #ee151f"></span> </div><div id="imageSliderArea' + count + '" style="display: none;width: 544px;max-height: 180px;margin: 0px auto 30px;">' +
                                                    ' <img id="imageSlider' + count + '" src="' + logo + '" alt="Picture">' +
                '                                    <button type="button" class="btn btn-success cropSlider" data-count="' + count + '" style="margin: 5px" id="cropSlider' + count +
                '">  {{__('Save')}} {{__('Image')}}</button>                                    ' + ' <button type="button" class="btn btn-dark undoSlider" data-count="' + count + '" id="undoSlider' + count + '">{{__('Back')}}</button>' + ' </div>' +
                '                                <a href="javascript:void(0)" class="delete btn btn-danger deleteBannerInput" onclick="$(this).parent().parent().remove();" ' +
                '                                       style=" float: left; margin-top: 20px;    z-index: 2222;position: relative;margin-bottom: 5px;left: 0px;">' +
                '                                   <i class="mdi mdi-delete"></i></a>' +
                '                            </div>' +
                '                        </div>');
        });
        $(document).on('click', '.addSquareElement', function (e) {
            const count = $(this).data('count') + 1;
            $(this).data('count', count);
            const logo = $('#squareImage1').attr('src');
            $('#multipleSquareElements').append('<div class="modal-body p-4">\n' +
                '                            <div class="col-md-12">\n' +
                '                                <div class="form-group">\n' +
                '\n' +
                '                                    <select class="form-control slider_model" name="model[]">\n' +
                '                                        <option value=""> {{__('Select Link')}}</option>\n' +
                '                                        <option value="product">{{__('Product Link')}}</option>\n' +
                '                                        <option value="category"> {{__('Category Link')}}</option>\n' +
                '\n' +
                '                                        <option value="brand"> {{__('Brand Link')}}</option><option value="mostOrdered">{{__('Best seller')}}</option>\n' +
                '                                        <option value="newest">{{__('Latest Products')}}</option><option value="offers"> {{__('Sale Products')}}</option>\n' +
                '                                    </select>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="col-md-12">\n' +
                '                                <div class="form-group">\n' +
                '                                    <select name="model_id[]" class="form-control slider_model_id">\n' +
                '                                        <div class="models">\n' +
                '                                            <option value=""> {{__('Choose the type first')}}ً</option>\n' +
                '                                        </div>\n' +
                '                                    </select>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="col-md-12">\n' +
                '                                <div class=" mb-2">\n' +
                '                                    <input type="checkbox" name="is_external_link[]" class="slider_is_external_link"\n' +
                '                                           data-target="banner">\n' +
                '                                    <label for="" class="">{{__('External link!')}}</label>\n' +
                '\n' +
                '                                </div>\n' +
                '                                <div class="input-group slider_external_link_div" id=""\n' +
                '                                     style="display: none">\n' +
                '                                    <div class="input-group-prepend">\n' +
                '                                    </div>\n' +
                '                                    <input name="external_link[]"\n' +
                '                                            type="text" class="form-control slider_external_link"\n' +
                '                                            placeholder="{{__('External link')}}">\n' +
                '\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="mb-2" style="padding:0 2.25rem !important;">\n' +
                '                                <div class="input-group" id="" style="margin-top:10px;">\n' +
                '                                    <input name="inner_text[]"\n' +
                '                                           type="text" class="form-control inner_text"\n' +
                '                                           placeholder="{{__('Text on image')}}">\n' +
                '\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="picture-item mt-3" style="padding:0 2.25rem !important;">' +
                '                                <span class="mx-1 infoHintMsg">{{__(' The required size is (1500px * 500px) and the size is 0.5 MB')}}</span>' +
                '                                       <div class="customSquareImageDropify' + count + '" data-count="' + count + '">' +
                '                                            <div class="dropify-wrapper" >' +
                '                                                   <div class="dropify-message"><span class="file-icon"></span> <p><span >{{__('Click here to choose')}} {{__('Image')}}</span></p>' +
                '                                                       <p class="dropify-error"><span >{{__('Click here to choose')}} {{__('Image')}}</span></p></div>' +
                '                                                           <div class="dropify-loader"></div><div class="dropify-errors-container"><ul></ul></div>' +
                '                                                       <input type="hidden" value="" name="imageDone" class="squareImageDone" id="squareImageDone' + count + '" required>' +
        '                                                               <input required="" accept="image/*"  type="file" class="dropify squareImageFile" id=squareImageFile"' + count + '" data-count="' + count + '" name="image[]"   >' +
            '                                                           <button type="button" class="dropify-clear" >{{__('Delete')}}</button>' +
                '                                                           <div class="dropify-preview"><span class="dropify-render"></span>' +
                '                                                               <div class="dropify-infos"><div class="dropify-infos-inner">' +
            '                                                                       <p class="dropify-filename"><span class="file-icon"></span> ' +
                '                                               <span class="dropify-filename-inner"></span></p><p class="dropify-infos-message">اسحب واسقط الملف هنا للاستبدال</p></div></div></div></div> ' +
                '                                               <span style="color: #ee151f"></span> </div>' +
                '                                               <div id="squareImageArea' + count + '" style="display: none;width: 544px;max-height: 180px;    margin: 0px auto 30px;">' +
                '                                                   <img id="squareImage' + count + '" src="' + logo + '" alt="Picture">' +
                '                                                       <button type="button" class="btn btn-success cropSquareImage" data-count="' + count + '" style="margin: 5px" id="cropSquareImage' + count +
                '">  {{__('Save')}} {{__('Image')}}</button>                                                    ' +
                '                                                       <button type="button" class="btn btn-dark undoSquareImage" data-count="' + count + '" id="undoSquareImage' + count + '">{{__('Back')}}</button>' + ' </div>' +
                '                                <a href="javascript:void(0)" class="delete btn-danger deleteBannerInput" onclick="$(this).parent().parent().remove();" style="width: 50px; float: left; margin-top: 5px;    z-index: 2222;position: relative;margin-bottom: 20px;left: 12px;">' +
                '                                       <i class="mdi mdi-delete"></i></a>' +
                '                            </div>' +
                '                        </div>');
        });


    </script>


    <script>
        $(document).on('change', '.slider_model', function (e) {
            //alert('je');
            let model = $(this);
            let model_val = model.val();
            let model_id = $(this).parent().parent().parent().children().children().children('.slider_model_id');
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            if (model_val === "" || model_val === "mostOrdered" || model_val === "newest" || model_val === "offers") {
                model_id.removeAttr('required', true);
                model_id.fadeOut(200);

            } else {
                model_id.fadeIn(200);
                model_id.attr('required', true);
                $.ajax({
                    url: "{{route('design.getModelItems')}}",
                    method: 'post',
                    data: {'model_val': model_val},
                    success: function (response) {
                        model_id.empty();
                        model_id.append('<option value="">  {{__('Select')}}   </option>');
                        $.each(response, function (i, option) {
                            if (typeof (option["sub_categories"]) != "undefined" && option["sub_categories"].length > 0) {
                                model_id.append('<option style="font-weight:bold!important;" value="' + option["id"] + '">' + option["name"] + '</option>');
                                $.each(option["sub_categories"], function (index, value) {
                                    model_id.append('<option value="' + value["id"] + '">' + ' - ' + value["name"] + '</option>');
                                });
                            } else {
                                model_id.append('<option style="font-weight:bold!important;"  value="' + option["id"] + '">' + option["name"] + '</option>');
                            }
                        });
                    },
                    error: function (response) {
                        /*
                                        alert(response);
                        */
                    }
                });
            }

        });
    </script>
    <script>
        $(document).on('change', '.slider_is_external_link', function () {
            let external_link = $(this).parent().parent().children('.slider_external_link_div');
            let external_link_input = $(this).parent().parent().children('.slider_external_link_div').children('.slider_external_link');
            //let external_link = $('#external_link_div-' + target);
            //let external_link_input = $('#external_link-' + target);
            let is_external_link = $(this);
            if (is_external_link.prop('checked') === true) {
                //model_selectf.val("");
                //model_id_select.val("");
                external_link.show();
                external_link_input.attr('required', true);
            } else {
                external_link.hide();
                external_link_input.removeAttr('required')
            }
        });
    </script>



    <script>
        var input = document.getElementById('banner-image');
        var image = document.getElementById('imagea');
        var widebanner_formData = new FormData();//document.getElementById('wide_banner_form');
        var cropper;
        var cropBoxData = document.querySelector('#imageArea');
        var avatar = $('.dropify-render').find('img');
        $('#imagea').css('opacity', 0);
        input.addEventListener('change', function (e) {
            $('#imagea').css('opacity', 0);
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


            cropper = new Cropper(image, {
                //autoCropArea:1,
                dragMode: 'move',
                aspectRatio: 7 / 1,
                viewMode: 2,
                autoCropArea: 0.95,
                restore: false,
                guides: false,
                center: false,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
                responsive: true,
                ready: function () {
                    //Should set crop box data first here
                    cropper.setCropBoxData(cropBoxData);//.setCanvasData(canvasData);

                },

            });
            $('.dropify-wrapper').hide();
            $('#imageArea').show();
        });
        $('#crop').click(function (e) {
            $('#imagea').css('opacity', 0);
            var initialAvatarURL;
            var canvas;

            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 1750,
                    height: 250,
                });
                initialAvatarURL = avatar.src;
                $('.dropify-render').empty().append("<img src='" + canvas.toDataURL() + "' />");
                canvas.toBlob(function (blob) {
                    widebanner_formData.append('image', blob, 'avatar.jpg');
                    $('#imageDone').val('done');
                });


            }

            cropBoxData = cropper.getCropBoxData();
            canvasData = cropper.getCanvasData();
            cropper.destroy();
            $('.dropify-wrapper').show();
            $('#imageArea').hide();
        });
        $('#undo').click(function (e) {
            cropBoxData = cropper.getCropBoxData();
            canvasData = cropper.getCanvasData();
            cropper.destroy();
            //  $('#imagea').src='';
            $('#imagea').css('opacity', 0);
            $('#imageDone').val('');
            $('.dropify-clear').click();
            $('#imageArea').hide();
            $('.dropify-wrapper').show();

        });
        $('.dropify-clear').click(function () {
            $('#imageDone').val('');
        });

        $(document).ready(function () {

            var loader = $('#loader-modal');
            $('#bannerSave').click(function () {
                loader.fadeIn(200);
                $('#image-error').remove();
                if ($('#imageDone').val() == '') {
                    $('#imagea').parent().parent().append('  <div id="image-error" style="display: block" >يجب {{__('Save')}} {{__('Image')}}</div>');
                    loader.fadeOut(100);
                    return false;
                } else /*if ($('#wide_banner_form').valid()) */{

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('.has-error').remove();
                    widebanner_formData.append('type', 'fixed_wide_banner');
                    if ($('#wide_banner_form .is_external_link').is(':checked')) {
                        widebanner_formData.append('is_external_link', 1);
                        widebanner_formData.append('external_link', $('#banner_external_link').val());

                    } else {
                        widebanner_formData.append('model', $('#wide_banner_form select.model').val());
                        widebanner_formData.append('model_id', $('#wide_banner_form select#fixed_wide_banner').val());
                    }

                    $.ajax("{{route('design.storeHomeSection')}}", {
                        method: 'POST',
                        data: widebanner_formData,
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
                        beforeSend: function () {
                            $('.loader-modal').fadeIn(200);
                        },
                        success: function (data) {
                            if (data.status == 1) {
                                swal.fire({
                                    title: @if(App::isLocale('en'))
                                        data.massage_en
                                    @else
                                    data.massage_ar
                                    @endif,
                                    type: 'success',
                                    icon: 'success',
                                }, function () {
                                    window.location.href = '{{route('design.index')}}';
                                });
                                window.location.href = '{{route('design.index')}}';

                            } else if (data.errors) {
                                loader.fadeOut(200);
                                var errors = data.errors;
                                console.log(errors);
                                var errorsHtml = '';
                                $.each(errors, function (index, value) {
                                    $('.wide_banner_' + index).parent().parent().append('<span class="help-block has-error"> <strong>' + value + '</strong></span>');
                                });
                            } else {
                                swal.fire({
                                    title: data.message,
                                    type: 'error'
                                })
                            }
                            $('.loader-modal').fadeOut(100)
                        },

                        error: function (jqXhr, json, errorThrown) {// this are default for ajax errors
                            loader.fadeOut(200);
                            var errors = jqXhr.responseJSON;
                            console.log(errors);
                            var errorsHtml = '';
                            $.each(errors['errors'], function (index, value) {
                                console.log('.wide_banner_' + index);
                                $('.wide_banner_' + index).parent().parent().append('<span class="help-block has-error"> <strong>' + value + '</strong></span>');
                            });
                            $('.orderLoader').fadeOut(200);
                        },

                        complete: function () {
                            //$progress.hide();
                        },
                    });
                    /*   } else {
                           loader.fadeOut(100);
                           return false;*/
                }

            });
        });
    </script>
    <script>
        var input = $('.sliderFile');
        //document.getElementById('wide_banner_form');
        var cropper;
        var blobs = [];
        $('body').delegate('.sliderFile', 'change', function (e) {
            var sliderCount = $(this).data('count');
            var cropBoxData = document.querySelector('#imageSliderArea' + sliderCount);
            var image = document.getElementById('imageSlider' + sliderCount);
            $('#imageSlider' + sliderCount).css('opacity', 0);
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


            cropper = new Cropper(image, {
                aspectRatio: 3 / 1,
                //viewMode: 3,
                responsive: true,
                //autoCropArea:1,
                /* dragMode: 'move',
                 aspectRatio: 3 / 1,

                 autoCropArea: 0.95,
                 restore: false,
                 guides: false,
                 center: false,
                 highlight: false,
                 cropBoxMovable: true,
                 cropBoxResizable: true,
                 toggleDragModeOnDblclick: false,
                 responsive: true,*/
                ready: function () {
                    //Should set crop box data first here
                    cropper.setCropBoxData(cropBoxData);//.setCanvasData(canvasData);

                },

            });
            $('.customDropify' + sliderCount + ' .dropify-wrapper').hide();
            $('#imageSliderArea' + sliderCount).show();
        });
        $('body').delegate('.cropSlider', 'click', function (e) {
            var sliderCount = $(this).data('count');
            var cropBoxData = document.querySelector('#imageSliderArea' + sliderCount);
            var avatar = $('.customDropify' + sliderCount).find('.dropify-render').find('img');
            $('#imageSlider' + sliderCount).css('opacity', 0);
            var initialAvatarURL;
            var canvas;

            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 1500,
                    height: 500,
                });
                initialAvatarURL = avatar.src;
                $('.customDropify' + sliderCount).find('.dropify-render').empty().append("<img src='" + canvas.toDataURL() + "' />");
                canvas.toBlob(function (blob) {
                    blobs.push(blob);
                    $('#sliderDone' + sliderCount).val('done');
                });

                cropBoxData = cropper.getCropBoxData();
                canvasData = cropper.getCanvasData();
                cropper.destroy();
            }

            //     console.log($('.customDropify'+sliderCount).find('.dropify-wrapper'));
            $('.customDropify' + sliderCount).find('.dropify-preview').show();
            $('.customDropify' + sliderCount).find('.dropify-wrapper').show();
            $('#imageSliderArea' + sliderCount).hide();
        });
        $('body').delegate('.undoSlider', 'click', function (e) {
            var sliderCount = $(this).data('count');
            if (cropper) {
                cropBoxData = cropper.getCropBoxData();
                canvasData = cropper.getCanvasData();
                cropper.destroy();
            }
            //  $('#imagea').src='';
            $('#imageSlider' + sliderCount).css('opacity', 0);
            $('#sliderDone' + sliderCount).val('');
            $('.customDropify' + sliderCount).find('.dropify-clear').click();
            $('#imageSliderArea' + sliderCount).hide();
            $('.customDropify' + sliderCount).find('.dropify-wrapper').show();

        });
        $('.dropify-clear').click(function () {
            $(this).parent().parent().find('.sliderDone').val('');
        });

        $(document).ready(function () {

            var loader = $('#loader-modal');
            $('#saveSlider').click(function () {
                var slider_formData = new FormData();
                loader.fadeIn(200);
                var sliderBlocks = $('#sliderElements').find('.modal-body');
                var validForm = true;
                sliderBlocks.each(function (index, value) {
                    if ($('#sliderDone' + (index + 1)).val() == '') {
                        console.log((index + 1));
                        $('#imageSlider' + (index + 1)).parent().parent().append('  <div id="image-error" style="display: block" >يجب {{__('Save')}} {{__('Image')}}</div>');
                        validForm = false;
                    } else {
                        slider_formData.append('image[' + index + ']', blobs[index], 'avatar' + index + '.jpg');
                    }
                    if ($(this).find('.slider_is_external_link').is(':checked')) {
                        slider_formData.append('is_external_link[' + index + ']', 1);
                        slider_formData.append('external_link[' + index + ']', $(this).find('.slider_external_link').val());

                    } else {
                        slider_formData.append('model[' + index + ']', $(this).find('.slider_model').val());
                        slider_formData.append('model_id[' + index + ']', $(this).find('.slider_model_id').val());
                        slider_formData.append('external_link[' + index + ']', '');

                    }

                })

                if (validForm == false) {
                    loader.fadeOut(100);
                    return false;
                } else /*if ($('#wide_banner_form').valid()) */{
                    $('#image-error').remove();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('.has-error').remove();
                    slider_formData.append('type', 'slider');

                    $.ajax("{{route('design.storeHomeSection')}}", {
                        method: 'POST',
                        data: slider_formData,
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
                        beforeSend: function () {
                            $('.loader-modal').fadeIn(200);
                        },
                        success: function (data) {
                            if (data.status == 1) {
                                swal.fire({
                                    title: @if(App::isLocale('en'))
                                        data.massage_en
                                    @else
                                    data.massage_ar
                                    @endif,
                                    type: 'success',
                                    icon: 'success',
                                }, function () {
                                    window.location.href = '{{route('design.index')}}';
                                });
                                window.location.href = '{{route('design.index')}}';

                            } else if (data.errors) {
                                loader.fadeOut(200);
                                var errors = data.errors;
                                console.log(errors);
                                var errorsHtml = '';
                                $.each(errors, function (index, value) {
                                    $('.wide_banner_' + index).parent().parent().append('<span class="help-block has-error"> <strong>' + value + '</strong></span>');
                                });
                            } else {
                                swal.fire({
                                    title: data.message,
                                    type: 'error'
                                })
                            }
                            $('.loader-modal').fadeOut(100)
                        },

                        error: function (jqXhr, json, errorThrown) {// this are default for ajax errors
                            loader.fadeOut(200);
                            var errors = jqXhr.responseJSON;
                            console.log(errors);
                            var errorsHtml = '';
                            $.each(errors['errors'], function (index, value) {
                                console.log('.wide_banner_' + index);
                                $('.wide_banner_' + index).parent().parent().append('<span class="help-block has-error"> <strong>' + value + '</strong></span>');
                            });
                            $('.orderLoader').fadeOut(200);
                        },

                        complete: function () {
                            //$progress.hide();
                        },
                    });
                    /*   } else {
                           loader.fadeOut(100);
                           return false;*/
                }

            });
        });
    </script>
    <script>
        var input = $('.squareImageFile');
        var cropper;
        var squareImageblobs = [];
        $('body').delegate('.squareImageFile', 'change', function (e) {
            var squareImageCount = $(this).data('count');
            var cropBoxData = document.querySelector('#squareImageArea' + squareImageCount);
            var image = document.getElementById('squareImage' + squareImageCount);
            $('#squareImageFile' + squareImageCount).css('opacity', 0);
            $('#squareImage' + squareImageCount).css('opacity', 0);
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


            cropper = new Cropper(image, {
                //autoCropArea:1,
                dragMode: 'move',
                aspectRatio: 416 / 248,
                viewMode: 2,
                autoCropArea: 0.95,
                restore: false,
                guides: false,
                center: false,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
                responsive: true,
                ready: function () {
                    //Should set crop box data first here
                    cropper.setCropBoxData(cropBoxData);//.setCanvasData(canvasData);

                },

            });
            $('.customSquareImageDropify' + squareImageCount + ' .dropify-wrapper').hide();
            $('#squareImageArea' + squareImageCount).show();
        });
        $('body').delegate('.cropSquareImage', 'click', function (e) {
            var sliderCount = $(this).data('count');
            var cropBoxData = document.querySelector('#squareImageArea' + sliderCount);
            var avatar = $('.customSquareImageDropify' + sliderCount).find('.dropify-render').find('img');
            $('#squareImage' + sliderCount).css('opacity', 0);
            var initialAvatarURL;
            var canvas;

            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 1500,
                    height: 500,
                });
                initialAvatarURL = avatar.src;
                $('.customSquareImageDropify' + sliderCount).find('.dropify-render').empty().append("<img src='" + canvas.toDataURL() + "' />");
                canvas.toBlob(function (blob) {
                    squareImageblobs.push(blob);
                    $('#squareImageDone' + sliderCount).val('done');
                });

                cropBoxData = cropper.getCropBoxData();
                canvasData = cropper.getCanvasData();
                cropper.destroy();
            }

            //     console.log($('.customDropify'+sliderCount).find('.dropify-wrapper'));
            $('.customSquareImageDropify' + sliderCount).find('.dropify-preview').show();
            $('.customSquareImageDropify' + sliderCount).find('.dropify-wrapper').show();
            $('#squareImageArea' + sliderCount).hide();
        });
        $('body').delegate('.undoSquareImage', 'click', function (e) {
            var sliderCount = $(this).data('count');
            if (cropper) {
                cropBoxData = cropper.getCropBoxData();
                canvasData = cropper.getCanvasData();
                cropper.destroy();
            }
            //  $('#imagea').src='';
            $('#squareImage' + sliderCount).css('opacity', 0);
            $('#squareImageDone' + sliderCount).val('');
            $('.customSquareImageDropify' + sliderCount).find('.dropify-clear').click();
            $('#squareImageArea' + sliderCount).hide();
            $('.customSquareImageDropify' + sliderCount).find('.dropify-wrapper').show();

        });
        $('.dropify-clear').click(function () {
            $(this).parent().parent().find('.squareImageDone').val('');
        });

        $(document).ready(function () {

            var loader = $('#loader-modal');
            $('#saveSquareImages').click(function () {
                console.log(squareImageblobs);
                var slider_formData = new FormData();
                loader.fadeIn(200);
                var sliderBlocks = $('#multipleSquareElements').find('.modal-body');
                var validForm = true;

                if ($('#label_ar').val() == '') {
                    validForm = false;
                    $('#label_ar').parent().append('  <div id="image-error" style="display: block" >{{__('You must add the title')}}</div>');
                }
                if ($('#label_en').val() == '') {
                    validForm = false;
                    $('#label_en').parent().append('  <div id="image-error" style="display: block" >{{__('You must add the title En')}}</div>');
                }
                sliderBlocks.each(function (index, value) {
                    var blk=$(this);
                    if (index > 0) {
                        if ($('#squareImageDone' + (index)).val() == '') {
                            // console.log((index + 1));
                            $('#squareImage' + (index)).parent().parent().append('  <div id="image-error" style="display: block" >يجب {{__('Save')}} {{__('Image')}}</div>');
                            validForm = false;
                        } else {
                            console.log(index);
                            slider_formData.append('image[' + index + ']', squareImageblobs[index - 1], 'avatar' + index + '.jpg');
                        }
                        /*if ($(this).find('.inner_text').val() == '') {
                            // console.log((index + 1));
                            $(this).find('.inner_text').parent().parent().append('  <div id="image-error" style="display: block" >يجب إضافة نص للصورة</div>');
                            validForm = false;
                        }*/
                        if ($(this).find('.slider_is_external_link').is(':checked')) {
                            slider_formData.append('is_external_link[' + index + ']', 1);
                            slider_formData.append('external_link[' + index + ']', blk.find('.slider_external_link').val());
                            slider_formData.append('inner_text[' + index + ']', blk.find('.inner_text').val());

                        } else {
                            slider_formData.append('model[' + index + ']', blk.find('.slider_model').val());
                            slider_formData.append('model_id[' + index + ']', blk.find('.slider_model_id').val());
                            slider_formData.append('external_link[' + index + ']', '');
                            slider_formData.append('inner_text[' + index + ']', blk.find('.inner_text').val());

                        }
                    }

                })

                if (validForm == false) {
                    loader.fadeOut(100);
                    return false;
                } else /*if ($('#wide_banner_form').valid()) */{
                    $('#image-error').remove();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('.has-error').remove();

                    slider_formData.append('type', 'multiple_square');
                    slider_formData.append('label_ar', $('#label_ar').val());
                    slider_formData.append('label_en', $('#label_en').val());

                    $.ajax("{{route('design.storeHomeSection')}}", {
                        method: 'POST',
                        data: slider_formData,
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
                                    title: @if(App::isLocale('en'))
                                        data.massage_en
                                        @else
                                        data.massage_ar
                                    @endif,
                                    type: 'success',
                                    icon: 'success'
                                }, function () {
                                    window.location.href = '{{route('design.index')}}';
                                });
                                window.location.href = '{{route('design.index')}}';

                            } else if (data.errors) {
                                loader.fadeOut(200);
                                var errors = data.errors;
                                console.log(errors);
                                var errorsHtml = '';
                                $.each(errors, function (index, value) {
                                    $('.wide_banner_' + index).parent().parent().append('<span class="help-block has-error"> <strong>' + value + '</strong></span>');
                                });
                            } else {
                                swal.fire({
                                    title: data.message,
                                    type: 'error'
                                })
                            }
                        },

                        error: function (jqXhr, json, errorThrown) {// this are default for ajax errors
                            loader.fadeOut(200);
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

            });
        });
    </script>
    <script>
        var input1 = document.getElementById('first-squarePicSave-image');
        var input2 = document.getElementById('second-squarePicSave-image');
        var image1 = document.getElementById('imagea1');
        var image2 = document.getElementById('imagea2');
        var square_formData = new FormData();//document.getElementById('wide_banner_form');
        var square_cropper;
        var square_cropper2;
        var square_cropBoxData = document.querySelector('#square_imageArea1');
        var avatar1 = $('.customDropify1 .dropify-render').find('img');
        var avatar2 = $('.customDropify2 .dropify-render').find('img');
        $('#imagea1').css('opacity', 0);
        $('#imagea2').css('opacity', 0);
        var finalCropWidth = 870;
        var finalCropHeight = 330;
        var finalAspectRatio = finalCropWidth / finalCropHeight;

        input1.addEventListener('change', function (e) {
            $('#imagea1').css('opacity', 0);
            $('#image1-error').remove();
            var files = e.target.files;
            var done = function (url) {
                input1.value = '';
                image1.src = url;
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


            square_cropper = new Cropper(image1, {
                //autoCropArea:1,
                dragMode: 'move',
                aspectRatio: finalAspectRatio,
                viewMode: 2,
                autoCropArea: 0.95,
                restore: false,
                guides: false,
                center: false,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
                responsive: true,
                ready: function () {
                    //Should set crop box data first here
                    square_cropper.setCropBoxData(square_cropBoxData);//.setCanvasData(canvasData);

                },

            });
            $('.customDropify1 .dropify-wrapper').hide();
            $('#square_imageArea1').show();
        });
        $('#crop1').click(function (e) {
            $('#imagea1').css('opacity', 0);
            var initialAvatarURL;
            var canvas;

            if (square_cropper) {
                canvas = square_cropper.getCroppedCanvas({
                    width: 870,
                    height: 330,
                });
                initialAvatarURL = avatar1.src;
                $('.customDropify1 .dropify-render').empty().append("<img src='" + canvas.toDataURL() + "' />");
                canvas.toBlob(function (blob) {
                    square_formData.append('first_image', blob, 'avatar1.jpg');
                    $('#imageDone1').val('done');
                });


            }

            square_cropBoxData = square_cropper.getCropBoxData();
            // square_canvasData = square_cropper.getCanvasData();
            square_cropper.destroy();
            $('.customDropify1 .dropify-wrapper').show();
            $('#square_imageArea1').hide();
        });
        $('#undo1').click(function (e) {
            cropBoxData = square_cropper.getCropBoxData();
            canvasData = square_cropper.getCanvasData();
            square_cropper.destroy();
            //  $('#imagea').src='';
            $('#imagea1').css('opacity', 0);
            $('#imageDone1').val('');
            $('.customDropify1 .dropify-clear').click();
            $('#square_imageArea1').hide();
            $('.customDropify1 .dropify-wrapper').show();

        });
        input2.addEventListener('change', function (e) {
            $('#imagea2').css('opacity', 0);
            $('#image2-error').remove();
            var files = e.target.files;
            var done = function (url) {
                input2.value = '';
                image2.src = url;
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


            square_cropper2 = new Cropper(image2, {
                //autoCropArea:1,
                dragMode: 'move',
                aspectRatio: finalAspectRatio,
                viewMode: 2,
                autoCropArea: 0.95,
                restore: false,
                guides: false,
                center: false,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
                responsive: true,
                ready: function () {
                    //Should set crop box data first here
                    square_cropper2.setCropBoxData(square_cropBoxData);//.setCanvasData(canvasData);

                },

            });
            $('.customDropify2 .dropify-wrapper').hide();
            $('#square_imageArea2').show();
        });
        $('#crop2').click(function (e) {
            $('#imagea2').css('opacity', 0);
            var initialAvatarURL;
            var canvas;

            if (square_cropper2) {
                canvas = square_cropper2.getCroppedCanvas({
                    width: 870,
                    height: 330,
                });
                initialAvatarURL = avatar2.src;
                $('.customDropify2 .dropify-render').empty().append("<img src='" + canvas.toDataURL() + "' />");
                canvas.toBlob(function (blob) {
                    square_formData.append('second_image', blob, 'avatar2.jpg');
                    $('#imageDone2').val('done');
                });


            }

            square_cropBoxData = square_cropper2.getCropBoxData();
            // square_canvasData = square_cropper2.getCanvasData();
            square_cropper2.destroy();
            $('.customDropify2 .dropify-wrapper').show();
            $('#square_imageArea2').hide();
        });
        $('#undo2').click(function (e) {
            cropBoxData = square_cropper2.getCropBoxData();
            canvasData = square_cropper2.getCanvasData();
            square_cropper2.destroy();
            //  $('#imagea').src='';
            $('#imagea2').css('opacity', 0);
            $('#imageDone2').val('');
            $('.customDropify2 .dropify-clear').click();
            $('#square_imageArea2').hide();
            $('.customDropify2 .dropify-wrapper').show();

        });
        $('.customDropify2 .dropify-clear').click(function () {
            $('#imageDone1').val('');
        });

        $(document).ready(function () {

            var loader = $('#loader-modal');
            $('#squareBannerSave').click(function () {
                loader.fadeIn(200);
                $('#image1-error').remove();
                $('#image2-error').remove();
                if ($('#imageDone1').val() == '' && $('#imageDone2').val() == '') {
                    $('#imagea1').parent().parent().append('  <div id="image1-error" style="display: block" >{{__('Must Uploads')}} {{__('Image')}}</div>');
                    $('#imagea2').parent().parent().append('  <div id="image2-error" style="display: block" >{{__('Must Uploads')}} {{__('Image')}}</div>');
                    loader.fadeOut(100);
                    return false;
                } else if ($('#imageDone1').val() == '') {
                    $('#imagea1').parent().parent().append('  <div id="image1-error" style="display: block" >{{__('Must')}} {{__('Save')}} {{__('Image')}}</div>');
                    loader.fadeOut(100);
                    return false;
                } else if ($('#imageDone2').val() == '') {
                    $('#imagea2').parent().parent().append('  <div id="image2-error" style="display: block" >{{__('Must')}} {{__('Save')}} {{__('Image')}}</div>');
                    loader.fadeOut(100);
                    return false;
                } else /*if ($('#wide_banner_form').valid()) */{

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('.has-error').remove();
                    square_formData.append('type', 'rectangular_banner');
                    if ($('.squar_is_external_link1').is(':checked')) {
                        square_formData.append('first_is_external_link', 1);
                        square_formData.append('first_external_link', $('#first_squarePic_external_link').val());

                    } else {
                        square_formData.append('first_model', $('.square_first_model').val());
                        square_formData.append('first_model_id', $('.square_first_model_id').val());
                    }
                    if ($('.square_is_external_link2').is(':checked')) {
                        square_formData.append('second_is_external_link', 1);
                        square_formData.append('second_external_link', $('#second_squarePic_external_link').val());

                    } else {
                        square_formData.append('second_model', $('.square_second_model').val());
                        square_formData.append('second_model_id', $('.square_second_model_id').val());
                    }

                    $.ajax("{{route('design.storeHomeSection')}}", {
                        method: 'POST',
                        data: square_formData,
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
                        beforeSend: function () {
                            $('.loader-modal').fadeIn(200);
                        },
                        success: function (data) {
                            if (data.status == 1) {
                                swal.fire({
                                    title: data.message,
                                    type: 'success'
                                }, function () {
                                    window.location.href = '{{route('design.index')}}';
                                });
                                window.location.href = '{{route('design.index')}}';

                            } else if (data.errors) {
                                loader.fadeOut(200);
                                var errors = data.errors;
                                console.log(errors);
                                var errorsHtml = '';
                                $.each(errors, function (index, value) {
                                    $('.square_' + index).parent().parent().append('<span class="help-block has-error"> <strong>' + value + '</strong></span>');
                                });
                            } else {
                                swal.fire({
                                    title: data.message,
                                    type: 'error'
                                })
                            }
                            $('.loader-modal').fadeOut(100)
                        },

                        error: function (jqXhr, json, errorThrown) {// this are default for ajax errors
                            loader.fadeOut(200);
                            var errors = jqXhr.responseJSON;
                            console.log(errors);
                            var errorsHtml = '';
                            $.each(errors['errors'], function (index, value) {
                                console.log('.wide_banner_' + index);
                                $('.square_' + index).parent().parent().append('<span class="help-block has-error"> <strong>' + value + '</strong></span>');
                            });
                            $('.loader-modal').fadeOut(100)
                        },

                        complete: function () {
                            //$progress.hide();
                        },
                    });
                    /*   } else {
                           loader.fadeOut(100);
                           return false;*/
                }

            });
        });
    </script>


@endsection
