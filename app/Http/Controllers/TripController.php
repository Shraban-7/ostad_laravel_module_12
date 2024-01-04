<?php

namespace App\Http\Controllers;

use App\Models\SeatAllocation;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $from = $request->from;
        $to = $request->to;
        $date = $request->date;

        $tripsQuery = SeatAllocation::with('trip')->whereHas('trip', function ($query) use ($from, $to, $date) {
            if ($from) {
                $query->where('from', 'LIKE', '%' . $from . '%');
            }
            if ($to) {
                $query->where('to', 'LIKE', '%' . $to . '%');
            }
            if ($date) {
                $query->whereDate('date', $date);
            }
        });

        $trips = $tripsQuery->get();

        // $trips= Trip::all();

        // return $trips;

        return view('welcome', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function active(Request $request, SeatAllocation $seatAllocation)
    {
        // $request->status=1;
        $seatAllocation->update(['status'=>1]);

        // return $seatAllocation;

        return redirect()->route('home');
    }
    public function inactive(Request $request, SeatAllocation $seatAllocation)
    {
        $seatAllocation->update(['status'=>0]);


        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
