@extends('layout')

@section('cabecalho')
Nova Consulta
@endsection

@section('conteudo')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('erro'))
    <div class="alert alert-danger">
        {{ session('erro') }}
    </div>
@endif
<form action="/consulta/salvar" method='POST'>
@csrf
    <div class="form-group row m-3">

        <label class="mt-5" for="inputEstado">Estado</label>
        <select name="estado" id="inputEstado" class="form-control">
            <option disabled selected value> -- Escolha um Estado -- </option>
            @foreach ($estados as $estado)
            <option value="{{$estado['id']}}">
                {{$estado["estado_nome"]}}
            </option>
            @endforeach

        </select>

        <label class="mt-5" for="inputCidade">Cidade</label>
        <select name="cidade" id="inputCidade" class="form-control">
            <option disabled selected value> -- Escolha uma Cidade-- </option>
            <option>...</option>
        </select>

        <label class="mt-5" for="inputClinica">Clínica</label>
        <select name="clinica" id="clinica" class="form-control">
            <option  selected value> -- Escolha uma Clínica -- </option>
            <option >...</option>
        </select>

        <label class="mt-5" for="inputEstado">Especialidade</label>
        <select name="especialidade" id="inputEspecialidade" class="form-control">
            <option  selected value> -- Escolha uma Especialidade -- </option>
            <option>...</option>
        </select>

        <label class="mt-5" for="inputEstado">Médico</label>
        <select name="medico" id="inputMedico" class="form-control">
            <option disabled selected value> -- Escolha um Médico  -- </option>
            <option>...</option>
        </select>

        <label class="mt-5 mb-5">Data da Consulta</label>
        <input type="date" name="data" class="form-control">

        <label class="mt-5">Hora da Consulta</label>
        <input type="time" min="08:00" max="18:00" pattern="[0-9]{2}:[0-9]{2}" name="hora" step="3600" class="form-control">

    </div>

        <input type='hidden' name='idProntuario' value= "{{$idProntuario}}">

        <button type="submit" class="btn btn-primary btn-lg btn-block">Agendar Consulta</button>
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

<script>
    $(document).ready(function() {

                $('select[name="clinica"]').on('change', function() {

                    var idClinica = $(this).val();
                    //alert(idClinica);

                    
                    $.ajax({                        
                        
                        url: '/get-especialidades/' + idClinica,
                        type: 'GET',
                        dataType: 'json',
                        success: function(especialidades) {

                            

                            //console.log(cidade);
                            $('select[name=especialidade]').empty();
                            
                            $('select[name=especialidade]').append('<option  selected value> -- Escolha uma especialização -- ' + '</option>');

                            $.each(especialidades, function(key, value) { 
                                //alert(especialidades[key]["id"] + " - " + especialidades[key]["especialidade_desc"])


                                    $('select[name=especialidade]').append('<option  value="' + especialidades[key]["id"] + '">' +especialidades[key]["especialidade_desc"]+ '</option>');

                                

                            });

                        }
                    })

                });
            });
</script>

<script>
    $(document).ready(function() {

                $('select[name="especialidade"]').on('change', function() {

                    var idEspecialidade = $(this).val();
                    
                    $.ajax({                        
                        
                        url: '/get-medicos/' + idEspecialidade,
                        type: 'GET',
                        dataType: 'json',
                        success: function(medicos) {

                            

                            //console.log(cidade);
                            $('select[name=medico]').empty();
                            
                            $('select[name=medico]').append('<option  selected value> -- Escolha um medico -- ' + '</option>');

                            $.each(medicos, function(key, value) { 
                                //alert(medicos[key]["id"] + " - " + medicos[key]["especialidade_desc"])


                                    $('select[name=medico]').append('<option  value="' + medicos[key]["pessoa_pessoa_cpf"] + '">' +medicos[key]["pessoa_nome"]+ '</option>');

                                

                            });

                        }
                    })

                });
            });
</script>

@endsection