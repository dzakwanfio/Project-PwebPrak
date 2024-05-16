<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <td width="13%">
                        <a href="{{route('doctors.index')}}" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td>
                        
                        <form action="" method="post" class="header-search">

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Doctor name or Email" list="doctors">&nbsp;&nbsp;
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        
                        </form>
                        
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date

                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">{{date('Y-m-d')}}</p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="{{asset('assets/images/calendar.svg')}}" width="100%"></button>
                    </td>
                </tr>
               @unless (Auth::user()->role == 'patient')  
               <tr>
                   <td colspan="4" >
                       <div style="display: flex;margin-top: 40px;">
                       <a href="{{route('doctors.create')}}" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="margin-left:25px;background-image: url('{{asset('assets/images/icons/add.svg')}}');">Add a Doctor</font></button>
                       </a>
                       </div>
                   </td>
               </tr>
               @endunless
                <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Doctors {{$users->where('role', 'doctor')->count()}} </p>
                    </td>
                    
                </tr>
 
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="93%" class="sub-table scrolldown" border="0">
                        <thead>
                        <tr>
                                <th class="table-headin">
                                    
                                
                                Doctor Name
                                
                                </th>
                                <th class="table-headin">
                                    Email
                                </th>
                                <th class="table-headin">
                                    
                                    Specialties
                                    
                                </th>
                                <th class="table-headin">
                                    
                                    Events
                                    
                                </tr>
                        </thead>
                        <tbody>
                            @if($users->where('role', 'doctor')->count() == 0)
                            <tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="{{asset('assets/images/notfound.svg')}}" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    <a class="non-style-link" href="doctors.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Doctors &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                            </tr>
                            @else
                            @foreach($users->where('role', 'doctor') as $user)
                            <tr>
                                <td> &nbsp;
                                    {{$user->fname .' '.$user->lname}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->doctor->speciality->name}}
                                </td>
                                <td>
                                    @if (Auth::user()->role == 'admin')
                                    <div style="display:flex;justify-content: center;">
                                        <a href="{{route('doctors.edit', $user->id)}}" onclick="" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-edit"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Edit</font></button></a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a id='view' href="?action=view&id={{$user->id}}" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                                        &nbsp;&nbsp;&nbsp;
                                       <a href="?action=delete&id={{$user->id}}" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Remove</font></button></a>
                                    </div>
                                    @else
                                    <div style="display:flex;justify-content: center;">
                                        <a href="?action=view&id={{$user->id}}" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                                       &nbsp;&nbsp;&nbsp;
                                       <a href="?action=session&id={{$user->id}}&name={{$user->fname . ' '.$user->lname}}"  class="non-style-link"><button  class="btn-primary-soft btn button-icon menu-icon-session-active"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Sessions</font></button></a>
                                    </div>
                                    @endif
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
    </div>
</div>

@if ($_GET)
@if ($_GET['action'] == 'view')
@include('pages.dashboard.doctors.view', ['user' => $users->where('id', $_GET['id'])->first()]);
@elseif ($_GET['action'] == 'session')
    @include('pages.dashboard.doctors.session', ['user' => $user])
@elseif ($_GET['action'] == 'edit')
    @include('pages.dashboard.doctors.edit', ['user' => $user])
@elseif ($_GET['action'] == 'delete')
    @include('pages.dashboard.doctors.delete', ['user' => $user])
@endif
    
@endif

</body>
</html>