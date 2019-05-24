<form action="{{route('handleAddClassroom')}}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	<input type="text" name="title"/><br>
	<input type="file" name="photo" /><br>
	<button type="submit">OK</button> 
</form>