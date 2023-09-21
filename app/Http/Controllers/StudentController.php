<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate();
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $file = $request->file('image');
        // $newFileName = time() . '_' . $file->getClientOriginalName();
        // $file->move(public_path('images'), $newFileName);
        // File::delete("images/1695178562_logo.jpg");

        // dd($newFileName);
        $request->validate([
            'uni_id' => 'bail|required|unique:students|max:255',
            'phone' => 'sometimes|unique:students',
        ]);
        Student::create([
            'name'=>$request->name,
            'uni_id'=>$request->uni_id,
            'phone'=>$request->phone,
           ]);
        return redirect()->route('students.index')
        ->with('success', 'Student added successfully');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
    
        return view('student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->name = $request->name;
        $student->uni_id = $request->uni_id;
        $student->phone = $request->phone;
        $student->update();
        return redirect()->route('students.index')
        ->with('success', 'Student updated successfully');;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
        ->with('success', 'Student deleted successfully');
    }
}
