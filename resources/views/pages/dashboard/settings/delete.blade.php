<div id="popup1" class="overlay">
    <div class="popup">
        <div style="text-align: center;">
            <h2>Are you sure?</h2>
            <a class="close" href="{{ route('settings.index') }}">&times;</a>
            <div class="content">
                You want to delete Your Account<br>{{ Auth::user()->name }}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
            <div style="display: flex; justify-content: center;">
                <form action="{{ route('settings.delete', ['id' => Auth::user()->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-primary btn" style="display: flex; justify-content: center; align-items: center; margin:10px; padding:10px;">
                        <font class="tn-in-text">&nbsp;Yes&nbsp;</font>
                    </button>
                </form>
                <a href="{{ route('settings.index') }}" class="non-style-link">
                    <button class="btn-primary btn" style="display: flex; justify-content: center; align-items: center; margin:10px; padding:10px;">
                        <font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
