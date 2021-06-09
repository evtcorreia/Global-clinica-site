@extends ('layout')

@section('cabecalho')

Faça a Busca pelo paciente desejado

@endsection



@section('conteudo')

<form action="/pessoa/cadastrar" method="post">
@csrf
    <div class="separadores col-md-12 mb-12">

    </div>
    <h2 class="separadores">Dados Pessoais</h2>
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
            <label for="nascimento">Data Nascmento</label>
            <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="Nascimento"  maxlength="8" minlength="8" required>
        
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" maxlength="11" minlength="11" required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="rg">RG</label>
            <input type="text" class="form-control" id="rg" name="rg" placeholder="RG" required>
            
        </div>


        <div class="col-md-4 mb-3">
            <label class="" for="tipoDoc">Estado</label>
            <select name="tipoDoc" id="tipoDoc" class="form-control">
                <option disabled selected value> -- Escolha um Plano de saude -- </option>
                @foreach ($planos as $plano)
                <option value="{{$plano['id']}}">
                    {{$plano["convenio_desc"]}}
                </option>
                @endforeach
            </select>
        </div>
<!--       
        <div class="col-md-4 mb-3">
            <label for="tipoDoc">Plano de Saude</label>
            <input type="text" class="form-control" id="tipoDoc" name="tipoDoc" placeholder="Plano de Saude" required>
            
        </div>
-->
        <div class="col-md-4 mb-3">
            <label for="pai">Nome do Pai</label>
            <input type="text" class="form-control" id="pai" name="pai" placeholder="Nome do Pai" required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="mae">Nome da Mae</label>
            <input type="text" class="form-control" id="mae" name="mae" placeholder="Nome da Mae" required>
            
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
            <label for="numero">Numero</label>
            <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero" required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="complemento">Complemeto</label>
            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Numero" required>
            
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
<!--
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Cidade</label>
            <input type="text" class="form-control is-valid" id="cidade" name="cidade" placeholder="Cidade" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
    -->   

        
        <!--
        <div class="col-md-4 mb-3">
            <label for="validationServer02">UF</label>
            <input type="text" class="form-control is-valid" id="estado" name="estado" placeholder="UF" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        -->
        <div class="col-md-4 mb-3">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" required>
            
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
            <input type="text" class="form-control" id="area" name="area" placeholder="Codigo de Area" required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
            
        </div>

        <div class="separadores col-md-12 mb-12">



        <h2>Dados Medicos</h2>
        </div>


        <div class="col-md-4 mb-3">
            <label for="sus_nr">Cartão SUS</label>
            <input type="text" class="form-control" id="sus_nr" name="sus_nr" placeholder="Cartao SUS" required>
            
        </div>
        <div class="col-md-4 mb-3">

        <div class="form-group">
            <label for="tipoSang">Fator RH</label>
                <select class="form-control" id="tipoSang" name="tipoSang">
                    <option disabled selected value>---Selecione o tipo sanguineo---</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="O">O</option>
                    <option value="AB">AB</option>
                </select>
        </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="fatorRh" name="fatorRh">
                    <option disabled selected value>---Selecione o fator RH---</option>
                    <option value="Positivo">Positivo</option>
                    <option value="Negativo">Negativo</option>
                </select>
        </div>

        


    <!--

            <label for="validationServer02">Tipo Sanguineo</label>
            <input type="text" class="form-control is-valid" id="tipoSang" name="tipoSang" placeholder="Tipo Sanguineo" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Fator RH</label>
            <input type="text" class="form-control is-valid" id="fatorRh" name="fatorRh" placeholder="Fator RH" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>

        -->

        <div class="separadores col-md-12 mb-12">



            <h2>Dados de Acesso</h2>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe uma senha" required>
            <div class="invalid-feedback">
                Por favor, informe uma cidade válida.
            </div>
        </div>

    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="invalidCheck3" name="botao" required>
            <label class="form-check-label" for="invalidCheck3">
                Concordo com os termos e condições
            </label>
            <div class="invalid-feedback">
                Você deve concordar, antes de continuar.
            </div>
        </div>

    </div>




    <input type='hidden' name='tpessoa' value= "2">
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
@endsection