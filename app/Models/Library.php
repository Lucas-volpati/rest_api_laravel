<?php

namespace App\Models;

use Database\Factories\LibraryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Library extends Model
{
    use HasFactory;
    protected $table = "library";

    public static function newFactory() {
        return LibraryFactory::new();
    }

    public function getAllBooks(int $limit = null)
    {
        $books = $limit ? DB::select("SELECT * FROM library LIMIT ?", [$limit]) : DB::select("SELECT * FROM library");

        return !$books ? false : $books;
    }

    public function getBookById(int $id)
    {
        return $id ? DB::select("SELECT * FROM library WHERE id = ?",[$id]) : false;
    }
}
