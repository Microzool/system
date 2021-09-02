<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentReq extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'full_name'=>'required|max:50|min:4',
            'course_id'=>'required',
            'phone'=>'required|unique:students,phone',
        ];
    }
}
