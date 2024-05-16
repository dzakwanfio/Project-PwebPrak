<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Support\Facades\Validator;
use App\Models\Appointment;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.schedules.index', ['users' => User::all(), 'schedules' => Schedule::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.schedules.create', ['doctors' => Doctor::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'doctor_id' => 'required | exists:doctors,user_id',
            'title' => 'required | string',
            'start_time' => 'required',
            'date' => 'required | date',
            'nop' => 'required | integer',
        ]);

        Validator::make($request->all(), [
            'start_time' => 'required | date_format:H:i',

        ])->validate();

        Schedule::create($validatedData);

        return redirect()->route('schedules.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('pages.dashboard.schedules.booking', ['schedule' => Schedule::find($id)]);
    }

    public function add_book(Request $request)
    {
        $validatedData = $request->validate([
            'schedule_id' => 'required | exists:schedules,id',
            'user_id' => 'required | exists:users,id',
            'date' => 'required | date',
            'time' => 'required',
        ]);

        Appointment::create($validatedData);

        return redirect()->route('schedules.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari appointment berdasarkan ID
        $schedule = Schedule::findOrFail($id);

        // Hapus schedule
        $schedule->delete();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('schedules.index')->with('success', 'Appointment has been deleted successfully.');
    }
}
