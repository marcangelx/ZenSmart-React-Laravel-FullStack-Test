<?php

namespace App\Http\Controllers;

use App\Models\ButtonClick;
use App\Models\TallyHistory;
use Carbon\Carbon;


class ButtonClickController extends Controller
{
    public function index()
    {
        // Get the current date
        $date = Carbon::now()->toDateString();
        $clicks = ButtonClick::where('date', $date)->first();

        // If there is no tally for the current date, create a new one with a value of 0
        if (!$clicks) {
            $clicks = new ButtonClick(['clicks' => 0, 'date' => Carbon::now()]);
        }
        return response()->json($clicks);
    }

    public function store()
    {
        $clicks = ButtonClick::latest()->first();
        if (!$clicks) {
            $clicks = new ButtonClick(['clicks' => 0, 'date' => Carbon::now()]);
        }

        $clicks->clicks++;
        $clicks->save();

        TallyHistory::create([
            'count' => $clicks->clicks,
            'tally_id' => $clicks->id,
            'created_at' => Carbon::now(),
        ]);

        return response()->json($clicks);
    }
}
