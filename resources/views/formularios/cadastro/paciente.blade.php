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
            <label for="validationServer01">Primeiro nome</label>
            <input type="text" class="form-control is-valid" id="nome" name="nome" placeholder="Nome" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>

        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Sobrenome</label>
            <input type="text" class="form-control is-valid" id="sobrenome" name="sobrenome" placeholder="Sobrenome" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Data Nascmento</label>
            <input type="date" class="form-control is-valid" id="nascimento" name="nascimento" placeholder="Nascimento" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">CPF</label>
            <input type="text" class="form-control is-valid" id="cpf" name="cpf" placeholder="CPF" maxlength="11" minlength="11" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">RG</label>
            <input type="text" class="form-control is-valid" id="rg" name="rg" placeholder="RG" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
       
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Plano de Saude</label>
            <input type="text" class="form-control is-valid" id="tipoDoc" name="tipoDoc" placeholder="Plano de Saude" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Nome do Pai</label>
            <input type="text" class="form-control is-valid" id="pai" name="pai" placeholder="Nome do Pai" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Nome da Mae</label>
            <input type="text" class="form-control is-valid" id="mae" name="mae" placeholder="Nome da Mae" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>

        <div class="separadores col-md-12 mb-12">
            <h2>Endereço</h2>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Logradouro</label>
            <input type="text" class="form-control is-valid" id="logradouro" name="logradouro" placeholder="Logradouro" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Bairro</label>
            <input type="text" class="form-control is-valid" id="bairro" name="bairro" placeholder="Bairro" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Numero</label>
            <input type="text" class="form-control is-valid" id="numero" name="numero" placeholder="Numero" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Complemeto</label>
            <input type="text" class="form-control is-valid" id="complemento" name="complemento" placeholder="Numero" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Cidade</label>
            <input type="text" class="form-control is-valid" id="cidade" name="cidade" placeholder="Cidade" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Pais</label>
            <input type="text" class="form-control is-valid" id="pais" name="pais" placeholder="Pais" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">UF</label>
            <input type="text" class="form-control is-valid" id="estado" name="estado" placeholder="UF" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">CEP</label>
            <input type="text" class="form-control is-valid" id="cep" name="cep" placeholder="CEP" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>






        <div class="separadores col-md-12 mb-12">
            <h2>Contato</h2>
        </div>


        <div class="col-md-4 mb-3">
            <label for="validationServer02">E-mail</label>
            <input type="text" class="form-control is-valid" id="mail" name="email" placeholder="E-mail" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">DDD</label>
            <input type="text" class="form-control is-valid" id="area" name="area" placeholder="Codigo de Area" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">Telefone</label>
            <input type="text" class="form-control is-valid" id="telefone" name="telefone" placeholder="Telefone" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>

        <div class="separadores col-md-12 mb-12">



        <h2>Dados Medicos</h2>
        </div>


        <div class="col-md-4 mb-3">
            <label for="validationServer02">Cartão SUS</label>
            <input type="text" class="form-control is-valid" id="sus_nr" name="sus_nr" placeholder="Cartao SUS" required>
            <div class="valid-feedback">
                Tudo certo!
            </div>
        </div>
        <div class="col-md-4 mb-3">
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

        <div class="separadores col-md-12 mb-12">



            <h2>Dados de Acesso</h2>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer03">Senha</label>
            <input type="password" class="form-control is-invalid" id="senha" name="senha" placeholder="Informe uma senha" required>
            <div class="invalid-feedback">
                Por favor, informe uma cidade válida.
            </div>
        </div>

    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input is-invalid" type="checkbox" value="1" id="invalidCheck3" name="botao" required>
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