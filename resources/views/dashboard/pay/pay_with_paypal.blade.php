@extends('dashboard.layouts.app')
@section('style')
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
                            <h2 class="content-header-title float-left mb-0">{{__('Manage Subscriptions')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Manage Subscriptions')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->

                <!--/ Basic table -->

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default" style="margin-top: 60px;">

                            @if ($message = Session::get('success'))
                                <div class="custom-alerts alert alert-success fade in">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                    {!! $message !!}
                                </div>
                                <?php Session::forget('success');?>
                            @endif

                            @if ($message = Session::get('error'))
                                <div class="custom-alerts alert alert-danger fade in">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                    {!! $message !!}
                                </div>
                                <?php Session::forget('error');?>
                            @endif
                            <div class="panel-heading"><b>Paywith Paypal</b></div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal.paypal') !!}" >
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                        <label for="amount" class="col-md-4 control-label">Enter Amount</label>

                                        <div class="col-md-6">
                                            <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>

                                            @if ($errors->has('amount'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Paywith Paypal
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('Scripts')

@endsection
