@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-file-uploader.css')}}">
    <link rel="stylesheet" href="{{asset('dropify_cropper/cropper.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"  />

    <style>
    .nav-pills{
        justify-content: flex-end;
    }
    .select2-container {
        min-width: 400px;
    }

    .select2-results__option {
        padding-right: 20px;
        vertical-align: middle;
    }
   .select2-results__options--nested .select2-results__option:before {

        content: "";
        display: inline-block;
        position: relative;
        height: 20px;
        width: 20px;
        border: 2px solid #e9e9e9;
        border-radius: 4px;
        background-color: #fff;
        margin-right: 20px;
        vertical-align: middle;
    }
    .select2-results__options--nested .select2-results__option[aria-selected=true]:before {
        background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 9.5 7.5\'%3E%3Cpolyline points=\'0.75 4.35 4.18 6.75 8.75 0.75\' style=\'fill:none;stroke:%23fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px\'/%3E%3C/svg%3E');
        color: #fff;
        background-color: #f77750;
        border: 0;
        display: inline-block;
        padding-left: 3px;
        width: 18px;
        height: 18px;
        left: 0;
        background-size: 57%;


    }
    .select2-results__options--nested .select2-results__option[aria-selected=true]:before {
        background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 9.5 7.5\'%3E%3Cpolyline points=\'0.75 4.35 4.18 6.75 8.75 0.75\' style=\'fill:none;stroke:%23fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px\'/%3E%3C/svg%3E');
        color: #fff;
        background-color: #f77750;
        border: 0;
        display: inline-block;
        padding-left: 3px;
        width: 18px;
        height: 18px;
        left: 0;
        background-size: 110%;


    }
    .select2-container--default .select2-results__options--nested .select2-results__option[aria-selected=true] {
        background-color: #fff;
    }
    .select2-container--default .select2-results__options--nested .select2-results__option--highlighted[aria-selected] {
        background-color: #eaeaeb;
        color: #272727;
    }
    .select2-container--default .select2-selection--multiple {
        margin-bottom: 10px;
    }
    .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
        border-radius: 4px;
    }
    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #f77750;
        border-width: 2px;
    }
    .select2-container--default .select2-selection--multiple {
        border-width: 2px;
    }
    .select2-container--open .select2-dropdown--below {

        border-radius: 6px;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);

    }
    .select2-selection .select2-selection--multiple:after {
        content: 'hhghgh';

    }
    .select2-container--default .select2-results__group{
        display: inline-block;
    }
