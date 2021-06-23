@extends ('layout')

@section('cabecalho')

Global Clínicas

@endsection



@section('conteudo')
<style>
    #texto {
        text-align: center;
        display: flex;
        justify-content: center;
    }

    #logo {
        position: relative;
        text-align: center;
    }

    #missao {
                
        text-align: left;
                
    }

    #contato {
        text-align: right;
        }
    
    .container-fluid {
    
      
    width: 100%;
    background-color: #ffffff;
    margin-top: 12%;
    
  }

  .col {
    width: 600px;
  }
</style>

<div class="container-fluid">
    <h1>Quem Somos</h1>

    <br></br>
    <br></br>
    <br></br>

    <div id="texto">
        <h4>A Global Clínica foi desenvolvida com o intuito de facilitar o acesso a saúde das pessoas, com designer moderno, a empresa se baseia nos princípios de ética e respeito, com o paciente, funcionários. Sempre mantendo suas informações de forma segura e com rápido acesso, nosso quadro de funcionários é composto por especialistas que se preocupam com o bem -estar dos pacientes, fazendo com que o paciente criar um vínculo de cuidados com a sua saúde, aumentando a qualidade de vida dos pacientes.</h4>
    </div>

    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>

    <div id="contato">
        <h2>Contato</h2>
        <h6>Email: contato@globalclinica.com</h6>
        <h6>Telefone: (34)3325-****</h6>
    </div>


    <br></br><br></br><br></br>
    <div id="logo" ><img src="../../img/logo/Logo_fundoTransparente.png" width=700 height=400></div>

</div>

@endsection