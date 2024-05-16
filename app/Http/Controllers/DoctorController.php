<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.doctors.index', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.dashboard.doctors.create', ['specialities' => Speciality::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string| confirmed',
            'phone' => 'required',
            'address' => 'required|string',
            'date_of_birth' => 'required|date',
            'speciality_id' => 'required|exists:specialities,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'role' => 'doctor',
        ]);

        Doctor::create([
            'user_id' => User::latest()->first()->id,
            'speciality_id' => $request->speciality_id,
        ]);


        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        return view('pages.dashboard.doctors.show', ['user' => User::find($user_id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user_id)
    {
        return view('pages.dashboard.doctors.edit', ['user' => User::find($user_id), 'specialities' => Speciality::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string',
            'date_of_birth' => 'required|date',
            'speciality_id' => 'required|exists:specialities,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($user_id);
        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
        ]);

        // Assuming the relationship between User and Doctor is correctly set up
        $doctor = $user->doctor;
        $doctor->where('user_id', $user_id)->update([
            'speciality_id' => $request->speciality_id,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $user_id)
    {
        //menghapus data doctor dari table doctors
        $doctor = Doctor::where('user_id', $user_id);
        $doctor->delete();
        $user = User::findOrFail($user_id);
        $user->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}
