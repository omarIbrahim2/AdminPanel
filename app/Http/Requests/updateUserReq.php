<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class updateUserReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    
        return [
            "id" => ['required' , "exists:users,id"],
            'Fname' => ['required' , 'string' , 'max:50'],
            'lname' => ['required' , 'string' , 'max:50'],
            'email' => ['required' , "email" , Rule::unique('users')->ignore($this->id)],
            "role" => ['required' , "exists:roles,id"]
        ];
    }
}
