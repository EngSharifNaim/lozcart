
@foreach($rates as $item)
<div class="cutomRateCardItem" id="item-{{$item->id}}">
    <div class="ns-card shadow">
        <div class="row">
            <div class="col-sm-4">
                <div class="rateCardTitle col-form-label">{{__('Client')}}</div>
                <div>
                    <a target="_blank" href="{{route('user.edit',$item->user_id)}}">
                        <span class="fa fa-user"></span>
                        {{$item->user->name}}
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row no-gutters">
                    @if ($item->type ==1)
                    <div class="col-sm-2">
                        <div class="rateImageP">

                            <img src="{{asset('uploads/products').'/'.$item->product->cover_image}}" alt="">
                        </div>
                    </div>

                        <div class="col-sm-8 col-8">
                            <div class="rateCardTitle col-form-label">
                                {{__('Product')}}
                            </div>
                            <div>
                                <a target="_blank" href="{{route('product.edit',$item->product_id)}}">
                                    @if(App::isLocale('en'))
                                        {{$item->product->name}}
                                    @else
                                        {{$item->product->name_ar}}
                                    @endif
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="col-sm-2 col-4">
                        <div class="rateCardTitle col-form-label">{{__('Status')}}</div>
                        <div>
                            <span id="status-{{$item->id}}">
                                @if($item->status ==0)
                                     {{__('Not Active')}}
                                @endif
                                @if($item->status ==1)
                                    {{__('Active')}}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ns-card space-outer-bottom-md">
        <div class="row">
            <div class="col-md-5">
                <div class="rateCardTitle col-form-label">{{__('Comment')}}</div>
                <p>{{$item->comment}}</p>
            </div>
            <!--
<div class="col-md-6">
   <div class="rateCardTitle col-form-label">الصور</div>
    <div>
                                                </div>
            </div>
-->
{{--            <div class="col-sm-3">--}}
{{--                <div class="rateCardTitle col-form-label">التقييم</div>--}}
{{--                <div>--}}
{{--                    <span class="fa fa-star" style="color:orangered"></span>--}}
{{--                    <span class="fa fa-star" style="color:orangered"></span>--}}
{{--                    <span class="fa fa-star" style="color:orangered"></span>--}}
{{--                    <span class="fa fa-star" style="color:orangered"></span>--}}
{{--                    <span class="fa fa-star" style="color:orangered"></span> --}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Rating')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="read-only-ratings-{{$item->id}}" data-rateyo-read-only="true"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="RateCardBtns mob-t-1">
            <button class="btn btn-success waves-effect waves-light activate" data-id="{{$item->id}}">{{__('Publishing')}}</button>
            <button class="btn btn-warning waves-effect waves-light deactivate" data-id="{{$item->id}}">{{__('Not publishing')}}</button>
            <button class="btn btn-danger waves-effect waves-light deleteBtn" data-id="{{$item->id}}">{{__('Delete')}}</button>
        </div>
    </div>
    <div class="RateCardLabel">
    @if ($item->type ==1)
        <i class="dripicons-shopping-bag"></i>
        {{__('Products Rate')}}
    @endif
        @if ($item->type ==0)
            <i class="dripicons-store mr-1"></i>
            {{__('Store Rate')}}
        @endif
    </div>

</div>
<script>
    $(function () {
        'use strict';

        var isRtl = $('html').attr('data-textdirection') === 'rtl',

            readOnlyRatings = $('.read-only-ratings-{{$item->id}}');




        // Read Only Ratings
        // --------------------------------------------------------------------
        if (readOnlyRatings.length) {
            readOnlyRatings.rateYo({
                rating: {{$item->rate}},
                rtl: isRtl
            });
        }

    });
</script>
@endforeach

<!-- Success Pagination starts -->
<div class="col-md-6 col-sm-12 mr-auto ml-auto">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-success mt-2">
{{--            {!! $rates->links() !!}--}}
            {{ $rates->links() }}
        </ul>
    </nav>
</div>

<!-- Success Pagination ends -->


