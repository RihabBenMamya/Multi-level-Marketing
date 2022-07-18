<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\ReferralBonuse;
use Illuminate\Console\Command;
use App\Models\ConfigReferralBonuse;

class MonthlyReferralBonuse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'month:ReferralBonuse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Monthly advisor referral bonuse';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ReferralBonuse::truncate();
        $month = date('m', strtotime(Order::orderBy('paid_at', 'DESC')->limit(1)->value('paid_at')));
        $order = Order::whereMonth('paid_at', $month)->where('paid', 1)->where('fo', 1)->where('parent_id','>=',1)->orderBy('parent_id')->get();

        foreach ($order as $order) {
            $bonus_percentage = ConfigReferralBonuse::where('parent_rank_id', $order->parent_rank_id)->value('bonus_percentage');
            $amount = $bonus_percentage * $order->total_value / 100;

            ReferralBonuse::create([
                'advisor_id' => $order->parent_id,
                'order_id' => $order->id,
                'amount' => $amount,

            ]);
        }
    }
}
