<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Munsarifat;
class MunsarifatCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments = Munsarifat::all();
        return view('payments.payments',compact('payments'));
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
            'date' => 'required',
            'statement' => 'required|max:50',
            'amount' => 'required|numric',
        ],[

            'statement.required' =>'يرجي ادخال اسم البيان',
            'statement.max' =>'اسم البيان طويل جدا ',
            'date.required' =>'يرجي ادخال التاريخ',
            'amount.required' =>'يرجي ادخال المبلغ',
        ]);

        Munsarifat::create([
            'date' => $request->date,
            'statement' => $request->statement,
            'amount' => $request->amount,

        ]);
        session()->flash('Add', 'تم اضافة الفاتورة بنجاح ');
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
            'date' => 'required',
            'statement' => 'required|max:50'.$id,
            'amount' => 'required|numeric',
        ],[

            'statement.required' =>'يرجي ادخال اسم البيان',
            'statement.max' =>'اسم البيان طويل جدا ',
            'date.required' =>'يرجي ادخال التاريخ',
            'amount.required' =>'يرجي ادخال المبلغ',
        ]);
        $Munsarifat = Munsarifat::find($id);
        $Munsarifat ->update([

            'date' => $request->date,
            'statement' => $request->statement,
            'amount' => $request->amount,

        ]);
        session()->flash('edit', 'تم تعديل الفاتورة بنجاح ');
        return redirect('/payments');

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
        Munsarifat::find($id)->delete();
        session()->flash('delete','تم حذف الفاتورة بنجاح');
        return redirect('/payments');
    }
}
