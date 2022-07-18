<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.order.index', [
            'order' => Order::class
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
