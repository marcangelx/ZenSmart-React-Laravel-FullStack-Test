<?php

namespace App\Http\Controllers;

use App\Models\ButtonClick;
use Carbon\Carbon;


class ButtonClickController extends Controller
{
    public function index()
    {
        $date = Carbon::today();
        $clicks = ButtonClick::whereDate('date', $date)->first();
        return response()->json($clicks);
    }

    public function store()
    {
        $date = Carbon::today();
        $clicks = ButtonClick::firstOrCreate(['date' => $date]);
        $clicks->clicks += 1;
        $clicks->save();
        return response()->json($clicks);
    }
}
