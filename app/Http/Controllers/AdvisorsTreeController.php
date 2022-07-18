<?php

namespace App\Http\Controllers;

use App\Models\AdvisorsTree;
use Illuminate\Http\Request;

class AdvisorsTreeController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.advisorsTree.index', [
            'advisorsTree' => AdvisorsTree::class
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
