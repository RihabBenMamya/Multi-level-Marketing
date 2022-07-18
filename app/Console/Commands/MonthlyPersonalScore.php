<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Advisors;
use App\Models\PersonalScore;
use Illuminate\Console\Command;

class MonthlyPersonalScore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'month:PersonalScore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update monthly all advisor score ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        PersonalScore::truncate();
        $month = date('m', strtotime(Order::orderBy('paid_at', 'DESC')->limit(1)->value('paid_at')));
        $advisors = Advisors::all();

        foreach ($advisors as $advisor) {

            $amount = Order::whereMonth('paid_at', $month)->where('advisor_id', $advisor->id)->Where('paid', 1)->selectRaw("SUM(total_value) as CP ")->value('CP');
            if ($amount != null) {

                PersonalScore::create([
                    'advisor_id' => $advisor->id,
                    'amount' => $amount,

                ]);
            }
        }
    }
}
