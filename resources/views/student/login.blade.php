<form action="{{route('handleStudentLogin')}}" method="POST">
	{{ csrf_field() }}
	<label>YOUR EMAIL:</label>
	<input type="text" name="email"/><br>
	<label>YOUR PASSWORD:</label>
	<input type="text" name="password"/><br>
	
	<button type="submit">LOGIN</button> 
	
</form>