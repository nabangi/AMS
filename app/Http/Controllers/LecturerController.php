<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecturer;

class LecturerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
    {
        $lecturers = lecturer::latest()->paginate(5);

        return view('lecturers.index',compact('lecturers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturers.create');
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

        lecturer::create($request->all());

        return redirect()->route('lecturers.index')
                        ->with('success','lecturer created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecturer = lecturer::find($id);
        return view('lecturers.show',compact('lecturer'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer = lecturer::find($id);
        return view('lecturers.edit',compact('lecturer'));
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

        lecturer::find($id)->update($request->all());

        return redirect()->route('lecturers.index')
                        ->with('success','lecturer updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        lecturer::find($id)->delete();

        return redirect()->route('lecturers.index')
                        ->with('success','lecturer deleted successfully');
    }
}
