@extends ('layout')

@section('cabecalho')
Consultas
@endsection

@section('conteudo')

<ul class="nav nav-tabs" id="myTab" role="tablist" >
    <li class="nav-item col-sm-12 col-md-2 col-lg-2  mt-3" >
        <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Em Aberto</a>
    </li>
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 3" id="realizadas-tab" data-toggle="tab" href="#realizadas" role="tab" aria-controls="realizadas" aria-selected="false">Realizadas</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Nome do Paciente</h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul >
                    <li class="list-group-item d-flex justify-content-between align-items-left lista-informacoes" >Consulta 1/12/2021
                            <span class="d-flex">

                                <a href="/series/1/temporadas" class="btn btn-info btn-sm mr-1">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>                          
                            
                            </span>     
                        
                        </li>
                        <hr>
                    </ul>
                </div>                
            </div>   
        </div>
    </div>

    <div class="tab-pane fade" id="realizadas" role="tabpanel" aria-labelledby="realizadas-tab" >
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Nome do Paciente</h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul >
                        <li class="list-group-item d-flex justify-content-between align-items-left lista-informacoes" >Consulta 1/12/12
                            <span class="d-flex">

                                <a href="/series/1/temporadas" class="btn btn-info btn-sm mr-1">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            
                            </span>
                            
                        
                        </li>
                        <hr>
                    </ul>
                </div>                
            </div>   
        </div>
    </div>
</div>

@endsection