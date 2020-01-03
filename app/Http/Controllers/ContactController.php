<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Role;

class ContactController extends Controller
{
    public function index()
    {
        if (empty(session('locale'))) {
            App::setLocale('pt');
        } else {
            App::setLocale(session('locale'));
        }
        
        if (empty(Auth::user())) {
            $role = config('constants.roles.visitante');
        } else {
            $role = Role::get_user_role();
        }

        return view('page.contact', ['role'  => $role]);
    }

    public function add()
    {
        return 123;
    }
}
