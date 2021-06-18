@extends ('layout')

@section('cabecalho')
Consultas
@endsection

<style>
.buttonEdicao {
    background-color: transparent;
    color: none;
    border: none; /* Green */
}
</style>

@section('conteudo')

<ul class="nav nav-tabs" id="myTab" role="tablist" >
    <li class="nav-item col-sm-12 col-md-2 col-lg-2  mt-3" >
        <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Consultas</a>
    </li>
<!--    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 3" id="realizadas-tab" data-toggle="tab" href="#realizadas" role="tab" aria-controls="realizadas" aria-selected="false">Consultas finalizadas</a>
    </li>
-->
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Consultas do Dia </h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul >
                    @foreach ($consultas as $consulta)

                            <li class="list-group-item d-flex justify-content-between align-items-left lista-informacoes" >
                                {{$consulta["pessoa_nome"]}} {{$consulta["pessoa_sobrenome"]}}
                                    <span class="d-flex">

                                    

                                    <div class="" id="data-consulta-{{$consulta['consulta_id']}}"> {{ date('d/m/Y', strtotime($consulta["consulta_data"]))}}  </div><button class="buttonEdicao mr-5"  id="editaData"onclick='alteraData({{$consulta["consulta_id"]}})'><i class="fas fa-edit  text-info   "></i></button>

                                    <div class=" mr-5  " hidden id="input-data-consulta-{{$consulta['consulta_id']}}"> 
                                            <input type="date" class="form-control " value="{{$consulta['consulta_data']}}">
                                            <div class="input-group-append ">
                                                <button class="btn btn-primary btn-block" onclick='editarData({{$consulta["consulta_id"]}})'>
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                @csrf
                                            </div>
                                        </div>

                                    <div class="" id="hora-consulta-{{$consulta['consulta_id']}}" > {{ $consulta["consulta_horario"]}} horas  </div><button class="buttonEdicao mr-5 " id="btnEditaHora" onclick='alteraVisual({{$consulta["consulta_id"]}})'><i class="fas fa-edit  text-info  "></i></button>
                                    
                                        <div class="  " hidden id="input-hora-consulta-{{$consulta['consulta_id']}}"> 
                                            <input type="time" class="form-control " value="{{$consulta['consulta_horario']}}">
                                            <div class="input-group-append ">
                                                <button class="btn btn-primary btn-block" onclick='editarHora({{$consulta["consulta_id"]}})'>
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                @csrf
                                            </div>
                                        </div>
                                

                                    
                                    

                                        @if($consulta["consulta_status_status_id"]==1)
                                            
                                                <i class="fas fa-check-double text-warning" id="status-consulta-{{$consulta['consulta_id']}}"> Aguardando Clínica</i> <button class="buttonEdicao" id="editaStatus" onclick='alteraStatus({{$consulta["consulta_id"]}})'><i class="fas fa-edit  text-info  "></i></button> 

                                                <div class=" mb-3" hidden id="input-status-consulta-{{$consulta['consulta_id']}}">                                                    
                                                    <select name="altera-status-consulta" id="altera-status-consulta-{{$consulta['consulta_id']}}" class="form-control">
                                                        <option value="1"> Aguardando Clínica </option>
                                                        <option value="2"> Confirmado </option>                                        
                                                    </select>
                                                    <div class="input-group-append ">
                                                        <button class="btn btn-primary btn-block" onclick='editaStatus({{$consulta["consulta_id"]}})'>
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                </div>
                                   
                                        @elseif($consulta["consulta_status_status_id"]==2)

                                                <i class="fas fa-check-double text-success" id="status-consulta-{{$consulta['consulta_id']}}"> Confirmado</i> </i> <button class="buttonEdicao" id="editaStatus" onclick='alteraStatus({{$consulta["consulta_id"]}})'><i class="fas fa-edit  text-info  "></i></button>


                                                <div class=" mb-3" hidden id="input-status-consulta-{{$consulta['consulta_id']}}">                                                    
                                                    <select name="altera-status-consulta" id="altera-status-consulta-{{$consulta['consulta_id']}}" class="form-control">
                                                        <option value="1"> Aguardando Clínica </option>
                                                        <option value="2"> Confirmado </option>                                        
                                                    </select>
                                                    <div class="input-group-append ">
                                                        <button class="btn btn-primary btn-block" onclick='editaStatus({{$consulta["consulta_id"]}})'>
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                </div>
                                        @elseif($consulta["consulta_status_status_id"]==5)

                                                <i class="fas fa-check-double text-black-50" id="status-consulta-{{$consulta['consulta_id']}}"> Finalizado</i>  <button class="buttonEdicao" id="editaStatus" onclick='alteraStatus({{$consulta["consulta_id"]}})'><i class="fas fa-edit  text-info  "></i></button>


                                                <div class=" mb-3" hidden id="input-status-consulta-{{$consulta['consulta_id']}}">                                                    
                                                    <select name="altera-status-consulta" id="altera-status-consulta-{{$consulta['consulta_id']}}" class="form-control">
                                                        <option value="1"> Aguardando Clínica </option>
                                                        <option value="2"> Confirmado </option>                                        
                                                    </select>
                                                    <div class="input-group-append ">
                                                        <button class="btn btn-primary btn-block" onclick='editaStatus({{$consulta["consulta_id"]}})'>
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                </div>
                                        @endif

                                        <!--
                                            <a href="/paciente/consulta/descricao/{{$consulta['consulta_id']}}/{{$consulta['pessoa_cpf']}}" class="btn btn-info btn-sm mr-1">
                                            <i class="fas fa-external-link-alt"></i>
                                        -->
                                        </a>                          
                                    
                                    </span>  
                                
                                </li>
                        
                            <hr>
                            

                    @endforeach

                    </ul>
                </div>                
            </div>   
        </div>
    </div>

    <!-- <div class="tab-pane fade" id="realizadas" role="tabpanel" aria-labelledby="realizadas-tab" >
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
-->

