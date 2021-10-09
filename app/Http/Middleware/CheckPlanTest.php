<?php

namespace App\Http\Middleware;

use App\Models\Admin\TraderPlan;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPlanTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $current_plan=TraderPlan::query()->where('trader_id',Auth::id())
        ->with('plan')->first();
        if($current_plan->plan_id==4){
            return redirect()->route('plan.index');
        }
        return $next($request);
    }
}
