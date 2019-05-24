<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
      {
          $students = student::latest()->paginate(5);

          return view('students.index',compact('students'))
              ->with('i', (request()->input('page', 1) - 1) * 5);
      }


      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          return view('students.create');
      }


      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
          request()->validate([
              'title' => 'required',
              'body' => 'required',
          ]);

          student::create($request->all());

          return redirect()->route('students.index')
                          ->with('success','student created successfully');
      }


      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
          $student = Student::find($id);
          return view('students.show',compact('student'));
      }


      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
          $student = student::find($id);
          return view('students.edit',compact('student'));
      }


      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
          request()->validate([
              'title' => 'required',
              'body' => 'required',
          ]);

          student::find($id)->update($request->all());

          return redirect()->route('students.index')
                          ->with('success','student updated successfully');
      }


      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          student::find($id)->delete();

          return redirect()->route('students.index')
                          ->with('success','student deleted successfully');
      }
  }
