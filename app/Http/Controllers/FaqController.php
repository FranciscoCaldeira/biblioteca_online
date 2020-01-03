<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;


class FaqController extends Controller
{
    
    public function index()
    {
        /**
        * Show a list of all of the application's faq.
        *
        * @return Response
        */
        App::setLocale(session('locale'));

        if (empty(Auth::user())) {
            $role = config('constants.roles.visitante');
        } else {
            $role = Role::get_user_role();
        }
        $faqs = DB::table('faq')->get();

        return view('page.faqs')->with(['faqs' => $faqs,
                                        'role' => $role
        ]);        
    }
    
    public function add(Request $req)
    {
        $user = Auth::user();
        $role = Role::get_user_role();

        if($user && ($role == config('constants.roles.admin') || $role == config('constants.roles.super_admin')) ) {

            $faq = new Faq;
            $faq->question = $req->input('question');
            $faq->answer   = $req->input('answer');
            $faq->save();
            return redirect('/faq')->with('success', 'Adicionada Faq');
        }else{
            return redirect('/')->with('error','Não tens permissão');
        }
       
    }

    public function delete($id)
    {

        $user = Auth::user();
        $role = Role::get_user_role();

        if($user && ($role == config('constants.roles.admin') || $role == config('constants.roles.super_admin')) ) {

            $faq = Faq::find($id);  
            $faq->delete();

            return redirect("/faq")->with('success','Faq eliminada');
        } else {
            return redirect("/faq")->with('error','Não tens permissão');
        }
    }


    public function update(Request $req, $id)
    {
        $user = Auth::user();
        $role = Role::get_user_role();

        if($user && ($role == config('constants.roles.admin') || $role == config('constants.roles.super_admin')) ) {

            $faq = new Faq;
            $faq->question = $req->input('question');
            $faq->answer   = $req->input('answer');

            DB::table('faq')
                    ->where('id', $id)
                    ->update(['question' => $faq->question ,
                                'answer' => $faq->answer   ]);
        
            return redirect('/faq')->with('success', 'Editada a Faq');
        }else{
            return redirect('/')->with('error','Não tens permissão');
        }
       
    }
}
