@if (Auth::user()->role == 'patient')
<div id="popup1" class="overlay">
    <div class="popup">
        <center>
            <h2>Are you sure?</h2>
            <a class="close" href="{{route('appointments.index')}}">&times;</a>
            <div class="content">
                You want to Cancel this Appointment?<br><br>
                Session Name: &nbsp;<b>{{$appointment->schedules->title}}</b><br>
                Doctor name&nbsp; : <b>{{$appointment->schedules->doctor->user->fname . ' '. $appointment->schedules->doctor->user->lname}}</b><br><br>
                
            </div>
            <div style="display: flex;justify-content: center;">
                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-primary btn" style="display: flex; justify-content: center; align-items: center; margin: 10px; padding: 10px;">
                        <font class="tn-in-text">&nbsp;Yes&nbsp;</font>
                    </button>
                </form>

            <a href="{{route('appointments.index')}}" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

            </div>
        </center>
    </div>
</div>
@else
<div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="{{route('appointments.index')}}">&times;</a>
                        <div class="content">
                            You want to delete this record<br><br>
                            Patient Name: {{$appointment->patient->user->fname . ' ' . $appointment->patient->user->lname }} &nbsp;<b></b><br>
                            Appointment number &nbsp; : {{$appointment->id}}<b></b><br><br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-primary btn" style="display: flex; justify-content: center; align-items: center; margin: 10px; padding: 10px;">
                                    <font class="tn-in-text">&nbsp;Yes&nbsp;</font>
                                </button>
                            </form>
                        <a href="{{route('appointments.index')}}" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
</div>
@endif

