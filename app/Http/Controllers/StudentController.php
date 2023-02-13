<?php

namespace App\Http\Controllers;


use App\Models\student;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;
use toastr;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = student::all();
        return view('index',compact('students')); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorestudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestudentRequest $request)
    {
        // dd($request);
          // Validate the input
 
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
     

        student::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'image' => $imageName,
            
        ]);
    
        return Redirect::to('/')->with('success', 'Record created successfully');
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
    }


    public function editStore(StorestudentRequest $request)

    {
        

       $student = student::find($request->student_id);
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->email = $request->email;
        $student->save();
        return Redirect::to('/');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestudentRequest  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update($student_id)
    {
        $student = student::find($student_id);
        return view('edit',compact('student'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $student = student::find($request->student_id);
        $student->delete();
        return Redirect::to('/');
    }
 
}