</style>
    <style>
        .img-container img {
            max-width: 100%;
        }

        .img-container, .img-container img {
            max-width: 100%;
        }

        .modal img {
            width: 100%;
            height: 100%;
        }

        .cropper-container {
            width: 100% !important;
            height: 100% !important;
        }

        /*  .modal-body .img-container img {
              max-width: 100%;
              max-height: 100%;
          }
          .cropper-container{
              height: 400px !important;
              width: 100% !important;
          }*/
        #croppModal .modal-body, #modal .modal-body, .cropper_modal .modal-body {
            /*min-height:400px !important;*/
            /*height:400px !important;*/
            /* overflow:hidden;
             padding: 0;*/
        }

        @media (max-width: 567px) {
            #croppModal .modal-body, #modal .modal-body, .cropper_modal .modal-body {
                /*min-height:200px !important;*/
                /*height:200px !important;*/
                /*   overflow:hidden;
                   padding: 0;*/
            }
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
            .dropzone .dz-preview .dz-image {
                border-radius: 20px;
            }
            .dz-remove{

                width: 20px;
                height: 20px;
                background-color: rgba(255,255,255,.8);
                border-radius: 50px;
                line-height: 16px;
                text-align: center;
                color: #323642;
                position: absolute;
                top: -3px;
                z-index: 22222;
                font-size: 12px;
                text-decoration: none;
            }
        }
    </style>
    <style>
        .dropify-wrapper .dropify-preview .dropify-render img {
            width: auto;
            height: auto;
        }
    </style>
    <style>
        .input-check{
            margin-top: 4px;
        }
        @media (min-width: 992px) {
            .modal-lg, .modal-xl {
                max-width: 925px !important;
            }
        }
    </style>
    @if (App::isLocale('en'))
    @else
        <style>
            .select2-results__options{
                direction: rtl;
            }
            .select2-results__options--nested .select2-results__option:before {
                content: "";
                display: inline-block;
                position: relative;
                height: 20px;
                width: 20px;
                border: 2px solid #e9e9e9;
                border-radius: 4px;
                background-color: #fff;
                margin-right: unset;
                margin-left: 20px;
                vertical-align: middle;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Create Product')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('product.index')}}">{{__('Products')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Create Product')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row">

                        <!-- jQuery Validation -->
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('Create Product')}}</h4>
                                </div>
                                <div class="card-body">
                                    <form  id="form_data" method="post" action="javascript:void(0)">
                                        @csrf
                                        <input name="product_images" value="[]" type="hidden"/>
                                        <input name="cover_image" value="" type="hidden"/>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                @if(in_array('en',$language))
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="ar-tab" data-toggle="pill" href="#ar" aria-expanded="true">{{__('Arabic')}}</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="ev-tab" data-toggle="pill" href="#en" aria-expanded="false">{{__('English')}}</a>
                                                        </li>
                                                    </ul>
                                                @endif
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active" id="ar" aria-labelledby="ar-tab" aria-expanded="true">
                                                        <label class="form-label" for="basic-default-name">{{__('Name')}}
                                                            <span style="color: red">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="{{__('Name Arabic')}}" />
                                                    </div>
                                                    @if(in_array('en',$language))
                                                        <div class="tab-pane" id="en" role="tabpanel" aria-labelledby="en-tab" aria-expanded="false">
                                                            <label class="form-label" for="basic-default-name">{{__('Name En')}}
                                                                <span style="color: red">*</span>
                                                            </label>
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="{{__('Name English')}}" />
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox ">
                                                            <input type="checkbox" id="is_digital_content" name="is_digital_content" onclick="
                                                                    if(store_accept_digital_content_rules === '0'){
                                                                   $(this).prop('checked', false);
                                                                   $('#DigitalModal').modal('show');
                                                                    }" class="custom-control-input">
                                                            <label class="custom-control-label" for="is_digital_content">
                                                                {{__('The product does not require shipping')}}
                                                                <button type="button" class="btn btn-dark p-0 " style="border-radius: 25px"  data-toggle="tooltip" data-placement="bottom"
                                                                        title="{{__('This option supports service products (digital) only and will allow the customer to complete the order without having to choose one of the shipping companies, in the event that your product requires shipping to the customers address, please activate it.')}}">
                                                                    <i data-feather='alert-circle' ></i>
                                                                </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-switch custom-switch-large text-right">
                                                            <input name="status" checked="" type="checkbox" class="custom-control-input" id="customSwitch4">
                                                            <label class="custom-control-label" for="customSwitch4">
                                                                {{__('Posting to the store')}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="basic-default-name">{{__('Price')}}
                                                            <span style="color: red">*</span>
                                                        </label>
                                                        <div class="input-group ">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    {{App::isLocale('en')?$country_store->country->currency_short:$country_store->country->currency_short_ar}}
                                                                </span>
                                                            </div>
                                                            <input type="number"  class="form-control" name="price" id="price" placeholder="{{__('Price')}}" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="basic-default-name">{{__('Product Cost')}}
                                                                <span style="color: red">*</span>
                                                            </label>
                                                            <input type="number"  class="form-control" id="cost_price" name="cost_price" placeholder="{{__('This field does not appear for the customer')}}" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label" for="basic-default-name">{{__('Product Code SKU')}}
                                                                <button type="button" class="btn btn-dark p-0 " style="border-radius: 25px"  data-toggle="tooltip" data-placement="bottom"
                                                                        title="{{__('Means the stock keeping unit, which is a special code consisting of symbols and numbers that distinguish each product in the store separately, and the code helps you to identify and track the products in the store and search for them easily.')}}">
                                                                    <i data-feather='alert-circle' ></i>
                                                                </button>
                                                            </label>
                                                            <input type="text" class="form-control" id="code" name="code" value="" placeholder="{{__('Product Code')}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label" for="basic-default-name">{{__('Quantity')}}
                                                                <span style="color: red">*</span>
                                                            </label>
                                                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="{{__('Quantity')}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label" for="basic-default-name">{{__('Weight(kg)')}}
                                                                <button type="button" class="btn btn-dark p-0 " style="border-radius: 25px"  data-toggle="tooltip" data-placement="bottom"
                                                                        title="{{__('If the product is in grams: Example: To convert 1 kilogram to the gram unit, 1 kilogram = 1 x 1000 = 1000 grams. And write: 0.001')}}">
                                                                    <i data-feather='alert-circle' ></i>
                                                                </button>
                                                                <span style="color: red">*</span>
                                                            </label>
                                                            <input type="number" class="form-control" id="weight" name="weight" placeholder="{{__('Weight')}}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="input-check">
                                                                <label class="custom-control-label" for="input-check">{{__('Sale')}}</label>
                                                                <div class="input-check">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="select-country1">{{__('Category')}}</label>
                                                    <select required class="select2 categories form-control" id="mySelect2" multiple name="categories[]">
                                                        @foreach($categories as $category)
                                                            <optgroup label="{{App::isLocale('en')?$category->name??$category->name_ar:$category->name_ar??$category->name}}">
                                                                @foreach($category->child as $child)
                                                                    <option value="{{ $child->id}}" >{{App::isLocale('en')?$child->name??$child->name_ar:$child->name_ar??$child->name}}</option>
                                                                @endforeach
                                                            </optgroup>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <a class="btn btn-success  waves-effect waves-float waves-light" data-toggle="modal" data-target="#categories_modal">
                                                    {{__('Add')}}
                                                </a>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12">
                                                @if(in_array('en',$language))
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="ar-tab" data-toggle="pill" href="#description_ar" aria-expanded="true">{{__('Arabic')}}</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="ev-tab" data-toggle="pill" href="#description_en" aria-expanded="false">{{__('English')}}</a>
                                                        </li>
                                                    </ul>
                                                @endif
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane active" id="description_ar" aria-labelledby="description-ar-tab" aria-expanded="true">
                                                        <label class="form-label" for="basic-default-name">
                                                            {{__('Description')}}

                                                        </label>
                                                        <textarea id="description_ar" class="summernote" rows="10" placeholder="{{__('Description')}}" name="description_ar"></textarea>
                                                    </div>
                                                    @if(in_array('en',$language))
                                                        <div class="tab-pane" id="description_en" role="tabpanel" aria-labelledby="description-en-tab" aria-expanded="false">
                                                            <label class="form-label" for="basic-default-name">
                                                                {{__('Description')}}
                                                            </label>
                                                            <textarea id="description_en" class="summernote" rows="10" placeholder="{{__('Description EN')}}" name="description_en"></textarea>                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-12" style="display: none">
                                                    <div class="varients"></div>
                                                    <div class="varients_q"></div>
                                        </div>
                                    </form>

                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">{{__('images')}}
                                            <span style="color: red">*</span>
                                            <button type="button" class="btn btn-dark p-0 " style="border-radius: 25px"  data-toggle="tooltip" data-placement="bottom"
                                                    title="{{__('The preferred size for the image is 500px * 500px, the maximum allowed size is 0.5MB, and the supported formats are png, jpg, jpeg.')}}">
                                                <i data-feather='alert-circle' ></i>
                                            </button>
                                        </label>
                                        <form id="sample-img">
                                            <div class="dropzone" id="myAwesomeDropzone">
                                                <div class="fallback">
                                                    <input name="file[]" id="cropperFileInput" accept="image/*" type="file"
                                                           multiple/></div>
                                                <div class="dz-message needsclick">
                                                    <p class="text-muted font-13">{{__('Drag and drop photos here')}}</p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">{{__('Product Options')}}</label>
                                        <div class="card">
                                            <a class="collapsed col-form-label collappseArrow" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="font-size: 16px;
    color: #6c757d;
    background-color: #fff;
    border: 1px solid #ccd2d8;
    padding: 10px 20px;
    border-radius: 4px;
    box-shadow: 0 0.75rem 6rem rgba(56,65,74,.03);">
                                                 {{__('Product Options')}}
                                                <span style="font-size:12px; ">
                                                {{__('(If there are options such as size, color, etc.) and adding a brand to the product')}}
                                                </span>
                                                <span class="fa fa-angle-down arrowIcon" style="vertical-align:middle; margin-right: 5px;"></span>
                                            </a>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="collapse" id="collapseExample" style="">
                                                        <div class="card card-body" style="padding:10px; padding-right: 0;">
                                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#ProductmoreOptions" class="btn btn-success d-block waves-effect waves-light mt-3">
                                                                {{__('Add Options')}}
                                                            </a>
                                                            <div class="form-group mt-3">
                                                                <label class="col-form-label">{{__('Brand')}} </label>
                                                                <div class="row no-gutters">
                                                                    <div class="col-10">
                                                                        <div class="customSelectWrap">
                                                                            <select name="brand_id" id="brand_id" class="form-control">
                                                                                <option value="0">{{__('Choose the main Category first')}}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-2 ">

                                                                        <button type="button" style="position:relative;right:-10px" class="btn bg-gradient-success waves-effect waves-light mx-2" data-toggle="modal" data-target="#productBrand">
                                                                            {{__('Add')}}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-success " id="save_data"  >
                                                {{__('Save')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /jQuery Validation -->
                    </div>
                </section>
                <!-- /Validation -->

            </div>
        </div>
    </div>
    <div class="modal fade" id="categories_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('Categories')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add_cats" method="post" action="javascript:void(0)">
                <div class="modal-body">
                    <div class="from-group col-md-12">
                        <div class="product_specification_Category">
                                @foreach($categories as $category)
                            <div class="spec-item mb-2" id="item-{{$category->id}}">
                                    <div class="row">
                                        <div class=" col-md-5 ">
                                            <div class="input-group">
                                                <div class="input-group-prepend"></div>
                                                <input type="text" class="form-control" value="{{$category->name_ar}}" name="categories[{{$category->id}}][name_ar]" placeholder=" {{__('Main Category Arabic')}}" >
                                                <input type="hidden" value="{{$category->id}}" name="categories[{{$category->id}}][id]">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend"></div>
                                                <input type="text" class="form-control" value="{{$category->name}}" name="categories[{{$category->id}}][name]" placeholder="{{__('Category English')}}" >
                                                <input type="hidden" value="{{$category->id}}" name="categories[{{$category->id}}][id]">
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-2">
                                            <a href="javascript:void(0)" class="btn btn-danger deleteBtn" data-url="{{route('category.delete',$category->id)}}" data-id="{{$category->id}}"><i class="far fa-trash-alt"></i></a>
                                        </div>
                                        <div class="col-md-2 col-6">
                                            <div class="show_check_box mid" style="margin-right:0 !important;">
                                                <div class="custom-control custom-switch text-right">
                                                    <input name="categories[{{$category->id}}][status]"  {{$category->status ==1?'checked':''}}  type="checkbox" class="switch custom-control-input" data-activate_desc=" {{__('Stop displaying the category in the main')}}  " data-id="{{$category->id}}" data-deactivate_desc=" {{__('Show category in home')}} " data-activate_url="{{route('category.activate',$category->id)}}" data-deactivate_url="{{route('category.deactivate',$category->id)}}" id="customSwitch_show{{$category->id}}">
                                                    <label class="custom-control-label" for="customSwitch_show{{$category->id}}" style="font-size:12px;">{{__('Show Category')}}</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                        <div class="spec-item_sub" data-parent="{{$category->id}}" data-nums="{{$category->child->count()}}">
                                        @foreach($category->child as $child)
                                                <div class="row mt-2 mx-3" id="item-{{$child->id}}">
                                                    <div class=" col-md-4 ">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" name="categories[{{$category->id}}][subs][{{ $loop->index+1 }}][name_ar]" value="{{$child->name_ar}}" class="form-control" required="" placeholder="{{__('Sub Category Arabic')}}" aria-describedby="basic-addon1">
                                                            <input type="hidden" name="categories[{{$category->id}}][subs][{{$loop->index+1  }}][id]" value="{{$child->id}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" name="categories[{{$category->id}}][subs][{{$loop->index+1  }}][name]" value="{{$child->name}}" class="form-control" required="" placeholder=" {{__('Category English')}}" aria-describedby="basic-addon1">
                                                            <input type="hidden" name="categories[{{$category->id}}][subs][{{$loop->index+1  }}][id]" value="{{$child->id}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="javascript:void(0)" class="btn btn-danger deleteBtn" data-url="{{route('category.delete_sub',$child->id)}}" data-id="{{$child->id}}"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </div>

                                        @endforeach
                                        </div>
                                <button class="add_form_field_Category_Sub btn btn-success waves-effect waves-light mt-2">
                                    <span> + </span> {{__('Add Sub Category')}}
                                </button>





                            </div>
                                @endforeach
                        </div>
                        <br>
                        <button class="add_form_field_Category btn btn-success waves-effect waves-light">
                            <span>+ </span>{{__('Add Main Category')}}
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="SaveCats" data-href="{{route('category.store')}}" type="button" class=" btn btn-success waves-effect waves-light">
                        {{__('Save')}}
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ProductmoreOptions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('Add Options')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add_cats" method="post" action="javascript:void(0)">
                <div class="modal-body">
                    <div class="row" id="form_specifications">
                        <p style="color: #096d3e;text-align: center;max-width: 600px;
    margin: 0 auto 2.7rem;">{{__('Note: The additional price of the option is the amount that will be added to the base price of the product when the customer chooses this option. (Example: The price of the product is 1 riyal and the additional price for the option is 10 riyals, the final price will become 11 riyals')}} </p>
                        <div class="from-group col-md-12 specification">
                            <div class="product_specification" data-id="0">
                                <div class="row spec-item titles mb-2">
                                    <div class="{{in_array('en',$language)?'col-md-5':'col-md-10'}}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fas fa-font"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="options[0][content][title_ar]"
                                                   class="form-control title"
                                                   placeholder=" {{__('Option name Ar (color, size)')}}"
                                                   aria-describedby="basic-addon1"/>
                                        </div>
                                    </div>
                                    @if(in_array('en',$language))
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend"> <span class="input-group-text"
                                                                                    id="basic-addon1">
                                                    <i class=" fas fa-font"></i></span></div>
                                            <input type="text" name="options[0][content][title_en]"
                                                   class="form-control title"
                                                   placeholder="{{__('Option name En (color, size)')}}"
                                                   aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                        @endif
                                    <div class="col-md-1 col-6">
                                        <a href="javascript:void(0)" class="deleteFull btn btn-danger deBtn"><i
                                                class="far fa-trash-alt"></i></a>
                                    </div>
                                    <div class="col-md-1 col-6">
                                        <button class="add_form_field btn btn-success waves-effect waves-light">
                                            <span>+ </span></button>
                                    </div>
                                </div>
                                <div class="row spec-item title_values mb-2">
                                    <div class="{{in_array('en',$language)?'col-md-3':'col-md-6'}}">
                                        <div class="input-group">
                                            <div class="input-group-prepend"> <span class="input-group-text"
                                                                                    id="basic-addon1">
                                                    <i class="fas fa-font"></i></span></div>
                                            <input type="text"
                                                   name="options[0][content][content_details][0][content_name_ar]"
                                                   class="form-control values" placeholder=" {{__('Option name Ar')}} "
                                                   aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    @if(in_array('en',$language))
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend"> <span class="input-group-text"
                                                                                    id="basic-addon1">
                                                    <i class=" fas fa-font"></i></span></div>
                                            <input type="text"
                                                   name="options[0][content][content_details][0][content_name_en]"
                                                   class="form-control values_en" placeholder="{{__('Option name En')}} "
                                                   aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                        @endif
                                    <div class="col-md-4 col-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class=" mdi  mdi mdi-credit-card"></i>
                                                </span>
                                            </div>
                                            <input type="number"
                                                   name="options[0][content][content_details][0][additional_price]"
                                                   class="form-control prices" placeholder=" {{__('extra price')}}"
                                                   aria-describedby="basic-addon1"
                                                   onkeypress="isInputNumber(event,this.value)">
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <a href="javascript:void(0)" class="delete btn btn-danger deBtn"><i
                                                class="far fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <br>

                    <button class="add_form_new_Option btn btn-success waves-effect waves-light mob-xs-1">
                        <span>+ </span>
                        {{__('Add a new option')}}
                    </button>
                    <button class="add_form_field_options btn btn-success waves-effect waves-light"><span>+ </span>
                        {{__('Generate options set')}}
                    </button>
                    <div class="form-group col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="form_specifications_q"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button  type="button" class="close_options btn btn-success waves-effect waves-light">{{__('Save')}}
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="productBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('Brands')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="tradMark" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="brands_categories" id="categories_modal" value="">
                        <div class="col-md-12">
                            <div class="form-group">

                                <input required="" value="" id="brand_name_ar" type="text" name="brand_name_ar" class="form-control" placeholder="{{__('Name Brand Ar')}}" aria-required="true">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">

                                <input required="" value="" id="brand_name_en" type="text" name="brand_name_en" class="form-control" placeholder="{{__('Name Brand En')}}" aria-required="true">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image" class="control-label">{{__('Logo')}}
                                    <span data-toggle="tooltip" data-placement="top" title="{{__('The preferred image size is 200px * 100px, the maximum allowed size is 0.5 MB, and the supported format is png, jpg, jpeg')}}" class="mdi mdi-alert-circle" style="color: #000; font-size: 17px; margin-right: 5px;line-height: 1;">

                                    </span>
                                </label>
                                <input type="hidden" value="" name="imageDone" id="imageDone" required="" aria-required="true">
                                <input accept="image/*" id="imageFile" type="file" class="dropify" name="imageFile"/>
                                <div id="imageArea" style="display: none;width: 100%;max-height: 180px">
                                    <img id="imagea" src="https://mapp.sa/assets/images/defaultLogo.png" alt="Picture" style="opacity: 0;">
                                    <button type="button" class="btn btn-success" style="margin: 5px" id="cropBrand"> {{__('Save Image')}}
                                    </button>
                                    <button type="button" class="btn btn-dark" id="undoBrand">{{__('Back')}}</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button id="addTradMark"  type="button" class=" btn btn-success waves-effect waves-light">{{__('Save')}}
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="DigitalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form  id="tradMark" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul style="list-style: decimal;padding: 0 18px;     margin-bottom: 0;">
                                <li style="    padding: 7px 0;"> تُخلي منصة لوز كارت مسؤوليتها في حالة وقوع أية ضرر
                                    او تسريب للمنتج الرقمي و الوصول له بطريقة خارج نطاق برمجيات المنصة .
                                </li>
                                <li style="    padding: 7px 0;"> يتحمل التاجر أي ضرر يتعرض له عميل المتجر نتيجة
                                    إضافة بيانات وهمية او تزويد العميل بأكواد غير فعّالة و لا تتحمل منصة لوز كارت
                                    أي مسؤولية أمام عميل المتجر .
                                </li>
                                <li style="    padding: 7px 0;"> يحق لمنصة لوز كارت تزويد العميل المتضرر من المتجر
                                    بعد التحقق من ذلك ببيانات التاجر المسجلة على المنصة .
                                </li>
                                <li style="    padding: 7px 0;"> تُخلى مسؤولية التاجر بمجرد إرسال المنتج
                                    (الاكواد) للعميل خلال 24 ساعة من وقت الإرسال .
                                </li>
                                <li style="    padding: 7px 0;"> أتعهد وأقسم بالله أنا التاجر أن جميع المعلومات
                                    التي سوف أذكرها في المنتج الرقمي صحيحة و صالحة للاستخدام .
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox" style="margin-bottom: 1rem;position: relative;bottom: -18px;">
                                <input type="checkbox" id="accept_digital_content_rules"
                                       name="accept_digital_content_rules"
                                       checked
                                       class="custom-control-input dgError">
                                <label class="custom-control-label" for="accept_digital_content_rules">
                                    أوافق على الشروط المدرجة أعلاه
                                </label>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="addTradMark"  type="button" class=" btn btn-success waves-effect waves-light">حفظ
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-left modal-success" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel110">{{__('Notice')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{__('Hi, before adding your first product')}}</p>
                    <p>{{__('If you want to display your store and products in both Arabic and English, please go to the settings page to activate the English language option to enable the filling of product information in English.')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="location.href='{{route('additional_setting.index')}}';" class="btn btn-success" >{{__('Enable English')}}</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('Continue in Arabic only')}}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- END: Content-->
@endsection
@section('Scripts')
    <script>
        var UrlForScripts = '{{url('/')}}';

    </script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <!-- END: Page Vendor JS-->
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" ></script>--}}
    <!-- BEGIN: Page JS-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- BEGIN: Page Vendor JS-->
{{--    <script src="https://mapp.sa/cPanel/libs/dropzone/dropzone.min.js"></script>--}}
    <!-- END: Page Vendor JS-->
{{--    <script src="{{asset('')}}app-assets/custom/staff-validation.js"></script>--}}
    <!-- END: Page JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{asset('dropify_cropper/dropzone.min.js')}}"></script>
    <script src="{{asset('dropify_cropper/cropper.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" ></script>
    <script src="{{asset('app-assets/custom/integrateDropzoneCropper.js')}}"></script>

    <!-- END: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>
    {{--    <script src="{{asset('')}}app-assets/js/scripts/components/components-tooltips.js"></script>--}}
    <script>
        var store_accept_digital_content_rules = '1';
    </script>
    <script>
        //set head content to prevent zoom
        $("meta[name='viewport']").attr("content", "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no");
        var _URL = window.URL || window.webkitURL;

        function readURL(input) {
            $('#image-error').empty().hide();
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var file = input.files[0];
                var my_files = input.files;

                if (input.files && input.files) {
                    img = new Image();
                    var objectUrl = _URL.createObjectURL(my_files[0]);
                    img.onload = function () {
                        width = this.width;
                        height = this.height;
                        console.log(width);
                        console.log(height);
                        $('#tradMark input[name="image"]').data('imageWidth', width);
                        $('#tradMark input[name="image"]').data('imageHeight', height);
                        _URL.revokeObjectURL(objectUrl);

                    };
                    img.src = objectUrl;
                }

            }
        }
    </script>
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

            $(document).on("click", "#add_form", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#add_form').html('');
                $('#add_form').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('user.store')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#add_form').empty();
                        $('#add_form').html('{{__('Save')}}');
                        // Toast.fire({
                        //     type: 'success',
                        //     title: response.success
                        // });
                        setTimeout(function () {
                            toastr['success'](
                                response.success,
                                {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 2000);
                        document.getElementById("mainAdd").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#add_form').empty();
                        $('#add_form').html('{{__('Save')}}');
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
    <script>
        $('#input-check').on("change",function ()
        {
            if ($('#input-check').is(":checked")){
                $('.input-check').append('<div class="input-group ">'+
                    '<div class="input-group-prepend">'+
                    '<span class="input-group-text" id="basic-addon1">{{App::isLocale('en')?$country_store->country->currency_short:$country_store->country->currency_short_ar}}</span>'+
                    '</div>'+
                    '<input type="number" class="form-control"  name="sale" id="sale" placeholder="{{__('Enter the new price')}}" >'+
                    '</div>')
            }else {
                $('.input-check').empty()
            }
        });
    </script>
    <script>
        $(".select2").select2({
            closeOnSelect : false,
            placeholder : "{{__('Select Categories')}}",
            allowHtml: true,
            allowClear: true,
            tags: true
        });

    </script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote(
                {
                    placeholder: '{{__('Description')}}',
                    tabsize: 2,
                    height: 300
                }
            );
        });
    </script>
<script>

    $(document).ready(function () {

        $(document).delegate('.make_cover', "change", function (e) {
            $('input[name="cover_image"]').val($(this).data('img'));
        });
    });

</script>
{{--    on change categories append Brands --}}
    <script>
        {{--var cats = [--}}
        {{--    @foreach($categories as $category)--}}
        {{--    {--}}
        {{--        "id": {{$category->id}},--}}
        {{--        "text": "{{$category->name_ar}}",--}}
        {{--        "children": [--}}
        {{--            @foreach($category->child as $sub)--}}
        {{--            {--}}
        {{--                "id": {{$sub->id}},--}}
        {{--                "text": "{{$sub->name_ar}}",--}}
        {{--            },--}}
        {{--            @endforeach--}}

        {{--        ],--}}
        {{--    },--}}
        {{--    @endforeach--}}

        {{--];--}}

        $(document).ready(function () {
            //
            // $(".categories").select2({
            //     closeOnSelect: false
            //     , placeholder: "اختر التصنيفات"
            //     , allowHtml: true
            //     , allowClear: true
            //     , tags: false // создает новые опции на лету
            // });
            /******************/

            // $('.categories').on('select2:open', function (e) {
            //
            //     $('#select2-mySelect2-results').on('click', function (event) {
            //         console.log($("#mySelect2- option:selected").text())
            //         event.stopPropagation();
            //         var data = $(event.target).html();
            //         var selectedOptionGroup = data.toString().trim();
            //
            //         var groupchildren = [];
            //
            //         for (var i = 0; i < cats.length; i++) {
            //
            //
            //             if (selectedOptionGroup.toString() === cats[i].text.toString()) {
            //
            //                 for (var j = 0; j < cats[i].children.length; j++) {
            //
            //                     groupchildren.push(cats[i].children[j].id);
            //
            //                 }
            //
            //             }
            //
            //
            //         }
            //
            //
            //         var options = [];
            //
            //         options = $('#mySelect2').val();
            //
            //         if (options === null || options === '') {
            //
            //             options = [];
            //
            //         }
            //
            //         for (var i = 0; i < groupchildren.length; i++) {
            //
            //             var count = 0;
            //
            //             for (var j = 0; j < options.length; j++) {
            //
            //                 if (options[j].toString() === groupchildren[i].toString()) {
            //
            //                     count++;
            //                     break;
            //
            //                 }
            //
            //             }
            //
            //             if (count === 0) {
            //                 options.push(groupchildren[i].toString());
            //             }
            //         }
            //
            //         $('#mySelect2').val(options);
            //         $('#mySelect2').trigger('change'); // Notify any JS components that the value changed
            //
            //
            //         $('#mySelect2').select2('close');
            //         $('#mySelect2').select2('open');
            //
            //     });
            // });

            /************************/
            $(".categories").on("change", function (e) {
                var categories_element = $(this);
                console.log(categories_element)
                var trade_mark = $('#brand_id');

                var categories = categories_element.val();
                console.log(categories)
                $('input[id="categories_modal"]').val(categories);
                $.ajax({
                    url: "{{route('brand.market_brands')}}",
                    type: 'post',
                    data: {'categories': categories, '_token': $('meta[name="csrf-token"]').attr('content')},
                    success: function (response) {
                        trade_mark.html('');
                        trade_mark.empty();
                        if (response.length > 0) {
                            trade_mark.append('<option value="">{{__('Choose the product brand')}}</option>');
                            $.each(response, function (i, option) {
                                trade_mark.append('<option value="' + option["id"] + '">' + @if(App::isLocale('en') )option["name"]||option["name_ar"]@else option["name_ar"]||option["name"] @endif + '</option>');
                            });
                        } else {
                            trade_mark.append('<option value=""> {{__('Choose the product brand')}}</option>');
                        }
                    },
                    error: function (response) {

                    }
                });
            });
        });
    </script>
{{--    Add new Brand--}}
    <script>
        // $('.dropify').dropify();
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove':  'Remove',
                'error':   'Ooops, something wrong happended.'
            }
        });
        var formDataBrand = new FormData();
        var tradMarkSelect = $('#brand_id');

        var input = document.getElementById('imageFile');
        var image = document.getElementById('imagea');
        var cropperBrand;
        var cropperBrandBoxData = document.querySelector('#imageArea');
        var avatar = $('.dropify-render').find('img');
        $('#imagea').css('opacity', 0);
        input.addEventListener('change', function (e) {
            $('#imagea').css('opacity', 0);
            $('#image-error').remove();
            var files = e.target.files;
            var done = function (url) {
                input.value = '';
                image.src = url;
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


            cropperBrand = new Cropper(image, {
                aspectRatio: 2 / 1,

                ready: function () {

                    cropperBrand.setCropBoxData(cropperBrandBoxData);

                },

            });
            $('.dropify-wrapper').hide();
            $('#imageArea').show();
        });
        $('#cropBrand').click(function (e) {
            $('#imagea').css('opacity', 0);
            var initialAvatarURL;
            var canvas;

            if (cropperBrand) {
                canvas = cropperBrand.getCroppedCanvas({
                    width: 200,
                    height: 200,
                });
                initialAvatarURL = avatar.src;
                $('.dropify-render').empty().append("<img src='" + canvas.toDataURL() + "' />");
                canvas.toBlob(function (blob) {
                    formDataBrand.append('image', blob, 'avatar.jpg');
                    $('#imageDone').val('done');
                    $('.dropify-preview').css('display', 'block');

                });


            }

            cropperBrandBoxData = cropperBrand.getCropBoxData();
            canvasData = cropperBrand.getCanvasData();
            cropperBrand.destroy();
            $('.dropify-wrapper').show();
            $('#imageArea').hide();
        });
        $('#undoBrand').click(function (e) {
            cropperBrandBoxData = cropperBrand.getCropBoxData();
            canvasData = cropperBrand.getCanvasData();
            cropperBrand.destroy();
            //  $('#imagea').src='';
            $('#imagea').css('opacity', 0);
            $('#imageDone').val('');
            $('.dropify-clear').click();
            $('#imageArea').hide();
            $('.dropify-wrapper').show();

        });


        $(document).ready(function () {

            $('#addTradMark').click(function () {
                $('#image-error').remove();
                var categories_brand=$('input[id="categories_modal"]').val()
                myForm = document.getElementById('tradMark');
                var url = "{{route('brand.store')}}";
                var formData = new FormData(this.form);
                if ($('#imageDone').val() == '') {
                    $('#imagea').parent().parent().append('  <div id="image-error" style="display: block;color:red;font-size: 10px" >{{__('The image must be saved')}}</div>');
                    return false;
                } else if (categories_brand == '') {
                    swal.fire({
                        icon: 'error',
                        title: '{{__('Error')}}',
                        text: '{{__('You must choose categories for this brand')}}',
                        buttons: {
                            confirm: {
                                text: "{{__('Confirm !')}}",
                                value: true,
                                visible: true,
                                className: 'btn btn bg-purple waves-effect waves-light',
                                closeModal: true
                            },
                        },
                        customClass: ' slow-animation',
                        timer: 1000
                    });
                    return false;
                } else {
                    if ($('#tradMark').valid()) {
                        formDataBrand.append('categories', categories_brand);
                        formDataBrand.append('name_ar', $('#productBrand input[name=brand_name_ar]').val());
                        formDataBrand.append('name_en', $('#productBrand input[name=brand_name_en]').val());
                        // formDataBrand.append('image', $('#productBrand input[type=file]')[0].files[0]);
                         // formData.append('image', $('#productBrand input[type=file]')[0].files[0]);

                        $.ajax({
                            type: "POST",
                            data: formDataBrand,
                            url: url,
                            cache: false,
                            contentType: false,
                            processData: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            beforeSend: function () {
                                $(".loader-modal").fadeIn(100);
                                $('#productBrand').modal('hide');
                            },
                            success: function (response) {
                                if (response.status == 1) {
                                    tradMarkSelect.html('');
                                    tradMarkSelect.empty();
                                    tradMarkSelect.append('<option value="">اختر ماركة المنتج</option>');

                                    $.each(response.items.brands, function (i, option) {
                                        //console.log(option)
                                        tradMarkSelect.append('<option value="' + option['id'] + '">' + option['name'] + '</option>');

                                    });
                                    //   $('.product_specification_Category').empty();
                                    $(".dropify-clear").trigger("click");
                                    $("#tradMark").trigger("reset");
                                    swal.fire({
                                        icon: 'success',
                                        title: "",
                                        text: response.message,
                                        buttons: {
                                            confirm: {
                                                text: "{{__('Confirm !')}}",
                                                value: true,
                                                visible: true,
                                                className: 'btn btn bg-purple waves-effect waves-light',
                                                closeModal: true
                                            },
                                        },
                                        customClass: ' slow-animation',
                                        timer: 1000
                                    });
                                    $('#productBrand').modal('hide');
                                } else {
                                    swal.fire({
                                        icon: 'error',
                                        title: '{{__('Error')}}',
                                        text: response.message,
                                        buttons: {
                                            confirm: {
                                                text: "{{__('Confirm !')}}",
                                                value: true,
                                                visible: true,
                                                className: 'btn btn bg-purple waves-effect waves-light',
                                                closeModal: true
                                            },
                                        },
                                        customClass: ' slow-animation',
                                        timer: 1500
                                    });
                                }
                            }
                            ,
                        });
                    } else {
                        return false;
                    }
                }

                $(".loader-modal").fadeOut(100);

            });

        });

    </script>
{{--        //add empty input to category--}}
    <script>
        $(document).ready(function () {
            /*********/
            var max_fields = 150;
            var wrapperCat = $(".product_specification_Category");
            var add_buttonCat = $(".add_form_field_Category");
            var wrapperSub = $(".product_specification_Category .spec-item .spec-item_sub");
            var add_buttons = $(".add_form_field_Category_Sub");
            var x = 0;
            var y = 0;
            $(add_buttonCat).click(function (e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    let html = ' <div class="spec-item mb-2" id="item-' + x + '">' +
                        ' <div class="row">';
                    html += ' <div class="col-md-5"> <div class="input-group"> <input name="categories[' + x + '][id]" value="0" type="hidden" > <input name="categories[' + x + '][name_ar]" type="text" class="form-control" placeholder="{{__('Main Category Arabic')}}" aria-describedby="basic-addon1"> </div> </div>';
                    html += ' <div class="col-md-4"> <div class="input-group"> <input name="categories[' + x + '][id]" value="0" type="hidden" > <input name="categories[' + x + '][name]" type="text" class="form-control" placeholder="{{__('Category English')}}" aria-describedby="basic-addon1"> </div> </div>';
                    html +=
                        ' <div class="col-md-1 col-6"> <a href="javascript:void(0)" class="delete btn btn-danger deBtn" ><i class="far fa-trash-alt"></i></a> </div>' +
                        ' <div class="col-md-2 col-6">\n' +
                        '<div class="show_check_box" style="margin-right:0 !important;">\n' +
                        ' <div class="custom-control custom-switch text-right">\n' +
                        '  <input name="categories[' + x + '][status]" value="1" checked="" type="checkbox" class="custom-control-input" id="customSwitch_show">\n' +
                        '  <label class="custom-control-label" for="customSwitch_show" style="font-size: 12px;">{{__('Show Category')}}</label>\n' +
                        '  </div>\n' +
                        '  </div>\n' +
                        '  </div>' +

                        ' </div> ' +
                        '<div class="spec-item_sub" data-parent="' + x + '" data-nums="' + x + '"> </div>' +
                        ' <button class="add_form_field_Category_Sub btn btn-success waves-effect waves-light mt-2"><span>+ </span> اضافة فرعي </button> </div>';

                    $(wrapperCat).append(html); //add input box
                }
            });
            $(wrapperCat).on("click", ".delete", function (e) {
                e.preventDefault();
                $(this).parent().parent().parent().remove();
                x--;
            });
            $(wrapperCat).on("click", '.add_form_field_Category_Sub', function (e) {
                e.preventDefault();
                if (y < max_fields) {
                    let html = '';
                    y++;
                    var index = $(this).parent().find('.spec-item_sub').data('parent');
                    var nums = $(this).parent().find('.spec-item_sub').data('nums');
                    // console.log(index);
                    html += ' <div class="row mt-2 mx-3" id="item-' + index + '_' + nums + 1 + '"> ';
                    html += '<div class="col-md-4"> <div class="input-group"> <div class="input-group-prepend">  </div> <input type="hidden" name="categories[' + index + '][subs][' + (nums + 1) + '][id]" value="0" /><input type="text" name="categories[' + index + '][subs][' + (nums + 1) + '][name_ar]" class="form-control" required placeholder="{{__('Sub Category Arabic')}}" aria-describedby="basic-addon1"> </div> </div> ';
                    html += '<div class="col-md-4"> <div class="input-group"> <div class="input-group-prepend">  </div> <input type="hidden" name="categories[' + index + '][subs][' + (nums + 1) + '][id]" value="0" /><input type="text" name="categories[' + index + '][subs][' + (nums + 1) + '][name]" class="form-control" required placeholder="{{__('Category English')}}" aria-describedby="basic-addon1"> </div> </div> ';
                    html += '<div class="col-md-1"> <a href="javascript:void(0)" class="delete btn btn-danger deBtn"><i class="far fa-trash-alt"></i></a> </div> ' +
                        '</div>';
                    $(this).parent().find('.spec-item_sub').append(html); //add input box
                    $(this).parent().find('.spec-item_sub').data('nums', nums + 1);
                }
            });
            $(wrapperSub).on("click", ".delete", function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
                y--;
            });
            var categorySelect = $('#mySelect2');

            categorySelect.select2({

                placeholder: '{{__('Select Categories')}}',
                closeOnSelect: false,

                language: {
                    noResults: function () {
                        return '{{__('Not Found Categories')}}';
                    },
                }
            });
            $("#jsSelect3").select2({

                placeholder: '{{__('Select Brand')}}',
                language: {
                    noResults: function () {
                        return '{{__('Not Found Brand')}}';
                    },
                }
            });
        });
        //delete input from modal category
        $(document).on('click', '.deleteBtn', function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var id = $(this).data('id');
            var url = $(this).data('url');
            var categorySelect = $('#mySelect2');

            swal.fire({
                title: "{{__('Confirm the deletion!')}}",
                icon: 'warning',
                cancelButtonColor: '#c54b42',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                // cancelTextColor: '#FFFFFF',
                cancelButtonText: '{{__('Cancel')}}',
                confirmButtonText: "{{__('Confirm !')}}",
                showCancelButton: true,
                buttons: {
                    confirm: {
                        text: "{{__('Confirm !')}}",
                        value: true,
                        visible: true,
                        className: 'btn btn-success',
                        closeModal: true,

                    }, cancel: {
                        text: "{{__('Cancel')}}",
                        value: null,
                        visible: true,
                        className: 'btn btn-danger',
                        closeModal: true,
                    },
                }
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: "delete",
                        url: url,
                        success: function (data) {
                            if (data.status === 0) {
                                swal.fire({
                                    icon: 'warning',
                                    title: data.message,
                                    timer: 4000,
                                    buttons: {
                                        confirm: {
                                            text: "{{__('Confirm !')}}",
                                            value: true,
                                            visible: true,
                                            className: 'btn btn bg-gradient-success waves-effect waves-light',

                                            closeModal: true
                                        },
                                    },

                                });
                            } else {
                                swal.fire({
                                    icon: 'success',
                                    title: data.message,
                                    timer: 2000,
                                    buttons: {
                                        confirm: {
                                            text: "{{__('Confirm !')}}",
                                            value: true,
                                            visible: true,
                                            className: 'btn btn bg-gradient-success waves-effect waves-light',

                                            closeModal: true
                                        },
                                    },
                                });
                                var item = $('#item-' + id);
                                $('#item-' + id).fadeOut(500);
                                $('#item-' + id).remove();
                                categorySelect.empty();
                                var main_category =$('.main_category')
                                $.each(data.categories, function (i, option) {
                                    categorySelect.append('<optgroup class="main_category" label="'+ option['name'] +'">'+
                                        $.each(option.sub_categories, function (x, optionSub) {
                                            main_category.append('<option class="child_"'+ optionSub['id'] + '" value="' + optionSub['id'] + '">' + optionSub['name'] + '</option>');

                                        })+

                                        '</optgroup>');

                                });
                            }
                        },
                        error: function (data) {
                            swal.fire({
                                icon: 'warning',
                                title: '{{__('Sorry, there was an error during the deletion process')}}',
                                timer: 4000,
                                buttons: {
                                    confirm: {
                                        text: "{{__('Confirm !')}}",
                                        value: true,
                                        visible: true,
                                        className: 'btn btn bg-gradient-success waves-effect waves-light',

                                        closeModal: true
                                    },
                                },
                            });
                        }
                    });
                }
                else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })

        //e.preventDefault();

        });
        function myData(categories) {
            // console.log(products)
            $.each(categories, function(i,obj){
                    $(".product_specification_Category").append(
                        '<div class="spec-item mb-2" id="item-'+obj.id+'">'+
                            '<div class="row">'+
                                '<div class=" col-md-5 ">'+
                                    '<div class="input-group">'+
                                        '<div class="input-group-prepend"></div>'+
                                        '<input type="text" class="form-control" value="'+obj.name_ar+'" name="categories['+obj.id+'][name_ar]" placeholder="{{__('Main Category Arabic')}}" >'+
                                         ' <input type="hidden" value="'+obj.id+'" name="categories['+obj.id+'][id]">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4">'+
                                    '<div class="input-group">'+
                                        '<div class="input-group-prepend"></div>'+
                                        '<input type="text" class="form-control" value="'+obj.name+'" name="categories['+obj.id+'][name]" placeholder="{{__('Category English')}}" >'+
                                            '<input type="hidden" value="'+obj.id+'" name="categories['+obj.id+'][id]">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-1 col-2">'+
                                    '<a href="javascript:void(0)" class="btn btn-danger deleteBtn" data-url="{{route("category.delete",'/')}}'+obj.id+'" data-id="'+obj.id+'"><i class="far fa-trash-alt"></i></a>'+
                                '</div>'+
                                '<div class="col-md-2 col-6">'+
                                    '<div class="show_check_box mid" style="margin-right:0 !important;">'+
                                        '<div class="custom-control custom-switch text-right">'+
                                            '<input name="categories['+obj.id+'][status]"   checked="" type="checkbox" class="switch custom-control-input" data-activate_desc=" {{__('Stop displaying the category in the main')}}  " data-id="'+obj.id+'" data-deactivate_desc=" {{__('Show category in home')}} " data-activate_url="{{route('category.activate','')}}'+obj.id+'" data-deactivate_url="{{route('category.deactivate','')}}'+obj.id+'" " id="customSwitch_show'+obj.id+'">'+
                                                '<label class="custom-control-label" for="customSwitch_show'+obj.id+'" style="font-size:12px;">{{__('Show Category')}}</label>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<div class="spec-item_sub" data-parent="'+obj.id+'" id="sub-'+i+'" data-nums="'+obj.sub_categories.length+'">'+

                            '</div>'+
                            '<button class="add_form_field_Category_Sub btn btn-success waves-effect waves-light mt-2">'+
                               ' <span> + </span> {{__('Add Sub Category')}}'+
                            '</button>'+

                        '</div>'
            );
                    $.each(obj.sub_categories, function(x){
                        // console.log(item.medicine)
                        $('#sub-'+i).append(

                            '<div class="row mt-2 mx-3" id="item-'+this.id+'">'+
                            '<div class=" col-md-4 ">'+
                                '<div class="input-group">'+
                                    '<div class="input-group-prepend"></div>'+
                                    '<input type="text" name="categories['+obj.id+'][subs]['+x+'][name_ar]" value="'+this.name_ar+'" class="form-control" required="" placeholder="{{__('Category English')}}" aria-describedby="basic-addon1">'+
                                        '<input type="hidden" name="categories['+obj.id+'][subs]['+x+'][id]" value="'+obj.id+'">'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-md-4">'+
                                '<div class="input-group">'+
                                    '<div class="input-group-prepend"></div>'+
                                        '<input type="text" name="categories['+obj.id+'][subs]['+x+'][name]" value="'+this.name+'" class="form-control" required="" placeholder="{{__('Category English')}}" aria-describedby="basic-addon1">'+
                                        '<input type="hidden" name="categories['+obj.id+'][subs]['+x+'][id]" value="'+obj.id+'">'+
                               ' </div>'+
                            '</div>'+
                            '<div class="col-md-1">'+
                               ' <a href="javascript:void(0)" class="btn btn-danger deleteBtn" data-url="{{route('category.delete_sub','')}}'+this.id+'" data-id="'+this.id+'"><i class="far fa-trash-alt"></i></a>'+
                            '</div>'+
                            '</div>'


                    );

                    });

            })
        }
        //Save Categories from Model by ajax
        $('#SaveCats').click(function () {
            // $('#add_cats').validate();
            var categorySelect = $('#mySelect2');
            var postData = $('#add_cats').serialize();
            console.log(postData)
            $.ajax({
                type: "POST",
                data: postData,
                url: $(this).data('href'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },
                success: function (response) {
                    var categories=response.items.categories;
                    if (response.status == 1) {
                        categorySelect.empty();

                        $.each(response.items.categories, function (i, option) {
                            // console.log(option)
                            @if(App::isLocale('en') )
                              var name=  option["name"]||option["name_ar"];
                            @else
                            var name= option["name_ar"]||option["name"]
                            @endif
                            if (option.sub_categories.length > 0) {
                                categorySelect.append('<optgroup label="'+name+'"></optgroup>');
                            } else {
                                categorySelect.append('<optgroup label="'+name+'" > </optgroup>');
                            }
                           var option= $.each(option.sub_categories, function (i, option) {
                                categorySelect.append('<option value="' + option['id'] + '">' + @if(App::isLocale('en') )option["name"]||option["name_ar"]@else option["name_ar"]||option["name"] @endif + '</option>');
                            });
                        });
                        cats = [];
                        $.each(response.items.categories, function (i, option) {
                            cats[i] = {'id': option['id'], 'text': @if(App::isLocale('en') )option["name"]||option["name_ar"]@else option["name_ar"]||option["name"] @endif};
                            if (option.sub_categories.length > 0) {
                                cats[i]['children'] = [];
                                $.each(option.sub_categories, function (j, subOption) {
                                    cats[i]['children'][j] = {'id': subOption['id'], 'text': @if(App::isLocale('en') )subOption["name"]||subOption["name_ar"]@else option["name_ar"]||subOption["name"] @endif };
                                });
                            } else {
                                cats[i]['children'] = [];
                            }
                        });

                        swal.fire({
                            icon: 'success',
                            title: "",
                            text: response.message,
                            buttons: {
                                confirm: {
                                    text: "{{__('Confirm !')}}",
                                    value: true,
                                    visible: true,
                                    className: 'btn btn bg-gradient-success waves-effect waves-light',
                                    closeModal: true
                                },
                            },
                            customClass: ' slow-animation',
                            timer: 1000
                        });
                        $('#categories_modal').modal('hide');
                        $('.product_specification_Category').empty();
                        myData(categories);
                    } else {
                        console.log(response);
                        swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            buttons: {
                                confirm: {
                                    text: "{{__('Confirm !')}}",
                                    value: true,
                                    visible: true,
                                    className: 'btn btn bg-gradient-success waves-effect waves-light',
                                    closeModal: true
                                },
                            },
                        });
                    }
                }
                ,
            });


        });
        // change status category from modal category
        $(document).ready(function (e) {

            $(document).delegate('.switch', 'click', function (e) {
                var element = $(this);
                e.preventDefault();
                if ($(this).is(":checked")) {
                    var url = element.data('activate_url');
                    var desc = element.data('deactivate_desc');
                    var sts = false;
                } else {
                    var url = element.data('deactivate_url');
                    var desc = element.data('activate_desc');
                    var sts = true;
                }
                console.log(url);
                console.log(desc);
                swal.fire({
                    icon: "warning",
                    title: desc,
                    cancelButtonColor: '#c54b42',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: true,
                    // cancelTextColor: '#FFFFFF',
                    cancelButtonText: '{{__('Cancel')}}',
                    confirmButtonText: "{{__('Confirm !')}}",
                    showCancelButton: true,
                    buttons: {

                        confirm: {
                            text: "{{__('Confirm !')}}",
                            value: true,
                            visible: true,
                            className: 'btn btn-success',
                            closeModal: true
                        }, cancel: {
                            text: "{{__('Cancel')}}",
                            value: null,
                            visible: true,
                            className: 'btn btn-danger',
                            closeModal: true,
                        },
                    }

                }).then(function (e) {
                    if (e.value === true) {
                                // e.preventDefault();
                                var id = element.data('id');
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    method: "POST",
                                    url: url,
                                    data: {id: id},
                                    success: function (data) {
                                        console.log('sened');
                                        console.log(data);
                                        if (data.status === 0) {
                                            swal.fire({
                                                icon: 'error',
                                                title: data.message,
                                                timer: 4000,
                                                buttons: {
                                                    confirm: {
                                                        text: "{{__('Confirm !')}}",
                                                        value: true,
                                                        visible: true,
                                                        className: 'btn btn bg-gradient-success waves-effect waves-light',

                                                        closeModal: true
                                                    },
                                                },
                                            });
                                        } else {
                                            swal.fire({
                                                icon: 'success',
                                                title: data.message,
                                                timer: 2000,
                                                buttons: {
                                                    confirm: {
                                                        text: "{{__('Confirm !')}}",
                                                        value: true,
                                                        visible: true,
                                                        className: 'btn btn bg-gradient-success waves-effect waves-light',

                                                        closeModal: true
                                                    },
                                                },
                                            }).then((result) => {
                                                if (result) {
                                                    console.log(sts + 'sts');
                                                    if (sts) {
                                                        element.prop("checked", false);

                                                    } else {
                                                        element.prop("checked", true);

                                                    }
                                                }
                                            });
                                        }
                                    },
                                    error: function (data) {
                                        swal.fire({
                                            icon: 'error',
                                            title: '{{__('Sorry, there was an error during the deletion process')}}',
                                            timer: 4000,
                                            buttons: {
                                                confirm: {
                                                    text: "{{__('Confirm !')}}",
                                                    value: true,
                                                    visible: true,
                                                    className: 'btn btn bg-gradient-success waves-effect waves-light',

                                                    closeModal: true
                                                },
                                            },
                                        });
                                    }
                                });

                            }
                    else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
            })
                    });


                //e.preventDefault();

            });


    </script>
{{--    Validation is Number--}}
    <script>
        function isInputNumber(evt, value) {

            var ch = String.fromCharCode(evt.which);

            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
            }

        }
    </script>

