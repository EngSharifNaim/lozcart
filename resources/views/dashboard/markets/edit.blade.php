@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
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
                            <h2 class="content-header-title float-left mb-0">{{__('Edit Market')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('market.index',$status)}}">{{__('Market')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Edit Market')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="app-user-edit">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                        <i data-feather="user"></i><span class="d-none d-sm-block">Account</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                        <i data-feather="info"></i><span class="d-none d-sm-block">Information</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                        <i data-feather="share-2"></i><span class="d-none d-sm-block">Social</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Account Tab starts -->
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- users edit media object start -->
                                    <div class="media mb-2">
                                        <img src="../../../app-assets/images/avatars/7.png" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90" />
                                        <div class="media-body mt-50">
                                            <h4>
                                                @if (App::isLocale('en'))
                                                    {{$user->market_name}}
                                                @else
                                                    {{$user->market_name_ar}}
                                                @endif
                                            </h4>
                                            <div class="col-12 d-flex mt-1 px-0">
                                                <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                    <span class="d-none d-sm-block">Change</span>
                                                    <input class="form-control" type="file" id="change-picture" hidden accept="image/png, image/jpeg, image/jpg" />
                                                    <span class="d-block d-sm-none">
                                                        <i class="mr-0" data-feather="edit"></i>
                                                    </span>
                                                </label>
                                                <button class="btn btn-outline-secondary d-none d-sm-block">Remove</button>
                                                <button class="btn btn-outline-secondary d-block d-sm-none">
                                                    <i class="mr-0" data-feather="trash-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- users edit media object ends -->
                                    <!-- users edit account form start -->
                                    <form class="form-validate" id="mainAdd" method="post" action="javascript:void(0)">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="username">{{__('Owner Name')}}</label>
                                                    <input type="text" class="form-control" placeholder="Owner Name" value="{{$user->owner_name ??''}}" name="owner_name" id="owner_name" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">{{__('Market Name')}}</label>
                                                    <input type="text" class="form-control" placeholder="Name" value="{{$user->market_name ??''}}" name="market_name" id="market_name" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">{{__('Market Name Ar')}}</label>
                                                    <input type="text" class="form-control" placeholder="Name Ar" value="{{$user->market_name_ar ??''}}" name="market_name_ar" id="market_name" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">{{__('E-mail')}}</label>
                                                    <input type="email" class="form-control" placeholder="Email" value="{{$user->email ??''}}" name="email" id="email" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status">{{__('Status')}}</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option @if($user->status==1) selected @endif>{{__('Active')}}</option>
                                                        <option @if($user->status==0) selected @endif>{{__('Suspended')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1" id="add_form_1" >{{__('Save Changes')}}</button>
                                                <button type="reset" class="btn btn-outline-secondary">{{__('Reset')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit account form ends -->
                                </div>
                                <!-- Account Tab ends -->

                                <!-- Information Tab starts -->
                                <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                    <!-- users edit Info form start -->
                                    <form class="form-validate">
                                        <div class="row mt-1">
                                            <div class="col-12">
                                                <h4 class="mb-1">
                                                    <i data-feather="user" class="font-medium-4 mr-25"></i>
                                                    <span class="align-middle">Personal Information</span>
                                                </h4>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="mobile">{{__('Mobile')}}</label>
                                                    <input id="mobile" type="text" class="form-control" value="{{$user->mobile}}" name="mobile" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="website">{{__('Website')}}</label>
                                                    <input id="website" type="text" class="form-control" placeholder="Website here..." value="https://rowboat.com/{{$user->link}}" name="link" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="languages">{{__('Languages')}}</label>
                                                    <select class="select2 form-control" multiple="multiple" name="lang[]" id="default-select-multi">
                                                        @if ($user->additional_setting)
                                                            <option value="en" {{ in_array('en', $user->additional_setting->lang)? "selected" : "" }}>{{__('English')}}</option>
                                                            <option value="ar"{{ in_array('ar', $user->additional_setting->lang)? "selected" : "" }}>{{__('Arabic')}}</option>
                                                        @else
                                                            <option value="en" >{{__('English')}}</option>
                                                            <option value="ar">{{__('Arabic')}}</option>
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block mb-1">{{__('Has Trade')}}</label>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="male" name="have_trade" value="1" class="custom-control-input"{{$user->have_trade==1 ? 'checked' : ''}}  />
                                                        <label class="custom-control-label" for="male">{{__('Yes')}}</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="female" name="have_trade" value="0" class="custom-control-input" {{$user->have_trade==0 ? 'checked' : ''}} />
                                                        <label class="custom-control-label" for="female">{{__('No')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="registration_source">{{__('Registration Source')}}</label>
                                                    <input id="registration_source" type="text" class="form-control" value="{{$user->registration_source}}" name="registration_source" disabled />
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1" id="add_form_2" >{{__('Save Changes')}}</button>
                                                <button type="reset" class="btn btn-outline-secondary">{{__('Reset')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit Info form ends -->
                                </div>
                                <!-- Information Tab ends -->

                                <!-- Social Tab starts -->
                                <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                    <!-- users edit social form start -->
                                    <form class="form-validate">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 form-group">
                                                <label for="twitter-input">{{__('Twitter')}}</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3">
                                                            <i data-feather="twitter" class="font-medium-2"></i>
                                                        </span>
                                                    </div>
                                                    <input id="twitter-input" type="text" name="twitter" class="form-control" value="{{$user_social->twitter ??__('')}}" placeholder="https://www.twitter.com/" aria-describedby="basic-addon3" />
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
                                                    <input id="facebook-input" type="text" name="facebook" class="form-control" value="{{$user_social->facebook ??__('')}}" placeholder="https://www.facebook.com/" aria-describedby="basic-addon4" />
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
                                                    <input id="instagram-input" type="text" name="instagram" class="form-control" value="{{$user_social->instagram ??__('')}}" placeholder="https://www.instagram.com/" aria-describedby="basic-addon5" />
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
                                                    <input id="instagram-input" type="text" name="snapchat" class="form-control" value="{{$user_social->snapchat ??__('')}}" placeholder="https://www.instagram.com/" aria-describedby="basic-addon5" />
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
                                                    <input id="whatsapp-input" type="text" name="whatsapp" class="form-control" value="{{$user_social->whatsapp ??__('')}}" placeholder="https://www.whatsapp.com/" aria-describedby="basic-addon5" />
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
                                                    <input id="google-play-input" type="text" name="googlePlay" class="form-control" value="{{$user_social->googlePlay ??__('')}}" placeholder="https://www.googlePlay.com/" aria-describedby="basic-addon5" />
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
                                                    <input id="app-store-input" type="text" name="appStore" class="form-control" value="{{$user_social->appStore ??__('')}}" placeholder="https://www.appStore.com/" aria-describedby="basic-addon5" />
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
                                                    <input id="maroof-input" type="text" name="m3roof" class="form-control" value="{{$user_social->m3roof ??__('')}}" placeholder="https://www.appStore.com/" aria-describedby="basic-addon5" />
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
                                                    <input id="phone-input" type="text" name="phone" class="form-control" value="{{$user_social->phone ??__('')}}" placeholder="+0592555309" aria-describedby="basic-addon5" />
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1" id="add_form_3" >{{__('Save Changes')}}</button>
                                                <button type="reset" class="btn btn-outline-secondary">{{__('Reset')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit social form ends -->
                                </div>
                                <!-- Social Tab ends -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('Scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>
    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-user-edit.js"></script>
    <script src="../../../app-assets/js/scripts/components/components-navs.js"></script>
    <!-- END: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/custom/market-validation.js"></script>
    <!-- END: Page JS-->


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

            $(document).on("click", "#add_form_1", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#add_form_1').html('');
                $('#add_form_1').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('market.update',$user->id)}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#add_form_1').empty();
                        $('#add_form_1').html('{{__('Save Changes')}}');
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
                        // document.getElementById("mainAdd").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#add_form_1').empty();
                        $('#add_form_1').html('{{__('Save')}}');
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

            $(document).on("click", "#add_form_2", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#add_form_2').html('');
                $('#add_form_2').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('market.update',$user->id)}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#add_form_2').empty();
                        $('#add_form_2').html('{{__('Save Changes')}}');
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
                        // document.getElementById("mainAdd").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#add_form_2').empty();
                        $('#add_form_2').html('{{__('Save')}}');
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

            $(document).on("click", "#add_form_3", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#add_form_3').html('');
                $('#add_form_3').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('market.update_social',$user->id)}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#add_form_3').empty();
                        $('#add_form_3').html('{{__('Save Changes')}}');
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
                        // document.getElementById("mainAdd").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#add_form_3').empty();
                        $('#add_form_3').html('{{__('Save')}}');
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
@endsection
