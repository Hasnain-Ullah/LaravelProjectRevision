<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;  // importing Str class for string manipulations

class LoginRequest extends FormRequest
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
            'email' => 'required|email|max:20',
            'password' => 'required|min:6|max:12',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages(): array  // custom error messages
    {
        return [
            'email.required' => ':attribute is required',
            'email.email' => 'Enter a valid email address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password must not exceed 12 characters',
            'confirm_password.required' => 'Confirm Password is required',
            'confirm_password.same' => 'Confirm Password must match the Password',
        ];
    }

    // public function attributes(): array  // custom attribute names
    // {
    //     return [
    //         'email' => 'Email Address',  // renaming attributes
    //         'password' => 'Password',
    //         'confirm_password' => 'Confirm Password',
    //     ];
    // }

    protected function prepareForValidation()  // modifying data before validation
    {
        if($this->password){    
            $this->merge([
                'password' => trim($this->password),  // removing spaces from password
            ]);
        }
        if($this->email){
            $this->merge([
                'email' => strtoupper(trim($this->email)), // removing spaces and converting to lowercase
            ]);
        }

        // convert name to uppercase before validation
        // $this->merge([
        //     'name' => strtoupper($this->name),  // convert name to uppercase before validation
        //     'name' => Str::slug($this->name), // convert name to slug before validation
        // ]);

    }

    protected $stopOnFirstFailure = true; // stop validation on first failure
                                            // by default it is false
}
