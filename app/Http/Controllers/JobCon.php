<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Job::all();
        return view('jobs.jobs',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:50|min:7|unique:jobs,name,',
        ],[
            'name.min' =>' اسم الوظيفة قصير جدا',
            'name.required' =>'يرجي ادخال اسم الوظيفة',
            'name.max' =>' اسم الوظيفة طويل جدا',
            'name.unique' =>'اسم الوظيفة موجود مسبقا',
        ]);

           Job::create([
            'name' => $validatedData['name'],

        ]);
        session()->flash('Add', 'تم اضافة الوظيفه بنجاح ');
        return redirect('/jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        //
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required|max:50|min:7|unique:jobs,name,'.$id,
        ],[

            'name.required' =>'يرجي ادخال اسم الوظيفة',
        ]);

        Job::create([
            'name' => $validatedData['name'],

        ]);
        session()->flash('Add', 'تم اضافة الوظيفه بنجاح ');
        return redirect('/jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request)
    {
        //

        $id = $request->id;
        Job::find($id)->delete();
        session()->flash('delete','تم حذف الوظيفة بنجاح');
        return redirect('/jobs');
    }
}
