@extends('layout')

@section('cabecalho')
Nova consulta
@endsection

@section('conteudo')
<form>
    <div class="form-group row m-3">

        <label class="mt-5" for="inputEstado">Estado</label>
        <select name="estado" id="inputEstado" class="form-control">
            <option selected>Escolher...</option>
            @foreach ($estados as $estado)
            <option value="{{$estado['id']}}">
                {{$estado["estado_nome"]}}
            </option>
            @endforeach

        </select>

        <label class="mt-5" for="inputCidade">Cidade</label>
        <select name="cidade" id="inputCidade" class="form-control">
            <option selected>Escolher...</option>
            <option>...</option>
        </select>

        <label class="mt-5" for="inputClinica">Clinica</label>
        <select name="clinica" id="clinica" class="form-control">
            <option selected>Escolher...</option>
            <option>...</option>
        </select>

        <label class="mt-5" for="inputEstado">Especialidade</label>
        <select name="especialidade" id="inputEspecialidade" class="form-control">
            <option selected>Escolher...</option>
            <option>...</option>
        </select>

        <label class="mt-5" for="inputEstado">Medico</label>
        <select name="medico" id="inputMedico" class="form-control">
            <option selected>Escolher...</option>
            <option>...</option>
        </select>

        <label class="mt-5 mb-5">Data da consulta</label>
        <input type="date" class="form-control">

        <label class="mt-5">Hora da consulta</label>
        <input type="time" class="form-control">

    </div>
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
                            $.each(cidade, function(key, value) {                                

                                $('select[name=cidade]').append('<option value="' + key + '">' +cidade[key]["cidade_desc"]+ '</option>');

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
                   // console.log(idEstado);

                    $.ajax({                        

                        url: '/get-clinicas/' + idCidade,
                        type: 'GET',
                        dataType: 'json',
                        success: function(clinica) {

                            

                            //console.log(cidade);
                            $('select[name=cidade]').empty();
                            $.each(clinica, function(key, value) {                                

                                $('select[name=clinica]').append('<option value="' + key + '">' +clinica[key]["cidade_nome"]+ '</option>');

                            });

                        }
                    })

                });
            });
</script>

@endsection