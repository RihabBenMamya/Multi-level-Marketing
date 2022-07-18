<?php

namespace App\Http\Controllers;

use App\Models\Advisors;
use App\Models\ConfigRankLevellings;
use App\Models\PersonalScore;
use App\Models\RankRevision;
use App\Models\TeamScore;
use Illuminate\Http\Request;

class RankRevisionController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.rankRevision.index', [
            'rankRevision' => RankRevision::class
        ]);
    }

    public function create()
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
        return redirect()->route('rankRevision.index')
            ->with('success', 'Upgrade successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *

     */
    public function update(Request $request, $id)
    {
        //
    }
}
