<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RegularPriceHigherThanStartBid implements Rule
{
    protected $startBid;

    public function __construct($startBid)
    {
        $this->startBid = $startBid;
    }

    public function passes($attribute, $value)
    {
        return $value > $this->startBid;
    }

    public function message()
    {
        return 'The regular price must be higher than the start bid.';
    }
}
