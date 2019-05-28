<form action="{{route('handleStudentSearchDate')}}" method="POST">
	{{ csrf_field() }}
	<label>Taper le 2 dates :</label>
	<input type="text" name="firstDate"/><br>
	<input type="text" name="lastDate"/><br>
	
	
	<button type="submit">SEARCH</button> 
	
</form>
