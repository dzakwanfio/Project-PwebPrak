@if (Auth::user()->role == 'admin')
<div id="popup1" class="overlay">
    <div class="popup" style="width: 70%;">
    <center>
        <h2></h2>
        <a class="close" href="{{route('schedules.index')}}">&times;</a>
        <div class="content">

        </div>
        <div class="abc scroll" style="display: flex;justify-content: center;">
            <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">

                <tr>
                    <td>
                        <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br>
                    </td>
                </tr>            
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="name" class="form-label">Session Title: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        {{$schedule->title}}<br><br>
                    </td>
                    
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="Email" class="form-label">Doctor of this session: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                    {{$schedule->doctor->user->fname . ' '. $schedule->doctor->user->lname}}<br><br>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="nic" class="form-label">Scheduled Date: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                    {{$schedule->date}}<br><br>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="Tele" class="form-label">Scheduled Time: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                    {{$schedule->start_time}}<br><br>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="spec" class="form-label"><b>Patients that Already registerd for this session:</b></label>
                        <br><br>
                    </td>
                </tr>
                <tr>
                <td colspan="4">
                    <center>
                    <div class="abc scroll">
                        <table width="100%" class="sub-table scrolldown" border="0">
                            <thead>
                                <tr>   
                                    <th class="table-headin">
                                        Patient ID
                                    </th>
                                    <th class="table-headin">
                                        Patient name
                                    </th>
                                    <th class="table-headin">
                                        
                                        Appointment number
                                        
                                    </th>
                                    
                                    
                                    <th class="table-headin">
                                        Patient Telephone
                                    </th>               
                            </thead>
                            <tbody>
                                @if ($appointments->count() == 0)
                                    <tr>
                                        <td colspan="7">
                                            <br><br><br><br>
                                            <center>
                                            <img src="{{asset('assets/images/notfound.svg')}}" width="25%">
                                            <br>
                                            <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                            <a class="non-style-link" href="appointment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button></a>
                                            </center>
                                            <br><br><br><br>
                                        </td>
                                    </tr>
                                @else
                                @foreach ($users as $user)
                                <tr style="text-align:center;">
                                    <td>
                                    ' . substr($pid, 0, 15) . '
                                    </td>
                                    <td style="font-weight:600;padding:25px">
                                    substr($pname, 0, 25)
                                    </td>
                                    <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);">
                                    ' . $apponum . '
                                    
                                    </td>
                                    <td>
                                    ' . substr($ptel, 0, 25) . '
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
    </div>
    </center>
    <br><br>
</div>

@elseif (Auth::user()->role == 'doctor')
<div id="popup1" class="overlay">
    <div class="popup" style="width: 70%;">
        <center>
            <h2></h2>
            <a class="close" href="{{route('schedules.index')}}">&times;</a>
            <div class="content"></div>
            <div class="abc scroll" style="display: flex;justify-content: center;">
                <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                    <tr>
                        <td>
                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="name" class="form-label">Session Title: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            {{$schedule->title}}<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="Email" class="form-label">Doctor of this session: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                           {{$schedule->doctor->user->fname . ' '. $schedule->doctor->user->lname}} <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="nic" class="form-label">Scheduled Date: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            {{$schedule->date}} <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="Tele" class="form-label">Scheduled Time: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                           {{$schedule->start_time}} <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="spec" class="form-label"><b>Patients that Already registered for this session:</b></label>
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <center>
                                <div class="abc scroll">
                                    <table width="100%" class="sub-table scrolldown" border="0">
                                        <thead>
                                            <tr>   
                                                <th class="table-headin">
                                                    Patient ID
                                                </th>
                                                <th class="table-headin">
                                                    Patient name
                                                </th>
                                                <th class="table-headin">
                                                    Appointment number
                                                </th>
                                                <th class="table-headin">
                                                    Patient Telephone
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($appointments->count() == 0)
                                            <tr>
                                                <td colspan="7">
                                                    <br><br><br><br>
                                                    <center>
                                                        <img src="{{asset('assets/images/notfound.svg')}}" width="25%">
                                                        <br>
                                                        <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We couldn't find anything related to your keywords!</p>
                                                        <a class="non-style-link" href="{{route('appointments.index')}}"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button></a>
                                                    </center>
                                                    <br><br><br><br>
                                                </td>
                                            </tr>
                                            @else
                                            <tr style="text-align:center;">
                                                <td></td>
                                                <td style="font-weight:600;padding:25px"></td>
                                                <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);"></td>
                                                <td></td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </center>
                        </td> 
                    </tr>
                </table>
            </div>
        </center>
        <br><br>
    </div>
</div>
@else

@endif
