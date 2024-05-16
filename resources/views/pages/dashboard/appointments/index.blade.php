<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/animations.css')}}">  
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">  
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">
    <title>Appointments</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
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
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%" >
                    <a href="{{route('appointments.index')}}" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    @if (Auth::user()->role == 'patient')
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">My Bookings history</p>        
                    </td>
                    @else
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Appointment Manager</p>
                    </td>
                    @endif
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            {{date('Y-m-d')}}
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="{{asset('assets/images/calendar.svg')}}" width="100%"></button>
                    </td>


                </tr>
                @if(Auth::user()->role == 'patient')
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">My Bookings</p>
                    </td>
                </tr>
                @else
                @if (Auth::user()->role == 'doctor')
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Appointments</p>
                    </td>
                </tr>
                @endif
                
                @endif
                <tr>
                    <td colspan="4" style="padding-top:0px;width: 100%;" >
                        <center>
                        <table class="filter-container" border="0" >
                        <tr>
                           <td width="10%">

                           </td> 
                        <td width="5%" style="text-align: center;">
                        Date:
                        </td>
                        <td width="30%">
                        <form action="" method="post">
                            <input type="date" name="sheduledate" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">

                        </td>
                        
                    <td width="12%">
                        <input type="submit"  name="filter" value=" Filter" class=" btn-primary-soft btn button-icon btn-filter"  style="padding: 15px; margin :0;width:100%">
                        </form>
                    </td>

                    </tr>
                            </table>

                        </center>
                    </td>
                    
                </tr>
                
        
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="93%" class="sub-table scrolldown" border="0">
                            @if($appointments->count() == 0)
                            <tbody>
                                <tr>
                                    <td colspan="7">
                                    <br><br><br><br>
                                    <center>
                                    <img src="{{asset('assets/images/notfound.svg')}}" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    {{-- <a class="non-style-link" href="{{route('appointments.index')}}"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                                    </a> --}}
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                </tr>
                            </tbody>
                            @else
                            @if(Auth::user()->role == 'patient')
                            @foreach ($appointments->whereBetween('date', [\Carbon\Carbon::today()->format('Y-m-d'), \Carbon\Carbon::today()->addWeek()->format('Y-m-d')]) as $appointment)
                                <tbody>
                                    <tr>
                                        <td style="width: 25%;">
                                            <div class="dashboard-items search-items">        
                                                <div style="width:100%;">
                                                    <div class="h3-search">
                                                        Booking Date: {{ \Carbon\Carbon::parse($appointment->date)->format('Y-m-d') }}<br>
                                                        Reference Number: OC-000-{{ $appointment->id }}
                                                    </div>
                                                    <div class="h1-search">
                                                    Title: {{ $appointment->schedules->title }}<br>
                                                    </div>
                                                    <div class="h3-search">
                                                        Appointment Number: {{ $appointment->schedules->id }}
                                                        <div class="h1-search"></div>
                                                    </div>
                                                    <div class="h3-search">
                                                    </div>
                                                    <div class="h4-search">
                                                        Scheduled Date: {{ \Carbon\Carbon::parse($appointment->schedules->date)->format('Y-m-d') }}<br>
                                                        Starts: {{ $appointment->schedules->start_time }}<b></b> (24h)
                                                    </div>
                                                    <br>
                                                    <a href="?action=delete&id={{ $appointment->id }}">
                                                        <button class="login-btn btn-primary-soft btn" style="padding-top:11px;padding-bottom:11px;width:100%">
                                                            <font class="tn-in-text">Cancel Booking</font>
                                                        </button>
                                                    </a>
                                                </div>                    
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                            @else
                            <thead>
                                <tr>
                                    <th class="table-headin">
                                        Patient name
                                    </th>
                                    <th class="table-headin">
                                        Appointment number                                    
                                    </th>
                                    @if (Auth::user()->role == 'admin')
                                    <th class="table-headin">
                                        Doctor                                    
                                    </th>
                                    @endif
                                    <th class="table-headin">
                                        Session Title
                                        </th>
                                    <th class="table-headin" >
                                        Session Date & Time
                                    </th>
                                    <th class="table-headin">
                                        Appointment Date
                                    </th>
                                    <th class="table-headin">
                                        Events
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td style="font-weight:600;"> &nbsp;
                                            {{$appointment->patient->user->fname . ' ' . $appointment->patient->user->lname}}
                                        </td>
                                        <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);"> 
                                            {{$appointment->number}}
                                        </td>
                                        @if (Auth::user()->role == 'admin')
                                        <td>
                                            {{$appointment->schedules->doctor->user->fname . ' ' . $appointment->schedules->doctor->user->lname}}
                                        </td>
                                        @endif
                                        <td style="text-align:center;">
                                            {{$appointment->schedules->title}}
                                        </td>
                                        <td style="text-align:center;">
                                            {{$appointment->schedules->date . ' ' . $appointment->schedules->start_time}}
                                        </td>
                                        <td style="text-align:center;">
                                            {{$appointment->date}}
                                        </td>
                                        <td>
                                            <div style="display:flex;justify-content: center;">
                                                <a href="?action=delete&id={{$appointment->id}}" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Cancel</font></button></a>
                                                &nbsp;&nbsp;&nbsp;
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @endif
                            @endif
                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
            </table>
        </div>
    </div>
    @if ($_GET)
@if ($_GET['action'] == 'delete')
    @include('pages.dashboard.appointments.delete', ['appointment' => $appointment])
@endif
    
@endif
</body>
</html>

