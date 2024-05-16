<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/animations.css')}}">  
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">  
    <link rel="stylesheet" href="{{asset('assets/css/admin.css')}}">

    <title>Doctors</title>
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
                    
                        <a class="close" href="{{route('doctors.index')}}">&times;</a> 
                        <div style="display: flex;justify-content: center;">
                        <div class="abc">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                          @if ($errors->any())
                            <div class="alert alert-danger">
                              <ul>
                                @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                @endforeach
                              </ul>
                            </div>
                          @endif
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Add New Doctor.</p><br><br>
                                </td>
                            </tr>
                            <form action="{{route('doctors.store')}}" method="POST" class="add-new-form">
                            @csrf
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="fname" class="form-label">First Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="fname" class="input-text" placeholder="Doctor Name" required><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="lname" class="form-label">Last Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="lname" class="input-text" placeholder="Doctor Name" required><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="email" name="email" class="input-text" placeholder="Email Address" required><br>
                                </td>
                            </tr>
                                                        <tr>
                                <td class="label-td" colspan="2">
                                    <br><label for="password" class="form-label">Password: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="password" name="password" class="input-text" placeholder="Defind a Password" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="password_confirmation" class="form-label">Confirm Password: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="password" name="password_confirmation" class="input-text" placeholder="Confirm Password" required><br>
                                </td>
                            </tr> 
                            {{-- <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">NIC: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="nic" class="input-text" placeholder="NIC Number" required><br>
                                </td>
                            </tr> --}}
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="phone" class="form-label">Telephone: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="phone" class="input-text" placeholder="Telephone Number" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="speciality_id" class="form-label">Choose specialties: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="speciality_id" id="" class="box" >
                                      @foreach ($specialities as $speciality)
                                        <option value="{{$speciality->id}}">{{ $speciality->name }}</option>
                                      @endforeach
                                      </select><br>
                                </td>
                            </tr>
                            

                              <tr>
                    <td class="label-td" colspan="2">
                        <label for="date_of_birth" class="form-label">Date of Birth: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="date" name="date_of_birth" class="input-text" required><br>
                    </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <label for="address" class="form-label">Address: </label>
                  </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <input type="text" name="address" class="input-text" placeholder="Address" required><br>
                  </td>
                </tr>
                            
                
                            <tr>
                                <td colspan="2">
                                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                    <input type="submit" value="Add" class="login-btn btn-primary btn">
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

