<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

    public function send(Request $req)
    {
        
        $data = array(
            'name'      =>  $req->name,
            'email'      =>  $req->email,
            'textarea'   =>   $req->textarea
        );
        
        Mail::send('layouts.email', $data , function($message) {
            $message->from('bibliotecaonline2004019@gmail.com', 'Biblioteca Escolar Online');
            $message->to('bibliotecaonline2004019@gmail.com');
        });

        return redirect("/contact")->with('success','Mensagem recebida, respondemos mais tarde!');
    }
}
