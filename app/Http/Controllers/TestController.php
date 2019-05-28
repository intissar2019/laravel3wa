<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Student;
use Image;
use Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;

use Carbon\Carbon;
use Validator;
use Session;
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

            Image::make($data['photo']->getRealPath())->blur(10)->save($fullImagePath);

            $photoPath = 'storage/classrooms/' . $photo;


	Classroom::create([
		'title'=>$data['title'],
		'photo'=>$photoPath
	]);
	//return back();
	//return redirect(route('showClassroomList'));


	}



	 public function showAddStudent(){

	 	$classrooms=Classroom::all();
        return view('student.add',['classrooms'=>$classrooms]);
   }


   public function handleAddStudent(){
	$data=Input::all();
	$rules=[
		'name'=>'required',
		'email'=>'required|email',
	];
	$messages=[
		'name.required'=>'Le nom est obligatoire !',
		'email.required'=>'Le mail est obligatoire !',
		'email.email'=>'mail invalide '
	];
	$validation =Validator::make($data,$rules,$messages);
	if( $validation->fails()){
		return redirect()->back()->withErrors($validation->errors());
	}
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
	/*if(!Auth::user()){
		return redirect(route('showClassroomList'));
	}*/
	
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


public function showStudentLogin(){
 	
		return view('student.login');

}


public function handleStudentLogin(){
 	
	$data=Input::all();
	$cred=[
			'email'=>$data['email'],
			'password'=>$data['password']
		];
		if(Auth::attempt($cred)){
			Session::put([ 'msg'=> 'Connexion réussie']);
			return redirect(route('showAddClassroom'));

		}
		return back();

}
public function handleStudentLogout(){
		Auth::logout();
		return redirect(route('showAddClassroom'));

}

public function showStudentSearch(){
 	
		return view('student.search');

}


public function handleStudentSearch(){
 	
	$data=Input::all();
	$student=Student::Where('name', 'like', '%' . $data['name'] . '%')->get();
    //dd($student);
	
	 //return view('student.search',['student'=>$student]);

}



public function showStudentSearchDate(){
 	
		return view('student.searchDate');

}

public function handleStudentSearchDate(){
 	
	$data=Input::all();
	$firstDate = Carbon::createFromFormat("Y-m-d", $data['firstDate']);
	$lastDate = Carbon::createFromFormat("Y-m-d", $data['lastDate']);
	$student=Student::WhereBetween('created_at', [$firstDate,$lastDate] )->get();
	//dd($student);
	
	 //return view('student.search',['student'=>$student]);

}




}

