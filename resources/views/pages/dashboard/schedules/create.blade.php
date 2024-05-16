<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
      <link rel="stylesheet" href="{{asset('assets/css/animations.css')}}">  
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">  
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">

        
    <title>Schedule</title>
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
   <div id="popup1" class="overlay">
  <div class="popup">
                    <center>
                    
                    
                        <a class="close" href="{{route('schedules.index')}}">&times;</a> 
                        <div style="display: flex;justify-content: center;">
                        <div class="abc">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        <tr>
                                <td class="label-td" colspan="2"></td>
                          </tr>

                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Add New Session.</p><br>
                                </td>
                            </tr>
                            @foreach ($errors as $error)
                                <tr>
                                    <td colspan="2">
                                        <p class="error">{{$error}}</p>
                                    </td>
                                </tr>
                                
                            @endforeach
                            <form action="{{route('schedules.store')}}" method="POST" class="add-new-form">
                            @csrf
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="title" class="form-label">Session Title : </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="title" class="input-text" placeholder="Name of this Session" required><br>
                                </td>
                            </tr>
                            @if (Auth::user()->role == 'admin')    
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="doctor_id" class="form-label">Select Doctor:</label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="doctor_id" class="input-text" required>
                                        <option value="" disabled selected hidden>Choose Doctor Name from the list</option>
                                        @foreach ($doctors as $doctor)
                                            <option value="{{ $doctor->user_id }}">{{ $doctor->user->fname . ' ' . $doctor->user->lname }}</option>
                                        @endforeach
                                    </select>
                                    <br><br>
                                </td>
                            </tr>
                            @else

                            <tr>
                                <td class="label-td" colspan="2">
                                @foreach ($doctors as $doctor)
                                    @if ($doctor->user->id == Auth::user()->id)
                                        <input type="hidden" name="doctor_id" value="{{$doctor->user->id}}">
                                    @endif
                                @endforeach
                                </td>
                            </tr>
                            @endif
                            
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nop" class="form-label">Number of Patients/Appointment Numbers : </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="number" name="nop" class="input-text" min="0"  placeholder="The final appointment number for this session depends on this number" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="date" class="form-label">Session Date: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="date" name="date" class="input-text" min="' . date('Y-m-d') . '" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="start_time" class="form-label">Schedule Time: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="time" name="start_time" class="input-text" placeholder="Time" required><br>
                                </td>
                            </tr>
                           
                            <tr>
                                <td colspan="2">
                                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="submit" value="Place this Session" class="login-btn btn-primary btn" name="shedulesubmit">
                                </td>
                
                            </tr>
                           
                            </form>
                            </tr>
                        </table>
                        </div>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
</body>
</html>