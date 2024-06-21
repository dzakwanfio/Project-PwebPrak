<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'doctor') {
            $appointments = Appointment::whereHas('schedules', function ($query) {
                $query->where('doctor_id', Auth::user()->id);
            })->get();
            return view('pages.dashboard.appointments.index', ['users' => User::all(), 'appointments' => $appointments, 'schedules' => Schedule::all(), 'doctor' => Auth::user()->doctor]);
        } else {
            return view('pages.dashboard.appointments.index', ['users' => User::all(), 'appointments' => Appointment::all(), 'schedules' => Schedule::all()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.appointments.create');
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
    public function show(string $id)
    {
        //
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
        $appointment = Appointment::findOrFail($id);

        // Hapus appointment
        $appointment->delete();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('appointments.index')->with('success', 'Appointment has been deleted successfully.');
    }

    public function add_booking(Request $request)
    {
        $validatedData = $request->validate([
            'schedule_id' => 'required | exists:schedules,id',
            'patient_id' => 'required | exists:patients,user_id',
            'number' => 'required',
            'date' => 'required',
        ]);

        Appointment::create($validatedData);

        return redirect()->route('appointments.index');
    }
}
