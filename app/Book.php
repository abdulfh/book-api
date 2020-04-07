<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * Koneksi model ke table books
     */
    protected $table = 'books';

    /**
     * Deklarasi field yang bisa diisi di table books
     */
    protected $fillable = ['book_name','book_author'];
}
