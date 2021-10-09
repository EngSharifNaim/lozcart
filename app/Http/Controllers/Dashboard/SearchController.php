<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Country;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request){
//        return $request->all();
        if ($request->reference =='product'){
            $keyword=$request->topBarQ;
            return view('dashboard.search.products',compact('keyword'));
        }
        if ($request->reference =='client'){
            $keyword=$request->topBarQ;
            $countries=Country::all();
            return view('dashboard.search.clients',compact('countries','keyword'));
        }
        if ($request->reference =='order'){
            $keyword=$request->topBarQ;
            $orders=Order::query()->where('trader_id',Auth::id());
            return view('dashboard.search.orders',compact('orders','keyword'));
        }
    }
}
