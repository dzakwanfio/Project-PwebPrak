@if(Auth::user()->role == 'admin')
    <tr class="menu-row">
        <td class="menu-btn menu-icon-dashbord {{ Route::currentRouteName() == 'dashboard' ? 'menu-active menu-icon-dashbord-active' : '' }}">
            <a href="{{ route('dashboard') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'dashboard' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">Dashboard</p></div></a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-doctor {{ Route::currentRouteName() == 'doctors.index' ? 'menu-active menu-icon-doctor-active' : '' }}">
            <a href="{{ route('doctors.index') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'doctors.index' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">Doctors</p></div></a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-schedule {{ Route::currentRouteName() == 'schedules.index' ? 'menu-active menu-icon-schedule-active' : '' }}">
            <a href="{{ route('schedules.index') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'schedules.index' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">Schedule</p></div></a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-appoinment {{ Route::currentRouteName() == 'appointments.index' ? 'menu-active menu-icon-appoinment-active' : '' }}">
            <a href="{{ route('appointments.index') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'appointments.index' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">Appointment</p></div></a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-patient {{ Route::currentRouteName() == 'patients.index' ? 'menu-active menu-icon-patient-active' : '' }}">
            <a href="{{ route('patients.index') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'patients.index' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">Patients</p></div></a>
        </td>
    </tr>
@elseif (Auth::user()->role == 'patient')
    <tr class="menu-row">
        <td class="menu-btn menu-icon-home {{ Route::currentRouteName() == 'dashboard' ? 'menu-active menu-icon-home-active' : '' }}">
            <a href="{{ route('dashboard') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'dashboard' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">Home</p></div></a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-doctor {{ Route::currentRouteName() == 'doctors.index' ? 'menu-active menu-icon-doctor-active' : '' }}">
            <a href="{{ route('doctors.index') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'doctors.index' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">All Doctors</p></div></a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-session {{ Route::currentRouteName() == 'schedules.index' ? 'menu-active menu-icon-session-active' : '' }}">
            <a href="{{ route('schedules.index') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'schedules.index' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">Scheduled Sessions</p></div></a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-appoinment {{ Route::currentRouteName() == 'appointments.index' ? 'menu-active menu-icon-appoinment-active' : '' }}">
            <a href="{{ route('appointments.index') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'appointments.index' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">My Bookings</p></div></a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-settings {{ Route::currentRouteName() == 'settings.index' ? 'menu-active menu-icon-settings-active' : '' }}">
            <a href="{{ route('settings.index') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'settings.index' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">Settings</p></div></a>
        </td>
    </tr>
@elseif (Auth::user()->role == 'doctor')
    <tr class="menu-row">
        <td class="menu-btn menu-icon-dashbord {{ Route::currentRouteName() == 'dashboard' ? 'menu-active menu-icon-dashbord-active' : '' }}">
            <a href="{{ route('dashboard') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'dashboard' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">Dashboard</p></div></a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-appoinment {{ Route::currentRouteName() == 'appointments.index' ? 'menu-active menu-icon-appoinment-active' : '' }}">
            <a href="{{ route('appointments.index') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'appointments.index' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">My Appointments</p></div></a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-session {{ Route::currentRouteName() == 'schedules.index' ? 'menu-active menu-icon-session-active' : '' }}">
            <a href="{{ route('schedules.index') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'schedules.index' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">My Sessions</p></div></a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-patient {{ Route::currentRouteName() == 'patients.index' ? 'menu-active menu-icon-patient-active' : '' }}">
            <a href="{{ route('patients.index') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'patients.index' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">My Patients</p></div></a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-settings {{ Route::currentRouteName() == 'settings.index' ? 'menu-active menu-icon-settings-active' : '' }}">
            <a href="{{ route('settings.index') }}" class="non-style-link-menu {{ Route::currentRouteName() == 'settings.index' ? 'non-style-link-menu-active' : '' }}"><div><p class="menu-text">Settings</p></div></a>
        </td>
    </tr>
@endif
