<?php

namespace App\Http\Controllers;

use App\Models\ConfigRankLevellings;
use Illuminate\Http\Request;

class ConfigRankLevellingsController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.configRankLevellings.index', [
            'configRankLevellings' => ConfigRankLevellings::class
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
