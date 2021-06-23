@extends ('layout')

@section('cabecalho')
Consultar Funcionários
@endsection

<style>
    .buttonEdicao {
        background-color: transparent;
        color: none;
        border: none;
        /* Green */
    }
</style>

@section('conteudo')

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item col-sm-12 col-md-2 col-lg-2  mt-3">
        <a class="nav-link active " id="lista1-tab" data-toggle="tab" href="#lista1" role="tab" aria-controls="lista" aria-selected="true">Funcionários</a>
    </li>
</ul>


<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="lista1" role="tabpanel" aria-labelledby="lista1-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Lista de Funcionários</h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul>
                        @foreach( $pessoas as $pessoa) 
                            <li class="list-group-item d-flex justify-content-between align-items-left lista-informacoes" >
                                {{$pessoa["pessoa_nome"]}}
                                <span class="d-flex">
                        
                            
                                <a href="/funcionario/informacoes/{{$pessoa['pessoa_cpf']}}" class=" mr-5 fas fa-external-link-alt text-primary" >
                               
                                   
                                    @csrf
                                </a> 

                           
                                    
                                   
                            
                        
                         
                                </span>
                            </li>
                        @endforeach


                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection