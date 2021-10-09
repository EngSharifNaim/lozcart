@extends('dashboard.layouts.app')
@section('style')
    <script type="text/javascript">
        // Notice how this gets configured before we load Font Awesome
        window.FontAwesomeConfig = { autoReplaceSvg: false }
    </script>
    <!-- BEGIN: Vendor CSS-->

    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dripicons/2.0.0/webfont.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css" integrity="sha512-vIgFb4o1CL8iMGoIF7cYiEVFrel13k/BkTGvs0hGfVnlbV6XjAA0M0oEHdWqGdAVRTDID3vIZPOHmKdrMAUChA==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">

    <style>
        .card .card-title {
            text-align: center;
        }
    </style>
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
                            <h2 class="content-header-title float-left mb-0">{{__('Plugins')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Plugins')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <div class="row">
                    @foreach($plugins as $plugin)
                    <div class="col-lg-3  col-sm-6 col-6" id="item_{{$plugin->id}}">
                        <div class="card card-body setting-item" style="box-shadow: 0px 2px 6px 0px rgba(198, 198, 198, 0.3);">
                            <img src="{{asset('photo/'.$plugin->photo)}}" style="margin:0 auto" width="120">
                            <a class="text-center"> {{$plugin->name}} </a>
                            <div class="text-center" style="margin:20px auto ">
                                <form action="javascript:void(0)" method="post">
                                    <input type="text"  id="plugin_id" name="plugin_id" value="{{$plugin->id}}" hidden>
                                    <input type="text" id="plugin" name="plugin" value="{{$plugin->name}} " hidden>
                                    <div class="d-flex flex-column">
                                        @if(!in_array($plugin->id,$user_plugins))

                                            <button id="{{  $plugin->id==3?'connect_plugin1': ($plugin->id==4?'connect_plugin2': "connect_plugin") }}" class="btn btn-success waves-effect waves-light ">
                                                {{__('Connect Plugin')}}
                                            </button>
                                        @endif
                                        @if(in_array($plugin->id,$user_plugins))

                                            <button id="{{  $plugin->id==3?'connect_plugin_edit1': ($plugin->id==4?'connect_plugin_edit2': "connect_plugin_edit") }}"  class="btn btn-warning waves-effect waves-light ">
                                                {{__('Edit Connect')}}
                                            </button>
                                            @foreach($user_plugin as $item)
                                                @if ($item->plugin_id ==$plugin->id)
                                                        <input type="text" id="status_{{$item->id}}" name="status" value="{{$item->status}} " hidden>

                                                        <button id="connect_plugin_status_{{$item->id}}" onclick="changeStatus({{$item->id}})" style="margin-top: 20px"  class="btn {{$item->status ==1?'btn-success':'btn-danger'}} waves-effect waves-light ">
                                                        {{$item->status ==1?__('Active'):__('Suspended')}}
                                                    </button>
                                                @endif

                                            @endforeach
                                        @endif
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!--/ Basic table -->



            </div>
        </div>
    </div>
    <div id="formRequest" class="modal fade me-custom-modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Connect Plugin')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" enctype="multipart/form-data"  novalidate="novalidate">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input required name="plugin_id" type="text" class="form-control" id="plugin_id" hidden="" >
                                    <input type="text" class="form-control" id="plugin" disabled >
                                </div>
                                <div class="form-group">
                                    <textarea required name="script" id="script" class="form-control" rows="4" placeholder="{{__('Enter the details given to you from the service website')}}" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" id="connect" class="btn btn-success waves-effect waves-light">{{__('Connect Now')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="formRequest1" class="modal fade me-custom-modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Connect Plugin')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" enctype="multipart/form-data"  novalidate="novalidate">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input required name="plugin_id" type="text" class="form-control" id="plugin_id" hidden="" >
                                    <input type="text" class="form-control" id="plugin" disabled >
                                </div>
                                <div class="form-group">
                                    <input required name="script" type="text" onkeypress="isInputNumber(event,this.value)"class="form-control"  id="mobile" placeholder="{{__('Enter Your Number +972592555309')}}" >

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" id="connect" class="btn btn-success waves-effect waves-light">{{__('Connect Now')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="formRequest2" class="modal fade me-custom-modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Connect Plugin')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" enctype="multipart/form-data"  novalidate="novalidate">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input required name="plugin_id" type="text" class="form-control" id="plugin_id" hidden="" >
                                    <input type="text" class="form-control" id="plugin" disabled >
                                </div>
                                <div class="form-group">
                                    <textarea required name="script" id="script" class="form-control" rows="4" placeholder="{{__('Enter the details given to you from the service website')}}" ></textarea>
                                </div>
                                <div class="form-group">
                                    <p>
                                        {{__('Read this page to learn how to activate live chat on your store through ')}}
                                        <a href="https://help.tidio.com/docs/install-tidio-on-your-website#install-tidio-via-the-javascript-code‏" target="_blank">Tidio <i class="fas fa-external-link-alt"></i></a>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" id="connect" class="btn btn-success waves-effect waves-light">{{__('Connect Now')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END: Content-->
@endsection
@section('Scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>


    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>

    {{--    Add new Country--}}
    @if ($current_plan->plan_id !=4)
    <script>
        $(document).ready(function() {

            $(document).on("click", "#connect_plugin", function() {

                var postData = new FormData(this.form);
                // console.log()
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').html('');--}}
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+--}}
                {{--    '<span class="ml-25 align-middle">{{__('Connecting...')}}</span>');--}}
                $('#formRequest #plugin').val('{{__('Selected Plugin')}}'+'( '+postData.get('plugin')+' )');
                $('#formRequest #plugin_id').val(+postData.get('plugin_id'));
                $('#formRequest #script').val('');
                $('#formRequest').modal('show');
            });

        });

    </script>
    <script>
        $(document).ready(function() {

            $(document).on("click", "#connect_plugin1", function() {

                var postData = new FormData(this.form);
                // console.log()
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').html('');--}}
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+--}}
                {{--    '<span class="ml-25 align-middle">{{__('Connecting...')}}</span>');--}}
                $('#formRequest1 #plugin').val('{{__('Selected Plugin')}}'+'( '+postData.get('plugin')+' )');
                $('#formRequest1 #plugin_id').val(+postData.get('plugin_id'));
                $('#formRequest1 #script').val('');
                $('#formRequest1').modal('show');
            });

        });

    </script>
    <script>
        $(document).ready(function() {

            $(document).on("click", "#connect_plugin2", function() {

                var postData = new FormData(this.form);
                // console.log()
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').html('');--}}
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+--}}
                {{--    '<span class="ml-25 align-middle">{{__('Connecting...')}}</span>');--}}
                $('#formRequest2 #plugin').val('{{__('Selected Plugin')}}'+'( '+postData.get('plugin')+' )');
                $('#formRequest2 #plugin_id').val(+postData.get('plugin_id'));
                $('#formRequest2 #script').val('');
                $('#formRequest2').modal('show');
            });

        });

    </script>
    <script>
        $(document).ready(function() {

            $(document).on("click", "#connect_plugin_edit", function() {

                var postData = new FormData(this.form);
                // console.log()
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').html('');--}}
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+--}}
                {{--    '<span class="ml-25 align-middle">{{__('Connecting...')}}</span>');--}}
                $('#formRequest #plugin').val('{{__('Selected Plugin')}}'+'( '+postData.get('plugin')+' )');
                $('#formRequest #plugin_id').val(+postData.get('plugin_id'));
                // $('#formRequest #script').val('');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.ajax({
                    url: "{{ route('plugins.getUserPlugin')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function (response) {

                        $('#formRequest #script').val(response.script);
                        $('#formRequest').modal('show');
                    },
                    error: function (data) {
                        $('#connect').empty();
                        $('#connect').html('{{__('Connect Now')}}');
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
    <script>
        $(document).ready(function() {

            $(document).on("click", "#connect_plugin_edit1", function() {

                var postData = new FormData(this.form);
                // console.log()
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').html('');--}}
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+--}}
                {{--    '<span class="ml-25 align-middle">{{__('Connecting...')}}</span>');--}}
                $('#formRequest1 #plugin').val('{{__('Selected Plugin')}}'+'( '+postData.get('plugin')+' )');
                $('#formRequest1 #plugin_id').val(+postData.get('plugin_id'));
                // $('#formRequest #script').val('');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.ajax({
                    url: "{{ route('plugins.getUserPlugin')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function (response) {

                        $('#formRequest1 #mobile').val(response.script);
                        $('#formRequest1').modal('show');
                    },
                    error: function (data) {
                        $('#connect').empty();
                        $('#connect').html('{{__('Connect Now')}}');
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
    <script>
        $(document).ready(function() {

            $(document).on("click", "#connect_plugin_edit2", function() {

                var postData = new FormData(this.form);
                // console.log()
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').html('');--}}
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+--}}
                {{--    '<span class="ml-25 align-middle">{{__('Connecting...')}}</span>');--}}
                $('#formRequest2 #plugin').val('{{__('Selected Plugin')}}'+'( '+postData.get('plugin')+' )');
                $('#formRequest2 #plugin_id').val(+postData.get('plugin_id'));
                // $('#formRequest #script').val('');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.ajax({
                    url: "{{ route('plugins.getUserPlugin')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function (response) {

                        $('#formRequest2 #script').val(response.script);
                        $('#formRequest2').modal('show');
                    },
                    error: function (data) {
                        $('#connect').empty();
                        $('#connect').html('{{__('Connect Now')}}');
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
    {{--    change status--}}
    <script type="text/javascript">
        // $('#status-'+2).on('click', function(e){
        //     e.stopPropagation();
        //     console.log('fdsfsdf')
        //     alert('Child : waaaaaa waaaa waa huh huh waaa waaaa!');
        // });
        // ev.allowSubmit = true;
        function changeStatus(id) {
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
                    var x = document.getElementById("status_"+id).value;
                    if (x == 1) {
                        document.getElementById("status_"+id).value = 0
                    }
                    if (x == 0) {
                        document.getElementById("status_"+id).value = 1
                    }
                    var status_new = document.getElementById("status_"+id).value;
                    var token = $('meta[name="csrf-token"]').attr('content');
                    // var idRow = document.getElementById("user_row_" + id)

                    $.ajax({
                        url: "{{ url("plugins/status")}}" + '/' + id,
                        type: "POST",
                        data: {
                            status: status_new,
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
                            if(status_new==1){
                                $("#connect_plugin_status_"+id).removeClass('btn-danger')
                                $("#connect_plugin_status_"+id).addClass('btn-success ')
                                $("#connect_plugin_status_"+id).empty();
                                $("#connect_plugin_status_"+id).html('{{__('Active')}}');
                            }
                            if(status_new==0){
                                $("#connect_plugin_status_"+id).removeClass('btn-success')
                                $("#connect_plugin_status_"+id).addClass('btn-danger')
                                $("#connect_plugin_status_"+id).empty();
                                $("#connect_plugin_status_"+id).html('{{__('Suspended')}}');
                            }

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

    <script>
        $(document).ready(function() {

            $(document).on("click", "#connect_plugin_status", function() {

                var postData = new FormData(this.form);
                // console.log()
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').html('');--}}
                {{--$('#item_'+postData.get('plugin_id')+' #connect_plugin').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+--}}
                {{--    '<span class="ml-25 align-middle">{{__('Connecting...')}}</span>');--}}
                $('#formRequest #plugin').val('{{__('Selected Plugin')}}'+'( '+postData.get('plugin')+' )');
                $('#formRequest #plugin_id').val(+postData.get('plugin_id'));
                // $('#formRequest #script').val('');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                $.ajax({
                    url: "{{ route('plugins.getUserPlugin')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function (response) {

                        $('#formRequest #script').val(response.script);
                        $('#formRequest').modal('show');
                    },
                    error: function (data) {
                        $('#connect').empty();
                        $('#connect').html('{{__('Connect Now')}}');
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

            $(document).on("click", "#connect", function() {
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
                    $('#connect').html('');
                    $('#connect').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Connecting...')}}</span>');

                    $.ajax({
                        url: "{{ route('plugins.connect')}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#connect').empty();
                            $('#connect').html('{{__('Connect Now')}}');
                            // Toast.fire({
                            //     type: 'success',
                            //     title: response.success
                            // });
                            setTimeout(function () {
                                toastr['success'](
                                    response.message,
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            // $('#item_'+postData.get('plugin_id')+' #connect_plugin_edit').attr('disabled',true)
                            // $('#item_'+postData.get('plugin_id')+' #connect_plugin_status').attr('disabled',true)
                            // $('#item_'+postData.get('plugin_id')+' #connect_plugin').attr('disabled',false)
                            $('#formRequest').modal('hide');
                            $('#formRequest1').modal('hide');
                            window.location.href="{{route('plugins.index')}}"
                        },
                        error: function (data) {
                            $('#connect').empty();
                            $('#connect').html('{{__('Connect Now')}}');
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
                }
            });

        });

    </script>
    @endif
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
    {{--    validate is number--}}
    <script>
        function isInputNumber(evt, value) {

            var ch = String.fromCharCode(evt.which);

            if (!(/[0-9.+]/.test(ch))) {
                evt.preventDefault();
            }

        }
    </script>
@endsection
