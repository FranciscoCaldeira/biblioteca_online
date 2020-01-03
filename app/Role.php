<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public static function get_user_role()
    {
        App::setLocale(session('locale'));
        
        $user = Auth::user();
        $user_id = $user->id;

        $user_role = DB::table('role_user')
                     ->where('user_id' ,'=', $user_id)
                     ->get();

        if($user_role->count() != 0) {
            return $user_role[0]->role_id;
        } else {
            DB::table('role_user')->insert([ 
                ['user_id' => $user_id, 'role_id' => config('constants.roles.user')]
            ]);
        }   
    }
    
    public static function get_role_description() {
        $roles_available = DB::table('roles')
                                ->get();
        return $roles_available;
    }

    public static function all_user_roles()
    {
       $user_roles = DB::table('role_user')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.email','users.name','users.id', 'roles.description')
            ->get();

            return $user_roles;
    }

    public static function change_role_user($user_id, $role_id)
    {
        $affected = DB::table('role_user')
                    ->where('user_id', $user_id)
                    ->update(['role_id' => $role_id]);
        return $affected;
    } 
}
