<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class OrderController extends Controller
{
    public function orderindex()
    {
        return view('admin.order.orderindex');
    }
}
