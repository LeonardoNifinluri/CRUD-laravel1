<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function myMethod(){
        return 'this is myMethod from MahasiswaController';
    }

    public function secondMethod(){
        return 'this is second method called from routes';
    }

    public function identity(){
        // $information = ['name' => 'Leonardo Nifinluri',
        //            'major' => 'Informatics',
        //            'id' => 'D121221020'];
        // return view('biodata', compact(('information')));
        $student = Student::get();
        return $student;
        //return view('biodata', $information);
    }

    public function homePage(){
        $information = ['name' => 'Leonardo Nifinluri',
                   'major' => 'Informatics',
                   'id' => 'D121221020'];
        return view('biodata', compact(('information')));
    }

    public function showAll(){
        $student = Student::all();
        return view('student', ['student' => $student]);
    }

    public function create(){
        return view('store');
    }

    public function store(Request $request){
        // Validate the request data
        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_id' => 'required|string|unique:student,student_id',
            'department_id' => 'required|integer',
            'student_address' => 'required|string|max:255'
        ]);

        // Create a new student record and insert it into the database
        Student::create([
            'student_name' => $request->input('student_name'),
            'student_id' => $request->input('student_id'),
            'department_id' => $request->input('department_id'),
            'student_address' => $request->input('student_address')
        ]);

        // Redirect back to a page (for example, to the students list)
        //return redirect()->route();
        //return redirect('/studentData');//->with('success', 'Student added successfully!');
        return redirect()->route('student.form')->with('success', 'Student added successfully!');
    }

    public function destroy($student_id){

        //student_id != 'D121221020' instead it's row id (since i don't declare student_id as PK)
        //find student by id
        $student = Student::findOrFail($student_id);

        //delete
        $student->delete();
        
        //redirect to all student
        return redirect()->route('student.showAll');

    }

    public function edit($id){
        //update student according to the id
        // Find the student by ID
        $student = Student::findOrFail($id);

        // Pass the student data to the edit view
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id){

        // Validate the incoming data
        $request->validate([
            'student_name' => 'required|string|max:255',

            //append .id to prevent uniqueness conflict
            'student_id' => 'required|string|unique:student,student_id,' . $id, // Ignore the current student

            'department_id' => 'required|integer',
            'student_address' => 'required|string|max:255',
        ]);

        // Find the student and update
        $student = Student::findOrFail($id);
        $student->student_name = $request->input('student_name');
        $student->student_id = $request->input('student_id');
        $student->department_id = $request->input('department_id');
        $student->student_address = $request->input('student_address');
        $student->save();

        //return back to all students page (showAll)
        return redirect()->route('student.showAll');
    }
}
