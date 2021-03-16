@extends('layout')

@section('cabecalho')
    Nova consulta
@endsection

@section('conteudo')
    <form>
        <div class="form-group row m-3">            

                <label class="mt-5" for="inputEstado">Cidade</label>
                <select id="inputEstado" class="form-control">
                <option selected>Escolher...</option>
                    <option>...</option>
                </select>

                <label class="mt-5" for="inputEstado">Clinica</label>
                <select id="inputEstado" class="form-control">
                <option selected>Escolher...</option>
                    <option>...</option>
                </select>

                <label class="mt-5" for="inputEstado">Especialidade</label>
                <select id="inputEstado" class="form-control">
                <option selected>Escolher...</option>
                    <option>...</option>
                </select>

                <label class="mt-5" for="inputEstado">Medico</label>
                <select id="inputEstado" class="form-control">
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

