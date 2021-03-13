@extends ('layout')

@section('cabecalho')
    Bem vindo {{$pessoa["pessoa_nome"]}} {{$pessoa["pessoa_sobrenome"]}}

@endsection

@section('conteudo')