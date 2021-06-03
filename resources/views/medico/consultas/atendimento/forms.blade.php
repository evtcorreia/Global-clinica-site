@extends ('layout')

@section('cabecalho')

    Consulta {{$id}}

@endsection

@section('conteudo')

<ul class="nav nav-tabs" id="myTab" role="tablist" >
    <li class="nav-item col-sm-12 col-md-2 col-lg-2  mt-3" >
        <a class="nav-link active " id="consulta-tab" data-toggle="tab" href="#consulta" role="tab" aria-controls="consulta" aria-selected="true">Informações</a>
    </li>
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 2" id="receitas-tab" data-toggle="tab" href="#receitas" role="tab" aria-controls="receitas" aria-selected="false">Receitas</a>
    </li>
    <li class="nav-item col-sm-12 col-md-2 col-lg-2 mt-3">
        <a class="nav-link 3" id="exames-tab" data-toggle="tab" href="#exames" role="tab" aria-controls="exames" aria-selected="false">Exames</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="consulta" role="tabpanel" aria-labelledby="consulta-tab">
        <div style="background-color: white;">
            <h3 class="ml-2 pt-3">Consulta Data</h3>
            <div class="row ml-4">
                <div class="col col-sm-12 col-md-6 col-lg-6 mb-3 mt-3">
                    <h6></h6>
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
                
            </div>
        </div>
    </div>

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

@endsection
