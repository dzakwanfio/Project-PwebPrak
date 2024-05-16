<div id="popup1" class="overlay">
    <div class="popup">
        <center>
            <h2>Are you sure?</h2>
            <div class="content">
                You want to delete this record<br> {{$user->fname . ' '. $user->lname}}<br>
            </div>
            <div style="display: flex;justify-content: center;">
                <form action="{{ route('doctors.destroy', ['doctor' => $user->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn-primary btn" style="margin:10px;padding:10px;">&nbsp;Yes&nbsp;</button>
                </form>
                <a href="{{ route('doctors.index') }}" class="non-style-link">
                    <button class="btn-primary btn" style="margin:10px;padding:10px;">
                        <font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font>
                    </button>
                </a>
            </div>
        </center>
    </div>
</div>
