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
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 2" id="medicos-tab" data-toggle="tab" href="#medicos" role="tab" aria-controls="medicos" aria-selected="false">Lista 2</a>
    </li>
</ul>


<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="lista1" role="tabpanel" aria-labelledby="lista1-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Lista de Clinicas </h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul>
                    @foreach( $clinicaDoAdm as $clinica) 
                    <li class="list-group-item d-flex justify-content-between align-items-left lista-informacoes" >
                    {{$clinica["clinica_nome"]}}
                            <span class="d-flex">
                        
                            
                                <a  href="/adm/listar/listar_func/{{$clinica['clinica_id']}}" class=" mr-5">
                                    
                                    <button class="buttonExclusao" > <i class="fas fa-external-link-alt text-primary" aria-hidden="true"></i></button>
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



    <div class="tab-pane fade" id="medicos" role="tabpanel" aria-labelledby="medicos-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Lista  </h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>


    
</div>
@endsection