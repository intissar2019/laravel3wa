<form action="{{route('handleStudentSearch')}}" method="POST">
	{{ csrf_field() }}
	<label>Taper le nom d'etudiant:</label>
	<input type="text" name="name"/><br>
	
	
	<button type="submit">SEARCH</button> 
	
</form>
