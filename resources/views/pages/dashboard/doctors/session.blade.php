<div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Redirect to Doctors sessions?</h2>
                        <a class="close" href="{{route('doctors.index')}}">&times;</a>
                        <div class="content">
                            You want to view All sessions by <br> {{$user->fname . ' '. $user->lname}}<br>
                            
                        </div>
                        <form action="{{route('schedules.index')}}" method="GET" style="display: flex">
                          <input type="hidden" name="search" value="{{$user->fname.' '. $user->lname}}">

                                
                        <div style="display: flex;justify-content:center;margin-left:45%;margin-top:6%;;margin-bottom:6%;">
                        
                        <input type="submit"  value="Yes" class="btn-primary btn">
                        </form>
                        
                        
                        </div>
                    </center>
            </div>
</div>