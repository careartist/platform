<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DescribeRoleController extends Controller
{
    public function role($role)
    {
        $view = 'services.describe.roles.' . $role;
    	return view($view);
    }
}
