<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Auth;
use App\Models\User;
use App\Models\Library;

class ApiController extends Controller
{

    public function getAllBooks(?int $limit = null) {

        $auth = new Auth();
        if ($auth->authorize($_SERVER)) {
            $validate = $auth->validateToken();
            if (!$validate) {
                echo $validate;
            }else {
                //User authorized
                $books = (new Library())->getAllBooks($limit);
                echo !$books
                    ? json_encode(['http_error_code' => 204, 'msg' => "Não há registros!"])
                    : json_encode($books);
            }
        }
    }

    public function getBookById(int $id) {
        $auth = new Auth();
        if ($auth->authorize($_SERVER)) {
            $validate = $auth->validateToken();
            if (!$validate) {
                echo $validate;
            }else {
                //User authorized
                $book = (new Library())->getBookById($id);
                echo !$book
                    ? json_encode(['http_error_code' => 204, 'msg' => "Não há registro para o id informado"])
                    : json_encode($book);
            }
        }

    }
    public function getUsers() {
        $users = '';
        $users = DB::select("SELECT * FROM users ");

        echo json_encode($users);
    }
}
