<?php


namespace App\Http\View\Composers;



use App\Models\Admin\Client;
use App\Models\Admin\Order;
use App\Models\Admin\Market;
use App\Models\Admin\Payment;
use App\Models\Admin\Product;
use App\Models\Admin\ShippingChoice;
use App\Models\Admin\TraderPlan;
use App\Models\Site\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class MainData
{
    public function compose(View $view){
        if (Auth::user()){
            $view->with('market_now',Market::query()
                ->where(['type'=>'Admin','trader_id'=>Auth::user()->trader_id ])
                ->first()
            );
        }

        $view->with('current_plan',TraderPlan::query()->where('trader_id',Auth::id())
            ->with('plan')->first()
        );
        $view->with('payment',Payment::query()->where('trader_id',Auth::id())
            ->first()
        );
        $view->with('shipping',ShippingChoice::query()->where('trader_id',Auth::id())
            ->first()
        );
        $view->with('facebook',Setting::query()->where('key','facebook')
            ->select('value') ->first()
        );
        $view->with('twitter',Setting::query()->where('key','twitter')
            ->select('value') ->first()
        );
        $view->with('instagram',Setting::query()->where('key','instagram')
            ->select('value') ->first()
        );
        $view->with('email',Setting::query()->where('key','email')
            ->select('value') ->first()
        );
        $view->with('phone',Setting::query()->where('key','phone')
            ->select('value') ->first()
        );
        $view->with('address',Setting::query()->where('key','address')
            ->select('value') ->first()
        );
        $view->with('linkedin',Setting::query()->where('key','linkedin')
            ->select('value') ->first()
        );
        $view->with('youtube',Setting::query()->where('key','youtube')
            ->select('value') ->first()
        );
        $view->with('products',Product::query()->where('trader_id',Auth::id())
            ->first()
        );
        if(Auth::user()){
            $view->with('notifications',Auth::user()->unreadNotifications
        );
            $user_status=Auth::user()->status;
            if($user_status==2){
                $view->with('expire_user',1);
            }
            else{
                $view->with('expire_user',0);
            }
            $user_status=Auth::user()->status;
            if($user_status==2){
                $view->with('expire_user',1);
            }
            else{
                $view->with('expire_user',0);
            }
        }

    }
}
