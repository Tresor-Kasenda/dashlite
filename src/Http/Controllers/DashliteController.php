<?php

namespace Scott\Dashlite\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class DashliteController extends Controller
{
    public function __invoke(): Renderable
    {
        return view('dashlite::admins.index');
    }
}
