<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreadminRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'=>'required|unique:admins',
            'photo'=>'mimes:jpeg,jpg,png,gif'
        ];
    }

  public function messages(){
      return[
        'email.required'=>'please enter email address',
        'email.unique'=>'your email is already exists',
        'photo.mimes'=>'pease enter image with type of:jpeg,jpg,png,gif',
      ];
  }
    

}
