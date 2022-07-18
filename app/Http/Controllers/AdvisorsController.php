<?php

namespace App\Http\Controllers;

use App\Models\Advisors;
use Illuminate\Http\Request;

class AdvisorsController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.advisors.index', [
            'advisor' => Advisors::class
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
