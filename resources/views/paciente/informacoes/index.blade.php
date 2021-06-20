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
        <a class="nav-link 3" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Dados Médicos</a>
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
                    <h6>Mãe</h6>
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
                    <h6>Tipo Sanguíneo</h6>
                    <p>{{$paciente["paciente_tipo_sang"]}}</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Fator RH</h6>
                    <p>{{$paciente["paciente_fator_rh"]}}</p>
                </div>
            </div>

            <div class="row ml-4 ">
            <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Comorbidades 
                    @if($tipoAcesso == 1)
                       <button onclick="mostraInputComorbidade({{$pessoa['prontuario_cod']}})" class="ml-2">
                            <i class="fa fa-plus" aria-hidden="true"></i> 
                        </button>
                    @endif     
                    </h6>
                                        <div class=" mr-5  " hidden id="input-comorbidade-paciente-{{$pessoa['prontuario_cod']}}"> 
                                            <input type="text"  class="form-control" id="" value="" maxlength="15"  />
                                                <div class="input-group-append ">
                                                        <button class="btn btn-primary btn-block" onclick="addComorbidade({{$pessoa['prontuario_cod']}})">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                @csrf
                                            </div>
                                        </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Alergias
                        <a href="" class="ml-2">
                            <i class="fa fa-plus" aria-hidden="true"></i> 
                        </a> 
                    
                    </h6>
                    <p></p>
                </div>
            </div>

            <div class="row ml-4 ">
            <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>DST
                        <a href="" class="ml-2">
                            <i class="fa fa-plus" aria-hidden="true"></i> 
                        </a> 
                    
                    
                    </h6>
                    <p></p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Medicações Controladas
                        <a href="" class="ml-2">
                            <i class="fa fa-plus" aria-hidden="true"></i> 
                        </a> 
                    
                    </h6>
                    <p></p>
                </div>
            </div>


            <div class="row ml-4 ">
            <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Possui doenças graves na família?
                        <a href="" class="ml-2">
                            <i class="fa fa-plus" aria-hidden="true"></i> 
                        </a> 
                    
                    
                    </h6>
                    <p></p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Já realizou alguma cirurgia?
                        <a href="" class="ml-2">
                            <i class="fa fa-plus" aria-hidden="true"></i> 
                        </a>                  
                    
                    </h6>
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
                        <div id="telefone-paciente-{{$telefone['telefone_cod']}}"> {{$telefone["telefone_area"]}}  {{$telefone["telefone_num"]}}
                        @if($tipoAcesso != 1)
                         <button class="buttonEdicao" onclick='alteraTelefone({{$telefone["telefone_cod"]}})'> <i class="fas fa-edit  text-info   "></i> </button>
                        @endif 
                        </div>
                    @endforeach    

                                        <div class=" mr-5  " hidden id="input-telefone-paciente-{{$telefone['telefone_cod']}}"> 
                                            <input type="text"  class="form-control" id="phone" value="{{$telefone['telefone_area']}} {{$telefone['telefone_num']}}" maxlength="15"  />
                                                <div class="input-group-append ">
                                                        <button class="btn btn-primary btn-block" onclick="editarTelefone({{$telefone['telefone_cod']}})">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                @csrf
                                            </div>
                                        </div>            
            
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Estado </h6>
                    <div id="estado-paciente-{{$endereco['endereco_id']}}" value="13" >{{$estado["estado_nome"]}} 
                    @if($tipoAcesso != 1)
                    <button class="buttonEdicao" onclick='alteraEstado({{$endereco["endereco_id"]}})'> <i class="fas fa-edit  text-info   "></i> </button>
                    @endif
                    </div>

                                        <div class=" mr-5  " hidden id="input-estado-paciente-{{$endereco['endereco_id']}}"> 
                                            
                                                <select name="altera-estado-paciente" id="altera-estado-paciente-{{$endereco['endereco_id']}}" class="form-control">

                                                    @foreach($estados as $listaEstados)
                                                        <option value="{{$listaEstados['id']}}"> {{$listaEstados['estado_nome']}} </option>
                                                    @endforeach

                                                </select>
                                                <div class="input-group-append ">
                                                        <button class="btn btn-primary btn-block" onclick="editarEstado({{$endereco['endereco_id']}})">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                @csrf
                                            </div>
                                        </div> 
                </div>
                
            </div>

            <div class="row ml-4 ">

            <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Bairro </h6>
                    <p id="bairro-paciente-{{$endereco['endereco_id']}}">{{$endereco["endereco_bairro"]}} 
                    @if($tipoAcesso != 1)
                        <button class="buttonEdicao" onclick='alteraBairro({{$endereco["endereco_id"]}})'> <i class="fas fa-edit  text-info   "></i> </button></p>
                    @endif

                                        <div class=" mr-5  " hidden id="input-bairro-paciente-{{$endereco['endereco_id']}}"> 
                                            <input type="text"  class="form-control" id="phone" value="{{$endereco['endereco_bairro']}}" maxlength="15"  />
                                                <div class="input-group-append ">

                                                        <button class="btn btn-primary btn-block" onclick="editarBairro({{$endereco['endereco_id']}})">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                @csrf
                                            </div>
                                        </div> 
                </div>

                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Rua </h6>
                    <p id="rua-paciente-{{$endereco['endereco_id']}}">{{$endereco["endereco_logradouro"]}} 
                    @if($tipoAcesso != 1)
                        <button class="buttonEdicao" onclick=''> <button class="buttonEdicao" onclick='alteraRua({{$endereco["endereco_id"]}})'> <i class="fas fa-edit  text-info   "></i> </button>
                    @endif
                    </p>

                                        <div class=" mr-5  " hidden id="input-rua-paciente-{{$endereco['endereco_id']}}"> 
                                            <input type="text"  class="form-control" id="phone" value="{{$endereco['endereco_logradouro']}}" maxlength="15"  />
                                                <div class="input-group-append ">
                                                        <button class="btn btn-primary btn-block" onclick="editarRua({{$endereco['endereco_id']}})">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                @csrf
                                            </div>
                                        </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>Cidade</h6>
                        <p id="cidade-paciente-{{$endereco['endereco_id']}}">{{$cidade["cidade_desc"]}} 
                        @if($tipoAcesso != 1)
                            <button class="buttonEdicao" onclick='alteraCidade({{$endereco["endereco_id"]}})'> <i class="fas fa-edit  text-info   "></i> </button>
                        @endif
                        </p>

                                        <div class=" mr-5  " hidden id="input-cidade-paciente-{{$endereco['endereco_id']}}"> 
                                                
                                                <select name="altera-cidade-paciente" id="altera-cidade-paciente-{{$endereco['endereco_id']}}" class="form-control">

                                                @foreach($cidadesDoEstado as $cidadeEstado)
                                                            <option value="{{$cidadeEstado['id']}}">{{$cidadeEstado['cidade_desc']}}</option>
                                                @endforeach

                                                </select>
                                                <div class="input-group-append ">
                                                        <button class="btn btn-primary btn-block" onclick="editarCidade({{$endereco['endereco_id']}})">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                @csrf
                                            </div>
                                        </div>  
                </div>
            </div>

            <div class="row ml-4 ">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6>CEP </h6>
                    <p id="cep-paciente-{{$endereco['endereco_id']}}">{{$endereco["endereco_cep"]}} 
                    @if($tipoAcesso != 1)
                        <button class="buttonEdicao" onclick='alteraCep({{$endereco["endereco_id"]}})'> <i class="fas fa-edit  text-info   "></i> </button>
                    @endif
                    </p>

                                        <div class=" mr-5  " hidden id="input-cep-paciente-{{$endereco['endereco_id']}}"> 
                                            <input type="text"  class="form-control" id="phone" value="{{$endereco['endereco_cep']}}" maxlength="15"  />
                                                <div class="input-group-append ">
                                                        <button class="btn btn-primary btn-block" onclick="editaCep({{$endereco['endereco_id']}})">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                @csrf
                                            </div>
                                        </div>

                    
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

                let area = tel.slice(0, 4)

                let numTel = tel.slice(5)
                    
                
                const token = document
                    .querySelector(`input[name="_token"]`)
                    .value;  


                formData.append('area', area);
                formData.append('telefone', numTel);
                formData.append('_token',token);
                formData.append('id', telefoneId);
                const url = `/editaTelefone`;
                fetch(url, {
                method: 'POST',
                body: formData        
            }).then(() => {
                    //alteraTelefone(telefoneId);
                    //document.getElementById(`telefone-paciente-${telefoneId}`).textContent = tel;
                    location.reload();
        });
    }
    </script>
    

    <script>
        function alteraBairro(bairroId) {
            //alert(consultaId)
            //return
        const bairro = document.getElementById(`bairro-paciente-${bairroId}`);
        const inputBairro = document.getElementById(`input-bairro-paciente-${bairroId}`);
        const btnEditaTel = document.getElementById(`btnEditaTel`)

        if (bairro.hasAttribute('hidden')) {
            bairro.removeAttribute('hidden');
            inputBairro.hidden = true;
            btnEditaTel.removeAttribute('hidden');
        } else {
            inputBairro.removeAttribute('hidden');
            bairro.hidden = true;
            btnEditaTel.hidden = true;
        }
    }
    </script>

