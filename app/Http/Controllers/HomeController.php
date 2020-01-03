<?php

namespace App\Http\Controllers;

use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function index() {
        $role = Role::get_user_role();
        
        return view('home',['role' => $role]);
    }
}
