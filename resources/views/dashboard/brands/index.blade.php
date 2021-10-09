@extends('dashboard.layouts.app')
@section('style')

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
        <!-- END: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
        <link rel="stylesheet" href="https://mapp.sa/cPanel/css/cropper.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"  />
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">

<style>
    .dropify-wrapper .dropify-message p {
        font-size: 17px;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Brands')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Brands')}}
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
                                <div class="card-header border-bottom p-1">
                                    <div class="head-label">
                                        {{--                                        <h6 class="mb-0">DataTable with Buttons</h6>--}}
                                    </div>
                                    <div class="dt-action-buttons text-right">
                                        <div class="dt-buttons">
                                            <button class="dt-button create-new btn btn-success" data-toggle="modal" data-target="#modals-slide-in"   type="button" >
                                                <i data-feather="plus"></i>
                                                {{__('Add New Brand')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table class="datatables-basic table" >
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>id</th>
                                        <th>{{__('Brand')}}</th>
                                        <th>{{__('Count Product')}}</th>
                                        <th>{{__('Categories')}}</th>
                                        @can('Suspended and Activate Brands')
                                        <th>{{__('Status')}}</th>
                                        @endcan
                                        @canany(['Delete Brands','Edit Brands'])
                                        <th>{{__('Action')}}</th>
                                        @endcanany
                                    </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- Modal to add new record -->
                    <div class="modal modal-slide-in fade" id="modals-slide-in">
                        <div class="modal-dialog sidebar-sm">
                            <form class="add-new-record modal-content pt-0" id="tradMark" method="POST" enctype="multipart/form-data">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">{{__('New Brand')}}</h5>
                                </div>
{{--                                <div class="modal-body flex-grow-1">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-label" for="basic-icon-default-fullname">Name</label>--}}
{{--                                        <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" />--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-label" for="basic-icon-default-post">Post</label>--}}
{{--                                        <input type="text" id="basic-icon-default-post" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" />--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-label" for="basic-icon-default-email">Email</label>--}}
{{--                                        <input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" />--}}
{{--                                        <small class="form-text text-muted"> You can use letters, numbers & periods </small>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="form-label" for="basic-icon-default-date">Joining Date</label>--}}
{{--                                        <input type="text" class="form-control dt-date" id="basic-icon-default-date" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group mb-4">--}}
{{--                                        <label class="form-label" for="basic-icon-default-salary">Salary</label>--}}
{{--                                        <input type="text" id="basic-icon-default-salary" class="form-control dt-salary" placeholder="$12000" aria-label="$12000" />--}}
{{--                                    </div>--}}
{{--                                    <button type="button" class="btn btn-primary data-submit mr-1">Submit</button>--}}
{{--                                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>--}}
{{--                                </div>--}}
{{--                                <form id="tradMark"class="add-new-record modal-content pt-0" method="POST" enctype="multipart/form-data" >--}}
                                    <div class="modal-body flex-grow-1">
                                        <div class="row">
                                            <input type="hidden" name="brands_categories" id="brands_categories" value="">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="select-country1">{{__('Category')}}</label>
                                                    <select class="select2 categories form-control" multiple id="categories">
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
                                            <div class="col-md-12">
                                                <div class="form-group">

                                                    <input required="" value="" id="brand_name_ar" type="text" name="brand_name_ar" class="form-control" placeholder="{{__('Name Ar')}}" aria-required="true">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">

                                                    <input required="" value="" id="brand_name_en" type="text" name="brand_name_en" class="form-control" placeholder="{{__('Name En')}}" aria-required="true">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="image" class="control-label">{{__('Logo')}}
                                                        <span class="btn btn-dark p-0  waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" title="{{__('The preferred size for the image is 200px * 100px and the maximum allowed size is 0.5MB. Supported are png, jpg, jpeg.')}}" style="border-radius: 25px;">
                                                        <i data-feather='alert-circle' ></i>
                                                    </span>
                                                        <span style="color: red">*</span>
                                                    </label>
                                                    <input type="hidden" value="" name="imageDone" id="imageDone" required="" aria-required="true">
                                                    <input accept="image/*" id="imageFile" type="file" class="dropify" name="imageFile"/>
                                                    <div id="imageArea" style="display: none;width: 100%;max-height: 180px">
                                                        <img id="imagea" src="" alt="Picture" style="opacity: 0;">
                                                        <button type="button" class="btn btn-success" style="margin: 5px" id="cropBrand">{{__('Save Image')}}
                                                        </button>
                                                        <button type="button" class="btn btn-dark" id="undoBrand">{{__('Cancel')}}</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="addTradMark"  type="button" class=" btn btn-success waves-effect waves-light">
                                            {{__('Save')}}
                                        </button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->



            </div>
        </div>
    </div>

    <!-- END: Content-->
@endsection
@section('Scripts')
    <!-- BEGIN: Page Vendor JS-->
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
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="https://mapp.sa/cPanel/libs/dropzone/dropzone.min.js"></script>
    <script src="https://mapp.sa/cPanel/js/cropper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" ></script>
    {{--    <script src="{{asset('')}}app-assets/js/scripts/tables/table-datatables-basic.js"></script>--}}
    <script>
        $(".select2").select2({
            closeOnSelect : false,
            placeholder : "{{__('Select Categories')}}",
            allowHtml: true,
            allowClear: true,
            tags: true
        });

    </script>
{{--    <script src="{{asset('')}}app-assets/custom/staff.js"></script>--}}
    <!-- END: Page JS-->
    <script>
        $(function () {
            'use strict';

            var dt_basic_table = $('.datatables-basic'),
                assetPath = '{{asset('app-assets/')}}';

            if ($('body').attr('data-framework') === 'laravel') {
                assetPath = $('body').attr('data-asset-path');
            }

            // DataTable with buttons
            // --------------------------------------------------------------------

            if (dt_basic_table.length) {
                var dt_basic = dt_basic_table.DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('brand.get_brands')}}",
                    columns: [
                        { data: 'id' },
                        { data: 'id' },
                        { data: 'id' }, // used for sorting so will hide this column
                        { data: 'name' },
                        { data: 'product_count' },
                        { data: 'categories' },
                            @can('Suspended and Activate Brands')
                        { data: '' },
                            @endcan
                            @canany(['Delete Brands','Edit Brands'])
                        { data: '' },
                        @endcanany
                    ],
                    columnDefs: [
                        {
                            // For Responsive
                            className: 'control',
                            orderable: false,
                            responsivePriority: 2,
                            targets: 0
                        },
                        {
                            // For Checkboxes
                            targets: 1,
                            orderable: false,
                            responsivePriority: 3,
                            render: function (data, type, full, meta) {
                                return (
                                    '<div class="custom-control custom-checkbox"> <input class="custom-control-input dt-checkboxes sub_chk" name="" type="checkbox" value="'+full.id+'" id="checkbox' +
                                    data +
                                    '" /><label class="custom-control-label" for="checkbox' +
                                    data +
                                    '"></label></div>'
                                );
                            },
                            checkboxes: {
                                selectAllRender:
                                    '<div class="custom-control custom-checkbox"> <input class="custom-control-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="custom-control-label" for="checkboxSelectAll"></label></div>'
                            }
                        },
                        {
                            targets: 2,
                            visible: false
                        },
                        {
                            // Avatar image/badge, Name and post
                            targets: 3,
                            responsivePriority: 4,
                            render: function (data, type, full, meta) {
                                var $user_img = full['logo'],
                                    @if(App::isLocale('en'))
                                    $name = full['name'];
                                @else
                                    $name = full['name_ar'];
                                @endif
                                // $name = full['market_name'];
                                if ($user_img) {
                                    // For Avatar image
                                    var $output =
                                        '<img src="{{asset('uploads/brands/').'/'}}'+$user_img+'" alt="Avatar" width="32" height="32">';
                                } else {
                                    // For Avatar badge
                                    var stateNum = full['status'];
                                    var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                                    var $state = states[stateNum],
                                        @if(App::isLocale('en'))
                                        $name = full['name'],
                                        @else
                                        $name = full['name_ar'],
                                        @endif
                                        $initials = $name.match(/\b\w/g) || [];
                                    $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                                    $output = '<span class="avatar-content">' + $initials + '</span>';
                                }

                                var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
                                // Creates full output for row
                                var $row_output =
                                    '<a href="#">'+
                                    '<div class="d-flex justify-content-left align-items-center">' +
                                    '<div class="avatar ' +
                                    colorClass +
                                    ' mr-1">' +
                                    $output +
                                    '</div>' +
                                    '<div class="d-flex flex-column">' +
                                    '<span class="emp_name text-truncate font-weight-bold">' +
                                    $name +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</a>';
                                return $row_output;
                            }
                        },

                        {
                            targets: 4,
                            orderable: false,
                        },
                        {
                            // Avatar image/badge, Name and post
                            targets: 5,
                            orderable: false,
                            render: function (data, type, full, meta) {
                                var $categories = full['categories'];


                                // $name = full['market_name'];
                                if ($categories) {
                                    // For Avatar image
                                    var $output1=''
                                    var counter = 0;
                                    $.each($categories, function (i, option) {
                                        counter++;
                                        var $category=option["category"].name_ar
                                        // console.log($category)
                                        $output1  += '<span >' +
                                            @if(App::isLocale('en')) option.category.name @else option.category.name_ar @endif +
                                        '</span>';

                                        if( counter == $(categories).length )
                                        {
                                            $output1  += ',';
                                            // Not last Element
                                        }
                                        else
                                        {
                                            // Last Element


                                        }

                                    });
                                   }
                                else {
                                    $output1  += '<span > {{__("Not Found")}}</span>'
                                }

                                var $row_output =''+
                                    $output1 ;
                                return $row_output;
                            }
                        },

                            @can('Suspended and Activate Brands')
                        {
                            // Actions
                            targets: -2,
                            title: '{{__('Status')}}',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '<div class="custom-control custom-switch custom-switch-success">' +
                                    '<input type="checkbox" class="custom-control-input" onclick="changeStatus('+full.id+')" value="'+full.status+'" id="status-'+full.id+'" ' +
                                    (full.status == 1 ? 'checked': '') +
                                    ' />' +
                                    '<label class="custom-control-label" for="status-'+full.id+'">' +
                                    '<span class="switch-icon-left">'+
                                    // feather.icons['check'].toSvg({ class: 'font-small-4' })+
                                    '</span>' +
                                    // '<span class="switch-icon-right">x</span>' +
                                    '</label>' +
                                    '</div>'
                                );
                            }
                        },
                            @endcan
                            @canany(['Delete Brands','Edit Brands'])

                        {
                            // Actions
                            targets: -1,
                            title: '{{__('Actions')}}',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '@can('Delete Brands')' +
                                    '<a href="javascript:;"  onclick="deleteRow('+full.id+')"  data-value="'+full.id+'"  class="item-edit mr-1 ml-1">' +
                                    feather.icons['trash-2'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'@endcan+
                                    '@can('Edit Brands') '+
                                    '<a href="{{ route('brand.edit','')}}'+"/"+full.id+'"  class="item-edit">' +
                                    feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'@endcan

                                );
                            }
                        }
                        @endcanany
                    ],
                    order: [[1, 'desc']],
                    dom:  "<'row'<'col-sm-2'l><'col-sm-7'B><'col-sm-2'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [
                        {
                            text: feather.icons['trash-2'].toSvg({ class: 'mr-50 font-small-4' })+'{{__('Delete')}}' ,
                            className: 'delete_all btn btn-primary',
                            attr: {
                                'onclick':'deleteAll()'
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        }
                    ],
                    displayLength: 7,
                    lengthMenu: [7, 10, 25, 50, 75, 100],

{{--                        @can('Create Brands')--}}
{{--                            dom:--}}
{{--                                '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',--}}
{{--                            buttons: [--}}
{{--                                {--}}
{{--                                    text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + '{{__("Add New Brand")}}',--}}
{{--                                    className: 'create-new btn btn-primary',--}}
{{--                                    attr: {--}}
{{--                                        'data-toggle': 'modal',--}}
{{--                                        'data-target': '#modals-slide-in'--}}
{{--                                        // 'onclick':"window.location.href='http://127.0.0.1:8000/user/create'",--}}
{{--                                    },--}}
{{--                                    init: function (api, node, config) {--}}
{{--                                        $(node).removeClass('btn-secondary');--}}
{{--                                    }--}}
{{--                                }--}}
{{--                            ],--}}
{{--                            @endcan--}}
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal({
                                header: function (row) {
                                    var data = row.data();
                                    return 'Details of ' + data['full_name'];
                                }
                            }),
                            type: 'column',
                            renderer: function (api, rowIdx, columns) {
                                var data = $.map(columns, function (col, i) {
                                    console.log(columns);
                                    return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                        ? '<tr data-dt-row="' +
                                        col.rowIndex +
                                        '" data-dt-column="' +
                                        col.columnIndex +
                                        '">' +
                                        '<td>' +
                                        col.title +
                                        ':' +
                                        '</td> ' +
                                        '<td>' +
                                        col.data +
                                        '</td>' +
                                        '</tr>'
                                        : '';
                                }).join('');

                                return data ? $('<table class="table"/>').append(data) : false;
                            }
                        }
                    },
                    language: {
                        "lengthMenu": "{{__('Show')}} _MENU_ {{__('entries')}}",
                        "processing":     "{{__('Processing...')}}",
                        "search":         "{{__('Search:')}}",
                        "info":           "{{__('Showing')}} _START_ {{__('to')}} _END_ {{__('of')}} _TOTAL_ {{__('entries')}}",
                        "zeroRecords":    "{{__('No matching records found')}}",
                        "emptyTable":     "{{__('No data available in table')}}",
                        "infoEmpty":      "{{__('Showing')}} 0 {{__('to')}} 0 {{__('of')}} 0 {{__('entries')}}",
                        "infoFiltered":   "({{__('filtered from')}} _MAX_ {{__('total entries')}} )",
                        paginate: {
                            // remove previous & next text from pagination
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    }
                });

            }


        });

    </script>
    {{--    Add new Brand--}}
    <script>
        $(".categories").on("change", function (e) {
            var categories_element = $(this);

            var categories = categories_element.val();
            $('#brands_categories').val(categories);
        });
        // $('.dropify').dropify();
        $('.dropify').dropify({
            messages: {
                'default': '{{__('Drag and drop a file here or click')}}',
                'replace': '{{__('Drag and drop or click to replace')}}',
                'remove':  '{{__('Remove')}}',
                'error':   '{{__('Ooops, something wrong happended.')}}'
            }
        });
        var formDataBrand = new FormData();
        // var tradMarkSelect = $('#brand_id');

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
                var $form = $(this.form);
                if(! $form.valid()) {
                    return false
                };
                if ($form.valid()) {
                    $('#image-error').remove();
                    var categories_brand = $('#brands_categories').val()
                    // console.log(categories_brand)
                    myForm = document.getElementById('tradMark');
                    // console.log(myForm)
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
                            formDataBrand.append('name_ar', $('#modals-slide-in input[name=brand_name_ar]').val());
                            formDataBrand.append('name_en', $('#modals-slide-in input[name=brand_name_en]').val());
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
                                    // $(".loader-modal").fadeIn(100);
                                    $('#productBrand').modal('hide');
                                },
                                success: function (response) {
                                    if (response.status == 1) {
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
                                        $('.datatables-basic').DataTable().ajax.reload();
                                        $('#modals-slide-in').modal('hide');
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
                }
            });

        });

    </script>
{{--    delete One Row--}}
    <script type="text/javascript">
        function deleteRow(id) {
            // var idRow =document.getElementById("role_row_"+id)
            swal.fire({
                title: "{{__('Delete')}}",
                text: "{{__('Please confirm approval')}}",
                type: "error",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "{{__('Yes, delete!')}}",
                cancelButtonText: "{{__('No, cancel!')}}",
                cancelButtonClass: 'btn-success',
                confirmButtonClass: 'btn-danger',
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'delete',
                        url: "{{ url("brand/delete/")}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (response) {

                            if (response.status === true) {
                                swal.fire("Done!", response.msg, "success");
                                $('.datatables-basic').DataTable().ajax.reload();

                            } else {
                                swal.fire("Error!", response.msg, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
    </script>
{{--    change status--}}
    <script type="text/javascript">

        // ev.allowSubmit = true;
        function changeStatus(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });
            var x = document.getElementById("status-"+id).value;
            if (x == 1) {
                document.getElementById("status-"+id).value = 0
            }
            if (x == 0) {
                document.getElementById("status-"+id).value = 1
            }
            var status_new = document.getElementById("status-"+id).value;
            var token = $('meta[name="csrf-token"]').attr('content');
            // var idRow = document.getElementById("user_row_" + id)

            $.ajax({
                url: "{{ url("brand/status")}}" + '/' + id,
                type: "POST",
                data: {
                    status: status_new,
                    _token: token,

                },
                success: function (response) {
                    setTimeout(function () {
                        toastr['success'](
                            response.success,
                            {
                                closeButton: true,
                                tapToDismiss: false
                            }
                        );
                    }, 2000);

                    $('.datatables-basic').DataTable().ajax.reload();

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
        }
    </script>
{{--    delete All--}}
    <script>
        // $('.delete_all').on('click', function(e) {
        function deleteAll(id) {

            var allVals = [];
            $(".sub_chk:checked").each(function () {
                allVals.push($(this).val());
            });


            if (allVals.length <= 0) {
                swal.fire({
                    title: "{{__('No items selected?')}}",
                    text: "{{__('Please select items to complete the process')}}",
                    type: "warning",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonText: '{{__('Ok')}}',
                    cancelButtonText: '{{__('No, cancel!')}}',
                    reverseButtons: false
                });
            } else {

                swal.fire({
                    title: "{{__('Delete')}}",
                    text: "{{__('Please confirm approval')}}",
                    type: "error",
                    icon: 'warning',
                    showCancelButton: !0,
                    confirmButtonText: "{{__('Yes, delete!')}}",
                    cancelButtonText: "{{__('No, cancel!')}}",
                    cancelButtonClass: 'btn-success',
                    confirmButtonClass: 'btn-danger',
                    reverseButtons: !0
                }).then(function (event) {
                    if (event.value === true) {


                        var join_selected_values = allVals.join(",");

// console.log($(this).data('url'))
                        $.ajax({
                            url: "{{ route('brand.delete_all') }}",
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (response) {

                                if (response.status === true) {
                                    swal.fire("Done!", response.msg, "success");
                                    $('.datatables-basic').DataTable().ajax.reload();

                                } else {
                                    swal.fire("Error!", response.msg, "error");
                                }
                            }
                        });

                    } else {
                        event.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                })

            }
        }
        // });
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