<script>
        function editarBairro(bairroId) {

                
                    
        let formData = new FormData();
        const bairro = document
            .querySelector(`#input-bairro-paciente-${bairroId} > input`)
            .value;
            

        const token = document
            .querySelector(`input[name="_token"]`)
            .value;  

        formData.append('bairro', bairro);
        formData.append('_token',token);
        formData.append('id', bairroId);

        const url = `/editaBairro`;
        fetch(url, {
        method: 'POST',
        body: formData        
        }).then(() => {
            //alteraBairro(bairroId);
           // document.getElementById(`#bairro-paciente-${bairroId}`).textContent = bairro;
            location. reload();
        });
        }
</script>


<script>
        function alteraEstado(estadoId) {
           
        const estado = document.getElementById(`estado-paciente-${estadoId}`);
        const inputEstado = document.getElementById(`input-estado-paciente-${estadoId}`);
        const btnEditaTel = document.getElementById(`btnEditaTel`)

        if (estado.hasAttribute('hidden')) {
            estado.removeAttribute('hidden');
            inputEstado.hidden = true;
            btnEditaTel.removeAttribute('hidden');
        } else {
            inputEstado.removeAttribute('hidden');
            estado.hidden = true;
            btnEditaTel.hidden = true;
        }
    }
    </script>

