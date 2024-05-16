<div class="dash-body" style="margin-top: 15px">
    <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
        <tr>
            <td colspan="2" class="nav-bar" >
                @if(Auth::user()->role == 'patient')
                <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Home</p>
                @elseif(Auth::user()->role == 'doctor')
                <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Dashboard</p>
                @else
                <form action="" method="post" class="header-search">
                    <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Doctor name or Email" list="doctors">&nbsp;&nbsp;
                    <datalist id="doctors">';
                        @foreach($users as $user)
                        <option value="{{$user->fname.$user->lname}}"><br/>
                        <option value="{{$user->email}}"><br/>
                        @endforeach
                    </datalist>
                    <input type="Submit" value="Search" class="login-btn btn-primary-soft btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                </form>
                @endif
            </td>
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
        @include('pages.dashboard.components.body-patient')
        @elseif(Auth::user()->role == 'doctor')
        @include('pages.dashboard.components.body-doctor')
        @else
        @include('pages.dashboard.components.body-admin')
        @endif
    </table>
</div>

