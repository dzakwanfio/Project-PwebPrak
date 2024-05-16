<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <link rel="stylesheet" href="{{ asset('assets/css/animations.css') }}">  
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">  
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <style>
        .popup {
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table {
            animation: transitionIn-Y-bottom 0.5s;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                @include('pages.dashboard.components.header')
                @include('pages.dashboard.components.sidebar')
            </table>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style="border-spacing: 0; margin-top: 25px;">
                <tr>
                    <td width="13%">
                        <a href="{{ route('schedules.index') }}">
                            <button class="login-btn btn-primary-soft btn btn-icon-back" style="width: 125px;">
                                <font class="tn-in-text">Back</font>
                            </button>
                        </a>
                    </td>
                    <td>
                        <!-- Uncomment form if needed -->
                        {{-- 
                        <form action="" method="GET" class="header-search">
                            @csrf
                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Doctor name or Email" list="doctors">
                            <datalist id="doctors">
                                @foreach($users->where('role', 'doctor') as $user)
                                    <option value="{{ $user->fname . ' ' . $user->lname }}">
                                    <option value="{{ $user->email }}">
                                @endforeach
                            </datalist>
                            <input type="submit" value="Search" class="login-btn btn-primary btn" style="padding: 10px;">
                        </form> 
                        --}}
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px; color: #777; text-align: right;">Today's Date</p>
                        <p class="heading-sub12">{{ date('Y-m-d') }}</p>
                    </td>
                    <td width="10%">
                        <button class="btn-label">
                            <img src="{{ asset('assets/images/calendar.svg') }}" width="100%">
                        </button>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top: 10px;"></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <center>
                            <div class="abc scroll">
                                <table width="100%" class="sub-table scrolldown" border="0" style="padding: 50px; border: none;">
                                    <tbody>
                                        <form action="{{ route('appointments.book', ['schedule' => $schedule->id]) }}" method="POST">
                                            @csrf
                                            @php
                                            $latestAppointment = \App\Models\Appointment::where('schedule_id', $schedule->id)->latest()->first();
                                            @endphp
                                            @if ($errors->any)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                
                                            @endif
                                            <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                                            <input type="hidden" name="patient_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="date" value="{{ \Carbon\Carbon::now() }}">
                                            <input type="hidden" name="number" value="{{ $latestAppointment ? $latestAppointment->id + 1 : 1 }}">
                                            <tr>
                                                <td style="width: 50%;" rowspan="2">
                                                    <div class="dashboard-items search-items">
                                                        <div style="width: 100%;">
                                                            <div class="h1-search" style="font-size: 25px;">Session Details</div>
                                                            <br><br>
                                                            <div class="h3-search" style="font-size: 18px; line-height: 30px;">
                                                                Doctor name: <b>{{ $schedule->doctor->user->fname . ' ' . $schedule->doctor->user->lname }}</b><br>
                                                                Doctor Email: <b>{{ $schedule->doctor->user->email }}</b> 
                                                            </div>
                                                            <br>
                                                            <div class="h3-search" style="font-size: 18px;">
                                                                Session Title: {{ $schedule->title }}<br>
                                                                Session Scheduled Date: {{ $schedule->date }}<br>
                                                                Session Starts: {{ $schedule->start_time }}<br>
                                                                Channeling fee: <b>LKR. 2,000.00</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @if (Auth::user()->role == 'patient')
                                                <td style="width: 25%;">
                                                    <div class="dashboard-items search-items">
                                                        <div style="width: 100%; padding-top: 15px; padding-bottom: 15px;">
                                                            <div class="h1-search" style="font-size: 20px; line-height: 35px; margin-left: 8px; text-align: center;">
                                                                Your Appointment Number: 
                                                                @if($latestAppointment)
                                                                {{ $latestAppointment->id + 1 }}
                                                                <div class="dashboard-icons" style="margin-left: 0px; width: 90%; font-size: 70px; font-weight: 800; text-align: center; color: var(--btnnictext); background-color: var(--btnice);">{{ $latestAppointment->id + 1 }}</div>
                                                                @else
                                                                1
                                                                <div class="dashboard-icons" style="margin-left: 0px; width: 90%; font-size: 70px; font-weight: 800; text-align: center; color: var(--btnnictext); background-color: var(--btnice);">1</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="submit" class="login-btn btn-primary btn btn-book" style="margin-left: 10px; padding: 10px; width: 95%; text-align: center;" value="Book now" name="booknow">
                                                </td>
                                            </tr>
                                                @endunless
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </td> 
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
