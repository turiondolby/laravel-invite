<?php

namespace App\Http\Controllers;

use App\Models\InviteCode;
use Illuminate\Http\Request;
use App\Rules\InviteCodeNotExpired;
use App\Rules\InviteCodeHasQuantity;
use App\Http\Requests\ActivateStoreRequest;

class ActivateStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(ActivateStoreRequest $request)
    {
        dd('activate');
    }
}
