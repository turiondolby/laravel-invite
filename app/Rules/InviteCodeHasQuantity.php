<?php

namespace App\Rules;

use App\Models\InviteCode;
use Illuminate\Contracts\Validation\Rule;

class InviteCodeHasQuantity implements Rule
{
    protected $inviteCode;

    public function __construct($inviteCode)
    {
        $this->inviteCode = $inviteCode;
    }

    public function passes($attribute, $value): bool
    {
        return optional($this->inviteCode)->hasAvailableQuantity();
    }

    public function message(): string
    {
        return 'That code has reached the maximum usage.';
    }
}
