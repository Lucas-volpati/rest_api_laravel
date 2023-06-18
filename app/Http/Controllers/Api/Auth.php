<?php

namespace App\Http\Controllers\Api;

use Ahc\Jwt\JWT;
use App\Models\Library;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class Auth extends JWT
{
    private $instance;

    protected $key;

    public $response;

    public function __construct()
    {
       $this->key = DB::select("SELECT * FROM stored_key");
        parent::__construct($this->key[0]->key);
    }

    public function generateToken(string $userName, string $userEmail) {
        $this->instance = new JWT($this->key,'HS256', 60 * 60 * 24 * 30);

        return $this->instance->encode(
            [
                'userName' => $userName,
                'userEmail' => $userEmail,
                'iss' => 'http://www.localhost/' //property domain
            ],
            [
               'alg' => 'HS256',
                'typ' => 'JWT'
            ]
        );
    }

    public function tokenDecode(string $token) {
        return $this->decode($token);
    }

    public function authorize($server)
    {
        if (!key_exists('HTTP_AUTHORIZATION', $server) ) {
            $this->response = json_encode(["http_error_code" => 403, 'msg' => 'Token não foi enviado']);

            return false;
        }

        $this->response =
            [
                'decodedToken' => $this->tokenDecode($_SERVER['HTTP_AUTHORIZATION']),
                'token' => $_SERVER['HTTP_AUTHORIZATION']
            ];

        return true;
    }

    public function validateToken(array $param = null)
    {
        $userData = $this->response['decodedToken'];
        $token = $this->response['token'];

        $user = (new User())->getUserByEmail($userData['userEmail']);

        if ($user) {
            if ($token == $user[0]->token) {
                return true;
            }else {
                return json_encode(['http_error_code' => 403, 'msg' => 'Token inválido: usuário não encontrado!']);
            }
        }else {
            return json_encode(['http_error_code' => 401, 'msg' => 'Token inválido!']);
        }
    }
}
