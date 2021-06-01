@extends ('layout')

@section('cabecalho')

    Faça a Busca pelo paciente desejado

@endsection

<style>

  

    hr { background-color: #ffffff; height: 1px; border: 0; }
    </style>

    @section('conteudo')

    <form action="/get-paciente" method="post">
    @csrf
    <label for="busca">Buscar</label>
    
        <div class="container">  
            <input type="search" id="nome" name="nome" class="form-control">
                <button class="btn btn-primary btn-sm btn-block mt-3 mb-5" type="submit" name="busca" id="busca">Buscar paciente</button>
        </div>     

    </form>

    <ul>
    
        @if(!isset($pessoas))
        
            <h1>Nao exstem informações</h1>
        @else
            @foreach($pessoas as $pessoa)

        

            
            <div class="list-group " style="color: #ffffff;">
                    <a href="/agendamentos/index/{{$pessoa['prontuario_cod']}}" class="list-group-item list-group-item-action flex-column align-items-start active">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$pessoa["pessoa_nome"]}}</h5>
                        <small></small>
                        </div>
                        <p class="mb-1">CPF: {{$pessoa["pessoa_cpf"]}}</p>
                        <small></small>                        
                        <p class="mb-1">Numero do cartão do SUS: {{$pessoa["paciente_sus_nr"]}}</p>
                        <small></small>   
                        <p class="mb-1">Prontuario: {{$pessoa["prontuario_cod"]}}</p>
                        <small></small>     
                        <hr> 
                        <small>Clique para acessar</small>                 
                    </a>
            </div>
            
            
           
            @endforeach 

            @if(empty($pessoas))
                <a href="/pessoa/cadastrar/paciente" style="align-items: center;" class="list-group-item list-group-item-action flex-column align-items-start active">Cadstrar novo paciente</a>
            @endif
                    
        @endif  
    
    </ul>

    
    

    

@endsection
