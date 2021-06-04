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
    <li class="nav-item col-sm-12 col-md-2 col-lg-2  mt-3" >
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
            <form>

            

                <div class="row ml-4">
                    <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                        <h3 class="ml-2 pt-3">Informações Gerais</h3>
                        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Sintomas do Paciente</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Laudo do Medico</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Observações</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-1">
                        <h3 class="ml-2 pt-3">Medicamentos</h3>
                        </div>   
                            <div id="formulario">
                                <div class="form-group">
                                    <label for="inputRemedio">Remedio</label>
                                        <select name="remedio" id="inputRemedio" class="form-control">
                                            <option disabled selected value> -- Escolha um Medicamento-- </option> 
                                            <option>...</option>                                            
                                        </select>
                                    <button type="button" class="btn btn-primary" id="add-campo"> + </button>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block mt-5 rounded float-right">Salvar</button> 
                            </div>
                    </div>

                    <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                        <h3 class="ml-2 pt-3">Exames</h3>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Laudo do Exame</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                    </div>
                   

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
                $("#formulario").append('<div class="form-group"><label for="inputRemedio">Remedio</label><select name="remedio" id="inputRemedio" class="form-control"><option disabled selected value> -- Escolha um Medicamento-- </option> <option>...</option></select></div>');
            });
        </script>


@endsection
@endsection
