<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
//        if (!auth()->user()->can('manage orders')) {
//            abort(403, 'Unauthorized');
//        }
        return view('Admin.dashboard');
    }
}
