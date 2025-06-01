<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Container\Attributes\DB;

class studentController extends Controller
{
    public function index(){
        $students = Students::all();
        return view('students.add_students', compact('students'));
    }

    public function get($id){
        $qry = Students::where('std_no', $id)->get();
        dd($qry);
        
    }

    public function store(Request $request){

        $request->validate([
            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'gender' => 'required|max:1',
            'date_of_birth' => 'required',
        ]);

        $qry = Students::insert([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth

        ]);

        return ($qry) ? redirect('/') : redirect('/');
    }


    public function updateView($id){
        $student = Students::where('id', $id)->first();
      return view('students.updateStudentView', compact('student'));

    }

    public function update(){

    }

    public function delete($id){
        $qry = Students::where('id', $id)->delete();
        return redirect('/');
    }

}
