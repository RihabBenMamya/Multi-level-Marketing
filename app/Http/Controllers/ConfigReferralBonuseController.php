<?php

namespace App\Http\Controllers;

use App\Models\ConfigReferralBonuse;
use Illuminate\Http\Request;

class ConfigReferralBonuseController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.configReferralBonuse.index', [
            'configReferralBonuse' => ConfigReferralBonuse::class
        ]);

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
