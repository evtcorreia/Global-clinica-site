@extends ('layout')

@section('cabecalho')
Consultar Relatorios
@endsection

<style>
    .buttonEdicao {
        background-color: transparent;
        color: none;
        border: none;
        /* Green */
    }
</style>

@section('conteudo')

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item col-sm-12 col-md-2 col-lg-2  mt-3">
        <a class="nav-link active " id="clinica-tab" data-toggle="tab" href="#clinica" role="tab" aria-controls="clinica" aria-selected="true">Clinica</a>
    </li>
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 2" id="medicos-tab" data-toggle="tab" href="#medicos" role="tab" aria-controls="medicos" aria-selected="false">Medicos</a>
    </li>
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 3" id="recepsionista-tab" data-toggle="tab" href="#recepsionista" role="tab" aria-controls="recepsionista" aria-selected="false">Recepsionista</a>
    </li>
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 4" id="pacientes-tab" data-toggle="tab" href="#pacientes" role="tab" aria-controls="pacientes" aria-selected="false">Pacientes</a>
    </li>
</ul>


<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="clinica" role="tabpanel" aria-labelledby="clinica-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Relatorios das Clinicas </h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="tab-pane fade" id="medicos" role="tabpanel" aria-labelledby="medicos-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Relatorios dos Medicos </h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>




    <div class="tab-pane fade" id="recepsionista" role="tabpanel" aria-labelledby="recepsionista-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Relatorios dos Recepsionistas </h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="tab-pane fade" id="pacientes" role="tabpanel" aria-labelledby="pacientes-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Relatorios dos Pacientes </h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection