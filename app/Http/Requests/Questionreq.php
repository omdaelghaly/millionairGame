<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Questionreq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                        //
                'q' => 'required|max:150',
                'a' => 'required|max:50',
                'b' => 'required|max:50',
                'c' => 'required|max:50',
                'd' => 'required|max:50',
                'i' => 'required|max:50',
             
      

        ];
    }
}
