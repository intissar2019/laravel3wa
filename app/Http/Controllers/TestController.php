<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Student;

use Illuminate\Support\Facades\Input;

class TestController extends Controller
{
   public function showClassroomList(){
$classrooms=Classroom::with('students')->get();
//$classrooms=Classroom::find(1);
//dd($classrooms);
   //	dd($classrooms);
   	return view('welcome',['classrooms'=>$classrooms]);

   }
   public function showAddClassroom(){

           return view('classroom.add');
   }
public function handleAddClassroom(){
	$data=Input::all();
	Classroom::create([
		'title'=>$data['title'],
		'photo'=>$data['photo']
	]);
	//return back();
	return redirect(route('showClassroomList'));


	}
	 public function showAddStudent(){

	 	$classrooms=Classroom::all();
        return view('student.add',['classrooms'=>$classrooms]);
   }
   public function handleAddStudent(){
	$data=Input::all();
	Student::create([
		'name'=>$data['name'],
		'email'=>$data['email'],
		'password'=>bcrypt($data['password']),
		'classroom_id'=>$data['classroom_id']
	]);
	return back();}



 public function handleDeleteStudent($id){
 	$student=Student::find($id);
 	if($student){	
	$student->delete();
	return 'succes';
}
 	return 'erreur';


}


 public function showStudent($id){
 	$student=Student::find($id);
 	if($student){	
	
		return view('student.view',['student'=>$student]);
}
 	return 'erreur id student';


}

}

