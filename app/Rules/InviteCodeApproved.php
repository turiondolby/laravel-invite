<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class InviteCodeApproved implements Rule
{
    protected $inviteCode;

    public function __construct($inviteCode)
    {
        $this->inviteCode = $inviteCode;
    }

    public function passes($attribute, $value): bool
    {
        return optional($this->inviteCode)->approved();
    }

    public function message(): string
    {
        return 'That invite code is invalid.';
    }
}
