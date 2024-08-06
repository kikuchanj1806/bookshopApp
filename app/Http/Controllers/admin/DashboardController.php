<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
//        if (!auth()->user()->can('manage orders')) {
//            abort(403, 'Unauthorized');
//        }
        return view('admin.dashboard');
    }
}
