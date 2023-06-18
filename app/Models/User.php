<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function newUser($name, $email, $token) {
        if(DB::insert("INSERT INTO users (name, email, token) VALUES (?,?,?)",[$name, $email,  $token])) {

            return json_encode(['msg' => 'Register was created', 'status' => 1]);
        }else {
            return json_encode(['msg' => 'Register was not created', 'status' => 0]);
        }
    }

    public function getUserByEmail(string $email)
    {
        return DB::select("SELECT * FROM users WHERE email = ?", [$email]);
    }
}
