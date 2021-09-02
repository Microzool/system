<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class teacherReq extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'full_name'=>'required',
            'email'=>'required|email|unique:teachers ,email',
            'phone'=>'required|unique:teachers ,phone',
        ];
    }
}
