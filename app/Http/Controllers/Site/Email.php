<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Email extends Controller
{
    private $email;
    private $body;

    private $clientEmail;

    private $clientName;

    public function __construct()
    {
        $this->email = new PHPMailer(true);
    }

    public function bootstrap(string $clientEmail, string $clientName, string $token)
    {
        $this->clientName = $clientName;
        $this->clientEmail = $clientEmail;
        $this->body = "
            <table style='width: 500px'>
                <thead>
                    <tr>
                        <th><h1>Segue a baixo token para acesso à API</h1></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Usuário: </b>{$clientEmail}</td>
                    </tr>
                    <tr>
                        <td><b>Token: </b>{$token}</td>
                    </tr>
                    <tr>
                        <td><b>Validade: </b>30 dias</td>
                    </tr>
                </tbody>
            </table>
            <p>Para instruções de como utilizar a API acesse nosso repositório oficial: <a href='https://github.com/Lucas-volpati/api_laravel'>Documentação API Dos Livros</a></p>
            <p>Use com responsabilidade</p>
            <p>Equipe API dos livros.</p>
        ";
    }

    public function sendEmail()
    {
        try {
            $this->email->SMTPDebug = false;
            $this->email->isSMTP();
            $this->email->Host       = 'mail.lucasalcantara.dev.br';
            $this->email->SMTPAuth   = true;
            $this->email->Username   = 'no-reply@lucasalcantara.dev.br';
            $this->email->Password   = 'testes2023?';
            $this->email->SMTPSecure = 'ssl';
            $this->email->Port       = 465;
            $this->email->CharSet       = "utf-8";

            $this->email->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Recipients
            $this->email->setFrom('no-reply@lucasalcantara.dev.br', 'API dos Livros');
            $this->email->addAddress($this->clientEmail, $this->clientName);

            //Content
            $this->email->isHTML(true);
            $this->email->Subject = 'Solicitação de Acesso - API dos Livros';
            $this->email->Body    = $this->body;

            $this->email->send();

            return true;

        } catch (Exception $e) {

            return "Email não enviado!" . $e;
        }
    }
}
