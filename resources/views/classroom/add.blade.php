<form action="{{route('handleAddClassroom')}}" method="POST">
	{{ csrf_field() }}
	<input type="text" name="title"/><br>
	<input type="text" name="photo"/><br>
	<button type="submit">OK</button> 
</form>