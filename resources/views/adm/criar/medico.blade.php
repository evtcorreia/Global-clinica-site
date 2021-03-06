@extends ('layout')

@section('cabecalho')

Cadastrar novo(a) Médico(a)

@endsection



@section('conteudo')

<form action="/medico/cadastrar" method="post">
@csrf
    <div class="separadores col-md-12 mb-12">

    </div>
    <h2 class="separadores">Dados pessoais</h2>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="nome">Primeiro nome</label>
            <input type="text" class="form-control " id="nome" name="nome" placeholder="Nome" required>        

        </div>
        <div class="col-md-4 mb-3">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" required>

        </div>
        <div class="col-md-4 mb-3">
            <label for="nascimento">Data nascimento</label>
            <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="Nascimento"  maxlength="8" minlength="8" required>
        
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" maxlength="11" minlength="11" required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" placeholder="RG" required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="pai">Nome do Pai</label>
            <input type="text" class="form-control" id="pai" name="pai" placeholder="Nome do Pai" required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="mae">Nome da Mãe</label>
            <input type="text" class="form-control" id="mae" name="mae" placeholder="Nome da Mãe" required>
            
        </div>


        <div class="separadores col-md-12 mb-12">
            <h2>Endereço</h2>
        </div>
        <div class="col-md-4 mb-3">
            <label for="logradouro">Logradouro</label>
            <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro" required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="numero">Número</label>
            <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="complemento">Complemeto</label>
            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento" required>
            
        </div>

        <div class="col-md-4 mb-3" hidden>
            <label for="pais">Pais</label>
            <input type="text" class="form-control" id="pais" name="pais" value="Brasil" placeholder="Pais" required>
            
        </div>

        <div class="col-md-4 mb-3">
            <label class="" for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control">
                <option disabled selected value> -- Escolha um estado -- </option>
                @foreach ($estados as $estado)
                <option value="{{$estado['id']}}">
                    {{$estado["estado_nome"]}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label class="" for="cidade">Cidade</label>
            <select name="cidade" id="cidade" class="form-control">
                <option disabled selected value> -- Escolha uma Cidade-- </option>
                <option>...</option>
            </select>
        </div>

        <div class="col-md-4 mb-3">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" maxlength="8" minlength="8" required>
            
        </div>


        <div class="separadores col-md-12 mb-12">
            <h2>Contato</h2>
        </div>


        <div class="col-md-4 mb-3">
            <label for="mail">E-mail</label>
            <input type="text" class="form-control" id="mail" name="email" placeholder="E-mail" required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="area">DDD</label>
            <input type="text" class="form-control" id="area" name="area" placeholder="Codigo de Area" maxlength="3" minlength="2"required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" maxlength="9" minlength="9" required>
            
        </div>


        <div class="separadores col-md-12 mb-12">
            <h2>Dados profissionais</h2>
        </div>
        <div class="col-md-4 mb-3">
            <label for="rg">CRM</label>
            <input type="text" class="form-control" id="crm" name="crm" placeholder="CRM" maxlength="5" minlength="5" required>
            
        </div>

        <div class="col-md-4 mb-3">
        <label class="mt-" for="especialidade">Especialidade</label>
        <select name="especialidade" id="especilidade" class="form-control">
            <option disabled selected value> -- Escolha uma Especialidade -- </option>
            @foreach ($especialidades as $especialidade)
            <option value="{{$especialidade['id']}}">
                {{$especialidade["especialidade_desc"]}}
            </option>
            @endforeach

        </select>
        </div>

        <div>
        <label class="ml-1" for="inputClinica">Clínica</label>
        <select name="clinica" id="clinica" class="form-control ml-1">
            <option  selected value> -- Escolha uma Clínica -- </option>
            <option >...</option>
        </select>
        </div>
        <div class="col-md-4 mb-3">
            <label class="" for="doc_prof">Tipo de Documento</label>
            <select name="doc_prof" id="doc_prof" class="form-control">
                <option disabled selected value> -- Escolha um tipo de Documento -- </option>
                <option value= 1>
                    CRM
                </option>
                <option value= 2 >
                    CRO
                </option>
                <option value= 3 >
                    CRN
                </option>
            </select>
        </div>


        <div class="separadores col-md-12 mb-12">

            <h2>Dados de Acesso</h2>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe uma senha" required>
            <div class="invalid-feedback">
                Por favor, informe uma senha válida.
            </div>
        </div>

    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="invalidCheck3" name="botao" required>
            <label class="form-check-label" for="invalidCheck3">
                Concordo com os termos e condições.
            </label>
            <div class="invalid-feedback">
                Você deve concordar, antes de continuar.
            </div>
        </div>

    </div>


    <input type='hidden' name='tpessoa' value= "1">
    <button class="btn btn-primary" type="submit">Enviar</button>
</form>




@endsection

@section('post-script')
<script>
    $(document).ready(function() {

                $('select[name="estado"]').on('change', function() {

                    var idEstado = $(this).val();
                   // console.log(idEstado);

                    $.ajax({                        

                        url: '/get-cidades/' + idEstado,
                        type: 'GET',
                        dataType: 'json',
                        success: function(cidade) {

                        

                            //console.log(cidade);
                            $('select[name=cidade]').empty();

                            $('select[name=cidade]').append('<option  selected value> -- Escolha uma Cidade -- ' + '</option>');

                            $.each(cidade, function(key, value) {                                

                                $('select[name=cidade]').append('<option value="' + cidade[key]["id"] + '">' +cidade[key]["cidade_desc"]+ '</option>');

                            });

                        }
                    })

                });
            });
</script>
<script>
    $(document).ready(function() {

                $('select[name="cidade"]').on('change', function() {

                    var idCidade = $(this).val();


                    $.ajax({                        

                        url: '/get-clinicas/' + idCidade,
                        type: 'GET',
                        dataType: 'json',
                        success: function(clinicas) {


                            //console.log(cidade);
                            $('select[name=clinica]').empty();

                            $('select[name=clinica]').append('<option  selected value> -- Escolha uma Clinica -- ' + '</option>');

                            $.each(clinicas, function(key, value) { 
                                //alert(clinicas[key]["id"] + " - " + clinicas[key]["clinica_nome"])


                                    $('select[name=clinica]').append('<option value="' + clinicas[key]["id"] + '">' +clinicas[key]["clinica_nome"]+ '</option>');


                            });

                        }
                    })

                });
            });
</script>
@endsection