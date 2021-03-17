@extends ('layout')

@section('cabecalho')
Informações
@endsection

@section('conteudo')

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item col-sm-12 col-md-2 col-lg-2  mt-3">
        <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dados Pessoais</a>
    </li>
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 3" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Dados Medicos</a>
    </li>
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link " id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contato</a>
    </li>
</ul>


<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Dados Pessoais</h3>
            <hr>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Nome</h6>
                    <p>{{$pessoa["pessoa_nome"]}}</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Sobrenome</h6>
                    <p>{{$pessoa["pessoa_sobrenome"]}}</p>
                </div>
            </div>

            <div class="row ml-4 ">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>CPF</h6>
                    <p>{{$pessoa["pessoa_cpf"]}}</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>RG</h6>
                    <p>{{$pessoa["pessoa_rg"]}}</p>
                </div>
            </div>

            <div class="row ml-4 ">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>CPF</h6>
                    <p>{{$pessoa["pessoa_pai"]}}</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>RG</h6>
                    <p>{{$pessoa["pessoa_mae"]}}</p>
                </div>
            </div>

            <div class="row ml-4 ">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>CPF</h6>
                    <p>{{$pessoa["pessoa_pai"]}}</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>RG</h6>
                    <p>{{$pessoa["pessoa_mae"]}}</p>
                </div>
            </div>
        </div>
    </div>


    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Dados Pessoais</h3>
            <hr>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Numero SUS</h6>
                    <p>{{$paciente["paciente_sus_nr"]}}</p>
                </div>
            </div>

            <div class="row ml-4 ">
            <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Tipo Sanguineo</h6>
                    <p>{{$paciente["paciente_tipo_sang"]}}</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Fator RH</h6>
                    <p>{{$paciente["paciente_fator_rh"]}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Dados Pessoais</h3>
            <hr>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Telefone</h6>

                    @foreach ($telefones as $telefone) 
                        <p>({{$telefone["telefone_area"]}})  {{$telefone["telefone_num"]}}</p>
                    @endforeach                
            
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Bairro</h6>
                    <p>{{$endereco["endereco_bairro"]}}</p>
                </div>
            </div>

            <div class="row ml-4 ">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Rua</h6>
                    <p>{{$endereco["endereco_logradouro"]}}</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Cidade</h6>
                    <p>{{$endereco["endereco_cidade"]}}</p>
                </div>
            </div>

            <div class="row ml-4 ">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>CEP</h6>
                    <p>{{$endereco["endereco_cep"]}}</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Estado</h6>
                    <p>{{$endereco["estados_estado_id"]}}</p>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection