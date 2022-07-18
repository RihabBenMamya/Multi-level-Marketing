<?php

namespace App\Http\Controllers;

use App\Models\Advisors;
use App\Models\TeamScore;
use App\Models\TeamBonuse;
use App\Models\AdvisorsTree;
use App\Models\ConfigRankLevellings;
use App\Models\ConfigTeamBonuse;
use Illuminate\Http\Request;

class TeamBonuseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.teamBonuse.index', [
            'teamBonuse' => TeamBonuse::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        return redirect()->route('teamBonuse.index')
        ->with('success', 'Calculate successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamBonuse  $teamBonuse
     * @return \Illuminate\Http\Response
     */
    public function show(TeamBonuse $teamBonuse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamBonuse  $teamBonuse
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamBonuse $teamBonuse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamBonuse  $teamBonuse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamBonuse $teamBonuse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamBonuse  $teamBonuse
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamBonuse $teamBonuse)
    {
        //
    }
}
