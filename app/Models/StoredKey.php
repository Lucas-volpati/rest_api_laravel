<?php

namespace App\Models;

use Database\Factories\StoredKeyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoredKey extends Model
{
    use HasFactory;
    protected $table = "stored_key";

    public static function newFactory() {
        return StoredKeyFactory::new();
    }
}
