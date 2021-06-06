@extends ('layout')

@section('cabecalho')

    Bem vindo  atendente {{$pessoa["pessoa_nome"]}} {{$pessoa["pessoa_sobrenome"]}}

@endsection

@section('conteudo')

    <div class="row row-cols-1 row-cols-md-3 g-4 ">   

    <div class="col col-sm-12 col-md-12 col-lg-3 mb-3 mt-3">
            <a href="/busca/paciente">
                <div class="card card-menu-individual">
                    <img src="../../img/usuario/agendamento2.png" class="card-img-top  mx-auto d-block mt-3 menu-paciente" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Agendamentos</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>
        
        
        <div class="col col-sm-12 col-md-12 col-lg-3 mb-3 mt-3">
            <a href="/secretaria/consultas/index/{{$pessoa['clinica_id']}}">
                <div class="card card-menu-individual">
                <img src="../../img/usuario/consulta.png" class="card-img-top  mx-auto d-block mt-3 menu-paciente" alt="imagem logo estetoscopio azul, e um coração com coração vermelho no centro" >
                    <div class="card-body">
                        <h5 class="card-title">Consultas</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col col-sm-12 col-md-12 col-lg-3 mb-3 mt-3">
            <div class="card card-menu-individual">
                <img src="../../img/usuario/contato3.png" class="card-img-top  mx-auto d-block mt-3 menu-paciente" alt="...">
            <div class="card-body">
                <h5 class="card-title">Recados</h5>
                <p class="card-text"></p>
            </div>
            </div>
        </div>

        
        <div class="col col-sm-12 col-md-12 col-lg-3 mb-3 mt-3">
            <a href="/pessoa/cadastrar/paciente" >
                <div class="card card-menu-individual">
                    <img src="../../img/usuario/adcpaciente.png" class="card-img-top  mx-auto d-block mt-3 menu-paciente" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Novo Paciente</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>


    </div>

@endsection
