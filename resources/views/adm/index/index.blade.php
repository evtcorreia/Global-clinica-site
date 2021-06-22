@extends ('layout')

@section('cabecalho')

    Bem-vindo {{$pessoa["pessoa_nome"]}} {{$pessoa["pessoa_sobrenome"]}}

@endsection

@section('conteudo')

    <div class="row row-cols-1 row-cols-md-3 g-4 ">   

    <div class="col col-sm-12 col-md-12 col-lg-3 mb-3 mt-3">
            <a href="/adm/criar/clinica/{{$pessoa['pessoa_cpf']}}">
                <div class="card card-menu-individual">
                    <img src="../../img/usuario/novaclinica2.png" class="card-img-top  mx-auto d-block mt-3 menu-paciente" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nova Clínica</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>
        
        
        <div class="col col-sm-12 col-md-12 col-lg-3 mb-3 mt-3">
            <a href="/adm/criar/medico/{{$pessoa['pessoa_cpf']}}" >
                <div class="card card-menu-individual">
                <img src="../../img/usuario/novoMedico.png" class="card-img-top  mx-auto d-block mt-3 menu-paciente" alt="imagem logo estetoscopio azul, e um coração com coração vermelho no centro" >
                    <div class="card-body">
                        <h5 class="card-title">Novo(a) Médico(a)</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>

        
        <div class="col col-sm-12 col-md-12 col-lg-3 mb-3 mt-3">
        <a href="/adm/criar/recep/{{$pessoa['pessoa_cpf']}}" >
                <div class="card card-menu-individual">
                <img src="../../img/usuario/novaRecp.png" class="card-img-top  mx-auto d-block mt-3 menu-paciente" alt="imagem logo estetoscopio azul, e um coração com coração vermelho no centro" >
                    <div class="card-body">
                        <h5 class="card-title">Novo(a) Recepcionista</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col col-sm-12 col-md-12 col-lg-3 mb-3 mt-3">
            <a href="/adm/listar/listar_clinicas/{{$pessoa['pessoa_cpf']}}">
                <div class="card card-menu-individual">
                    <img src="../../img/usuario/listaFunc.png" class="card-img-top  mx-auto d-block mt-3 menu-paciente" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Listar Funcionarios</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col col-sm-12 col-md-12 col-lg-3 mb-3 mt-3">
            <a href="/adm/criar/relatorio/{{$pessoa['pessoa_cpf']}}" >
                <div class="card card-menu-individual" id="relatorio">
                    <img src="../../img/usuario/relatorio2.png" class="card-img-top  mx-auto d-block mt-3 menu-paciente" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Relatórios</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>


        

    </div>

@endsection
