<?php

namespace App\Console\Commands;

use App\Mail\NotifyExpirationsMarket;
use App\Mail\SubscribedLozCart;
use App\Models\Admin\Card;
use App\Models\Admin\Market;
use App\Models\Admin\TraderPlan;
use App\Models\Admin\Transaction;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe;
class NotifyExpirations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email To Market when 7 Days to expirations Subscribe';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $markets=  Market::query()->whereHas('plan',function ( $query) {
//            $query->whereDate('end_date',  now()->subDays(-7)->setTime(0, 0, 0)->toDateTimeString());
//        })->get();
        $markets=  Market::query()->whereHas('plan',function ( $query) {
            $query->where(['end_date'=> Carbon::today()->toDateString(),'add2day'=>0]);
        })
            ->get();

        foreach ($markets as $market){
            $card=Card::query()->where('user_id',$market->id)->latest()->first();
            $trader_plan=TraderPlan::query()->where('trader_id',$market->id)->first();
            $email=$market->email;
            if ($card){
                $stripe = new \Stripe\StripeClient(
                    env('STRIPE_KEY')
                );

                $stripeToken=  $stripe->tokens->create([
                    'card' => [
                        'number' => $card->no,
                        'exp_month' => $card->month,
                        'exp_year' => $card->year,
                        'cvc' => $card->cvc,
                    ],
                ]);

                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                $result=Stripe\Charge::create ([
                    "amount" => $trader_plan->amount*100,
                    "currency" => 'USD',
                    "source" => $stripeToken->id,
                    "description" => "This payment is testing purpose of lozcart.com",
                ]);

                if ($result->status =='succeeded'){
                    $trader_plan->update([
                        'end_date'=>Carbon::today()->addMonths($trader_plan->time)->toDateString(),
                        'type'=>1,
                        'status'=>1,
                    ]);
                    Transaction::query()->create([
                        'user_id'=>$market->id,
                        'type_user'=>'Market',
                        'amount'=>$trader_plan->amount,
                        'type'=>1,
                    ]);
                    Mail::to($email)->send(new SubscribedLozCart($market));
                }
                else{
                    $trader_plan->update([
                        'end_date'=>Carbon::today()->addDays(2)->toDateString(),
                        'add2day'=>0
                    ]);
                    Mail::to($email)->send(new NotifyExpirationsMarket($market));
                }

            }
            else{
                $trader_plan->update([
                    'end_date'=>Carbon::today()->addDays(2)->toDateString(),
                    'add2day'=>1
                ]);
                Mail::to($email)->send(new NotifyExpirationsMarket($market));
            }

        }
    }
}
