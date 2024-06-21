<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Models\User;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SettingController;
use App\Models\Schedule;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/kulitkelamin', 'kulitkelamin')->name('kulitkelamin');
    Route::get('/penyakitdalam', 'penyakitdalam')->name('penyakitdalam');
    Route::get('/tht_specialist', 'tht_specialist')->name('tht_specialist');
    Route::get('/eye_specialist', 'eye_specialist')->name('eye_specialist');
});

// Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

Route::controller(ServicesController::class)->prefix('services')->group(function () {
    Route::get('/', 'index')->name('services');
    Route::get('/kulitkelamin', 'kulitkelamin')->name('kulitkelamin');
    Route::get('/penyakitdalam', 'penyakitdalam')->name('penyakitdalam');
    Route::get('/tht_specialist', 'tht_specialist')->name('tht_specialist');
    Route::get('/eye_specialist', 'eye_specialist')->name('eye_specialist');
});
Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->role == 'doctor') {
        $doctor = $user->doctor; // Asumsi relasi satu ke satu antara User dan Doctor
        $schedules = $doctor->schedules; // Mengambil semua jadwal dokter
        $totalAppointmentsToday = 0;

        foreach ($schedules as $schedule) {
            $totalAppointmentsToday += $schedule->appointments->where('date', Carbon::today()->toDateString())->count();
        }
        return view('pages.dashboard.index', [
            'users' => User::all(),
            'appointments' => Appointment::all(),
            'schedules' => Schedule::all(),
            'totalAppointmentsToday' => $totalAppointmentsToday
        ]);
    } else {
        return view('pages.dashboard.index', [
            'users' => User::all(),
            'appointments' => Appointment::all(),
            'schedules' => Schedule::all(),
        ]);
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::resource('appointments', AppointmentController::class);
    Route::post('doctors/{id}', [DoctorController::class, 'delete'])->name('doctors.delete');
    Route::resource('doctors', DoctorController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('patients', PatientController::class);
    Route::delete('settings/{id}', [SettingController::class, 'delete'])->name('settings.delete');
    Route::resource('settings', SettingController::class);
    Route::post('schedule/{schedule}/book', [AppointmentController::class, 'add_booking'])->name('appointments.book');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
