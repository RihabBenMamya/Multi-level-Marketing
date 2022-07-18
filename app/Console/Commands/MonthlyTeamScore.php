<?php

namespace App\Console\Commands;

use App\Models\Advisors;
use App\Models\TeamScore;
use App\Models\AdvisorsTree;
use App\Models\PersonalScore;
use Illuminate\Console\Command;

class MonthlyTeamScore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'month:TeamScore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update monthly all team Score ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        TeamScore::truncate();
        $advisors = Advisors::all();

        foreach ($advisors as $advisor) {

            $child = AdvisorsTree::where('advisor_id', $advisor->id)->pluck('child_id');
            $amount = PersonalScore::all()->whereIn('advisor_id', $child)->sum('amount') + PersonalScore::where('advisor_id', $advisor->id)->value('amount');

            if ($amount != null) {

                TeamScore::create([
                    'advisor_id' => $advisor->id,
                    'amount' => $amount,

                ]);
            }
        }
    }
}
