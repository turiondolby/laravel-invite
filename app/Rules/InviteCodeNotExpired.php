<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class InviteCodeNotExpired implements Rule
{
    protected $inviteCode;

    public function __construct($inviteCode)
    {
        $this->inviteCode = $inviteCode;
    }

    public function passes($attribute, $value): bool
    {
        return ! optional($this->inviteCode)->hasExpired();
    }

    public function message(): string
    {
        return 'That invite code has expired.';
    }
}
