<?php

namespace App\Rules;

use App\Models\Franchise;
use Illuminate\Contracts\Validation\Rule;

class LengthNumCreditCardByFranchise implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $franchise = Franchise::getFranchise($value);
        return strlen($value) >= $franchise->min && strlen($value) <= $franchise->max;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute length is invalid';
    }
}