<script>
        function editarEstado(enderecoId) {
  
                    
        let formData = new FormData();

        const estadoValue = document.getElementById(`altera-estado-paciente-${enderecoId}`).value;
        const estadoText = document.getElementById(`altera-estado-paciente-${enderecoId}`).text;  
        
        const token = document
            .querySelector(`input[name="_token"]`)
            .value;  

               


        formData.append('estado', estadoValue);
        formData.append('_token',token);
        formData.append('id', enderecoId);
        
        const url = `/editaEstado`;
        fetch(url, {
        method: 'POST',
        body: formData        
        }).then(() => {
            //alteraEstado(enderecoId);
            //document.getElementById(`#estado-paciente-${enderecoId}`).textContent = estadoText;
            location.reload();
        });
        }
</script>

<script>
        function alteraCidade(cidadeId) {
        
        const cidade = document.getElementById(`cidade-paciente-${cidadeId}`);
        const inputCidade = document.getElementById(`input-cidade-paciente-${cidadeId}`);
        const btnEditaTel = document.getElementById(`btnEditaTel`)

        if (cidade.hasAttribute('hidden')) {
            cidade.removeAttribute('hidden');
            inputCidade.hidden = true;
            btnEditaTel.removeAttribute('hidden');
        } else {
            inputCidade.removeAttribute('hidden');
            cidade.hidden = true;
            btnEditaTel.hidden = true;
        }
    }
    </script>

