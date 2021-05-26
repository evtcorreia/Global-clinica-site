<!doctype html>
<html lang="en">
  <head>
    <title>Tipo de Acesso</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #53A0E9;
        }
        .container-fluid {
            display: flex;
            justify-content:center;
            align-items:center;
            height: 50vh;
            width: 100%;
            background-color: #ffffff;
            margin-top: 12%;
            padding-left: 15%;
  
            
        }

        .col{
          width: 400px;    
          
          
         
        }
        .icone{
          color: #53A0E9;
          margin: 0%;
        }

        .tipo{
          
        }
        </style>

</head>

  <body>



  <div class="container-fluid">
    <div class="row">
    @foreach($tamanho as $t)  
      @if ($t['tipo_pessoa_tpessoa_cod'] == 1)
        <div class="col col-sm-12 col-md-12 col-lg-4 mb-3 mt-3">
              <i class="fa fa-user-md fa-10x icone" aria-hidden="true"></i>
              <h4>MEDICO</h4>
        </div>
      @endif
      
      @if ($t['tipo_pessoa_tpessoa_cod'] == 2)
        <div class="col col-sm-12 col-md-12 col-lg-4 mb-3 mt-3" tipo>      
            <a href="/paciente/index/{{$cpf}}">  <i class="fas fa-user-injured fa-10x icone"></i> </a>
            <h4>PACIENTE</h4>
        </div>
      @endif

      @if ($t['tipo_pessoa_tpessoa_cod'] == 3)
        <div class="col col-sm-12 col-md-12 col-lg-4 mb-3 mt-3  ">
              <i class="fa fa-user-md fa-10x icone" aria-hidden="true"></i>
        </div>
      @endif    
    @endforeach
      

    </div>
  </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>