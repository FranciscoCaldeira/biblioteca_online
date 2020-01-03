<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Request extends Model
{

    protected $table = 'request';

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
    
    public static function index()
    {
        $request = DB::table('request')
                    ->join('users', 'users.id', '=', 'request.user_id')
                    ->join('book', 'book.id', '=', 'request.book_id')
                    ->join('request_state' , 'request_state.id','=', 'request.request_state_id')
                    ->select('request.id', 'request.user_id',
                             'users.email','users.name', 
                             'book.title', 'book.author', 'book.isbn', 
                             'request.created_at', 'request_state.description', 'request_state.id as request_state_id')
                    ->get();
        
        return $request;
    }

    public static function change_state_request($request_id, $request_state_id)
    {
        $affected = DB::table('request')
                    ->where('id', $request_id)
                    ->update(['request_state_id' => $request_state_id]);
        return $affected;
    }
}
