<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/animations.css') }}">  
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">  
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <title>Schedule</title>
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
            <table border="0" width="100%" style="border-spacing: 0; margin: 0; padding: 0; margin-top: 25px;">
                <tr>
                    <td width="13%">
                        <a href="{{ route('schedules.index') }}">
                            <button class="login-btn btn-primary-soft btn btn-icon-back" style="padding-top: 11px; padding-bottom: 11px; margin-left: 20px; width: 125px;">
                                <font class="tn-in-text">Back</font>
                            </button>
                        </a>
                    </td>
                    @unless (Auth::user()->role == 'patient')
                    <td>
                        <p style="font-size: 23px; padding-left: 12px; font-weight: 600;">Schedule Manager</p>
                    </td>
                    @endunless
                    @if (Auth::user()->role == 'patient')
                    <td>
                        <form action="" method="post" class="header-search">
                            @csrf
                            @if(request()->query('search'))
                                <input type="search" name="search" class="input-text header-searchbar" value="{{ request()->query('search') }}" placeholder="Search Doctor name or Email" list="doctors">&nbsp;&nbsp;
                            @else
                                <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Doctor name or Email" list="doctors">&nbsp;&nbsp;
                            @endif
                            <datalist id="doctors">
                                @foreach($users->where('role', 'doctor') as $user)
                                    <option value="{{ $user->fname . ' ' . $user->lname }}"></option>
                                @endforeach
                            </datalist>
                            <input type="submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 10px;">
                        </form>
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px; color: rgb(119, 119, 119); padding: 0; margin: 0; text-align: right;">Today's Date</p>
                        <p class="heading-sub12" style="padding: 0; margin: 0;">{{ date('Y-m-d') }}</p>
                    </td>
                    <td width="10%">
                        <button class="btn-label" style="display: flex; justify-content: center; align-items: center;">
                            <img src="{{ asset('assets/images/calendar.svg') }}" width="100%">
                        </button>
                    </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding-top: 10px; width: 100%;">
                            <p class="heading-main12" style="margin-left: 45px; font-size: 18px; color: rgb(49, 49, 49);">All Sessions ({{ $schedules->count() }})</p>
                        </td>
                    </tr>
                    @endif
                    @unless (Auth::user()->role == 'patient')
                    @if (Auth::user()->role == 'admin')
                    <tr>
                        <td colspan="4">
                            <div style="display: flex; margin-top: 40px;">
                                <div class="heading-main12" style="margin-left: 45px; font-size: 20px; color: rgb(49, 49, 49); margin-top: 5px;">Schedule a Session</div>
                                <a href="{{ route('schedules.create') }}" class="non-style-link">
                                    <button class="login-btn btn-primary btn button-icon" style="margin-left: 25px; background-image: url('{{ asset('assets/images/icons/add.svg') }}');">Add a Session</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="4" style="padding-top: 10px; width: 100%;">
                            <p class="heading-main12" style="margin-left: 45px; font-size: 18px; color: rgb(49, 49, 49);">All Sessions ({{ $schedules->count() }})</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding-top: 0px; width: 100%;">
                            <center>
                                <table class="filter-container" border="0">
                                    <tr>
                                        <td width="10%"></td>
                                        <td width="5%" style="text-align: center;">Date:</td>
                                        <td width="30%">
                                            <form action="" method="post">
                                                @csrf
                                                <input type="date" name="sheduledate" id="date" class="input-text filter-container-items" style="margin: 0; width: 95%;">
                                        </td>
                                        <td width="12%">
                                            <input type="submit" name="filter" value="Filter" class="btn-primary-soft btn button-icon btn-filter" style="padding: 15px; margin: 0; width: 100%">
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </td>
                    </tr>
                    @endunless
                    @unless (Auth::user()->role == 'patient')
                    <tr>
                        <td colspan="4">
                            <center>
                                <div class="abc scroll">
                                    <table width="93%" class="sub-table scrolldown" border="0">
                                        <thead>
                                            <tr>
                                                <th class="table-headin">Session Title</th>
                                                @if (Auth::user()->role == 'admin')
                                                <th class="table-headin">Doctor</th>
                                                @endif
                                                <th class="table-headin">Scheduled Date & Time</th>
                                                <th class="table-headin">Max num that can be booked</th>
                                                <th class="table-headin">Events</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($schedules->count() == 0)
                                            <tr>
                                                <td colspan="5">
                                                    <br><br><br><br>
                                                    <center>
                                                        <img src="{{ asset('assets/images/notfound.svg') }}" width="25%">
                                                        <br>
                                                        <p class="heading-main12" style="margin-left: 45px; font-size: 20px; color: rgb(49, 49, 49);">We couldn't find anything related to your keywords!</p>
                                                        <a class="non-style-link" href="{{ route('schedules.index') }}">
                                                            <button class="login-btn btn-primary-soft btn" style="display: flex; justify-content: center; align-items: center; margin-left: 20px;">Show all Sessions</button>
                                                        </a>
                                                    </center>
                                                    <br><br><br><br>
                                                </td>
                                            </tr>
                                            @else
                                            @foreach($schedules as $schedule)
                                            <tr>
                                                <td>&nbsp;{{ $schedule->title }}</td>
                                                @if (Auth::user()->role == 'admin')
                                                <td>{{ $schedule->doctor->user->fname . ' ' . $schedule->doctor->user->lname }}</td>
                                                @endif
                                                <td style="text-align: center;">{{ $schedule->date . ' ' . $schedule->start_time }}</td>
                                                <td style="text-align: center;">{{ $schedule->nop }}</td>
                                                <td>
                                                    <div style="display: flex; justify-content: center;">
                                                        <a href="{{ route('schedules.show', $schedule->id) }}" class="non-style-link">
                                                            <button class="btn-primary-soft btn button-icon btn-view" style="padding-left: 40px; padding-top: 12px; padding-bottom: 12px; margin-top: 10px;">View</button>
                                                        </a>
                                                        &nbsp;&nbsp;&nbsp;
                                                        <a href="?action=delete&id={{$schedule->id}}" class="non-style-link">
                                                            <button class="btn-primary-soft btn button-icon btn-delete" style="padding-left: 40px; padding-top: 12px; padding-bottom: 12px; margin-top: 10px;">Remove</button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </center>
                        </td>
                    </tr>
                    @endunless
                    @if (Auth::user()->role == 'patient')
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td style="width: 25%;" colspan="4">
                            <div class="dashboard-items search-items">
                                <div style="width: 100%;">
                                    <div class="h1-search">{{ $schedule->title }}</div><br>
                                    <div class="h3-search">Dr. {{ $schedule->doctor->user->fname . ' ' . $schedule->doctor->user->lname }}</div>
                                    <div class="h4-search">{{ $schedule->date }}<br>Starts: <b>{{ $schedule->start_time }}</b> (24h)</div>
                                    <br>
                                    <a href="{{ route('schedules.show', ['schedule' => $schedule]) }}">
                                        <button class="login-btn btn-primary-soft btn" style="padding-top: 11px; padding-bottom: 11px; width: 100%;">
                                            <font class="tn-in-text">Book Now</font>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tr>
            </table>
        </div>
    </div>
    @if (!empty($_GET['action']))
        @if ($_GET['action'] == 'view')
            @include('pages.dashboard.schedules.view', ['schedule' => $schedule, 'appointments' => \App\Models\Appointment::where('schedule_id', $schedule->id)->get()])
        @elseif ($_GET['action'] == 'delete')
            @include('pages.dashboard.schedules.delete', ['schedule' => $schedule->where('id', $_GET['id'])->first()])
        @endif
    @endif
</body>
</html>