{{--    Additional Options for Product--}}
    <script>
        /// doneBy: Ohood Mosabih
        function multiply(array1, array2) {
            var multy_arr = [];
            for (var x = 0; x < array1.length; x++) {
                for (var j = 0; j < array2.length; j++) {
                    multy_arr.push(array1[x] + '-' + array2[j]);
                }
            }
            return multy_arr;
        }

        /// doneBy: Ohood Mosabih
        function additionPrices(array1, array2) {
            var multy_arr = [];
            for (var x = 0; x < array1.length; x++) {
                for (var j = 0; j < array2.length; j++) {
                    multy_arr.push(parseFloat(array1[x]) + parseFloat(array2[j]));
                }
            }
            return multy_arr;
        }

        $(document).ready(function () {

            var uploaded_files = [];
            ///////////////////////////////
            var max_fields = 150;
            var wrapper = $(".product_specification");
            var wrapper2 = $("#ProductmoreOptions .modal-body > .row");
            var add_button = $(".add_form_field");

            var add_buttonF = $('.add_form_new_Option');
            var addBrandBtn = $('.add_form_field_brand');
            var wrapperBrand = $(".product_specification_brand");
            var x = 1;


            function
            saveSpecification() {
                cleanSpecification();
                var checkResult = checkSpecification();
                console.log(checkResult);
                if (checkResult !== false) {
                    var values = checkResult.values;
                    @if(in_array('en',$language))
                    var values_en = checkResult.values_en;
                    @endif
                    var quantities = checkResult.quantities;
                    var prices_values = checkResult.prices;
                    console.log(checkResult.prices);
                    var titles = checkResult.titles;
                    var options = [];
                    @if(in_array('en',$language))
                    var options_en = [];
                    @endif
                    var options_prices = [];
                    var options_quantities = [];
                    var control = 1;
                    var i = 0;
                    var x = 0;
                    var loops = values.length;
                    //get first element to multiply it with each arrays
                    var first_arr = values[0];
                    if (loops > 1) {
                        for (i; i < values.length; i++) {
                            if (i === 0) {
                                result = values[i];
                                @if(in_array('en',$language))
                                result_en = values_en[i];
                                @endif
                                result_prices = prices_values[i];
                            }
                            console.log('loop' + loops + ':i=' + i);
                            var cc = loops - 2;//values[i].length+1;
                            for (x; x <= cc; x++) {
                                if (i + control < loops) {
                                    console.log('control=' + control);
                                    result = multiply(result, values[i + control]);
                                    @if(in_array('en',$language))
                                    result_en = multiply(result_en, values_en[i + control]);
                                    @endif
                                    result_prices = additionPrices(result_prices, prices_values[i + control]);
                                    control++;
                                }
                            }
                        }
                        options = result;
                        @if(in_array('en',$language))
                        options_en = result_en;
                        @endif
                        options_prices = result_prices;
                    } else {
                        for (i; i < values.length; i++) {
                            for (x; x < values[i].length; x++) {
                                options.push(values[i][x]);
                                @if(in_array('en',$language))
                                options_en.push(values_en[i][x]);
                                @endif
                                options_prices.push(prices_values[i][x]);
                            }
                        }
                    }
                    ///console.log(options);
                    var html = '<p style="color: red;max-width: 600px;"' +
                        '    "> {{__('Note: The total quantity for each option must be identical to the sum of the total quantity added to the product previously')}}</p>';
                    var title_inputs = '';
                    var values_inputs = '';
                    for (var j = 0; j < options.length; j++) {
                        html = html + '<div class="variant_row row mb-2">' +
                            '                                    <div class="col-md-6">' +
                            '                                        <div class="input-group">' +
                            '                                            <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1">' +
                            '                                                    <i class="fas fa-font"></i></span> </div>' +
                            '                                            <input name="variants[' + j + '][name_ar]"  type="hidden" value="' + options[j] + '" class="form-control "aria-describedby="basic-addon1">' +
                            @if(in_array('en',$language))
                            '                                            <input name="variants[' + j + '][name_en]"  type="hidden" value="' + options_en[j] + '" class="form-control "aria-describedby="basic-addon1">' +
                            @endif
                            '                                            <input name="variants[' + j + '][name_ar]" disabled type="text" value="' + options[j] + '" class="form-control "aria-describedby="basic-addon1">' +
                            @if(in_array('en',$language))
                            '                                            <input name="variants[' + j + '][name_en]" disabled type="text" value="' + options_en[j] + '" class="form-control ml-2"aria-describedby="basic-addon1">' +
                            @endif
                            '                                        </div>' +
                            '                                    </div>' +
                            '                                    <div class="col-md-2">' +
                            '                                        <div class="input-group">' +
                            '                                            <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1">' +
                            '                                                    <i class="fas fa-credit-card"></i></span> </div>' +
                            '                                            <input type="text" disabled data-class="variants_' + j + '_price"  value="' + options_prices[j] + '" class="form-control variants_' + j + '_price" placeholder="{{__('Price')}}" aria-describedby="basic-addon1">' +
                            '                                        </div>' +
                            '                                    </div>' +
                            '                                    <div class="col-md-3">' +
                            '                                        <div class="input-group">' +
                            '                                            <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1">' +
                            '                                                    <i class="fas fa-cart-arrow-down"></i></span> </div>' +
                            '                                            <input type="hidden" name="variants[' + j + '][quantity]" >' +
                            '                                            <input type="text" name="variants[' + j + '][quantity]" data-class="variants_' + j + '_quantity"   onkeypress="isInputNumber(event,this.value)" class="variants_input form-control variants_' + j + '_quantity" placeholder="{{__('Quantity')}}" aria-describedby="basic-addon1">' +
                            '                                        </div>' +
                            '                                    </div>' +
                            '                                    <div class="col-md-1">' +
                            '                                        <a href="javascript:void(0)" id="' + j + '" class="deleteOption btn btn-danger deleteOption_' + j + '"><i class="far fa-trash-alt"></i></a>' +
                            '                                    </div>' +
                            '                                </div>';

                    }
                    for (var k = 0; k < titles.length; k++) {

                    }
                    $('.form_specifications_q').empty().append(title_inputs).append(values_inputs).append(html);

                }

            }

            function saveAfterDeleteSpecification() {
                cleanSpecification();
                var checkResult = checkSpecification2();
                console.log(checkResult);
                if (checkResult !== false) {
                    var values = checkResult.values;
                    @if(in_array('en',$language))
                    var values_en = checkResult.values_en;
                    @endif
                    var quantities = checkResult.quantities;
                    var prices = checkResult.prices;
                    var titles = checkResult.titles;
                    var options = [];
                    @if(in_array('en',$language))
                    var options_en = [];
                    @endif
                    var options_prices = [];
                    var options_quantities = [];
                    var control = 1;
                    var i = 0;
                    var x = 0;
                    var loops = values.length;
                    //get first element to multiply it with each arrays
                    var first_arr = values[0];
                    if (loops > 1) {
                        for (i; i < values.length; i++) {
                            if (i === 0) {
                                result = values[i];
                            }

                            var cc = loops - 2;
                            for (x; x <= cc; x++) {
                                if (i + control < loops) {
                                    result = multiply(result, values[i + control]);
                                    @if(in_array('en',$language))
                                    result_en = multiply(result_en, values_en[i + control]);
                                    @endif
                                    control++;
                                }
                            }
                        }
                        options = result;
                        options_en = result_en;
                    } else {
                        for (i; i < values.length; i++) {
                            for (x; x < values[i].length; x++) {
                                options.push(values[i][x]);
                                @if(in_array('en',$language))
                                options_en.push(values_en[i][x]);
                                @endif
                            }
                        }
                    }
                    var html = '<p style="color: red;text-align: center;max-width: 600px;' +
                        '    margin: 0 auto 2.7rem;"> {{__('All quantities of options must be filled in proportion to the total quantity of the product')}}</p>';
                    var title_inputs = '';
                    var values_inputs = '';
                    for (var j = 0; j < options.length; j++) {
                        html = html + '<div class="variant_row row mb-2">' +
                            '                                    <div class="col-md-8">' +
                            '                                        <div class="input-group">' +
                            '                                            <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1">' +
                            '                                                    <i class="fas fa-font"></i></span> </div>' +
                            '                                            <input name="variants[' + j + '][name_ar]"  type="hidden" value="' + options[j] + '" class="form-control "aria-describedby="basic-addon1">' +
                            '                                            <input name="variants[' + j + '][name_en]"  type="hidden" value="' + options_en[j] + '" class="form-control "aria-describedby="basic-addon1">' +
                            '                                            <input name="variants[' + j + '][name_ar]" disabled type="text" value="' + options[j] + '" class="form-control "aria-describedby="basic-addon1">' +
                            '                                            <input name="variants[' + j + '][name_en]" disabled type="text" value="' + options_en[j] + '" class="form-control "aria-describedby="basic-addon1">' +
                            '                                        </div>' +
                            '                                    </div>' +
                            '                                    <div class="col-md-3">' +
                            '                                        <div class="input-group">' +
                            '                                            <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1">' +
                            '                                                    <i class="fas fa-cart-arrow-down"></i></span> </div>' +
                            '                                            <input type="hidden" name="variants[' + j + '][quantity]" >' +
                            '                                            <input type="number" name="variants[' + j + '][quantity]" data-class="variants_' + j + '_quantity"  class="variants_input form-control variants_' + j + '{{__('Quantity')}}" placeholder="" aria-describedby="basic-addon1">' +
                            '                                        </div>' +
                            '                                    </div>' +
                            '                                    <div class="col-md-1">' +
                            '                                        <a href="javascript:void(0)" id="' + j + '" class="deleteOption btn btn-danger deleteOption_' + j + '"><i class="far fa-trash-alt"></i></a>' +
                            '                                    </div>' +
                            '                                </div>';
                    }
                    for (var k = 0; k < titles.length; k++) {

                    }
                    $('.form_specifications_q').empty().append(title_inputs).append(values_inputs).append(html);

                }

            }

            function checkSpecification() {
                var specification = $('.specification');
                var rows = specification.length;
                var values = [];
                @if(in_array('en',$language))
                var values_en = [];
                @endif
                var prices_values = [];
                var titles = [];
                var goAhead = false;
                var preventMessage = '{{__('Make sure all entries are correct')}}';
                if (rows > 0) {
                    goAhead = true;
                    var item, item_title, sub_item;
                    var result = 1;
                    @if(in_array('en',$language))
                    var result_en = 1;
                    @endif
                    var result_prices = 1;
                    var have_title = true;
                    var have_items_title = true;
                    var title_items = [];
                    @if(in_array('en',$language))
                    var title_items_en = [];
                    @endif
                    var prices_items = [];
                    specification.each(function (i) {
                        //var have_title=false;
                        title_items = [];
                        @if(in_array('en',$language))
                        title_items_en = [];
                        @endif
                        prices_items = [];
                        item = $(this);
                        item.find('.titles').each(function (i) {
                            item_title = $(this);
                            var title = item_title.find('.title').val();
                            if (title !== '') {
                                have_title = have_title && true;
                                titles.push(title);
                            } else {
                                have_title = have_title && false;
                            }
                        });
                        item.find('.title_values').each(function (i) {
                            sub_item = $(this);
                            var item_values = sub_item.find('.values').val();
                            @if(in_array('en',$language))
                            var item_values_en = sub_item.find('.values_en').val();
                            @endif
                            var item_prices = sub_item.find('.prices').val();
                            var item_quantities = sub_item.find('.quantities').val();

                            if ($.trim(item_values) !== ''@if(in_array('en',$language)) && $.trim(item_values_en) !== '' @endif+''   ) {
                                have_items_title = have_items_title && true;
                                title_items.push(item_values);
                                @if(in_array('en',$language))
                                title_items_en.push(item_values_en);
                                @endif
                                prices_items.push(item_prices === '' ? 0 : item_prices);
                            } else {
                                have_items_title = have_items_title && false;
                            }
                        });
                        console.log(titles.length + 'sss' + values.length);
                        console.log(title_items.length + 'sss' + prices_items.length);
                        console.log('have_title' + have_title);
                        console.log('have_items_title' + have_items_title);
                        if (have_title === true) {
                            if ((have_items_title === false)) {

                                cleanSpecification();

                                goAhead = false;
                                preventMessage = '{{__('You must add values for all options first')}}';
                            } else {
                                if (titles.length === 0 || title_items.length === 0) {

                                    cleanSpecification();
                                    goAhead = false;
                                    preventMessage = '{{__('You must add values for all options first')}}';
                                } else {
                                    title_items.length ? values.push(title_items) : '';
                                    @if(in_array('en',$language))
                                    title_items_en.length ? values_en.push(title_items_en) : '';
                                    @endif
                                    title_items.length ? prices_values.push(prices_items) : '';
                                    result = result * title_items.length;
                                }
                            }
                        } else {
                            cleanSpecification();
                            goAhead = false;
                            preventMessage = '{{__('All options must be added first')}}';
                        }

                    });
                    // console.log(values);

                    if (goAhead === false) {
                        swal.fire({
                            icon: 'error',
                            text: preventMessage,
                            buttons: {
                                confirm: {
                                    text: "{{__('Confirm !')}}",
                                    value: true,
                                    visible: true,
                                    className: 'btn btn bg-gradient-success waves-effect waves-light',
                                    closeModal: true
                                },
                            },
                            timer: 1000
                        });
                        cleanSpecification();
                        return false;
                    } else {
                        console.log(values);
                        return {'titles': titles, 'values': values,@if(in_array('en',$language)) 'values_en': values_en,@endif 'prices': prices_values};
                    }
                } else {
                    swal.fire({
                        icon: 'error',
                        text: '{{__('All options must be added first')}}',
                        buttons: {
                            confirm: {
                                text: "{{__('Confirm !')}}",
                                value: true,
                                visible: true,
                                className: 'btn btn bg-gradient-success waves-effect waves-light',
                                closeModal: true
                            },
                        },
                        customClass: ' slow-animation',
                        timer: 1000
                    });
                    cleanSpecification();
                    return false;
                }

            }

            function checkSpecification2() {
                var specification = $('.specification');
                var rows = specification.length;
                var values = [];
                @if(in_array('en',$language))
                var values_en = [];
                @endif
                var prices = [];
                var titles = [];
                var goAhead = false;
                var preventMessage = '{{__('Make sure all entries are correct')}}';
                if (rows > 0) {
                    goAhead = true;
                    var item, item_title, sub_item;
                    var result = 1;
                    @if(in_array('en',$language))
                    var result_en = 1;
                    @endif
                    var have_title = true;
                    var have_items_title = true;
                    var title_items = [];
                    @if(in_array('en',$language))
                    var title_items_en = [];
                    @endif
                    var prices_items = [];
                    specification.each(function (i) {
                        //var have_title=false;
                        title_items = [];
                        prices_items = [];
                        item = $(this);
                        item.find('.titles').each(function (i) {
                            item_title = $(this);
                            var title = item_title.find('.title').val();
                            if (title !== '') {
                                have_title = have_title && true;
                                titles.push(title);
                            }
                        });
                        item.find('.title_values').each(function (i) {
                            sub_item = $(this);
                            var item_values = sub_item.find('.values').val();
                            @if(in_array('en',$language))
                            var item_values_en = sub_item.find('.values_en').val();
                            @endif
                            var item_prices = sub_item.find('.prices').val();
                            var item_quantities = sub_item.find('.quantities').val();
                            if (item_values !== '') {
                                have_items_title = have_items_title && true;
                                title_items.push(item_values);
                                @if(in_array('en',$language))
                                title_items_en.push(item_values_en);
                                @endif
                                prices_items.push(item_prices === '' ? 0 : item_prices);
                            }
                        });
                        console.log(titles.length + 'sss' + values.length);
                        console.log(title_items.length + 'sss' + prices_items.length);
                        console.log('have_title' + have_title);
                        console.log('have_items_title' + have_items_title);
                        if (have_title === true) {
                            if ((have_items_title === false)) {
                                cleanSpecification();
                                goAhead = false;
                                preventMessage = '{{__('You must add values for all options first')}}';
                            } else {
                                if (titles.length === 0 || title_items.length === 0) {

                                    cleanSpecification();
                                    goAhead = false;
                                    preventMessage = '{{__('You must add values for all options first')}}';
                                } else {
                                    title_items.length ? values.push(title_items) : '';
                                    @if(in_array('en',$language))
                                    title_items_en.length ? values_en.push(title_items_en) : '';
                                    @endif
                                    title_items.length ? prices.push(prices_items) : '';
                                    result = result * title_items.length;
                                }
                            }
                        } else {
                            cleanSpecification();
                            goAhead = false;
                            preventMessage = '{{__('All options must be added first')}}';
                        }

                    });

                    if (goAhead === false) {

                        cleanSpecification();
                        return false;
                    } else {
                        console.log(values);
                        return {'titles': titles, 'values': values, @if(in_array('en',$language))'values_en': values_en, @endif 'prices': prices};
                    }
                } else {

                    cleanSpecification();
                    return false;
                }

            }

            function cleanSpecification() {
                $('.form_specifications_q').empty();
                $('.varients_q').empty();
                $('.varients').empty();
            }

            $('.values_en').keydown(function (e) {

                console.log(e.which);
                if (e.which === 109 || e.which === 189)
                    e.preventDefault();
            });


            $('.close_options').click(function (e) {

                $('.varients').empty();
                $('.varients_q').empty();
                $(document).find("#form_specifications").clone().appendTo(".varients");
                $(document).find(".form_specifications_q").clone().appendTo(".varients_q");
                var specification = $('.specification');
                var variants = $('#ProductmoreOptions .variant_row');

                var variants_rows = variants.length;
                var rows = specification.length;
                if (rows == 0) {
                    swal.fire({
                        icon: 'warning',
                        title: '{{__('Whatch out')}}',
                        text: '{{__('You have not added any additional features to the product')}}',
                        buttons: {
                            confirm: {
                                text: "{{__('Confirm !')}}",
                                value: true,
                                visible: true,
                                className: 'btn btn bg-gradient-success waves-effect waves-light',
                                closeModal: true
                            },
                        },
                        timer: 2000,
                        showClass: {
                            popup: '',
                        },
                        hideClass: {
                            popup: '',
                        },
                    });
                } else if (variants_rows == 0) {
                    swal.fire({
                        icon: 'warning',
                        title: '{{__('Whatch out')}}',
                        text: '{{__('You did not generate and quantify the set of options')}}',
                        showConfirmButton: true,
                        buttons: {
                            confirm: {
                                text: "{{__('Confirm !')}}",
                                value: true,
                                visible: true,
                                className: 'btn btn bg-gradient-success waves-effect waves-light',
                                closeModal: true
                            },
                        },

                        timer: 2000,
                        showClass: {
                            popup: '',
                        },
                        hideClass: {
                            popup: '',
                        },
                    });
                } else {
                    var total_quantity = 0;
                    variants.each(function (i) {
                        let quantity_input = $(this).find('.variants_input');
                        let qnt = quantity_input.val() || 0;
                        total_quantity = parseFloat(total_quantity) + parseFloat(qnt);
                    });
                    $('#quantity').val(total_quantity);
                    $('#quantity').prop('readonly', true).css('background-color', '#efeeee').css('cursor', 'not-allowed');
                    // $('#quantity').attr('disabled', 'disabled').css('background-color', '#efeeee').css('cursor', 'not-allowed');

                    if (total_quantity == 0) {
                        swal.fire({
                            //   toast: true,
                            icon: 'error',
                            text: '{{__('Enter all quantities first')}}',
                            buttons: {
                                confirm: {
                                    text: "{{__('Confirm !')}}",
                                    value: true,
                                    visible: true,
                                    className: 'btn btn bg-gradient-success waves-effect waves-light',
                                    closeModal: true
                                },
                            },
                            //customClass: ' slow-animation',
                            timer: 2000,
                            showClass: {
                                popup: '',
                            },
                            hideClass: {
                                popup: '',
                            },
                        });
                    } else {
                        $('#ProductmoreOptions').modal('hide');
                        swal.fire({
                            icon: 'success',
                            title: '{{__('Options have been successfully approved')}}',
                            text: '{{__('You can now complete the process of entering data, adding and saving a product')}}',
                            buttons: {
                                confirm: {
                                    text: "{{__('Confirm !')}}",
                                    value: true,
                                    visible: true,
                                    className: 'btn btn bg-gradient-success waves-effect waves-light',
                                    closeModal: true
                                },
                            },
                            customClass: ' slow-animation',
                            timer: 1000
                        });
                    }

                }


            });
            $('.add_form_field_options').click(function (e) {
                e.preventDefault();
                saveSpecification();
                $('.varients').empty();
                $('.varients_q').empty();
                $(document).find("#form_specifications").clone().appendTo(".varients");
                $(document).find(".form_specifications_q").clone().appendTo(".varients_q");

            });
            $(wrapper2).on("click", '.add_form_field', function (e) {
                e.preventDefault();
                var product_specification = $(this).parent().parent().parent();//.find('.product_specification');
                var index = product_specification.data('id');
                var content_index = product_specification.find('.title_values').length;
                if (x < max_fields) {
                    x++;
                    product_specification.append('<div class="row spec-item title_values mb-2">' +
                        '                                    <div class="{{in_array('en',$language)?'col-md-3':'col-md-6'}}">' +
                        '                                        <div class="input-group">' +
                        '                                            <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1">' +
                        '                                                    <i class="fas fa-font"></i></span> </div>' +
                        '                                            <input type="text" name="options[' + index + '][content][content_details][' + content_index + '][content_name_ar]" class="form-control values" placeholder="{{__('Option name Ar')}}" aria-describedby="basic-addon1">' +
                        '                                        </div>' +
                        '                                    </div>' +
                        @if(in_array('en',$language))
                        '                                     <div class="col-md-3">' +
                        '                                        <div class="input-group">' +
                        '                                            <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1">' +
                        '                                                    <i class="fas fa-font"></i></span> </div>' +
                        '                                            <input type="text" name="options[' + index + '][content][content_details][' + content_index + '][content_name_en]" class="form-control values_en" placeholder="{{__('Option name En')}}" aria-describedby="basic-addon1">' +
                        '                                        </div>' +
                        '                                    </div>' +
                        @endif
                        '                                     <div class="col-md-4 col-6">' +
                        '                                        <div class="input-group">' +
                        '                                            <div class="input-group-prepend">' +
                        '                                                <span class="input-group-text" id="basic-addon1">' +
                        '                                                    <i class=" mdi  mdi mdi-credit-card"></i>' +
                        '                                                </span>' +
                        '                                            </div>' +
                        '                                            <input type="number" name="options[' + index + '][content][content_details][' + content_index + '][additional_price]" class="form-control prices" placeholder=" {{__('extra price')}}" onkeypress="isInputNumber(event,this.value)" aria-describedby="basic-addon1">' +
                        '                                        </div>' +
                        '                                    </div>' +
                        '                                    <div class="col-md-1">' +
                        '                                        <a href="javascript:void(0)" class="delete btn btn-danger deBtn" ><i class="far fa-trash-alt"></i></a>' +
                        '                                    </div>' +
                        '                                </div>'); //add input box
                }
            });
            $(add_buttonF).click(function (e) {
                var index = $("#form_specifications").find('.product_specification').length + 1;
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper2).append('<hr> <div class="from-group col-md-12 specification mt-2"> <div class="product_specification" data-id="' + index + '"> <div class="row spec-item titles mb-2"> <div class="{{in_array('en',$language)?'col-md-5':'col-md-10'}}"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"> <i class="fas fa-font"></i></span> </div> <input type="text" class="form-control title" name="options[' + index + '][content][title_ar]" placeholder="{{__('Option name Ar (color, size)')}}" aria-describedby="basic-addon1"> </div> </div>@if(in_array('en',$language))<div class="col-md-5"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"> <i class="fas fa-font"></i></span> </div> <input type="text" class="form-control title" name="options[' + index + '][content][title_en]" placeholder=" {{__('Option name En (color, size)')}}" aria-describedby="basic-addon1"> </div> </div>@endif <div class="col-md-1 col-6"> <a href="javascript:void(0)" class="deleteFull btn btn-danger deBtn" ><i class="far fa-trash-alt"></i></a> </div><div class="col-md-1 col-6"><button class="add_form_field btn btn-success waves-effect waves-light"><span>+ </span> </button></div> </div> <div class="row spec-item title_values mb-2"> <div class="{{in_array('en',$language)?'col-md-3':'col-md-6'}}"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"> <i class="fas fa-font"></i></span> </div> <input type="text" class="form-control values" name="options[' + index + '][content][content_details][0][content_name_ar]" placeholder=" {{__('Option name Ar')}} " aria-describedby="basic-addon1"> </div> </div>@if(in_array('en',$language)) <div class="col-md-3"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"> <i class="fas fa-font"></i></span> </div> <input type="text" class="form-control values_en" name="options[' + index + '][content][content_details][0][content_name_en]" placeholder="{{__('Option name En')}}" aria-describedby="basic-addon1"> </div> </div> @endif  <div class="col-md-4"> <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"> <i class="fas fa-font"></i></span> </div> <input type="text" class="form-control <!--values--> prices"  name="options[' + index + '][content][content_details][0][additional_price]" placeholder=" {{__('extra price')}} " onkeypress="isInputNumber(event,this.value)" aria-describedby="basic-addon1"> </div> </div> <div class="col-md-1"> <a href="javascript:void(0)" class="delete btn btn-danger deBtn" ><i class="far fa-trash-alt"></i></a> </div> </div> </div>  </div>'); //add input box
                }
            });
            $(document).on("click", ".deleteFull", function (e) {
                e.preventDefault();
                $(this).parent().parent().parent().parent().remove();
                saveAfterDeleteSpecification();

                x--;
                var specification = $('.specification');
                var rows = specification.length;
                if (rows == 0) {
                    $('#quantity').removeAttr('disabled').css('background-color', 'unset').css('cursor', 'unset');
                }
            });
            $(wrapper2).on("click", ".delete", function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
                saveAfterDeleteSpecification();

                x--;
            });
            $(document).on("click", ".deleteOption", function (e) {
                e.preventDefault();
                var id = $(this).attr('id');
                $('.deleteOption_' + id).parent().parent().remove();
                x--;

            });
            $(addBrandBtn).click(function (e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapperBrand).append('<div class="spec-brand-item mt-4"> <div class="row"> <div class="col-md-6"> <div class="form-group"> <select class="form-control"> <option>{{__('Brands')}}</option> </select> </div> </div> <div class="col-md-6"> <div class="form-group"> <input type="text" class="form-control" placeholder="{{__('Name Brand')}}"> </div> </div> <div class="col-md-12"> <div class="mt-3">  <div class="userImage Custom"> <div class="upload-btn-wrapper"> <p>{{__('Drag and drop photos here')}}</p> <button class="btn"><i class="fa fa-upload"></i></button> <input accept="image/*" type="file" name="myfile"> </div> </div></div> </div> </div> </div>'); //add input box
                }
            });
            $(document).on("change", '.variants_input', function () {
                var variants_input_class = $(this).data('class');
                var variants_input_value = $(this).val();
                //console.log(variants_input_value);
                $(document).find('.' + variants_input_class).val(variants_input_value);
            });
        });
    </script>

    <script>

        function previewThumbailFromUrl(opts) {
            var dropzoneInst = Dropzone.forElement("#" + opts.selector);

            let mockFile = {
                name: "Loaded File",
                dataURL: opts.imageURL,
                server_name: opts.fileName,
                is_main: opts.isMain
            };
            dropzoneInst.files.push(mockFile);
            dropzoneInst.emit("addedfile", mockFile);
            dropzoneInst.createThumbnailFromUrl(mockFile,
                dropzoneInst.options.thumbnailWidth,
                dropzoneInst.options.thumbnailHeight,
                dropzoneInst.options.thumbnailMethod, true, function (thumbnail) {
                    dropzoneInst.emit('thumbnail', mockFile, thumbnail);
                });
            dropzoneInst.emit('complete', mockFile);
        }


    </script>
    {{--     Store Product--}}
    <script>
        $(document).ready(function (e) {

            $('#save_data').click(function () {
                var specification = $('.specification');
                var rows = specification.length;
                if (rows == 0) {
                    $('#quantity').removeAttr('disabled').css('background-color', 'unset').css('cursor', 'unset');
                }

                var loader = $('#loader-modal');
                loader.fadeIn(200);
                $('.help-block').remove();
                var btn = $(this);
                $('#images-error').hide();
                //   $('#form_data').valid();
                if (!$('#form_data').valid()) {
                    //validator.focusInvalid();
                    loader.fadeOut(200);

                    $('html, body').animate({
                        scrollTop: ($('.error').offset().top - 300)
                    }, 2000);
                    return false;
                }
                $('#images-error').remove();
                if ($('input[name="product_images"]').val() == '[]') {
                    $('#sample-img').parent().append('<div style="margin: 0px 0px 10px; color:red;" id="images-error" class="abs_error help-block has-error">{{__('You must upload at least one image of the product')}}</div>');

                    loader.fadeOut(200);
                    return false;
                }
                //$('#form_data').submit();
                var action_url = "{{ route('product.store')}}";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.post(action_url, $('#form_data').serialize() + "&brand_id=" + $('#brand_id').val() )
                    .done(function (response) {
                        if (response.status === 1) {
                            swal.fire({
                                title: response.message,
                                text: response.message,
                                icon: 'success',
                                buttons: {
                                    confirm: {
                                        text: "{{__('Confirm !')}}",
                                        value: true,
                                        visible: true,
                                        className: 'btn btn bg-purple waves-effect waves-light',
                                        closeModal: true
                                    },
                                },
                                customClass: ' slow-animation',
                                timer: 1000
                            }).then((result) => {
                                if (result) {
                                    setTimeout(function () {
                                        window.location.href = "{{route('product.index')}}";
                                    }, 2000); //will call the function after 2 secs.
                                }
                            });
                            setTimeout(function () {
                                window.location.href = "{{route('product.index')}}";
                            }, 2000); //will call the function after 2 secs.
                        } else {
                            loader.fadeOut(200);
                            swal.fire({
                                title: response.message,
                                text: response.message,
                                icon: 'error',
                                buttons: {
                                    confirm: {
                                        text: "{{__('Confirm !')}}",
                                        value: true,
                                        visible: true,
                                        className: 'btn btn bg-purple waves-effect waves-light',
                                        closeModal: true
                                    },
                                },
                            });

                        }
                    })
                    .fail(function (jqXhr, json, errorThrown) {// this are default for ajax errors
                        var errors = jqXhr.responseJSON;
                        loader.fadeOut(200);
                        console.log(errors);
                        var errorsHtml = '';
                        $.each(errors['errors'], function (index, value) {
                            $('#' + index).parent().parent().append('<span class="help-block has-error"> <strong>' + value + '</strong></span>');
                        });

                    })
                    .always(function () {
                        // alert( "finished" );
                    });


            });
            $('.values').keydown(function (e) {

                console.log(e.which);
                if (e.which === 109 || e.which === 189)
                    e.preventDefault();
            });
        });

    </script>
{{--    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js">--}}
{{--    </script>--}}
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function() {--}}
{{--            $.cookie('pop', '1');--}}
{{--            if ($.cookie('pop') == null) {--}}
{{--                $('#success').modal('show');--}}
{{--                $.cookie('pop', '1');--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
    <script type="text/javascript">

        $(document).ready(function() {
            @if(!$product && ! in_array('en',$language))
            $('#success').modal('show');
            @endif
            {{--if (localStorage.getItem('first_product') !== 'true' ) {--}}
            {{--    $('#success').modal('show');--}}
            {{--    localStorage.setItem('first_product','true');--}}

            {{--}--}}
        });
    </script>
    <script>
        $(document).ready(function() {
            // $form = $('#form_data');
            $(function () {
                'use strict';

                var addProduct = $('#form_data');

                // jQuery Validation
                // --------------------------------------------------------------------
                if (addProduct.length) {
                    addProduct.validate({
                        ignore: [],
                        /*
                        * ? To enable validation onkeyup
                        onkeyup: function (element) {
                          $(element).valid();
                        },*/
                        /*
                        * ? To enable validation on focusout
                        onfocusout: function (element) {
                          $(element).valid();
                        }, */
                        rules: {
                            'name_ar': {
                                required: true,
                            },
                            'price': {
                                required: true,
                            },
                            'cost_price': {
                                required: true,
                            },
                            // 'code': {
                            //     required: true,
                            // },
                            'quantity': {
                                required: true,
                            },
                            'weight': {
                                required: true,
                            },
                            'sale': {
                                required: true,
                                sale:true
                            },
                            'mySelect2': {
                                required: true,
                            },
                            'description_ar': {
                                required: true,
                            },
                            @if(in_array('en',$language))
                            'name': {
                                required: true,
                            },
                            'description': {
                                required: true,
                            },
                            @endif

                        }
                    });
                }
            });
            $.validator.addMethod("sale", function(value, element) {
                var max = parseInt(document.getElementById('price').value);
                var min = parseInt(document.getElementById('sale').value);
                console.log('g')
                if(min > max){
                    console.log('f')
                    return false;

                }else{
                    console.log('t')
                    return true;
                }
            }, "{{__('The discount value must be less than the original price')}}");

            $("#mySelect2").select2().change(function() {
                $(this).valid();
            });
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
