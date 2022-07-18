<?php

namespace App\Http\Controllers;

use App\Models\Advisors;
use App\Models\ConfigRankLevellings;
use App\Models\Order;
use App\Models\PersonalScore;
use Illuminate\Http\Request;

class PersonalScoreController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.personalScore.index', [
            'personalScore' => PersonalScore::class
        ]);
    }

    public function create()
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
        return redirect()->route('personalScore.index')
            ->with('success', 'Calculate successfully');
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
