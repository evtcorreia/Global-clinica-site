@extends ('layout')

@section('cabecalho')

    Bem vindo {{$pessoa["pessoa_nome"]}} {{$pessoa["pessoa_sobrenome"]}}

@endsection

@section('conteudo')

    <div class="row row-cols-1 row-cols-md-3 g-4 ">   

    <div class="col col-sm-12 col-md-12 col-lg-3 mb-3 mt-3">
            <a href="/adm/criar/clinica/{{$pessoa['pessoa_cpf']}}">
                <div class="card card-menu-individual">
                    <img src="../../img/usuario/novaclinica.png" class="card-img-top  mx-auto d-block mt-3 menu-paciente" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nova Clinica</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>
        
        
        <div class="col col-sm-12 col-md-12 col-lg-3 mb-3 mt-3">
            <a href="/adm/criar/medico/{{$pessoa['pessoa_cpf']}}" >
                <div class="card card-menu-individual">
                <img src="../../img/usuario/consulta.png" class="card-img-top  mx-auto d-block mt-3 menu-paciente" alt="imagem logo estetoscopio azul, e um coração com coração vermelho no centro" >
                    <div class="card-body">
                        <h5 class="card-title">Novo(a) Medico(a)</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>

        
        <div class="col col-sm-12 col-md-12 col-lg-3 mb-3 mt-3">
        <a href="/adm/criar/recep/{{$pessoa['pessoa_cpf']}}" >
                <div class="card card-menu-individual">
                <img src="../../img/usuario/contato3.png" class="card-img-top  mx-auto d-block mt-3 menu-paciente" alt="imagem logo estetoscopio azul, e um coração com coração vermelho no centro" >
                    <div class="card-body">
                        <h5 class="card-title">Novo(a) Recepsionista</h5>
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
                        <h5 class="card-title">Relatorios</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>


        

    </div>

@endsection
