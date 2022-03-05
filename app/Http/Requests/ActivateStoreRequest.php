<?php

namespace App\Http\Requests;

use App\Models\InviteCode;
use App\Rules\InviteCodeApproved;
use App\Rules\InviteCodeNotExpired;
use App\Rules\InviteCodeHasQuantity;
use Illuminate\Foundation\Http\FormRequest;

class ActivateStoreRequest extends FormRequest
{
    public $inviteCode;

    public function prepareForValidation()
    {
        $this->inviteCode = InviteCode::where('code', $this->code)->first();
    }

    public function rules(): array
    {
        return [
            'code' => [
                'bail',
                'required',
                'exists:invite_codes,code',
                new InviteCodeHasQuantity($this->inviteCode),
                new InviteCodeNotExpired($this->inviteCode),
                new InviteCodeApproved($this->inviteCode)
            ]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
