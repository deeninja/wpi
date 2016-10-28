<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileUpdate extends FormRequest
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
        'first_name' => 'required|alpha',
        'last_name' => 'required|alpha',
        'country_id' => 'required',
        'profession' => 'required',
        'email'=>'required',
        'bio'=>'required',
        'password_confirmation' => 'min:5',
        ];
    }
}
