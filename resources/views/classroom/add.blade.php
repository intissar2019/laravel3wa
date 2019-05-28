
<div>
	<p>@lang('perso.hello',['USERNAME'=>Auth::user()->name])</p>
	<p>Cré(e) depuis {{Auth::user()->created_at->diffForHumans(now())}}</p>
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
 @if(Session::has('msg'))
 <div>
 	{{session('msg')}}
 	{{session::forget('msg')}}

 </div>
 @endif