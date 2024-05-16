 <tr>
  <td colspan="4">
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
                                  Doctors &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                  Patients &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </div>
                          </div>
                          <div class="btn-icon-back dashboard-icons" style="background-image: url('{{asset('assets/images/icons/patients-hover.svg')}}');"></div>                          
                      </div>
                  </td>
                  <td style="width: 25%;">
                      <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex; ">
                          <div>
                              <div class="h1-dashboard">
                                {{$appointments->count()}}
                              </div><br>
                              <div class="h3-dashboard">
                                  NewBooking
                              </div>
                          </div>
                          <div class="btn-icon-back dashboard-icons" style="background-image: url('{{asset('assets/images/icons/book-hover.svg')}}');"></div>

                      </div>
                  </td>
                  <td style="width: 25%;">
                      <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;">
                          <div>
                              <div class="h1-dashboard">
                                {{$schedules->where('date', \Carbon\Carbon::now()->format('Y-m-d'))->count()}}
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
</tr>
<tr>
  <td colspan="4">
      <table width="100%" border="0" class="dashbord-tables">
          <tr>
              <td>
                  <p style="padding:10px;padding-left:48px;padding-bottom:0;font-size:23px;font-weight:700;color:var(--primarycolor);">
                      Upcoming Appointments until Next {{date("l", strtotime("+1 week"))}}
                  </p>
                  <p style="padding-bottom:19px;padding-left:50px;font-size:15px;font-weight:500;color:#212529e3;line-height: 20px;">
                      Here's Quick access to Upcoming Appointments until 7 days<br>
                      More details available in @Appointment section.
                  </p>

              </td>
              <td>
                  <p style="text-align:right;padding:10px;padding-right:48px;padding-bottom:0;font-size:23px;font-weight:700;color:var(--primarycolor);">
                      Upcoming Sessions until Next {{date("l", strtotime("+1 week"))}}
                  </p>
                  <p style="padding-bottom:19px;text-align:right;padding-right:50px;font-size:15px;font-weight:500;color:#212529e3;line-height: 20px;">
                      Here's Quick access to Upcoming Sessions that Scheduled until 7 days<br>
                      Add,Remove and Many features available in @Schedule section.
                  </p>
              </td>
          </tr>
          <tr>
              <td width="50%">
                  <center>
                      <div class="abc scroll" style="height: 200px;">
                          <table width="85%" class="sub-table scrolldown" border="0">
                              <thead>
                                  <tr>
                                      <th class="table-headin" style="font-size: 12px;">

                                          Appointment number

                                      </th>
                                      <th class="table-headin">
                                          Patient name
                                      </th>
                                      <th class="table-headin">


                                          Doctor

                                      </th>
                                      <th class="table-headin">


                                          Session

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
                                  <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                
                                  </center>
                                  <br><br><br><br>
                                  </td>
                                </tr>
                                @else
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td style="text-align:center; font-size:23px; font-weight:500; color: var(--btnnicetext); padding:20px;">
                                            &nbsp;
                                            {{ $appointment->number }}
                                        </td>
                                        <td style="font-weight:600;"> &nbsp;
                                            {{ $appointment->patient->user->fname . ' ' . $appointment->patient->user->lname }}
                                        </td>
                                        <td style="font-weight:600;"> &nbsp;
                                            {{ $appointment->schedules->doctor->user->fname . ' ' . $appointment->schedules->doctor->user->lname }}
                                        </td>
                                        <td>
                                            {{ $appointment->schedules->title }}
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach

                                  @endif
                              </tbody>

                          </table>
                      </div>
                  </center>
              </td>
              <td width="50%" style="padding: 0;">
                  <center>
                      <div class="abc scroll" style="height: 200px;padding: 0;margin: 0;">
                          <table width="85%" class="sub-table scrolldown" border="0">
                              <thead>
                                  <tr>
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
                                @if ($schedules->count() == 0)
                                  <tr>
                                  <td colspan="4">
                                  <br><br><br><br>
                                  <center>
                                  <img src="{{asset('assets/images/notfound.svg')}}" width="25%">
                                  
                                  <br>
                                  <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                 
                                  </center>
                                  <br><br><br><br>
                                  </td>
                                  </tr>
                                @else
                                @foreach ($schedules->where('date', '<=', \Carbon\Carbon::now())->where('date', '<', \Carbon\Carbon::now()->addDays(7)) as $schedule)
                                    <tr>
                                        <td style="padding:20px;"> &nbsp;
                                            {{$schedule->title}}
                                        </td>
                                        <td>
                                            {{$schedule->doctor->user->fname . ' ' . $schedule->doctor->user->lname}}
                                        </td>
                                        <td style="text-align:center;">
                                            {{$schedule->date}}<br>
                                            {{$schedule->time}}
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
          <tr>
              <td>
                  <center>
                      <a href="{{route('appointments.index')}}" class="non-style-link"><button class="btn-primary btn" style="width:85%">Show all Appointments</button></a>
                  </center>
              </td>
              <td>
                  <center>
                      <a href="{{route('schedules.index')}}" class="non-style-link"><button class="btn-primary btn" style="width:85%">Show all Sessions</button></a>
                  </center>
              </td>
          </tr>
      </table>
  </td>

</tr>
</table>
</center>
</td>
</tr>