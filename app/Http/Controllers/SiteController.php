<?php

namespace App\Http\Controllers;

use App\Models\Site\AdditionalFeature;
use App\Models\Site\FeaturePage;
use App\Models\Site\MainPage;
use Illuminate\Http\Request;
use App\Models\Admin\Market;
use App\Models\Admin\Order;
use App\Models\Admin\Faq;
use App\Models\Admin\Feature;
use App\Models\Admin\Plan;

class SiteController extends Controller
{
    public function main()
    {
    	$matajers=Market::get()->count();
    	$all_orders=Order::get()->count();
    	$complete_orders=Order::where('status',3)->get()->count();
        $first_plan=Plan::query()->where('id',1)->with('services')->first();
        $second_plan=Plan::query()->where('id',2)->with('services')->first();
        $third_plan=Plan::query()->where('id',3)->with('services')->first();
        $features=Feature::query()->with('feature_plan')->get();
        $faqs=Faq::query()->where('plan_show',1)->get();
        $sliders=Market::all();
        $main_page=MainPage::query()->first();
        return view('site.welcome',compact('matajers','all_orders','complete_orders',
            'first_plan','second_plan','third_plan','features','faqs','sliders'
            ,'main_page'
        ));
    }
    public function management()
    {
        $feature_page=FeaturePage::query()->first();
        $additional_features=AdditionalFeature::all();
        return view('site.management',compact('feature_page','additional_features'));
    }
    public function partners()
    {
        return view('site.partners');
    }
    public function faqs()
    {
        $faqs=Faq::query()->get();

        return view('site.faqs',compact('faqs'));
    }
    public function terms()
    {
        return view('site.terms');
    }
    public function marketing()
    {
        return view('site.marketing');
    }
    public function privacy()
    {
        return view('site.privacy');
    }
    public function pricing()
    {
        $first_plan=Plan::query()->where('id',1)->with('services')->first();
        $second_plan=Plan::query()->where('id',2)->with('services')->first();
        $third_plan=Plan::query()->where('id',3)->with('services')->first();
        $features=Feature::query()->with('feature_plan')->get();
        $faqs=Faq::query()->where('plan_show',1)->get();
        return view('site.pricing',compact('first_plan','second_plan',
            'third_plan','features','faqs'));
    }
    public function payments_page()
    {
        return view('site.payments');
    }
    public function shipping_page()
    {
        return view('site.shipping');
    }
    public function partners_services()
    {
        return view('site.partners_services');
    }
}
