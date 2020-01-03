<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    protected $table = 'book';

    public static function get()
    {
        $books = Book::all();
        return $books;
    }

    public static function find($id) {
        $book = DB::table('book')
                    ->where('id' ,'=', $id)
                    ->get();
        return $book;
    }

    public static function addQuantity($book_id)
    {
        $affected = DB::table('book')
                    ->where('id' ,'=', $book_id)
                    ->increment('qntAvailable', 1);
        return $affected;
    }

    public static function remQuantity($book_id)
    {
        $affected = DB::table('book')
                    ->where('id' ,'=', $book_id)
                    ->decrement('qntAvailable', 1);
        return $affected;
    }
}
