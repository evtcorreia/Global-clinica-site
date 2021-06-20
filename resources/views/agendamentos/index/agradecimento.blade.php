@extends('layout')

@section('cabecalho')

<meta http-equiv="refresh" content="4; URL='http://localhost:8000/secretaria/consultas/index/{Session::get('pessoacpf')}'"/>

@endsection

@section('conteudo')
<div class="d-flex justify-content-center">
    <h1 >Consulta cadastrado com sucesso, aguarde confirmação.</h1>
</div>

<div class="d-flex justify-content-center">
    <h2>Obrigado, por utlizar nosso sistema.</h2>
</div>

@endsection