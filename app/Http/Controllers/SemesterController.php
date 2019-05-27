<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;

class SemesterController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $semesters = semester::latest()->paginate(5);
      //echo "<pre>";print_r($semesters);die;
      return view('semesters.index',compact('semesters'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('semesters.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $request->validate([
          'name' => 'required',
          'detail' => 'required',
      ]);

      semester::create($request->all());

      return redirect()->route('semesters.index')
                      ->with('success','semester created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\semester  $semester
   * @return \Illuminate\Http\Response
   */
  public function show(semester $semester)
  {
      return view('semesters.show',compact('semester'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\semester  $semester
   * @return \Illuminate\Http\Response
   */
  public function edit(semester $semester)
  {
      return view('semesters.edit',compact('semester'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\semester  $semester
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, semester $semester)
  {
      $request->validate([
          'name' => 'required',
          'detail' => 'required',
      ]);

      $semester->update($request->all());

      return redirect()->route('semesters.index')
                      ->with('success','semester updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\semester  $semester
   * @return \Illuminate\Http\Response
   */
  public function destroy(semester $semester)
  {
      $semester->delete();

      return redirect()->route('semesters.index')
                      ->with('success','semester deleted successfully');
  }
}
