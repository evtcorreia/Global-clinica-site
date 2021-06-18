@extends ('layout')

@section('cabecalho')

Cadastrar nova Clinica

@endsection



@section('conteudo')

<form action="/pessoa/cadastrar" method="post">
@csrf
    <div class="separadores col-md-12 mb-12">

    </div>
    <h2 class="separadores">Dados da Clinica</h2>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="nome">Razão Social:</label>
            <input type="text" class="form-control " id="razao" name="razao" placeholder="Razão Social" required>        

        </div>
        <div class="col-md-4 mb-3">
            <label for="sobrenome">Nome Fantasia: </label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>

        </div>
        <div class="col-md-4 mb-3">
            <label for="nascimento">Data de Abertura</label>
            <input type="date" class="form-control" id="abertura" name="abertura" placeholder="Data de Abertura"  maxlength="8" minlength="8" required>
        
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationServer02">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cNPJ" placeholder="CNPJ" maxlength="14" minlength="14" required>
            
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
            <input type="text" class="form-control" id="area" name="area" placeholder="Codigo de Area" maxlength="3" minlength="2" required>
            
        </div>
        <div class="col-md-4 mb-3">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
            
        </div>

        <div class="separadores col-md-12 mb-12">



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