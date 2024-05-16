<tr>
                    <td colspan="4" >
                        
                    <center>
                    <table class="filter-container doctor-header" style="border: none;width:95%" border="0" >
                    <tr>
                        <td >
                            <h3>Welcome!</h3>
                            <h1>{{Auth::user()->fname . ' ' . Auth::user()->lname}}</h1>
                            <p>Thanks for joinnig with us. We are always trying to get you a complete service<br>
                            You can view your dailly schedule, Reach Patients Appointment at home!<br><br>
                            </p>
                            <a href="{{route('appointments.index')}}" class="non-style-link"><button class="btn-primary btn" style="width:30%">View My Appointments</button></a>
                            <br>
                            <br>
                        </td>
                    </tr>
                    </table>
                    </center>
                    
                </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table border="0" width="100%"">
                            <tr>
                                <td width="50%">
                                    <center>
                                        <table class="filter-container" style="border: none;" border="0">
                                            <tr>
                                                <td colspan="4">
                                                    <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Status</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">
                                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                                        <div>
                                                                <div class="h1-dashboard">
                                                                  {{$users->where('role','doctor')->count()}}
                                                                </div><br>
                                                                <div class="h3-dashboard">
                                                                    All Doctors &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                        </div>
                                                              <div class="btn-icon-back dashboard-icons" style="background-image: url('{{asset('assets/images/icons/doctors-hover.svg')}}');"></div>
                                                    </div>
                                                </td>
                                                <td style="width: 25%;">
                                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                                        <div>
                                                                <div class="h1-dashboard">
                                                                    {{$users->where('role','patient')->count()}}
                                                                </div><br>
                                                                <div class="h3-dashboard">
                                                                    All Patients &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                        </div>
                                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('{{asset('assets/images/icons/patients-hover.svg')}}');"></div>
                                                    </div>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td style="width: 25%;">
                                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex; ">
                                                        <div>
                                                                <div class="h1-dashboard" >
                                                                    {{-- {{$totalAppointmentsToday}} --}}
                                                                </div><br>
                                                                <div class="h3-dashboard" >
                                                                    NewBooking &nbsp;&nbsp;
                                                                </div>
                                                        </div>
                                                                <div class="btn-icon-back dashboard-icons" style="margin-left: 0px;background-image: url('{{asset('assets/images/icons/book-hover.svg')}}');"></div>
                                                    </div>
                                                    
                                                </td>

                                                <td style="width: 25%;">
                                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;padding-top:21px;padding-bottom:21px;">
                                                        <div>
                                                                <div class="h1-dashboard">
                                                                    {{$schedules->where('date', \Carbon\Carbon::today()->format('Y-m-d'))->where('doctor_id', Auth::user()->id)->count()}}
                                                                </div><br>
                                                                <div class="h3-dashboard">
                                                                    Today Sessions
                                                                </div>
                                                        </div>
                                                        <div class="btn-icon-back dashboard-icons" style="background-image: url('{{asset('assets/images/icons/session-iceblue.svg')}}');"></div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        </table>
                                    </center>
                                </td>
                                <td>
                                    <p id="anim" style="font-size: 20px;font-weight:600;padding-left: 40px;">Your Up Coming Sessions until Next week</p>
                                    <center>
                                        <div class="abc scroll" style="height: 250px;padding: 0;margin: 0;">
                                        <table width="85%" class="sub-table scrolldown" border="0" >
                                        <thead>
                                        <tr>
                                                <th class="table-headin">
                                                Session Title
                                                
                                                </th>
                                                
                                                <th class="table-headin">
                                                Sheduled Date
                                                </th>
                                                <th class="table-headin">
                                                    
                                                     Time
                                                    
                                                </th>
                                                    
                                                </tr>
                                        </thead>
                                        <tbody>
                                        @if (Auth::user()->doctor->schedules->whereBetween('date', [
                                            \Carbon\Carbon::today()->format('Y-m-d'),
                                            \Carbon\Carbon::today()->addWeek()->format('Y-m-d')
                                        ])->count() == 0)                                            
                                            <tr>
                                            <td colspan="4">
                                            <br><br><br><br>
                                            <center>
                                            <img src="{{asset('assets/images/notfound.svg')}}" width="25%">
                                            
                                            <br>
                                            <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                            <a class="non-style-link" href="{{route('schedules.index')}}"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Sessions &nbsp;</font></button>
                                            </a>
                                            </center>
                                            <br><br><br><br>
                                            </td>
                                            </tr>
                                          @else
                                          @foreach(Auth::user()->doctor->schedules as $schedule)
                                            <tr>
                                                <td style="padding:20px;"> &nbsp;
                                                    {{ $schedule->title }}
                                                </td>
                                                <td style="padding:20px;font-size:13px;">
                                                    {{ $schedule->date }}
                                                </td>
                                                <td style="text-align:center;">
                                                    {{ $schedule->start_time }}
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
                        </table>
                    </td>
                <tr>