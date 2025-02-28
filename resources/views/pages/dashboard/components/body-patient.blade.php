<tr>
    <td colspan="4">
        <center>
            <table class="filter-container doctor-header patient-header" style="border: none;width:95%" border="0">
                <tr>
                    <td>
                        <h3>Welcome!</h3>
                        <h1>{{Auth::user()->fname . ' ' . Auth::user()->lname}}</h1>
                        <p>Haven't any idea about doctors? no problem let's jumping to
                            <a href="doctors.php" class="non-style-link"><b>"All Doctors"</b></a> section or
                            <a href="schedule.php" class="non-style-link"><b>"Sessions"</b> </a><br>
                            Track your past and future appointments history.<br>Also find out the expected arrival time of your doctor or medical consultant.<br><br>
                        </p>

                        <h3>Channel a Doctor Here</h3>
                        <form action="{{route('schedules.index')}}" method="post" style="display: flex">
                            <input type="search" name="search" class="input-text " placeholder="Search Doctor and We will Find The Session Available" list="doctors" style="width:45%;">&nbsp;&nbsp;
                            <datalist id="doctors">
                              @foreach ($users->where('role', 'doctor') as $user)
                                <option value="{{$user->fname. ' ' . $user->lname}}"><br/></option>
                              @endforeach
                            </datalist>
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
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
                <td width=" 50%">
            <center>
                <table class="filter-container" style="border: none;" border="0">
                    <tr>
                        <td colspan="4">
                            <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Status</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">
                            <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex">
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
                            <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;">
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
                            <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex; ">
                                <div>
                                    <div class="h1-dashboard">
                                    {{$appointments->where('date', \Carbon\Carbon::today()->format('Y-m-d'))->count()}}
                                    </div><br>
                                    <div class="h3-dashboard">
                                        NewBooking &nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class="btn-icon-back dashboard-icons" style="background-image: url('{{asset('assets/images/icons/book-hover.svg')}}');"></div>
                            </div>

                        </td>

                        <td style="width: 25%;">
                            <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;">
                                <div>
                                    <div class="h1-dashboard">
                                        {{$schedules->where('date', \Carbon\Carbon::today()->format('Y-m-d'))->count()}}
                                    </div><br>
                                    <div class="h3-dashboard" style="font-size: 15px">
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
        <p style="font-size: 20px;font-weight:600;padding-left: 40px;" class="anime">Your Upcoming Booking</p>
        <center>
            <div class="abc scroll" style="height: 250px;padding: 0;margin: 0;">
                <table width="85%" class="sub-table scrolldown" border="0">
                    <thead>

                        <tr>
                            <th class="table-headin">
                                Appoint. Number
                            </th>
                            <th class="table-headin">
                                Session Title
                            </th>
                            <th class="table-headin">
                                Doctor
                            </th>
                            <th class="table-headin">

                                Sheduled Date & Time

                            </th>

                        </tr>
                    </thead>
                    <tbody>
                      @if($appointments->count() == 0)
                      <tr>
                        <td colspan="4">
                          <br><br><br><br>
                          <center>
                            <img src="{{asset('assets/images/notfound.svg')}}" width="25%">
                            <br>
                            <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Nothing to show here!</p>
                            <a class="non-style-link"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Channel a Doctor &nbsp;</font></button>
                            </a>
                          </center>
                          <br><br><br><br>
                        </td>
                      </tr>
                      @else
                      @foreach(Auth::user()->patient->appointments as $appointment)

                      <tr>
                        <td style="padding:30px;font-size:25px;font-weight:700;"> &nbsp;
                            {{$appointment->number}}
                        </td>
                        <td style="padding:20px;"> &nbsp;
                            {{$appointment->schedules->title}}
                        </td>
                        <td>
                            {{$appointment->schedules->doctor->user->fname . ' ' . $appointment->schedules->doctor->user->lname}}
                        </td>
                        <td style="text-align:center;">
                            {{$appointment->schedules->date . ' ' . $appointment->schedules->time}}
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