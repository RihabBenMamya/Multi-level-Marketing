<?php

namespace App\Http\Controllers;

use App\Models\Advisors;
use App\Models\AdvisorsTree;
use App\Models\PersonalScore;
use App\Models\TeamScore;
use Illuminate\Http\Request;

class TeamScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.teamScore.index', [
            'teamScore' => TeamScore::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        return redirect()->route('teamScore.index')
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
     * @param  \App\Models\TeamScore  $teamScore
     * @return \Illuminate\Http\Response
     */
    public function show(TeamScore $teamScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamScore  $teamScore
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamScore $teamScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamScore  $teamScore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamScore $teamScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamScore  $teamScore
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamScore $teamScore)
    {
        //
    }
}
