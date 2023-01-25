<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClickResource;
use App\Models\Click;
use App\Models\TallyHistory;
use Carbon\Carbon;


class ClickController extends Controller
{
    public function index()
    {
        // Get the current date
        $date = Carbon::now()->toDateString();
        $clicks = Click::where('date', $date)->latest()->first();

        // If there is no tally for the current date, create a new one with a value of 0
        if (!$clicks) {
            $clicks = new Click(['clicks' => 0, 'date' => Carbon::now()]);
        }
        return new ClickResource($clicks);
    }

    public function store()
    {
        $clicks = Click::latest()->first();
        if (!$clicks) {
            $clicks = new Click(['clicks' => 0, 'date' => Carbon::now()]);
        }

        $clicks->clicks++;
        $clicks->save();

        TallyHistory::create([
            'count' => $clicks->clicks,
            'tally_id' => $clicks->id,
            'created_at' => Carbon::now(),
        ]);

        return new ClickResource($clicks);
    }
}
