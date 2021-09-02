<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Http\Requests\studentReq;
use App\Students;
use Illuminate\Http\Request;

class StudentCon extends Controller
{

    public function index()
    {
        //
         $students = Students::all();

         foreach ($students as $student){
             $id=  $student->course_id;
         }


        $courses = Courses::all();


        return view("students.students",compact('students','id','courses'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|max:100',
            'phone' => 'required',
        ],[

            'full_name.required' =>'يرجي ادخال اسم الطالب',
            'name.max' =>'اسم الطالب طويل جدا ',
            'phone.required' =>'يرجي ادخال رقم هاتف الطالب',
        ]);

        Students::create([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'course_id' => $request->course_id,

        ]);
        session()->flash('Add', 'تم اضافة الطالب بنجاح ');
        return redirect('/students');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $id = $request->id;
        $validatedData = $request->validate([
            'full_name' => 'required|max:100|unique:students,full_name,'.$id,
            'phone' => 'required',
            'course_id' => 'required',
        ],[

            'full_name.required' =>'يرجي ادخال اسم الطالب',
            'name.max' =>'اسم الطالب طويل جدا ',
            'phone.required' =>'يرجي ادخال رقم هاتف الطالب',
            'course_id.required' =>'يرجي ادخال اسم الدورة',
        ]);



        $students = Students::find($id);
        $students -> update([

            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'course_id' => $request->course_id,

        ]);
        session()->flash('edit', 'تم تعديل الطالب بنجاح ');
        return redirect('/students');
    }


    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        Students::find($id)->delete();
        session()->flash('delete','تم حذف الطالب بنجاح');
        return redirect('/students');
    }
}
