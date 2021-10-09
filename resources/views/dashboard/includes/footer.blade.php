
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0">
        <span class="float-md-left d-block d-md-inline-block mt-25">{{__('COPYRIGHT')}} &copy; {{now()->year}}
            <a class="ml-25" href="{{url('/')}}" target="_blank">LozCart</a>
            <span class="d-none d-sm-inline-block">{{__('All rights Reserved')}}</span>
        </span>
{{--        <span class="float-md-right d-none d-md-block">{{__('Hand-crafted & Made with')}}--}}
{{--            <i data-feather="heart"></i>--}}
{{--        </span>--}}
    </p>
</footer>
<button class="btn btn-success btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->


@yield('Scripts')
<!-- BEGIN: Page JS-->
<script src="{{asset('/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/extensions/polyfill.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js')}}"></script>
<!-- END: Page JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>

<script src="{{asset('/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('/app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->
{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        function myHandel(obj, id) {--}}
{{--            if ('responseJSON' in obj)--}}
{{--                obj.messages = obj.responseJSON;--}}
{{--            $('input,select,textarea').each(function () {--}}
{{--                var parent = "";--}}
{{--                if ($(this).parents('.form-group').length > 0)--}}
{{--                    parent = $(this).parents('.form-group');--}}
{{--                if ($(this).parents('.input-group').length > 0)--}}
{{--                    parent = $(this).parents('.input-group');--}}
{{--                var name = $(this).attr("name");--}}
{{--                if (obj.messages && obj.messages[name] && ($(this).attr('type') !== 'hidden')) {--}}
{{--                    var error_message = '<div class="col-md-8 offset-md-3 custom-error"><p style="color: red">' + obj.messages[name][0] + '</p></div>'--}}
{{--                    parent.append(error_message);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        --}}{{--$(document).on("click", "#search", function() {--}}
{{--        --}}
{{--        --}}{{--    $.ajaxSetup({--}}
{{--        --}}{{--        headers: {--}}
{{--        --}}{{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--        --}}{{--        }--}}
{{--        --}}
{{--        --}}{{--    });--}}
{{--        --}}{{--    var postData = new FormData(this.form);--}}
{{--        --}}{{--    --}}{{----}}{{--$('#addBankAccount').html('');--}}
{{--        --}}{{--    --}}{{----}}{{--$('#addBankAccount').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+--}}
{{--        --}}{{--    --}}{{----}}{{--    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');--}}
{{--        --}}{{--    $.ajax({--}}
{{--        --}}{{--        url: "{{ route('search.index')}}",--}}
{{--        --}}{{--        type: "POST",--}}
{{--        --}}{{--        data: postData,--}}
{{--        --}}{{--        processData: false,--}}
{{--        --}}{{--        contentType: false,--}}
{{--        --}}{{--        success: function( response ) {--}}
{{--        --}}{{--            --}}{{----}}{{--$('#addBankAccount').empty();--}}
{{--        --}}{{--            --}}{{----}}{{--$('#addBankAccount').html('{{__('Save')}}');--}}
{{--        --}}{{--            // Toast.fire({--}}
{{--        --}}{{--            //     type: 'success',--}}
{{--        --}}{{--            //     title: response.success--}}
{{--        --}}{{--            // });--}}
{{--        --}}{{--            setTimeout(function () {--}}
{{--        --}}{{--                toastr['success'](--}}
{{--        --}}{{--                    @if(App::isLocale('en'))--}}
{{--        --}}{{--                        response.massage_en,--}}
{{--        --}}{{--                    @else--}}
{{--        --}}{{--                        response.massage_ar,--}}
{{--        --}}{{--                        @endif--}}
{{--        --}}{{--                    {--}}
{{--        --}}{{--                        closeButton: true,--}}
{{--        --}}{{--                        tapToDismiss: false--}}
{{--        --}}{{--                    }--}}
{{--        --}}{{--                );--}}
{{--        --}}{{--            }, 200);--}}
{{--        --}}{{--            document.getElementById("add_bank_account").reset();--}}
{{--        --}}{{--            $('.datatables-basic').DataTable().ajax.reload();--}}
{{--        --}}{{--            $('.custom-error').remove();--}}
{{--        --}}{{--            $('#modals-slide-in').modal('hide');--}}
{{--        --}}{{--        },--}}
{{--        --}}{{--        error: function (data) {--}}
{{--        --}}{{--            $('.custom-error').remove();--}}
{{--        --}}{{--            $('#addBankAccount').empty();--}}
{{--        --}}{{--            $('#addBankAccount').html('{{__('Save')}}');--}}
{{--        --}}{{--            var response = data.responseJSON;--}}
{{--        --}}{{--            if (data.status == 422) {--}}
{{--        --}}{{--                if (typeof(response.responseJSON) != "undefined") {--}}
{{--        --}}{{--                    myHandel(response);--}}
{{--        --}}{{--                    setTimeout(function () {--}}
{{--        --}}{{--                        toastr['error'](--}}
{{--        --}}{{--                            response.message,--}}
{{--        --}}{{--                            {--}}
{{--        --}}{{--                                closeButton: true,--}}
{{--        --}}{{--                                tapToDismiss: false--}}
{{--        --}}{{--                            }--}}
{{--        --}}{{--                        );--}}
{{--        --}}{{--                    }, 200);--}}
{{--        --}}{{--                }--}}
{{--        --}}{{--            } else {--}}
{{--        --}}{{--                Toast.fire({--}}
{{--        --}}{{--                    icon: 'error',--}}
{{--        --}}{{--                    title: response.message--}}
{{--        --}}{{--                });--}}
{{--        --}}{{--            }--}}
{{--        --}}{{--        }--}}
{{--        --}}{{--    });--}}
{{--        --}}{{--});--}}

{{--    });--}}

{{--</script>--}}


<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })

</script>
<script >
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 500,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>
@include('dashboard.includes.toast')
<script src="//code.tidio.co/uw1c3ji62lk1l3kgsakngwbiyyyiqdyu.js" async></script>
<script>
    window.onload = function() {
        let myiFrame = document.getElementById("tidio-chat-iframe");
        // let doc = myiFrame.contentDocument;
        $('#tidio-chat-iframe #button').css({right: 'unset'})
        // doc.body.innerHTML = doc.body.innerHTML + '<style>#tidio-chat-iframe  .awesome-iframe .widget-position-right.bubbleWithLabel .widgetLabel {left: 91px;}#tidio-chat-iframe #button {right: unset !important;left: 0 !important;}</style>';
    }
</script>
<script type="module">
    $(window).on('load', function () {
        var $html = $('html');
        setTimeout(function () {
            if (localStorage.getItem('light-layout-current-skin') == 'dark-layout') {
                $html.addClass("dark-layout");
                $(".main-menu").addClass("menu-dark");
                $(".header-navbar").addClass("navbar-dark");
                // console.log(localStorage.getItem('light-layout-current-skin') )
                // $html.removeClass("light-layout");
            }
        }, 1);
        setTimeout(function () {
            if (localStorage.getItem('light-layout-current-skin') == 'light-layout') {
                $html.addClass("light-layout");
                $(".main-menu").removeClass("menu-dark");
                $(".main-menu").addClass("menu-light");
                $(".header-navbar").addClass("navbar-light");
                // console.log(localStorage.getItem('light-layout-current-skin') )
                // $html.removeClass("dark-layout");
            }
        }, 1);
        setTimeout(function () {
            $html.removeClass('loading').addClass('loaded');
        }, 1200);
        $('.vertical-layout').show();
    });
</script>

{{--    @if ($expire_user==1)--}}
{{--        <script type="text/javascript">--}}
{{--            $(document).ready(function() {--}}


{{--                // var idRow =document.getElementById("role_row_"+id)--}}
{{--                swal.fire({--}}
{{--                    title: "{{__('Refusal')}}",--}}
{{--                    text: "{{__('Please confirm approval')}}",--}}
{{--                    type: "error",--}}
{{--                    icon: 'warning',--}}
{{--                    showCancelButton: !0,--}}
{{--                    confirmButtonText: "{{__('Yes, Refusal!')}}",--}}
{{--                    cancelButtonText: "{{__('No, back off!')}}",--}}
{{--                    cancelButtonClass: 'btn-primary',--}}
{{--                    confirmButtonClass: 'btn-danger',--}}
{{--                    reverseButtons: !0--}}
{{--                }).then(function (e) {--}}
{{--                    if (e.value === true) {--}}
{{--                        var reason=$('#reason').val()--}}
{{--                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}
{{--                        $.ajax({--}}
{{--                            type: 'get',--}}
{{--                            url: "#",--}}
{{--                            data: {--}}
{{--                                _token: CSRF_TOKEN,--}}
{{--                                reason:reason},--}}
{{--                            dataType: 'JSON',--}}
{{--                            success: function (response) {--}}

{{--                                if (response.status === true) {--}}
{{--                                    swal.fire("Done!", response.msg, "success");--}}
{{--                                    $('.datatables-basic').DataTable().ajax.reload();--}}

{{--                                } else {--}}
{{--                                    swal.fire("Error!", response.msg, "error");--}}
{{--                                }--}}
{{--                            }--}}
{{--                        });--}}

{{--                    } else {--}}
{{--                        e.dismiss;--}}
{{--                    }--}}

{{--                }, function (dismiss) {--}}
{{--                    return false;--}}
{{--                });--}}
{{--            })--}}
{{--        </script>--}}
{{--    @endif--}}


    @if ($current_plan->plan_id==4 ||$expire_user==1)
        <script type="text/javascript">
            $("#design_card").attr("onclick", "checkPlanTest(event)");
            $("#Add_lozCart").attr("onclick", "checkPlanTest(event)");
            $("#Add_lozCart").removeAttr("data-target");
            $("#coupon_modal").attr("onclick", "checkPlanTest(event)");
            $("#coupon_modal").removeAttr("data-target");

            $('*[id*=request_service]').each(function() {
                $(this).attr("onclick", "checkPlanTest(event)")
            });
            $("#connect_plugin1").attr("onclick", "checkPlanTest(event)");
            $("#connect_plugin2").attr("onclick", "checkPlanTest(event)");
            $('*[id*=connect_plugin]').each(function() {
                $(this).attr("onclick", "checkPlanTest(event)")
            });
            $("#add_country_modal").attr("onclick", "checkPlanTest(event)");
            $("#add_country_modal").removeAttr("data-target");
            $("#connect_domain").attr("onclick", "checkPlanTest(event)");
            $("#support_english").attr("onclick", "checkPlanTest(event)");
            $("#support_english").attr("disable", true);
            $("#show_copyrights3").attr("onclick", "checkPlanTest(event)");
            $("#show_copyrights3").attr("disable", true);
            // document.getElementById('request_service').attr("onclick", "checkPlanTest(event)")
            function checkPlanTest(event) {
                event.preventDefault();

                // var idRow =document.getElementById("role_row_"+id)
                swal.fire({
                    {{--title: "{{__('Refusal')}}",--}}
                    text: "{{__('This feature is not available in your package, please upgrade your package to a higher package to enable it')}}",
                    type: "error",
                    icon: 'warning',
                    showCancelButton: !0,
                    confirmButtonText: "{{__('View packages')}}",
                    cancelButtonText: "{{__('No, back off!')}}",
                    cancelButtonClass: 'btn-danger',
                    confirmButtonClass: 'btn-success',
                    reverseButtons: !0
                }).then(function (e) {
                    if (e.value === true) {
                        window.location.href="{{route('plan.index')}}"

                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
                });
            }
        </script>
    @endif

</body>
<!-- END: Body-->


</html>
