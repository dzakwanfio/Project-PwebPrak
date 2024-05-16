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
</head>
<body>
  <div id="popup1" class="overlay">
                            <div class="popup">
                            <center>
                            
                                <a class="close" href="{{route('settings.index')}}">&times;</a> 
                                <div style="display: flex;justify-content: center;">
                                <div class="abc">
                                <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                    @if ($errors->any())
                                        @foreach ($errors as $error)
                                            <li>{{$error}}</li>    
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td>
                                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Edit User Account Details.</p>
                                        User ID : {{Auth::user()->id}}<br><br>
                                        </td>
                                    </tr>
                                    <form action="{{route('settings.update', ['setting' => Auth::user()->id])}}" method="POST" class="add-new-form">
                                    @csrf
                                    @method('PUT')
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="Email" class="form-label">Email: </label>
                                            <input type="hidden" value="{{Auth::user()->id}}" name="id">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                        <input type="hidden" name="oldemail" value="{{Auth::user()->email}}" >
                                        <input type="email" name="email" class="input-text" placeholder="Email Address" value="{{Auth::user()->email}}" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="fname" class="form-label">First Name: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="fname" class="input-text" placeholder="Doctor Name" value="{{Auth::user()->fname}}" required><br>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="lname" class="form-label">Name: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="lname" class="input-text" placeholder="Doctor Name" value="{{Auth::user()->lname}}" required><br>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="phone" class="form-label">Telephone: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="phone" class="input-text" placeholder="Telephone Number" value="{{Auth::user()->phone}}" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="address" class="form-label">Address</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                        <input type="text" name="address" class="input-text" placeholder="Address" value="{{Auth::user()->address}}" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="date_of_birth" class="form-label">Date of Birth: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="date" name="date_of_birth" class="input-text" value="{{Auth::user()->date_of_birth}}" required><br>
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="password" class="form-label">Password: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="password" class="input-text" placeholder="Defind a Password" required><br>
                                        </td>
                                    </tr><tr>
                                        <td class="label-td" colspan="2">
                                            <label for="password_confirmation" class="form-label">Confirm Password: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="password_confirmation" class="input-text" placeholder="Confirm Password" required><br>
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <td colspan="2">
                                            <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                            <input type="submit" value="Save" class="login-btn btn-primary btn">
                                        </td>
                        
                                    </tr>
                                
                                    </form>
                                </table>
                                </div>
                                </div>
                            </center>
                            <br><br>
                    </div>
                    </div>
  
</body>
</html>

