<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\CountryRepo;

class CountryExists implements Rule
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
        $countryRepo = new CountryRepo();
        $countries = collect($countryRepo->index());

        return $countries->contains('country', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The country not exists.';
    }
}
