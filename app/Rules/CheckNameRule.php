<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Request;

class CheckNameRule implements ValidationRule
{
    protected $request;

    /**
     * Create a new rule instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Access request data
        $requestData = $this->request->all();
        
        $student = Student::where([
          ['name',$this->request['name']],
          ['subject','!=',$this->request['name']],
        ])->first();
                 
        if (!blank($student)) {
            $fail('The name already taken with diffrent subject');
        }
    }
}