@section('post-script')

    <script>
        function alteraVisual(consultaId) {
            //alert(consultaId)
            //return
        const horaConsulta = document.getElementById(`hora-consulta-${consultaId}`);
        const inputHora = document.getElementById(`input-hora-consulta-${consultaId}`);
        const btnEditaHora = document.getElementById(`btnEditaHora`)

        if (horaConsulta.hasAttribute('hidden')) {
            horaConsulta.removeAttribute('hidden');
            inputHora.hidden = true;
            btnEditaHora.removeAttribute('hidden');
        } else {
            inputHora.removeAttribute('hidden');
            horaConsulta.hidden = true;
            btnEditaHora.hidden = true;
        }
    }
    </script>
     <script>
        function alteraStatus(consultaId) {

           
            
            //alert(consultaId)
            //return
        const statusConsulta = document.getElementById(`status-consulta-${consultaId}`);
        const alteraStatusConsulta = document.getElementById(`input-status-consulta-${consultaId}`);
        const btnEditaStaus = document.getElementById(`editaStatus`)

        if (statusConsulta.hasAttribute('hidden')) {
            statusConsulta.removeAttribute('hidden');
            alteraStatusConsulta.hidden = true;
            btnEditaStaus.removeAttribute('hidden');
        } else {
            alteraStatusConsulta.removeAttribute('hidden');
            statusConsulta.hidden = true;
            btnEditaStaus.hidden = true;
        }
    }
    </script> 
        <script>
        function alteraData(consultaId) {

        
            
            //alert(consultaId)
            //return
        const dataConsulta = document.getElementById(`data-consulta-${consultaId}`);
        const alteraDataConsulta = document.getElementById(`input-data-consulta-${consultaId}`);
        const btnEditaStaus = document.getElementById(`editaData`)

        if (dataConsulta.hasAttribute('hidden')) {
            dataConsulta.removeAttribute('hidden');
            alteraDataConsulta.hidden = true;
            btnEditaStaus.removeAttribute('hidden');
        } else {
            alteraDataConsulta.removeAttribute('hidden');
            dataConsulta.hidden = true;
            btnEditaStaus.hidden = true;
        }
    }
    </script>

    <script>
        function editarHora(consultaId) {

            
                let formData = new FormData();
                const hora = document
                    .querySelector(`#input-hora-consulta-${consultaId} > input`)
                    .value;
                const token = document
                    .querySelector(`input[name="_token"]`)
                    .value;                

                formData.append('hora', hora);
                formData.append('_token',token);
                formData.append('id', consultaId);
                const url = `/editaHora`;
                fetch(url, {
                method: 'POST',
                body: formData
        
            }).then(() => {
                    alteraVisual(consultaId);
                    document.getElementById(`hora-consulta-${consultaId}`).textContent = hora;
        });
    }
    </script>

    <script>
        function editaStatus(consultaId)
        {
            let formData = new FormData();
        
            const status = document.getElementById(`altera-status-consulta-${consultaId}`).value;
            const statusT = document.getElementById(`altera-status-consulta-${consultaId}`).text;
            const token = document
                .querySelector(`input[name="_token"]`)
                .value;
                //console.log(token)
               
                formData.append('status', status);
                formData.append('_token',token);
                formData.append('id', consultaId);
                const url = `/editaStatus`;
                fetch(url, {
                method: 'POST',
                body: formData
        
            }).then(() => {
                    alteraStatus(consultaId);
                    document.getElementById(`status-consulta-${consultaId}`).text;
                    location. reload();
        });
        }

    </script>

<script>
        function editarData(consultaId) {

            
                let formData = new FormData();
                const data = document
                    .querySelector(`#input-data-consulta-${consultaId} > input`)
                    .value;

                    
                const token = document
                    .querySelector(`input[name="_token"]`)
                    .value;  
                

                formData.append('data', data);
                formData.append('_token',token);
                formData.append('id', consultaId);
                const url = `/editaData`;
                fetch(url, {
                method: 'POST',
                body: formData
        
            }).then(() => {
                    alteraData(consultaId);
                    document.getElementById(`data-consulta-${consultaId}`).textContent = data;
        });
    }
    </script>


    <script>
        function editarData(consultaId) {

            
                let formData = new FormData();
                const data = document
                    .querySelector(`#input-data-consulta-${consultaId} > input`)
                    .value;

                    
                const token = document
                    .querySelector(`input[name="_token"]`)
                    .value;  
                

                formData.append('data', data);
                formData.append('_token',token);
                formData.append('id', consultaId);
                const url = `/editaData`;
                fetch(url, {
                method: 'POST',
                body: formData
        
            }).then(() => {
                    alteraData(consultaId);
                    document.getElementById(`data-consulta-${consultaId}`).textContent = data;
        });
    }
    </script>


@endsection

@endsection