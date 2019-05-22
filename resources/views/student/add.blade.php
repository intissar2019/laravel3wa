<form action="{{route('handleAddStudent')}}" method="POST">
	{{ csrf_field() }}
	<input type="text" name="name"/><br>
	<input type="text" name="email"/><br>
	<input type="text" name="password"/><br>
	<select name="classroom_id">
		 @foreach($classrooms as $class)
		<option value="{{$class->id}}">{{$class->title}}</option>
		  @endforeach
	</select>
	<button type="submit">OK</button> 
</form>