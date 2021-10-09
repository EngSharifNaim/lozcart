<?php

namespace App\Http\Controllers;

use App\Models\Admin\Country;
use App\Models\Admin\CountryStore;
use App\Models\Admin\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders=Order::query()->where('trader_id',Auth::id())->with('order_address')->get();
        $orders_month=Order::query()->where('trader_id',Auth::id())->whereMonth('created_at',now())->with('order_address')->get();

//        return $orders;
        $orders_city=$orders_month->groupBy('order_address.city_id');
        $orders_country=$orders_month->groupBy('order_address.country_id');
//        return $orders_country;
        $orders_last_10=Order::query()->where('trader_id',Auth::id())->take('10')->get();
//        return $orders_last_10;
        $users=User::query()->where('trader_id',Auth::id())->whereMonth('created_at',now())->get();
        $orders_new=Order::query()->where(['trader_id'=>Auth::id(),'status'=>0])->get();
        $orders_new_month=Order::query()->where(['trader_id'=>Auth::id(),'status'=>0])->whereMonth('created_at',now())->get();
//        $orders_sale=Order::query()->where(['trader_id'=>Auth::id()])->whereNotIn('status',[5])
//            ->whereMonth('created_at',now())
//            ->get();
//        $price_end=[];
//        $cost_price=[];
//        foreach ($orders_sale as $item){
//            $price_end[]=$item->total_price *$item->currency_rate;
//            $cost_price[]=$item->total_cost_price *$item->currency_rate;
//        }
//        $net_price=array_sum($price_end)- array_sum($cost_price) -$orders_sale->sum('shipping_value');
//        return $net_price;
//return $orders_sale;
        $orders_sale=Order::query()->where(['trader_id'=>Auth::id()])->whereNotIn('status',[5])
            ->whereMonth('created_at',now())
            ->groupBy('country_id')
            ->selectRaw('*, sum(total_cost_price) as sum_cost_price , sum(total_price) as sum')
            ->get();
//        return $orders_sale;
        $main=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->with('country')->first();
        $price_end=[];
        $cost_price=[];
        foreach ($orders_sale as $item){
            $price=$item->sum;
            $cost=$item->sum_cost_price;
            $current_currency=Country::query()->where('id',$item->country_id)->first()->currency_short;
//            return $current_currency;
            $new_currency=$main->country->currency_short;
//                $price&to=$new_currency&from=$current_currency


            $price = ($price)?($price):(1);

            $apikey = 'd1ded944220ca6b0c442';

            $from_Currency = urlencode($current_currency);
            $to_Currency = urlencode($new_currency);
            $query =  "{$current_currency}_{$new_currency}";

            // change to the free URL if you're using the free version
            $json = file_get_contents("http://free.currencyconverterapi.com/api/v5/convert?q={$query}&compact=y&apiKey={$apikey}");

            $obj = json_decode($json, true);

            $val = $obj["$query"];

            $total = $val['val'] * 1;

            $formatValue = number_format($total, 2, '.', '');

            $price_end[] = $price * $formatValue;
            $cost_price[] = $cost * $formatValue;
        }
        $net_price=array_sum($price_end)- array_sum($cost_price) ;

        $orders_complete=Order::query()->where(['trader_id'=>Auth::id(),'status'=>4])->get();
        $orders_complete_month=Order::query()->where(['trader_id'=>Auth::id(),'status'=>4])->whereMonth('created_at',now())->get();
        $orders_canceled=Order::query()->where(['trader_id'=>Auth::id(),'status'=>5])->get();
        $canceled_month=Order::query()->where(['trader_id'=>Auth::id(),'status'=>5])->whereMonth('created_at',now())->get();
//        return$canceled_month;
        $country_store=CountryStore::query()->where(['trader_id'=>Auth::id(),'is_main'=>1])->with('country')->first();
        return view('dashboard.index',compact('orders','users',
            'orders_new','orders_complete','orders_canceled','orders_last_10','country_store',
            'orders_city','orders_country','orders_month','orders_sale','orders_new_month','orders_complete_month',
            'canceled_month','price_end','cost_price','net_price'));
    }
}
