<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = Role::get_user_role();
        $role_description = Role::get_role_description();

        if($user && $role == config('constants.roles.super_admin')){
            $user_role = Role::all_user_roles();
            return view('page.user')->with([
                'role'  => $role,
                'user_role' => $user_role,
                'role_description' => $role_description
            ]);
        } else {
            return redirect('home')->with('error', 'Não tens permissões');
        }
    }

    public function block_user(Request $request)
    {   
        $id = $request->input('user_id');

        $role = Role::get_user_role();
        $user_auth = Auth::user();
        $user_bloq = User::find($id);

        if($user_auth && $role == config('constants.roles.super_admin')){
            if ($user_auth->id == $id) {
                return redirect('users')->with('error', 'Não podes bloquear este utilizador');
            } else {
                User::block_user($user_bloq->id);
                return redirect('users')->with('success', 'Foi bloqueado este utilizador');
            }
        } else {
            return redirect('home')->with('error', 'Não tens permissões');
        }
    }

    public function change_role_user(Request $request)
    {   
        $id = $request->input('user_id');
        $role_change = $request->input('role_id');
        $role = Role::get_user_role();

        $user_auth = Auth::user();

        if($user_auth && $role == config('constants.roles.super_admin')){
            Role::change_role_user($id, $role_change);
            return redirect('users')->with('success', 'Foi mudado o role deste utilizador');
        } else {
            return redirect('home')->with('error', 'Não tens permissões');
        }
    }
}
