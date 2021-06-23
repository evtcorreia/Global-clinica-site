@extends ('layout')

@section('cabecalho')
Consultas
@endsection

@section('conteudo')

                @if (session('error'))
                    <div class="alert alert-warning">
                        {{ session('error') }}
                    </div>
                @endif

<ul class="nav nav-tabs" id="myTab" role="tablist" >
    <li class="nav-item col-sm-12 col-md-2 col-lg-2  mt-3" >
        <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Em Aberto</a>
    </li>
   <!--  <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 3" id="realizadas-tab" data-toggle="tab" href="#realizadas" role="tab" aria-controls="realizadas" aria-selected="false">Realizadas</a>
    </li> -->
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3"></h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul >

                   
                   
                   
                    @foreach ($consultas as $consulta)
                    @if(($consulta["consulta_status_status_id"] != 3) && ($consulta["consulta_status_status_id"]  !=5))

                    {{$consulta["pessoa_nome"]}}
                    <li class="list-group-item d-flex justify-content-between align-items-left lista-informacoes" >Consulta -
                    {{ date('d/m/Y', strtotime($consulta["consulta_data"]))}}
                            <span class="d-flex">
                        
                            @if($consulta["consulta_status_status_id"]==1)
                                <a  class=" mr-5">
                                    <i class="fas fa-check-double text-warning"> Aguardando Clínica</i>
                                    <button class="buttonExclusao" onclick='excluirConsulta({{$consulta["consulta_id"]}})'> </button>
                                    @csrf
                                </a> 

                            @elseif($consulta["consulta_status_status_id"]==2)

                                    <i class="fas fa-check-double text-success"> Confirmado</i>
                            @elseif($consulta["consulta_status_status_id"]==3)

                                    <i class="fas fa-check-double text-black-50"> Finalizado</i>
                            @endif
                        
                       

                            </span>
                        </li>
                        @endif
                            @endforeach
                        <hr>
                    </ul>
                </div>

                
                <span>            
            </div>   
        </div>
    </div>

    <div class="tab-pane fade" id="realizadas" role="tabpanel" aria-labelledby="realizadas-tab" >
        <div style="background-color: white;">
            
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul >
                    @foreach($consultas as $consulta)
                    @if(($consulta["consulta_status_status_id"] == 3) && ($consulta["consulta_status_status_id"]  ==5))
                    <li class="list-group-item d-flex justify-content-between align-items-left lista-informacoes" >Consulta -
                    {{ date('d/m/Y', strtotime($consulta["consulta_data"]))}}
                            <span class="d-flex">
                        
                            @if($consulta["consulta_status_status_id"]==1)
                                <a  class=" mr-5">
                                    <i class="fas fa-check-double text-warning"> Aguardando Clínica</i>
                                    <button class="buttonExclusao" onclick='excluirConsulta({{$consulta["consulta_id"]}})'> <i class="fa fa-trash-alt ml-3 text-danger" aria-hidden="true"></i></button>
                                    @csrf
                                </a> 

                            @elseif($consulta["consulta_status_status_id"]==2)

                                    <i class="fas fa-check-double text-success"> Confirmado</i>
                            @elseif($consulta["consulta_status_status_id"]==3)

                                    <i class="fas fa-check-double text-black-50"> Finalizado</i>
                            @endif
                        
                            <!--
                                <a href="/paciente/consulta/descricao/{{$consulta['consulta_id']}}/{{$pessoa['pessoa_cpf']}}" class="btn btn-info btn-sm mr-5">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>                          
                            -->
                            </span>
                        </li>
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

@section('post-script')
<script>
    function excluirConsulta(consultaId)
    {
        
        let formData = new FormData();

        const cpf = document
            .querySelector(`#input-cpf`)
            .value;

        const token = document
                .querySelector(`input[name="_token"]`)
                .value;
        
        formData.append('id', consultaId);
        formData.append('_token',token);
        formData.append('cpf',cpf);
       // formData.append('del',"*");
        
       
        const url = `/deletaConsulta`

        fetch(url, {
            method: 'POST',
            body: formData
        }).then(()=>{
            location. reload();
        });
    }
</script>
@endsection