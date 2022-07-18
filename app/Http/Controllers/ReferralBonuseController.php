<?php

namespace App\Http\Controllers;

use App\Models\ConfigReferralBonuse;
use App\Models\Order;
use App\Models\ReferralBonuse;
use Illuminate\Http\Request;

class ReferralBonuseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.referralBonuse.index', [
            'referralBonuse' => ReferralBonuse::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        return redirect()->route('referralBonuse.index')
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
     * @param  \App\Models\ReferralBonuse  $referralBonuse
     * @return \Illuminate\Http\Response
     */
    public function show(ReferralBonuse $referralBonuse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReferralBonuse  $referralBonuse
     * @return \Illuminate\Http\Response
     */
    public function edit(ReferralBonuse $referralBonuse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReferralBonuse  $referralBonuse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReferralBonuse $referralBonuse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReferralBonuse  $referralBonuse
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReferralBonuse $referralBonuse)
    {
        //
    }
}
