<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Student;
use Image;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;
//use Input;

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
	//dd($data);
	$photo = 'photo-' . str_random(5) . time() . '.' . $data['photo']->getClientOriginalExtension();

            $fullImagePath = public_path('storage/classrooms/' . $photo);

            Image::make($data['photo']->getRealPath())->blur(10)->rotate(-45)->save($fullImagePath);

            $photoPath = 'storage/classrooms/' . $photo;


	Classroom::create([
		'title'=>$data['title'],
		'photo'=>$photoPath
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
	return back();
}


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
public function showUpdateStudent($id){
 	$student=Student::find($id);
 	if($student){	
 		$classrooms=Classroom::all();
	
		return view('student.update',['student'=>$student],['classrooms'=>$classrooms]);
}
 	return 'erreur id student';

}



public function handleUpdateStudent($id){
	$data=Input::all();
 	$student=Student::find($id);

 	if($student){
 	/*	
 		$student->name=$data['name'];
		$student->email=$data['email'];
		$student->classroom_id=$data['classroom_id'];
	    $student->save();
	    return view('student.view',['student'=>$student]);     
	    */
	    $student=DB::table('student')->where('id','=',$id)->update([
		'name'=>$data['name'],
		'email'=>$data['email'],
		'classroom_id'=>$data['classroom_id']
	]);
return redirect(route('showStudent',['id'=> $id]));

	}
	
return back();
}


	
 

}



