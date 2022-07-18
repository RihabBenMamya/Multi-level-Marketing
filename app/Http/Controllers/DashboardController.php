<?php

namespace App\Http\Controllers;

use App\Models\Advisors;
use App\Models\PersonalScore;
use App\Models\RankRevision;
use App\Models\ReferralBonuse;
use App\Models\TeamBonuse;
use App\Models\TeamScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->isAdvisor()) {

            $advisor = Advisors::where('login', Auth::user()->name)->value('id');
            $personalScore = PersonalScore::where('advisor_id',$advisor)->value('amount');
            $teamScore = TeamScore::where('advisor_id',$advisor)->value('amount');
            $teamBonuse = TeamBonuse::where('advisor_id',$advisor)->selectRaw("SUM(amount) as amount ")->value('amount');
            $referralBonuse = ReferralBonuse::where('advisor_id',$advisor)->selectRaw("SUM(amount) as amount ")->value('amount');
            $rankRevision = RankRevision::where('advisor_id',$advisor)->value('new_rank_id');

            return view('dashboard', [
                'personalScore' => $personalScore ?? 0,
                'teamScore' => $teamScore ?? 0,
                'teamBonuse' => $teamBonuse ?? 0,
                'referralBonuse' => $referralBonuse ?? 0,
                'rankRevision' => $rankRevision ?? 0,


            ]);
        } else {
            return view('dashboard');
        }
    }
}
