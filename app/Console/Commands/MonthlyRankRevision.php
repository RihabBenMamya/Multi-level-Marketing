<?php

namespace App\Console\Commands;

use App\Models\Advisors;
use App\Models\TeamScore;
use App\Models\RankRevision;
use App\Models\PersonalScore;
use Illuminate\Console\Command;
use App\Models\ConfigRankLevellings;

class MonthlyRankRevision extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'month:RankRevision';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Monthly advisor rank revision';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        RankRevision::truncate();

        $advisors = Advisors::all();

        foreach ($advisors as $advisor) {
            $amount = ConfigRankLevellings::where('rank_id',$advisor->rank_id)->value('amount');
            if (PersonalScore::where('advisor_id', $advisor->id)->value('amount') >= 200) {
                $CE = TeamScore::where('advisor_id', $advisor->id)->value('amount');
                $newRankId = ConfigRankLevellings::where('amount', '<=', $CE)->orderBy('amount','DESC')->limit(1)->value('rank_id');
                $amount = ConfigRankLevellings::where('rank_id',$newRankId)->value('amount');
            } else {
                $newRankId = $advisor->rank_id;
            }

            RankRevision::create([
                'advisor_id' => $advisor->id,
                'old_rank_id' => $advisor->rank_id,
                'new_rank_id' => $newRankId,
                'amount' => $amount,

            ]);
        }
    }
}
