@extends('dashboard.layouts.app')
@section('style')

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
        <!-- END: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dripicons/2.0.0/webfont.css"  />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
        @if(App::isLocale('en'))
    @else

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
                            <h2 class="content-header-title float-left mb-0">{{__('financial reports')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{route('payment.index')}}">{{__('Payments Methods')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('financial reports')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->

                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" id="Payments-tab" data-toggle="pill" href="#Payments" aria-expanded="true">{{__('Payments')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Payouts-tab" data-toggle="pill" href="#Payouts" aria-expanded="false">{{__('Payouts')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Payouts-tab" data-toggle="pill" href="#Disputes" aria-expanded="false">{{__('Disputes')}}</a>
                            </li>
                        </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="Payments" aria-labelledby="Payments-tab" aria-expanded="true">
                            <div class="card">
                                <div class="card-header" style="padding-top: 5px;padding-bottom: 5px;">

                                </div>
                                <div class="card-body">


                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>{{__('AMOUNT')}}</th>
                                                    <th>{{__('TYPE')}}</th>
                                                    <th>{{__('STATUS')}}</th>
                                                    <th>{{__('CHARGE')}}</th>
                                                    <th>{{__('REFUNDS')}}</th>
                                                    <th>{{__('FEES')}}</th>
                                                    <th>{{__('ORDER')}}</th>
                                                    <th>{{__('CARD')}}</th>
                                                    <th>{{__('DATE')}}</th>


                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($paymentIntents as $paymentIntent)
                                                    <?php $sum = 0; ?>
{{--                                                    @foreach($paymentIntent->refunds as $item)--}}
{{--                                                {{$item->sum('amount')}}--}}
{{--                                                    @endforeach--}}
                                                    <tr >
                                                        <td style="text-transform: uppercase">{{$paymentIntent->amount/100}} {{$paymentIntent->currency}}</td>
                                                        <td>
{{--                                                            @foreach($paymentIntent->refunds as $item)--}}
{{--                                                                {{$item->amount}}--}}
{{--                                                                @if ($paymentIntent->refunded ==true)--}}
{{--                                                                    {{__('Refunded')}}--}}
{{--                                                                @endif--}}
{{--                                                                @if ($paymentIntent->refunded ==false && $item->amount < $paymentIntent->amount)--}}
{{--                                                                    {{__('Partial refund')}}--}}
{{--                                                                @endif--}}
{{--                                                            @endforeach--}}
                                                            @if ($paymentIntent->refunded==true)
                                                                @if ($paymentIntent->amount ==$paymentIntent->amount_refunded)
                                                                    {{__('Refunded')}}
                                                                @endif
                                                                @if ($paymentIntent->amount > $paymentIntent->amount_refunded  && $paymentIntent->amount_refunded !=0)
                                                                    {{__('Partial refund')}}
                                                                @endif
                                                            @endif
                                                            @if ($paymentIntent->disputed==true)
                                                                <span class="badge badge-light-danger">{{__('Disputed')}}</span>


                                                            @endif
                                                        </td>
{{--                                                        <td >{{$paymentIntent->refunded ==true ?'Refunded' :$paymentIntent->refunded ==false &&$paymentIntent->refunds['data']->count() > 0?'Partial refund':''}} </td>--}}
                                                        <td>{{$paymentIntent->status}}</td>
                                                        <td style="text-transform: uppercase">{{$paymentIntent->amount/100}}  {{$paymentIntent->currency}}</td>
                                                        <td style="text-transform: uppercase">{{$paymentIntent->amount_refunded/100}}  {{$paymentIntent->currency}}</td>
                                                        <td style="text-transform: uppercase">{{$paymentIntent->application_fee_amount/100}}  {{$paymentIntent->currency}}</td>
                                                        <td>
                                                            @if ($paymentIntent->metadata->order_id)

                                                            <a href="{{route('order.showOrder',$paymentIntent->metadata->order_id)}}">#{{$paymentIntent->metadata->order_id }}</a>
                                                            @endif

                                                        </td>
                                                        <td style="text-transform: uppercase">{{$paymentIntent->payment_method_details->card->brand }}</td>
                                                        <td>{{\Carbon\Carbon::createFromTimestamp($paymentIntent->created)->format('m/d/Y')}}</td>

                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>

                                </div>
                            </div>
                        </div>

                            <div class="tab-pane" id="Payouts" role="tabpanel" aria-labelledby="Payouts-tab" aria-expanded="false">
                                <div class="card">
                                    <div class="card-header" style="padding-top: 5px;padding-bottom: 5px;">

                                    </div>
                                    <div class="card-body">


                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>{{__('AMOUNT')}}</th>
                                                    <th>{{__('CURRENCY')}}</th>
                                                    <th>{{__('STATUS')}}</th>
                                                    <th>{{__('DESCRIPTION')}}</th>
                                                    <th>{{__('CUSTOMER')}}</th>
                                                    <th>{{__('DATE')}}</th>


                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($payouts as $payout)
                                                    <tr>
                                                        <td>{{$payout->amount/100}}</td>
                                                        <td style="text-transform: uppercase">{{$payout->currency}}</td>
                                                        <td>
                                                            @if($payout->amount<0)
                                                                <span class="badge badge-light-secondary">{{__('Withdrawn')}}</span>
                                                            @else
                                                                <span class="badge badge-light-{{$payout->status?'success':''}}">
                                                                     {{$payout->status}}
                                                                </span>

                                                            @endif
                                                        </td>
{{--                                                        <td>{{$payout->description}}</td>--}}
                                                        <td>{{$payout->statement_descriptor}}</td>
                                                        <td>{{$payout->destination->bank_name .' ****'.$payout->destination->last4 }}</td>
                                                        <td>{{\Carbon\Carbon::createFromTimestamp($payout->created)->format('m/d/Y')}}</td>

                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="Disputes" role="tabpanel" aria-labelledby="Payouts-tab" aria-expanded="false">
                                <div class="card">
                                    <div class="card-header" style="padding-top: 5px;padding-bottom: 5px;">

                                    </div>
                                    <div class="card-body">


                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>{{__('AMOUNT')}}</th>
                                                    <th>{{__('CURRENCY')}}</th>
                                                    <th>{{__('STATUS')}}</th>
                                                    <th>{{__('DESCRIPTION')}}</th>
                                                    <th>{{__('Reason')}}</th>
                                                    <th>{{__('DATE')}}</th>
                                                    <th>{{__('Actions')}}</th>


                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($disputes as $dispute)
                                                    <tr>
                                                        <td>{{$dispute->amount/100}}</td>
                                                        <td style="text-transform: uppercase">{{$dispute->currency}}</td>
                                                        <td>
                                                            @if ($dispute->status=='lost')
                                                                <span class="badge badge-light-danger">{{$dispute->status}}</span>
                                                            @endif
                                                            @if ($dispute->status=='warning_closed')
                                                                <span class="badge badge-light-dark">{{$dispute->status}}</span>
                                                            @endif
                                                            @if ($dispute->status=='needs_response')
                                                                <span class="badge badge-light-warning">{{$dispute->status}}</span>
                                                            @endif
                                                            @if ($dispute->status=='under_review')
                                                                <span class="badge badge-light-secondary">{{$dispute->status}}</span>
                                                            @endif
                                                            @if ($dispute->status=='warning_needs_response')
                                                                <span class="badge badge-light-primary">{{$dispute->status}}</span>
                                                            @endif
                                                            @if ($dispute->status=='won')
                                                                <span class="badge badge-light-success">{{$dispute->status}}</span>
                                                            @endif
                                                        </td>
{{--                                                        <td>{{$payout->description}}</td>--}}
                                                        <td>{{$dispute->statement_descriptor}}</td>
                                                        <td>{{$dispute->reason }}</td>
                                                        <td>{{\Carbon\Carbon::createFromTimestamp($dispute->created)->format('m/d/Y')}}</td>
                                                        <td>
                                                            @if ($dispute->status=='needs_response')
                                                            <a href="{{route('stripe.close_dispute',$dispute->id)}}" onclick="closeDispute(event,'{{$dispute->id}}')" class=" btn btn-danger">
                                                            {{__('Close')}}
                                                            </a>
                                                            <a href="{{route('stripe.reply_dispute',$dispute->id)}}"  onclick="replyDispute(event,'{{$dispute->id}}')" class=" btn btn-warning">
                                                                {{__('Reply')}}
                                                            </a>
                                                            @endif
                                                        </td>


                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                    </div>
                </div>

                <!--/ Basic table -->



            </div>
        </div>
    </div>
    <div id="replyModal" class="modal fade me-custom-modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Reply')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" enctype="multipart/form-data"  novalidate="novalidate">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input required name="id" type="text" class="form-control" id="id" hidden="" >
                                </div>
                                <div class="form-group">
                                    <label>{{__('Email')}}</label>
                                    <input required name="email" type="text" class="form-control" id="email"  >
                                </div>
                                <div class="form-group">
                                    <label>{{__('Customer name')}}</label>
                                    <input required name="name" type="text" class="form-control" id="name"  >
                                </div>
                                <div class="form-group">
                                    <label>{{__('Billing address')}}</label>
                                    <select class="select2 w-100" name="country_id" id="country_id">
                                    </select>
                                    <input required name="billing_address_1" type="text" class="form-control" id="billing_address_1" placeholder="{{__('Address Line 1')}}" >
                                    <input required name="billing_address_2" type="text" class="form-control" id="billing_address_2" placeholder="{{__('Address Line 2')}}" >
                                    <input required name="billing_address_city" type="text" class="form-control" id="billing_address_city"placeholder="{{__('City')}}" >

                                </div>
                                <h3>{{__('Product or service details')}}</h3>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>{{__('Description')}}</label>
                                        <textarea required name="product_description" id="product_description" class="form-control" rows="4" placeholder="{{__('')}}" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Shipping Date')}}</label>
                                    <input required name="shipping_date" type="text" class="form-control" id="shipping_date"  >
                                </div>
                                <div class="form-group">
                                    <label for="photo">{{__('photo')}}
                                    </label>
                                    <div class="custom-file">
                                        <input  type="file" name="photo" class="custom-file-input" id="photo">
                                        <label class="custom-file-label" for="photo">{{__('Choose file')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="reply_send" class="btn btn-success waves-effect waves-light">{{__('Send')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END: Content-->
@endsection
@section('Scripts')
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script type="text/javascript">
        function replyDispute(event,id) {
            event.preventDefault()
            $('#replyModal #id').val(id);
            $('#replyModal #script').val('');
            $('#replyModal').modal('show');
        }
    </script>
    {{--    get countries --}}
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            var isoCountries = [
                    @foreach($countries as $country)
                    {{--<option value="{{ $country->id}}" >{{$country->name}}</option>--}}
                { id: '{{ $country->short_name}}', abbreviation:'{{ $country->short_name}}' , flag: "{{$country->flag}}", text: '{{App::isLocale('en')? $country->name:$country->name_ar}}',key:'{{ $country->key}}' },
                // { id: 2, abbreviation: "us", text: 'United States' ,key:'+970'},
                @endforeach
            ];

            function formatCountry(country) {
                if (!country.id) { return country.text; }
                var $country = $(
                    '<img class=" flag-icon flag-icon-squared" src="{{env('ATTACH_URL_ADMIN').'countries/'.'/'}}'+country.flag+'"/>'+
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
                    '<img class=" flag-icon flag-icon-squared" src="{{env('ATTACH_URL_ADMIN').'countries/'.'/'}}'+country.flag+'"/>'+
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.text+ '</span>'
                );
                return $country;

            };
            $("[name='country_id']").select2({
                placeholder: "Please Select a country",
                templateResult: formatCountry,
                templateSelection:formatState2,
                data: isoCountries
            });


        });
    </script>

    <script>
        $(document).ready(function() {

            $(document).on("click", "#reply_send", function() {

                var postData = new FormData(this.form);

                var id_d=$('#replyModal #id').val();
                $('#reply_send').html('');
                $('#reply_send').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                    '<span class="ml-25 align-middle">{{__('sending')}}...</span>');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.ajax({
                    url: "{{ url("lozcart-payments/reply_dispute")}}" + '/' + id_d,
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        setTimeout(function () {
                            toastr['success'](
                                response.success,
                                {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 200);
                        location.reload()
                    },
                    error: function (data) {
                        $('#reply_send').empty();
                        $('#reply_send').html('{{__('send')}}');
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof (response.responseJSON) != "undefined") {

                                setTimeout(function () {
                                    toastr['error'](
                                        response.message,
                                        {
                                            closeButton: true,
                                            tapToDismiss: false
                                        }
                                    );
                                }, 200);
                                myHandel(response);
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
    <script type="text/javascript">

        function closeDispute(event, id) {
            event.preventDefault()
            swal.fire({
                title: "{{__('Warning')}}",
                text: "{{__('Please confirm approval')}}",
                type: "error",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "{{__('Yes')}}",
                cancelButtonText: "{{__('No')}}",
                cancelButtonClass: 'btn-success',
                confirmButtonClass: 'btn-danger',
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    var token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "{{ url("lozcart-payments/close_dispute")}}" + '/' + id,
                        type: "POST",
                        data: {
                            _token: token,


                        },
                        success: function (response) {
                            setTimeout(function () {
                                toastr['success'](

                                    response.message,

                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            location.reload()
                        },
                        error: function (data) {
                            var response = data.responseJSON;
                            if (data.status == 422) {
                                if (typeof (response.responseJSON) != "undefined") {
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
                        }
                    });
                    // console.log(this)

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
    </script>
@endsection
