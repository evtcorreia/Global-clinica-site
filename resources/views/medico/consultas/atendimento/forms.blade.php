@extends ('layout')

@section('cabecalho')

    Consulta {{$id}}
    <style>
        .form-group{
            padding: 10px;
        }
    </style>


@endsection

@section('conteudo')

<ul class="nav nav-tabs" id="myTab" role="tablist" >
    <li class="nav-item col-sm-12 col-md-3 col-lg-3  mt-3" >
        <a class="nav-link active " id="consulta-tab" data-toggle="tab" href="#consulta" role="tab" aria-controls="consulta" aria-selected="true">Detalhes da Consulta</a>
    </li>
   <!-- <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 2" id="receitas-tab" data-toggle="tab" href="#receitas" role="tab" aria-controls="receitas" aria-selected="false">Receitas</a>
    </li>
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 3" id="exames-tab" data-toggle="tab" href="#exames" role="tab" aria-controls="exames" aria-selected="false">Exames</a>
    </li>
    -->
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="consulta" role="tabpanel" aria-labelledby="consulta-tab">
        <div style="background-color: white;">
            <form action="/salvar/detalhes/consultas" method="POST">

            

                <div class="row ml-4">
                    <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                        <h3 class="ml-2 pt-3">Informações Gerais</h3>
                        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Sintomas do Paciente</label>
                            <textarea class="form-control" name="sintomas" id="sintomas" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Laudo do Médico</label>
                            <textarea class="form-control" name="laudoConsulta" id="laudoConsulta" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Observações</label>
                            <textarea class="form-control" name="obsConsulta" id="obsConsulta" rows="3"></textarea>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-1">
                        <h3 class="ml-2 pt-3">Medicamentos</h3>
                        </div>   

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Observações</label>
                                <textarea class="form-control" name="descricaoReceita" id="descricaoReceita" rows="3"></textarea>
                            </div>
                            <div id="formulario">
                            <label for="inputRemedio ">Remédio</label>
                                <div class="input-group">
                                   
                                   {{$var = ''}}

                                        
                                        <select name="remedio['remedio'][]" id="remedio" class="form-control">
                                            <option disabled selected value> -- Escolha um Medicamento-- </option> 

                                            @foreach($medicamentos as $medicamento)
                                            <option value="{{$medicamento['id']}}"> {{$medicamento['medicamento_nome']}}</option> 
                                            {{$var = $medicamento['id']}}
                                            @endforeach    
                                        
                                        </select>

                                        <select name="remedio['posologia'][]" id="posologia" class="form-control">
                                            <option disabled selected value> -- Posologia-- </option> 

                                            
                                            <option value="1"> 8 em 8 horas</option> 

                                        </select>
                                        <select name="remedio['qtd'][]" id="qtd" class="form-control">
                                            <option disabled selected value> -- Quantidade-- </option> 

                                            
                                            <option value="1"> 1 </option> 

                                        </select>

                                        <select name="remedio['tipo'][]" id="tipo" class="form-control">
                                            <option disabled selected value> -- Tipo-- </option> 

                                            
                                            <option value="1"> Comprimido </option> 

                                        </select>
                                        <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" id="add-campo"> + </button>
                                    @csrf
                                </div>
                                </div>
                            </div>
                        <!--
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block mt-5 rounded float-right">Salvar</button> 
                            </div>
                        -->
                    </div>

                    <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                       
                        
                        <div class="form-group">
                            <label class="mt-5 ">Data do Exame</label>
                            <input type="date" name="dataExame" id="exame_data" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Laudo do Exame</label>
                            <textarea class="form-control" name="laudoExame" id="laudoExame" rows="3"></textarea>
                        </div>

                    </div>
                   
                
                </div>
            
                <input type='hidden' name='idConsulta' value= "{{$id}}">

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block mt-5 rounded float-right">Salvar</button> 
                </div>
            </form>
        </div>
    </div>
</div>

 <!-- 
      <div class="tab-pane fade" id="receitas" role="tabpanel" aria-labelledby="receitas-tab" >
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Medicamentos</h3>  
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul >
                        
                    
                                <li class="list-group-item d-flex justify-content-between align-items-left lista-informacoes">
                                <form action="">
                                <button type="button" class="btn btn-primary btn-block">+</button> 
                                    <label class="mt-5" for="inputCidade">Remedio</label>
                                        <select name="cidade" id="inputCidade" class="form-control">
                                            <option disabled selected value> -- Escolha uma Cidade-- </option> 
                                            <option>...</option>                                            
                                        </select> 
                                        
                                        <button type="submit" class="btn btn-primary btn-block mt-5 rounded float-right">Salvar</button> 
                                        </form>
                                                                    
                                </li>
                               
                            
                    </ul>
                </div>                
            </div>   
        </div>
    </div>

    <div class="tab-pane fade" id="exames" role="tabpanel" aria-labelledby="exames-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Exames</h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <ul >
                   
                                <li class="list-group-item d-flex justify-content-between align-items-left lista-informacoes">
                                    <h1>exames</h1>                               
                                </li>
                           
                </div>                
            </div>   
        </div>
    </div>
</div>
-->
@section('post-script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
            //https://api.jquery.com/click/
            $("#add-campo").click(function () {
				//https://api.jquery.com/append/
                $("#formulario").append(`
                                        <div class="form-group">
                                            <select name="remedio['remedio'][]" id="remedio" class="form-control">
                                                <option disabled selected value> -- Escolha um Medicamento-- </option>
                                                    @foreach($medicamentos as $medicamento)
                                                        <option value="{{$medicamento["id"]}}"> {{$medicamento["medicamento_nome"]}}</option>
                                                    @endforeach</select> 
                                            <select name="remedio['posologia'][]" id="posologia" class="form-control">
                                                <option disabled selected value> -- Posologia-- </option> 
                                                <option value="1"> 8 em 8 horas</option> 
                                            </select> <select name="remedio['qtd'][]" id="qtd" class="form-control">
                                                <option disabled selected value> -- Quantidade-- </option> 
                                                <option value="1"> 1 </option> </select> 
                                            <select name="remedio['tipo'][]" id="tipo" class="form-control">
                                                <option disabled selected value> -- Tipo-- </option> 
                                                <option value="1">Comprimido</option> 
                                            </select>
                                        </div>`);
            });
        </script>


@endsection
@endsection
