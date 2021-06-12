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
                    <h6>Mae</h6>
                    <p>{{$pessoa["pessoa_pai"]}}</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>CPF</h6>
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

            <div class="row ml-4 ">
            <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Comorbidades</h6>
                    <p></p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Alergias</h6>
                    <p></p>
                </div>
            </div>

            <div class="row ml-4 ">
            <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>DST</h6>
                    <p></p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Medicações Controladas</h6>
                    <p></p>
                </div>
            </div>


            <div class="row ml-4 ">
            <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Possui doenças graves na familia?</h6>
                    <p></p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Já realizou alguma cirurgia?</h6>
                    <p></p>
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
                    <h6> Telefone   </h6> 

                    @foreach ($telefones as $telefone) 
                        <p id="telefone-paciente-{{$telefone['telefone_cod']}}">({{$telefone["telefone_area"]}})  {{$telefone["telefone_num"]}} <button class="buttonEdicao" onclick='alteraTelefone({{$telefone["telefone_cod"]}})'> <i class="fas fa-edit  text-info   "></i> </button></p>
                    @endforeach    

                                        <div class=" mr-5  " hidden id="input-telefone-paciente-{{$telefone['telefone_cod']}}"> 
                                            <input type="text"  class="form-control" id="phone" value="({{$telefone['telefone_area']}}) {{$telefone['telefone_num']}}" maxlength="14"  />
                                                <div class="input-group-append ">
                                                        <button class="btn btn-primary btn-block" onclick="editarTelefone({{$telefone['telefone_cod']}})">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                @csrf
                                            </div>
                                        </div>            
            
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Bairro  </h6>
                    <p>{{$endereco["endereco_bairro"]}} <button class="buttonEdicao" onclick=''> <i class="fas fa-edit  text-info   "></i> </button></p>
                </div>
            </div>

            <div class="row ml-4 ">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Rua </h6>
                    <p>{{$endereco["endereco_logradouro"]}} <button class="buttonEdicao" onclick=''> <i class="fas fa-edit  text-info   "></i> </button></p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Cidade</h6>
                    <p>{{$cidade["cidade_desc"]}} <button class="buttonEdicao" onclick=''> <i class="fas fa-edit  text-info   "></i> </button></p>
                </div>
            </div>

            <div class="row ml-4 ">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>CEP </h6>
                    <p>{{$endereco["endereco_cep"]}} <button class="buttonEdicao" onclick=''> <i class="fas fa-edit  text-info   "></i> </button></p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Estado </h6>
                    <p>{{$estado["estado_nome"]}} <button class="buttonEdicao" onclick=''> <i class="fas fa-edit  text-info   "></i> </button></p>
                </div>
            </div>
            </div>

            

        </div>
    </div>
</div>


@endsection

@section('post-script')




    <script>
        function alteraTelefone(telefone_cod) {
            //alert(consultaId)
            //return
        const numTel = document.getElementById(`telefone-paciente-${telefone_cod}`);
        const inputTel = document.getElementById(`input-telefone-paciente-${telefone_cod}`);
        const btnEditaTel = document.getElementById(`btnEditaTel`)

        if (numTel.hasAttribute('hidden')) {
            numTel.removeAttribute('hidden');
            inputTel.hidden = true;
            btnEditaTel.removeAttribute('hidden');
        } else {
            inputTel.removeAttribute('hidden');
            numTel.hidden = true;
            btnEditaTel.hidden = true;
        }
    }
    </script>

    <script>
       $('#phone')

            .keydown(function (e) {
                var key = e.which || e.charCode || e.keyCode || 0;
                $phone = $(this);

                // Don't let them remove the starting '('
                if ($phone.val().length === 1 && (key === 8 || key === 46)) {
                    $phone.val('('); 
                    return false;
                } 
                // Reset if they highlight and type over first char.
                else if ($phone.val().charAt(0) !== '(') {
                    $phone.val('('+$phone.val()); 
                }

                // Auto-format- do not expose the mask as the user begins to type
                if (key !== 8 && key !== 9) {
                    if ($phone.val().length === 3) {
                        $phone.val($phone.val() + ')');
                    }
                    if ($phone.val().length === 4) {
                        $phone.val($phone.val() + ' ');
                    }           
                    if ($phone.val().length === 10) {
                        $phone.val($phone.val() + '-');
                    }
                }

                // Allow numeric (and tab, backspace, delete) keys only
                return (key == 8 || 
                        key == 9 ||
                        key == 46 ||
                        (key >= 48 && key <= 57) ||
                        (key >= 96 && key <= 105)); 
            })

            .bind('focus click', function () {
                $phone = $(this);

                if ($phone.val().length === 0) {
                    $phone.val('(');
                }
                else {
                    var val = $phone.val();
                    $phone.val('').val(val); // Ensure cursor remains at the end
                }
            })

            .blur(function () {
                $phone = $(this);

                if ($phone.val() === '(') {
                    $phone.val('');
                }
            });

    </script>

<script>
        function editarTelefone(telefoneId) {

           
            
                let formData = new FormData();
                const tel = document
                    .querySelector(`#input-telefone-paciente-${telefoneId} > input`)
                    .value;

                let area = tel.split(" ")
                    
                alert(area)
                return
                const token = document
                    .querySelector(`input[name="_token"]`)
                    .value;  
              
               

                formData.append('area', area);
                formData.append('telefone', tel);
                formData.append('_token',token);
                formData.append('id', telefoneId);
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