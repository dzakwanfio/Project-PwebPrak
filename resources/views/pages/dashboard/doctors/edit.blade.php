<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <a class="close" href="{{ route('doctors.index') }}">&times;</a> 
        <div style="display: flex;justify-content: center;">
          <div class="abc">
            <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
              <tr>
                <td class="label-td" colspan="2">
                  {{-- <label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label> --}}
                </td>
              </tr>
              <tr>
                <td>
                  <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Edit Doctor Details.</p>
                  Doctor ID :{{ $user->id }} (Auto Generated)<br>
                </td>
              </tr>
            </table>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ route('doctors.update',[ 'doctor' => $user->id])}}" method="POST" class="add-new-form">
              @csrf
              @method('PUT')
              <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                <tr>
                  <td class="label-td" colspan="2">
                    <label for="email" class="form-label">Email: </label>
                  </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <input type="email" name="email" class="input-text" placeholder="Email Address" value="{{ $user->email }}" required><br>
                  </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <label for="fname" class="form-label">First Name: </label>
                  </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <input type="text" name="fname" class="input-text" placeholder="Doctor Name" value="{{ $user->fname }}" required><br>
                  </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <label for="lname" class="form-label">Last Name: </label>
                  </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <input type="text" name="lname" class="input-text" placeholder="Doctor Name" value="{{ $user->lname }}" required><br>
                  </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <label for="phone" class="form-label">Telephone: </label>
                  </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <input type="text" name="phone" class="input-text" placeholder="Telephone Number" value="{{ $user->phone }}" required><br>
                  </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <label for="speciality_id" class="form-label">Choose specialties: (Current {{ $user->doctor->speciality->name }})</label>
                  </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <select name="speciality_id" id="" class="box">
                      @foreach($specialities as $speciality)
                        <option value="{{$speciality->id}}">{{ $speciality->name }}</option>
                      @endforeach
                    </select><br><br>
                  </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="date_of_birth" class="form-label">Date of Birth: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="date" name="date_of_birth" class="input-text" value="{{ $user->date_of_birth }}" required><br>
                    </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <label for="address" class="form-label">Address: </label>
                  </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <input type="text" name="address" class="input-text" placeholder="Address" value="{{ $user->address }}" required><br>
                  </td>
                </tr>
                {{-- <tr>
                  <td class="label-td" colspan="2">
                    <label for="password" class="form-label">Password: </label>
                  </td>
                </tr>
                <tr>
                  <td class="label-td" colspan="2">
                    <input type="password" name="password" class="input-text" placeholder="Define a Password" required><br>
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
                </tr> --}}
                <tr>
                  <td colspan="2">
                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn">
                    <input type="submit" value="Save" class="login-btn btn-primary btn">
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </center>
      <br><br>
    </div>
  </div>
</body>
</html>
