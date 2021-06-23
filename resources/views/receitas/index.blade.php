@extends ('layout')

@section('cabecalho')
Receita
@endsection

@section('conteudo')

                @if (session('error'))
                    <div class="alert alert-warning">
                        {{ session('error') }}
                    </div>
                @endif

<ul class="nav nav-tabs" id="myTab" role="tablist" >
    <li class="nav-item col-sm-12 col-md-2 col-lg-2  mt-3" >
        <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dados</a>
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
                        <h3 style="text-align: center;">Receita</h3>
                        @foreach($consultas as $consulta)
                        <div class="receita" >
                            <h5>
                                Paciente: {{$consulta["pessoa_nome"]}} {{$consulta["pessoa_sobrenome"]}}

                            </h5>
                            <hr>


                            <h5 class="mt-5">Medicamentos</h5>

                                {{$consulta["medicamento_nome"]}}   -    {{$consulta["posologia_posologia"]}}       -   {{$consulta["posologia_tipo"]}}     - {{$consulta["posologia_tipo"]}}   
                            <hr>
                            <h5 class="mt-3">Exames</h5>
                            <h6 class="mt-3">Data do Exame</h6>
                            -
                                {{$consulta["exame_data"]}}  
                            <h6 class="mt-3">Laudo</h6> 
                            -  
                                {{$consulta["exame_resultado"]}}  
                                
                                <hr>

                                <p style="text-align: center;">Receita gerada pelos sistema Global Clínica</p>



                        </div>



                                

                        @endforeach

                        

                
                
                        
                    </ul>
                </div>

                
                <span>            
            </div>   
        </div>
    </div>

    <div class="tab-pane fade" id="realizadas" role="tabpanel" aria-labelledby="realizadas-tab" >
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3"></h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul >
                   
                    
                        <hr>
                    </ul>
                </div>
            </div>   
        </div>
    </div>
</div>


@endsection


