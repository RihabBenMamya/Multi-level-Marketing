<?php

namespace App\Http\Controllers;

use App\Models\ConfigTeamBonuse;
use Illuminate\Http\Request;

class ConfigTeamBonuseController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.configTeamBonuse.index', [
            'configTeamBonuse' => ConfigTeamBonuse::class
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
