
<div>
	<p>Bienvenue,<strong>{{Auth::user()->name}}</strong></p>
	<p>Conncté(e) depuis {{Auth::user()->created_at->diffForHumans(now())}}</p>
</div>
<form action="{{route('handleAddClassroom')}}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="text" name="title"/><br>
	<input type="file" name="photo" /><br>
	<button type="submit">OK</button> 
</form>
 <div style="background-color: grey; margin:20px;">
                     @auth
                                   <a style="padding: 1rem; text-align: center;" href="{{ route('handleStudentLogout')}}">LOGOUT</a>
                                   
                                
                                    @endauth

                </div>