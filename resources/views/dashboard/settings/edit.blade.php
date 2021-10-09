@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-pickadate.css">

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
                            <h2 class="content-header-title float-left mb-0">{{__('Edit Brand')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('brand.index')}}">{{__('Brand')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Edit Brand')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- brand edit start -->
                <section class="app-brand-edit">
                    <div class="card">
                        <div class="card-body">
                            <form  id="editBrandForm" method="POST" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="data" class="control-label">
                                                {{__('Promo Code')}}
                                                <span style="color: red">*</span>
                                            </label>
                                            <input required="" value="{{$coupon->code}}" id="code" type="text" name="code" class="form-control" placeholder="{{__('Promo Code')}}" aria-required="true">
                                        </div>
                                        <div class="form-group col-md-12">
                                            {{--                                                    <label for="select-country1">{{__('Category')}}</label>--}}
                                            <select class="select2  form-control" name="type" id="type">
                                                @foreach($type_coupons as $item)
                                                    <option value="{{ $item->id}}" {{$coupon->type == $item->id?'selected':''}} >
                                                        @if(App::isLocale('en'))
                                                            {{$item->name}}
                                                        @else
                                                            {{$item->name_ar}}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">

                                            <input required="" value="{{$coupon->discount}}" id="discount" type="number" name="discount" class="form-control" placeholder="{{__('Discount')}}" aria-required="true">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="fp-default">{{__('Sale End Date')}}<span style="color: red">*</span></label>
                                            <input type="text" value="{{$coupon->end_at}}" name="end_at" id="fp-default" class="form-control flatpickr-basic" placeholder="{{__('Sale End Date')}}" />
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="select-country1">{{__('Are discounted products excluded?')}}</label>
                                            <select class="select2  form-control" name="is_except_offers" id="is_except_offers">

                                                <option value="1"{{$coupon->is_except_offers==1?'selected':''}} >{{__('Yes')}}</option>
                                                <option value="0" {{$coupon->is_except_offers==0?'selected':''}}>{{__('No')}}</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">

                                            <input required="" value="{{$coupon->min_order_grand_total}}" id="min_order_grand_total" type="number" name="min_order_grand_total" class="form-control" placeholder="{{__('Minimum amount of purchases')}}" aria-required="true">
                                        </div>
                                        <div class="form-group col-md-12">

                                            <input required="" value="{{$coupon->uses_times_for_user}}" id="uses_times_for_user" type="number" name="uses_times_for_user" class="form-control" placeholder="{{__('The number of uses per customer')}}" aria-required="true">
                                        </div>
                                        <div class="form-group col-md-12">

                                            <input required="" value="{{$coupon->countuse}}" id="countuse" type="number" name="countuse" class="form-control" placeholder="{{__('The number of times the total use')}}" aria-required="true">
                                        </div>
                                    </div>


                                    <button id="edit_coupon"  type="button" class=" btn btn-primary waves-effect waves-light">
                                        {{__('Save')}}
                                    </button>

                            </form>
                        </div>
                    </div>
                </section>
                <!-- brand edit ends -->

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
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="../../../app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
    <script src="../../../app-assets/js/scripts/components/components-navs.js"></script>
    <!-- END: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->

    <script>
        $("#type").select2({
            closeOnSelect : true,
            placeholder : "{{__('Select Discount Type')}}",
            allowHtml: true,
            // allowClear: true,
            // tags: true
        });
        $("#is_except_offers").select2({
            closeOnSelect : true,
            placeholder : "{{__('Select')}}",
            allowHtml: true,
            // allowClear: true,
            // tags: true
        });

    </script>
    {{--edit data Client--}}
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

            $(document).on("click", "#edit_coupon", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#edit_coupon').html('');
                $('#edit_coupon').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('coupon.update',$coupon->id)}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#edit_coupon').empty();
                        $('#edit_coupon').html('{{__('Save')}}');
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
                        }, 200);
                        // document.getElementById("editData").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#edit_coupon').empty();
                        $('#edit_coupon').html('{{__('Save')}}');
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
                    }
                });
            });

        });

    </script>
@endsection
