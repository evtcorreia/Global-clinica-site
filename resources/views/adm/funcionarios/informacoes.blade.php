@extends ('layout')

@section('cabecalho')
Informações
@endsection

<style>
.buttonEdicao {
    background-color: transparent;
    color: none;
    border: none; /* Green */
}
</style>

@section('conteudo')

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item col-sm-12 col-md-2 col-lg-2  mt-3">
        <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dados Pessoais</a>
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
                    <h6>Pai</h6>
                    <p>{{$pessoa["pessoa_pai"]}}</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>CPF</h6>
                    <p>{{$pessoa["pessoa_mae"]}}</p>
                </div>
            </div>

            <div class="row ml-4 ">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Mãe</h6>
                    <p>{{$pessoa["pessoa_pai"]}}</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>CPF</h6>
                    <p>{{$pessoa["pessoa_mae"]}}</p>
                    
                </div>
            </div>

            <h3 class="ml-2 pt-3">Dados Profissionais</h3>
            <hr>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Admissao</h6>

                    
                    <p>
                        {{ date('d/m/Y', strtotime($pessoa["funcionario_dataAdmissao"]))}}</i>
                    </p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Demissão</h6>
                    @if($pessoa["funcionario_dataDemissao"] != null)
                        {{ date('d/m/Y', strtotime($pessoa["funcionario_dataDemissao"]))}}<i class="fas fa-edit ml-3   "></i>
                    @else
                    
                    
                       

                        <div class="" id="data-demissao"></div><button class="buttonEdicao mr-5" id="editaData" onclick='alteraData({{$pessoa["pessoa_cpf"]}})'><i class="fas fa-edit  text-info   "></i></button>

                                    <div class=" mr-5  " hidden id="input-data-demissao">
                                        <input type="date" class="form-control " value="--------">
                                        <div class="input-group-append ">
                                            <button class="btn btn-primary btn-block" onclick='editarData({{$pessoa["pessoa_cpf"]}})'>
                                                <i class="fas fa-check"></i>
                                            </button>
                                            @csrf
                                        </div>
                                    </div>
                    
                    
                    @endif

                    
                
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('post-script')
        <script>
            function alteraData(cpf) {



                
                const dataDemissao = document.getElementById(`data-demissao`);
                const insereDemissao = document.getElementById(`input-data-demissao`);
                const btnEditaStaus = document.getElementById(`editaData`)
                
                
              
                if (dataDemissao.hasAttribute('hidden')) {
                    dataDemissao.removeAttribute('hidden');
                    insereDemissao.hidden = true;
                    btnEditaStaus.removeAttribute('hidden');
                } else {
                    insereDemissao.removeAttribute('hidden');
                    dataDemissao.hidden = true;
                    btnEditaStaus.hidden = true;
                }
            }
        </script>
        <script>
            function editarData(cpf) {


                let formData = new FormData();
                const data = document
                    .querySelector(`#input-data-demissao > input`)
                    .value;

                
                const token = document
                    .querySelector(`input[name="_token"]`)
                    .value;
               

                formData.append('data', data);
                formData.append('_token', token);
                formData.append('cpf', cpf);
                const url = `/editaDataDemissao`;
                fetch(url, {
                    method: 'POST',
                    body: formData

                }).then(() => {
                    //alteraData(consultaId);
                    //document.getElementById(`data-consulta-${consultaId}`).textContent = data;
                    location.reload();
                });
            }
        </script>
    @endsection