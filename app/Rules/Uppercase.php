<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Uppercase implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void  // $attribute is the name of the field and $value is the value of the field to be validated and $fail is a closure function to be called if validation fails
    {
        if(strtoupper($value) !== $value){  // check if value is not uppercase
            $fail("The :attribute must be uppercase."); // :attribute is a placeholder for the field name
        }
    }
    
    
}
