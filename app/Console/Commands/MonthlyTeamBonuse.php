<?php

namespace App\Console\Commands;

use App\Models\Advisors;
use App\Models\TeamScore;
use App\Models\TeamBonuse;
use App\Models\AdvisorsTree;
use Illuminate\Console\Command;
use App\Models\ConfigTeamBonuse;
use App\Models\ConfigRankLevellings;

class MonthlyTeamBonuse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'month:TeamBonuse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Monthly all team Bonuse';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        TeamBonuse::truncate();
        $advisors = Advisors::all();

        foreach ($advisors as $advisor) {

            $advisorRankId = Advisors::where('id', $advisor->id)->value('rank_id');
            $advisorCE = TeamScore::where('advisor_id', $advisor->id)->value('amount');
            $minCE = ConfigRankLevellings::where('rank_id', $advisorRankId)->value('amount');

            if ($advisorCE >= $minCE) {

                $child = AdvisorsTree::all()->where('advisor_id', $advisor->id)->where('direct', 1);

                foreach ($child as $child) {

                    $childRankId = Advisors::where('id', $child->child_id)->value('rank_id');
                    $bonus_percentage = ConfigTeamBonuse::where('parent_rank_id', $advisorRankId)->where('advisor_rank_id', $childRankId)->value('bonus_percentage');
                    $childCE = TeamScore::where('advisor_id', $child->child_id)->value('amount');

                    if (($advisorRankId > $childRankId) && isset($childCE)) {
                        $amount = $childCE * $bonus_percentage / 100 ;
                    } else {
                        $amount = 0;
                    }

                    TeamBonuse::create([
                        'advisor_id' => $advisor->id,
                        'advisor_rank_id' => $advisorRankId,
                        'child_id' => $child->child_id,
                        'child_rank_id' => $childRankId,
                        'amount' => $amount
                    ]);
                }
            }
        }
    }
}
