<?php

namespace App\Http\Controllers;

use App\Book;
use App\Role;
use App\Request as R;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
        $role = Role::get_user_role();
        $books = Book::get()->where('deleted_at' ,'==', null);

        return view('page.book', ['books' => $books,
                                  'role'  => $role,
        ]);
    }

    public function add(Request $req) {
        $user = Auth::user();
        $role = Role::get_user_role();

        if($user && ($role == config('constants.roles.admin') || $role == config('constants.roles.super_admin'))){
            $book = new Book();
            
            $book->title = $req->input('title');
            $book->author   = $req->input('author');
            $book->isbn = $req->input('isbn');
            $book->resume = $req->input('resume');
            $book->qntAvailable   = $req->input('qntAvailable');

            $file = $req->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file = $file->move('img/',$filename);
            
            $book->filepath = $filename;

            $book->save();
            return redirect("/book")->with('success','Livro adicionado');
        } else {
            return redirect("/")->with('error','Página não autorizada');
        }
    }

    public function showDetails($id)
    {
        $role = Role::get_user_role();
        $book = Book::find($id);
        
        if(empty($book)) {
            $book = array();
        }

        return view('page.book', ['books' => $book,
                                  'role'  => $role,
        ]);
        
    }

    public function delete($id)
    {
        $user = Auth::user();
        $role = Role::get_user_role();

        $request = R::request_has_book($id);
        
        if($request->count() == 0) {
            if($user && ($role == config('constants.roles.admin') || $role == config('constants.roles.super_admin')) ) {
                Book::where('id',$id)->delete();
                return redirect('/book')->with('success','Livro Removido');
            } else {
                return redirect("/")->with('error','Página não autorizada');
            }
        } else {
            return redirect("/book")->with('error','Não pode remover pois tem Pedidos');
        }
    }

    public function update(Request $req, $id)
    {
        $user = Auth::user();
        $role = Role::get_user_role();

        
        if($user && ($role == config('constants.roles.admin') || $role == config('constants.roles.super_admin')) ) {

            $book = new Book();
            
            $book->title = $req->input('title');
            $book->author   = $req->input('author');
            $book->isbn = $req->input('isbn');
            $book->resume = $req->input('resume');
            $book->qntAvailable   = $req->input('qntAvailable');
            
            DB::table('book')
                    ->where('id', $id)
                    ->update(['title'=> $book->title,
                              'author' => $book->author,
                              'isbn'  => $book->isbn,
                              'resume' => $book->resume,
                              'qntAvailable' => $book->qntAvailable]
                              );
        
                return redirect("/book")->with('success','Livro editado');
            } else {
                return redirect("/")->with('error','Página não autorizada');
            }
    }
}
