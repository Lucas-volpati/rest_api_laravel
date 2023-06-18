@extends('layouts.template')

@section('title', config('app.name'))

@section('content')
<h1>Bem vindo a API dos Livros</h1>

<p>Para começar, faça seu cadastro!</p>

<div style="width: 360px; margin:auto;">
    <form id="my_form" method="post">
        @csrf
        <div class="row">
            <div class="input-field col  xl6 s12">
                <input id="first_name" name="first_name" type="text" class="validate">
                <label for="first_name">Nome</label>
            </div>

            <div class="input-field col  xl6 s12">
                <input id="last_name" name="last_name" type="text" class="validate">
                <label for="last_name">Sobrenome</label>
            </div>

            <div class="input-field col  s12">
                <input id="email" name="email" type="email" class="validate">
                <label for="email">E-mail</label>
            </div>

            <button id="btn_submit" type="submit" class="waves-effect wave-light btn">Cadastrar <i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </form>
</div>

@if($data)
    <script>

        Swal.fire({
            icon: '{{$data['icon']}}',
            title: 'Show {{$data['name']}} !!!',
            text: '{{$data['msg']}}',
            buttonsStyling: false

        })

        document.querySelector('.swal2-confirm').classList = 'waves-effect wave-light btn'
        document.querySelector('#swal2-html-container').innerHTML += '<b>{{$data['email']}}</b>. Verifique sua caixa de <span class="red-text text-darken-2">SPAM</span>'
    </script>
@endif

@endsection
