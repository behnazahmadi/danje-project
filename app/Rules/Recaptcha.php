<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $response=Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
                'secret'=> "6LfcOlkbAAAAAJIbN0rTdEcwlNxCLdrzgq0XC2F-",
                'response'=>$value,
                'remoteip'=>request()->ip()
            ]);

            $response = json_decode($response->getBody());

            return $response->success;

        }catch (\Exception $e){
            dd($e->getMessage());
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'شما به عنوان ربات تشخیص داده شده اید';
    }
}
