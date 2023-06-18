<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Site\Email;

class SiteController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function home() {
        return view('home', ["data" => []]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function documentation() {
        return view('documentation');
    }

    public function formulary()
    {
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $mail = new Email();
        $auth = new Auth();
        $token = $auth->generateToken($data['first_name'], $data['email']);

        $mail->bootstrap($data['email'], $data['first_name'], $token);

        $user = new User();
        if (json_decode($user->newUser( $data['first_name'], $data['email'], $token))->status == 1) {
            $data =
                [
                    'status_cadastro' => 1,
                    'name' => $data['first_name'],
                    'email' => $data['email'],
                    'msg' => "Seu cadastro foi realizado, enviamos os detalhes do seu acesso para: ",
                    'icon' => 'success'
                ];
            $mail->sendEmail();
        }else {
            $data =
                [
                    'status_cadastro' => 0,
                    'name' => $data['first_name'],
                    'msg' => "Erro ao realizar o cadastro, tente novamente mais tarde!",
                    'icon' => 'error'
                ];
        }

        return view('home', ['data' => $data]);

    }
}
