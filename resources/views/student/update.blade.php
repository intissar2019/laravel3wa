

<form action="{{route('handleUpdateStudent',['id' => $student->id])}}" method="POST">
	{{ csrf_field() }}
	<label>NOM:</label><input type="text" name="name" value="{{$student->name}}" /><br>
	<label>EMAIL:</label><input type="text" name="email" value="{{$student->email}}"/><br>
	<label>NOM CLASSROOM:</label>
	<select name="classroom_id">
		 @foreach($classrooms as $class)
		<option value="{{$class->id}}" @if($class->id ==$student->classroom_id)selected @endif">{{$class->title}}</option>
		  @endforeach
	</select><br>
	
	</select>
	<button type="submit">MODIFIER</button> 
	<button type="reset">ANNULER</button> 
</form>