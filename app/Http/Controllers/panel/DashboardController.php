<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function show()
    {
        return view("panel.dashboard");
    }
}
