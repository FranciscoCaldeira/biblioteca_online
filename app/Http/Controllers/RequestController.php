<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as R;
use App\Book;
use App\Role;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index(){
        $role = Role::get_user_role();
        $request = R::index();
        $user = Auth::user();


        return view('page.request', ['requests' => $request,
                                     'role'  => $role,
                                     'user_id' => $user->id
        ]);

    }

    /**
     * This function add a book to request and rem quantity
     * @param Type $book_id identificator book
     * @return type
     * @throws conditon
     **/
    public function add($book_id) {
        $user = Auth::user();

            $request = new R();
            
            $request->user_id = $user->id;
            $request->book_id = $book_id;
            $request->request_state_id = config('constants.request_states.pendente');

            Book::remQuantity($book_id);
            $request->save();

            return redirect("/book")->with('sucess', 'Requisição feita');;
    }


    public function accept_request($request_id)
    {
        $role = Role::get_user_role();

        if ($role == config('constants.roles.admin') || $role == config('constants.roles.super_admin')) {
            R::change_state_request($request_id, config('constants.request_states.entregue'));

            return redirect("/request")->with('sucess', 'Livro entregue');
        } else {
            return redirect("/request")->with('error', 'Ação não autorizada');
        }
    }

    public function cancel_request($request_id)
    {
        $user = Auth::user();
        $request = R::find($request_id);
        
        if ($user->id == $request->user_id) {
            Book::addQuantity($request->book_id);
            R::change_state_request($request_id, config('constants.request_states.cancelado'));
    
            return redirect("/request")->with('sucess', 'Foi cancelado o pedido.');
        } else {
            return redirect("/request")->with('error', 'Ação não autorizada');

        }
    }

    public function reject_request($request_id)
    {
        $request = R::find($request_id);
        Book::addQuantity($request->book_id);
        R::change_state_request($request_id, config('constants.request_states.rejeitado'));

        return redirect("/request")->with('sucess', 'Livro não entregue, adicionado à quantidade.');
    }

    public function return_request($request_id)
    {
        $request = R::find($request_id);
        Book::addQuantity($request->book_id);
        R::change_state_request($request_id, config('constants.request_states.devolvido'));

        return redirect("/request")->with('sucess', 'Livro entregue, adicionado à quantidade.');
    }
}