<script>
        function editarCidade(enderecoId) {

                    
        let formData = new FormData();

        const cidadeValue = document.getElementById(`altera-cidade-paciente-${enderecoId}`).value;
        const cidadeText = document.getElementById(`altera-cidade-paciente-${enderecoId}`).text;  
        
        const token = document
            .querySelector(`input[name="_token"]`)
            .value;  

            


        formData.append('cidade', cidadeValue);
        formData.append('_token',token);
        formData.append('id', enderecoId);
        
        const url = `/editaCidade`;
        fetch(url, {
        method: 'POST',
        body: formData        
        }).then(() => {
            //alteraEstado(enderecoId);
            //document.getElementById(`#estado-paciente-${enderecoId}`).textContent = estadoText;
            location.reload();
        });
        }
</script>



<script>
        function alteraRua(bairroId) {
            //alert(consultaId)
            //return
        const rua = document.getElementById(`rua-paciente-${bairroId}`);
        const inputRua = document.getElementById(`input-rua-paciente-${bairroId}`);
        const btnEditaTel = document.getElementById(`btnEditaTel`)

        if (rua.hasAttribute('hidden')) {
            rua.removeAttribute('hidden');
            inputRua.hidden = true;
            btnEditaTel.removeAttribute('hidden');
        } else {
            inputRua.removeAttribute('hidden');
            rua.hidden = true;
            btnEditaTel.hidden = true;
        }
    }
    </script>

<script>
        function editarRua(enderecoId) {

                
                    
        let formData = new FormData();
        const rua = document
            .querySelector(`#input-rua-paciente-${enderecoId} > input`)
            .value;
            

        const token = document
            .querySelector(`input[name="_token"]`)
            .value;  

        formData.append('rua', rua);
        formData.append('_token',token);
        formData.append('id', enderecoId);

        const url = `/editaRua`;
        fetch(url, {
        method: 'POST',
        body: formData        
        }).then(() => {
            //alteraBairro(bairroId);
           // document.getElementById(`#bairro-paciente-${bairroId}`).textContent = bairro;
            location. reload();
        });
        }
</script>


<script>
        function alteraCep(enderecoId) {
            //alert(consultaId)
            //return
        const cep = document.getElementById(`cep-paciente-${enderecoId}`);
        const inputCep = document.getElementById(`input-cep-paciente-${enderecoId}`);
        const btnEditaTel = document.getElementById(`btnEditaTel`)

        if (cep.hasAttribute('hidden')) {
            cep.removeAttribute('hidden');
            inputCep.hidden = true;
            btnEditaTel.removeAttribute('hidden');
        } else {
            inputCep.removeAttribute('hidden');
            cep.hidden = true;
            btnEditaTel.hidden = true;
        }
    }
    </script>

<script>
        function editaCep(enderecoId) {

                
                    
        let formData = new FormData();
        const cep = document
            .querySelector(`#input-cep-paciente-${enderecoId} > input`)
            .value;
            

        const token = document
            .querySelector(`input[name="_token"]`)
            .value;  

        
        formData.append('cep', cep);
        formData.append('_token',token);
        formData.append('id', enderecoId);

        const url = `/editaCep`;
        fetch(url, {
        method: 'POST',
        body: formData        
        }).then(() => {
            //alteraBairro(bairroId);
           // document.getElementById(`#bairro-paciente-${bairroId}`).textContent = bairro;
            location. reload();
        });
        }
</script>


<script>
    function mostraInputComorbidade(prontuario)
        {

        

            const comorbidade = document.getElementById(`input-comorbidade-paciente-${prontuario}`);


            if (comorbidade.hasAttribute('hidden')) {
                comorbidade.removeAttribute('hidden');
            
            } else {
            
                comorbidade.hidden = true;
                
            }


        }

</script>


<script>

        function addComorbidade(prontuario)
        {

            formData = new FormData();
            const comorbidade = document
            .querySelector(`#input-comorbidade-paciente-${prontuario} > input`)
            .value;

           
            const token = document
            .querySelector(`input[name="_token"]`)
            .value;  

        
            formData.append('comorbidade', comorbidade);
            formData.append('_token',token);
            formData.append('prontuario', prontuario);

            const url = `/insereComorbidade`;
            fetch(url, {
            method: 'POST',
            body: formData        
            }).then(() => {
                //alteraBairro(bairroId);
            // document.getElementById(`#bairro-paciente-${bairroId}`).textContent = bairro;
                location. reload();
            });
        }



</script>





    @endsection