<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Job;
use Illuminate\Http\Request;

class EmployeeCon extends Controller
{

    public function index()
    {
        //
        $jobs = Job::all();
        $employee = Employee::all();
        return view("employee.employee",compact('jobs','employee'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'phone' => 'required|max:20|unique:employee,phone',
            'salary' => 'required|numeric',
            'job_id' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم الموظف',
            'phone.required' =>'يرجي ادخال رقم الهاتف ',
            'salary.required' =>'يرجي ادخال المرتب',
            'job_id.required' =>'يرجي ادخال الوظيفة',

            'name.max' =>'اسم الموظف طويل جدا ',
            'phone.max' =>'رقم الهاتف طويل جدا ',
            'statement.max' =>'اسم البيان طويل جدا ',
            'salary.numeric' =>'يرجي ادخال مرتب صحيح',

        ]);

        Employee::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'job_id' => $request->job_id,
        ]);
        session()->flash('Add', 'تم اضافة موظف بنجاح ');
        return redirect('/employee');

    }


    public function show($id)
    {
        //
    }


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
            'name' => 'required|max:50',
            'phone' => 'required|max:20|unique:employee,phone,'.$id,
            'salary' => 'required|numeric',
            'job_id' => 'required',
        ],[

            'name.required' =>'يرجي ادخال اسم الموظف',
            'phone.required' =>'يرجي ادخال رقم الهاتف ',
            'salary.required' =>'يرجي ادخال المرتب',
            'job_id.required' =>'يرجي ادخال الوظيفة',

            'name.max' =>'اسم الموظف طويل جدا ',
            'phone.max' =>'رقم الهاتف طويل جدا ',
            'statement.max' =>'اسم البيان طويل جدا ',
            'salary.numeric' =>'يرجي ادخال مرتب صحيح',

        ]);

        $Employee = Employee::find($id);
        $Employee ->update([

            'name' => $request->name,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'job_id' => $request->job_id,
        ]);
        session()->flash('Add', 'تم تعديل موظف بنجاح ');
        return redirect('/employee');
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
        Employee::find($id)->delete();
        session()->flash('delete','تم حذف الموظف بنجاح');
        return redirect('/employee');
    }
}
