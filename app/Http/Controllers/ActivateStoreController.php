<?php

namespace App\Http\Controllers;

use App\Models\InviteCode;
use Illuminate\Http\Request;
use App\Rules\InviteCodeNotExpired;
use App\Rules\InviteCodeHasQuantity;

class ActivateStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(Request $request)
    {
        $code = InviteCode::where('code', $request->code)->first();

        $this->validate($request, [
            'code' => ['bail', 'required', 'exists:invite_codes,code', new InviteCodeHasQuantity($code), new InviteCodeNotExpired($code)]
        ]);

        dd('activate');
    }
}
