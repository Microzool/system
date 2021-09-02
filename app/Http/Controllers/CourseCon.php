<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;

class CourseCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Courses::all();
        return view("courses.courses",compact('courses'));
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
            'name' => 'required|unique:courses|max:100',
            'price' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم الدورة',
            'name.unique' =>'اسم الدورة مسجل مسبقا',
            'name.max' =>'اسم الدورة طويل جدا ',
            'price.required' =>'يرجي ادخال سعر الدورة',
        ]);

        Courses::create([
            'name' => $request->name,
            'price' => $request->price,
            'techer_name' => $request->techer_name,
            'phone' => $request->phone,
            'course_duration' => $request->course_duration,
        ]);
        session()->flash('Add', 'تم اضافة الدورة بنجاح ');
        return redirect('/courses');
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
        $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required|max:100|unique:courses,name,'.$id,
            'price' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم الدورة',
            'name.unique' =>'اسم الدورة مسجل مسبقا',
            'name.max' =>'اسم الدورة طويل جدا ',
            'price.required' =>'يرجي ادخال سعر الدورة',
        ]);
        $courses = Courses::find($id);
        $courses ->update([
            'name' => $request->name,
            'price' => $request->price,
            'techer_name' => $request->techer_name,
            'phone' => $request->phone,
            'course_duration' => $request->course_duration,
        ]);
        session()->flash('edit', 'تم تعديل الدورة بنجاح ');
        return redirect('/courses');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        Courses::find($id)->delete();
        session()->flash('delete','تم حذف الدورة بنجاح');
        return redirect('/courses');
    }
}
