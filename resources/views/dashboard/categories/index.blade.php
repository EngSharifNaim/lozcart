@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    @if(App::isLocale('en'))
        <!-- BEGIN: Vendor CSS-->

        <!-- END: Vendor CSS-->
        <style>
            .div_btn{
                display: flex;
                align-items: center;
                justify-content: flex-end;
            }
        </style>


    @else
        <style>
            .div_btn{
                display: flex;
                align-items: center;
                justify-content: flex-end;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Categories')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Categories')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <form id="add_cats" method="post" action="javascript:void(0)">

                        <div class="from-group col-md-12">
                            <div class="product_specification_Category">
                                @foreach($categories as $category)
                                    <div class="spec-item mb-2" id="item-{{$category->id}}">
                                        <div class="row">
                                            <div class=" col-md-5 ">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"></div>
                                                    <input type="text" class="form-control" value="{{$category->name_ar}}" name="categories[{{$category->id}}][name_ar]" placeholder="{{__('Main Category Arabic')}}" >
                                                    <input type="hidden" value="{{$category->id}}" name="categories[{{$category->id}}][id]">
                                                </div>
                                            </div>
                                            @if(in_array('en',$language))
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"></div>
                                                    <input type="text" class="form-control" value="{{$category->name}}" name="categories[{{$category->id}}][name]" placeholder="{{__('Category English')}}" >
                                                    <input type="hidden" value="{{$category->id}}" name="categories[{{$category->id}}][id]">
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-md-1 col-2">
                                                <a href="javascript:void(0)" class="btn btn-danger deleteBtn" data-url="{{route('category.delete',$category->id)}}" data-id="{{$category->id}}"><i class="far fa-trash-alt"></i></a>
                                            </div>
                                            <div class="col-md-2 col-6">
                                                <div class="show_check_box mid" style="margin-right:0 !important;">
                                                    <div class="custom-control custom-switch text-right">
                                                        <input name="categories[{{$category->id}}][status]" {{$category->status ==1 ?'checked':''}}   type="checkbox" class="switch custom-control-input" data-activate_desc=" {{__('Stop displaying the category in the main')}}  " data-id="{{$category->id}}" data-deactivate_desc=" {{__('Show category in home')}} " data-activate_url="{{route('category.activate',$category->id)}}" data-deactivate_url="{{route('category.deactivate',$category->id)}}" id="customSwitch_show{{$category->id}}">
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
                                                    @if(in_array('en',$language))
                                                    <div class="col-md-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"></div>
                                                            <input type="text" name="categories[{{$category->id}}][subs][{{$loop->index+1  }}][name]" value="{{$child->name}}" class="form-control" required="" placeholder="{{__('Category English')}}" aria-describedby="basic-addon1">
                                                            <input type="hidden" name="categories[{{$category->id}}][subs][{{$loop->index+1  }}][id]" value="{{$child->id}}">
                                                        </div>
                                                    </div>
                                                    @endif
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
                                <span>+ </span> {{__('Add Main Category')}}
                            </button>
                        </div>
                    <div class="form-group">
                        <div class="div_btn">
                            <button id="SaveCats" data-href="{{route('category.store')}}" type="button" class=" btn btn-success waves-effect waves-light">{{__('Save')}}
                            </button>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('Scripts')
    <!-- BEGIN: Page Vendor JS-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>

    <!-- END: Page Vendor JS-->
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
                    @if(in_array('en',$language))
                    html += ' <div class="col-md-4"> <div class="input-group"> <input name="categories[' + x + '][id]" value="0" type="hidden" > <input name="categories[' + x + '][name]" type="text" class="form-control" placeholder="{{__('Category English')}}" aria-describedby="basic-addon1"> </div> </div>';
                    @endif
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
                        ' <button class="add_form_field_Category_Sub btn btn-success waves-effect waves-light mt-2"><span>+ </span>{{__('Add Sub Category')}}</button> </div>';

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
                    @if(in_array('en',$language))
                    html += '<div class="col-md-4"> <div class="input-group"> <div class="input-group-prepend">  </div> <input type="hidden" name="categories[' + index + '][subs][' + (nums + 1) + '][id]" value="0" /><input type="text" name="categories[' + index + '][subs][' + (nums + 1) + '][name]" class="form-control" required placeholder="{{__('Category English')}}" aria-describedby="basic-addon1"> </div> </div> ';
                    @endif
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
            // var categorySelect = $('#mySelect2');

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

                            }
                        },
                        error: function (data) {
                            swal.fire({
                                icon: 'warning',
                                title: 'عذراً، حدثت خلل أثناء عملية الحذف',
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
                    @if(in_array('en',$language))
                    '<div class="col-md-4">'+
                    '<div class="input-group">'+
                    '<div class="input-group-prepend"></div>'+
                    '<input type="text" class="form-control" value="'+obj.name+'" name="categories['+obj.id+'][name]" placeholder="{{__('Category English')}}" >'+
                    '<input type="hidden" value="'+obj.id+'" name="categories['+obj.id+'][id]">'+
                    '</div>'+
                    '</div>'+
                    @endif
                    '<div class="col-md-1 col-2">'+
                    '<a href="javascript:void(0)" class="btn btn-danger deleteBtn" data-url="{{route("category.delete",'').'/'}}'+obj.id+'" data-id="'+obj.id+'"><i class="far fa-trash-alt"></i></a>'+
                    '</div>'+
                    '<div class="col-md-2 col-6">'+
                    '<div class="show_check_box mid" style="margin-right:0 !important;">'+
                    '<div class="custom-control custom-switch text-right">'+
                    '<input name="categories['+obj.id+'][status]" '+(obj.status ==1 ?"checked":'')+'   type="checkbox" class="switch custom-control-input" data-activate_desc=" {{__('Stop displaying the category in the main')}}  " data-id="'+obj.id+'" data-deactivate_desc=" {{__('Show category in home')}} " data-activate_url="{{route('category.activate','').'/'}}'+obj.id+'" data-deactivate_url="{{route('category.deactivate','').'/'}}'+obj.id+'" id="customSwitch_show'+obj.id+'">'+
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
                        '<input type="text" name="categories['+obj.id+'][subs]['+x+'][name_ar]" value="'+this.name_ar+'" class="form-control" required="" placeholder="{{__('Sub Category Arabic')}}" aria-describedby="basic-addon1">'+
                        '<input type="hidden" name="categories['+obj.id+'][subs]['+x+'][id]" value="'+obj.id+'">'+
                        '</div>'+
                        '</div>'+
                        @if(in_array('en',$language))
                        '<div class="col-md-4">'+
                        '<div class="input-group">'+
                        '<div class="input-group-prepend"></div>'+
                        '<input type="text" name="categories['+obj.id+'][subs]['+x+'][name]" value="'+this.name+'" class="form-control" required="" placeholder="{{__('Category English')}}" aria-describedby="basic-addon1">'+
                        '<input type="hidden" name="categories['+obj.id+'][subs]['+x+'][id]" value="'+obj.id+'">'+
                        ' </div>'+
                        '</div>'+
                        @endif
                        '<div class="col-md-1">'+
                        ' <a href="javascript:void(0)" class="btn btn-danger deleteBtn" data-url="{{route('category.delete_sub',''),'/'}}'+this.id+'" data-id="'+this.id+'"><i class="far fa-trash-alt"></i></a>'+
                        '</div>'+
                        '</div>'


                    );

                });

            })
        }
        //Save Categories from Model by ajax
        $('#SaveCats').click(function () {
            // $('#add_cats').validate();
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
                        // categorySelect.empty();



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

                        $('.product_specification_Category').empty().append(response.items.html);
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
                                            title: 'عذراً، حدثت خلل أثناء العملية',
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
        });

    </script>
@endsection
