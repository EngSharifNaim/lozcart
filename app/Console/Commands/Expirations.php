<?php

namespace App\Console\Commands;

use App\Mail\NotifyExpirationsMarket;
use App\Mail\SubscritionEndLozCart;
use App\Models\Admin\Market;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Expirations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire users every day';

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
      $markets=  Market::query()->whereHas('plan',function ( $query) {
          $query->where(['end_date'=> Carbon::today()->toDateString(),'add2day'=>1]);
        })->get();
        foreach ($markets as $market){
            $market->update(['status'=>2]);
            $email=$market->email;
            Mail::to($email)->send(new SubscritionEndLozCart($market));
        }

    }
}
