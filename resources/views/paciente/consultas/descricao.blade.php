@extends ('layout')

@section('cabecalho')
Consulta
@endsection

@section('conteudo')

<ul class="nav nav-tabs" id="consultaTab" role="tablist" >
    <li class="nav-item col-sm-12 col-md-2 col-lg-2  mt-3" >
        <a class="nav-link active " id="consulta-tab" data-toggle="tab" href="#consulta" role="tab" aria-controls="consulta" aria-selected="true">Informações</a>
    </li>
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 3" id="receitas-tab" data-toggle="tab" href="#receitas" role="tab" aria-controls="receitas" aria-selected="false">Receitas</a>
    </li>
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 3" id="exames-tab" data-toggle="tab" href="#exames" role="tab" aria-controls="exames" aria-selected="false">Exames</a>
    </li>
</ul>

<input type="button" value="Voltar" onClick="history.go(-1)"> 

<div class="tab-content" id="consultaTab">
    <div class="tab-pane fade show active" id="consulta" role="tabpanel" aria-labelledby="consulta-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Dados Pessoais</h3>
            <hr>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Nome</h6>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Sobrenome</h6>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection