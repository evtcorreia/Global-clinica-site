@extends ('layout')

@section('cabecalho')
Consultas
@endsection

@section('conteudo')
<ul class='list-group'>
            @foreach($series as $serie)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>
                </li>            
            @endforeach
        </ul>

@endsection
