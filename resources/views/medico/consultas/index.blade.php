@extends ('layout')

@section('cabecalho')
Consultas
@endsection

@section('conteudo')

<ul class="nav nav-tabs" id="myTab" role="tablist" >
    <li class="nav-item col-sm-12 col-md-2 col-lg-2  mt-3" >
        <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Consultas do dia(abertas)</a>
    </li>
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 3" id="realizadas-tab" data-toggle="tab" href="#realizadas" role="tab" aria-controls="realizadas" aria-selected="false">Consultas finalizadas</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Consultas do dia </h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul >
                    @foreach ($consultas as $consulta)
                        @if( date('d/m/Y', strtotime($consulta["consulta_data"])) === date('d/m/Y', strtotime(date('Y-m-d'))))
                            <li class="list-group-item d-flex justify-content-between align-items-left lista-informacoes" >
                                {{$consulta["pessoa_nome"]}} {{$consulta["pessoa_sobrenome"]}}
                                    <span class="d-flex">

                                    

                                    <div class="mr-5"> {{ date('d/m/Y', strtotime($consulta["consulta_data"]))}}  </div>
                                    <div class="mr-5"> {{ $consulta["consulta_horario"]}} horas </div>

                                
                                

                                    
                                    

                                        @if($consulta["consulta_status_status_id"]==1)
                                            <a  class=" mr-5">
                                                <i class="fas fa-check-double text-warning"> Aguardando Clinica</i>
                                            </a> 
                                        @elseif($consulta["consulta_status_status_id"]==2)

                                                <i class="fas fa-check-double text-success"> Confirmado</i>
                                        @elseif($consulta["consulta_status_status_id"]==5)

                                                <i class="fas fa-check-double text-black-50"> Finalizado</i>
                                        @endif

                                        <a href="/paciente/consulta/descricao/{{$consulta['consulta_id']}}/{{$consulta['pessoa_cpf']}}" class="btn btn-info btn-sm mr-1">
                                            <i class="fas fa-external-link-alt"></i>

                                        </a>                          
                                    
                                    </span>  
                                
                                </li>
                        
                            <hr>
                            
                        @endif
                    @endforeach

                    </ul>
                </div>                
            </div>   
        </div>
    </div>

    <div class="tab-pane fade" id="realizadas" role="tabpanel" aria-labelledby="realizadas-tab" >
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Consultas Finalizadas</h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul >
                    @foreach($consultas as $consulta)

                    @if( $consulta["consulta_status_status_id"] == 5)
                            <li class="list-group-item d-flex justify-content-between align-items-left lista-informacoes" >
                                {{$consulta["pessoa_nome"]}} {{$consulta["pessoa_sobrenome"]}}
                                    <span class="d-flex">

                                    

                                    <div class="mr-5"> {{ date('d/m/Y', strtotime($consulta["consulta_data"]))}}  </div>
                                    <div class="mr-5"> {{ $consulta["consulta_horario"]}} horas </div>                     

                                        @if($consulta["consulta_status_status_id"]==1)
                                            <a  class=" mr-5">
                                                <i class="fas fa-check-double text-warning"> Aguardando Clinica</i>
                                            </a> 
                                        @elseif($consulta["consulta_status_status_id"]==2)

                                                <i class="fas fa-check-double text-success"> Confirmado</i>
                                        @elseif($consulta["consulta_status_status_id"]==5)

                                                <i class="fas fa-check-double text-black-50"> Finalizado</i>
                                        @endif

                                        <a href="/paciente/consulta/descricao/{{$consulta['consulta_id']}}/{{$consulta['pessoa_cpf']}}" class="btn btn-info btn-sm mr-1">
                                            <i class="fas fa-external-link-alt"></i>

                                        </a>                          
                                    
                                    </span>  
                                
                                </li>
                        
                            <hr>
                            
                        @endif
                    @endforeach
                        <hr>
                    </ul>
                </div>                
            </div>   
        </div>
    </div>
</div>

@endsection