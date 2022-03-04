<?php

namespace App\Http\Controllers;

class ActivateIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke()
    {
        return view('activate.index');
    }
}
