<div id="popup1" class="overlay">
    <div class="popup">
        <center>
            <h2>Are you sure?</h2>
            <a class="close" href="{{route('schedules.index')}}">&times;</a>
            <div class="content">
                You want to delete this record<br>{{$schedule->title}}<br>                            
            </div>
            <div style="display: flex;justify-content: center;">
                <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-primary btn" style="display: flex; justify-content: center; align-items: center; margin: 10px; padding: 10px;">
                        <font class="tn-in-text">&nbsp;Yes&nbsp;</font>
                    </button>
                </form>

                <a href="{{route('schedules.index')}}" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>
            </div>
        </center>
    </div>
</div>