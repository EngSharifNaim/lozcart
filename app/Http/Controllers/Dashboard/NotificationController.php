<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function show($order_id,$notify_id){
        $order=Order::query()->where('id',$order_id)
            ->with(['user','market','order_address','payment','use_coupon','shipping','currency'])->first();
        $market=Auth::user();
       $notification= $market->notifications()->findOrFail($notify_id);
       $notification->markAsRead();
        return view('dashboard.orders.show',compact('order'));
    }
    public function read_all(){
        $market=Auth::user();
        $notifications= Auth::user()->unreadNotifications()->get();
//        return $notifications;
        $notifications->markAsRead();
        return redirect()->back();
    }
}
