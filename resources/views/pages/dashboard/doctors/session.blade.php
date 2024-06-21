<div id="popup1" class="overlay">
    <div class="popup" style="text-align: center;">
        <h2>Redirect to Doctors sessions?</h2>
        <a class="close" href="{{route('doctors.index')}}">&times;</a>
        <div class="content">
            You want to view All sessions by <br> {{$user->fname . ' '. $user->lname}}<br>
        </div>
        <form action="{{route('schedules.index')}}" method="GET" style="display: flex; justify-content: center;">
            <input type="hidden" name="search" value="{{$user->fname.' '. $user->lname}}">
            <div style="display: inline-flex; justify-content: space-between; margin-top: 6%; margin-bottom: 6%;">
                <input type="submit" value="Yes" class="btn-primary btn">
                <a href="{{route('doctors.index')}}" class="non-style-link">
                    <button type="button" class="btn-primary btn">
                        <span class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</span>
                    </button>
                </a>
            </div>
        </form>
    </div>
</div>