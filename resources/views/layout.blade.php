<!doctype html>
<html lang="pt-br">
    <head>
        <title>Global Clínica</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">
    </head>
    <body>

    
    <div id= "menu" >
                <ul>
                    <li><a href="http://localhost:8000/tipo-login/00000000000">Seleção de Usuário</a></li>

                    @if(session()->get('tipo', 'default') == 1)                       
                        <li><a href="/medico/index/{{ session()->get('user', 'default')}}">Início</a></li>
                    @elseif(session()->get('tipo', 'default') == 2) 
                        <li><a href="/paciente/index/{{ session()->get('user', 'default')}}">Início</a></li> 
                    @elseif(session()->get('tipo', 'default') == 3) 
                        <li><a href="/secretaria/index/{{ session()->get('user', 'default')}}">Início</a></li> 
                    @elseif(session()->get('tipo', 'default') == 4) 
                        <li><a href="/adm/index/{{ session()->get('user', 'default')}}">Início</a></li> 
                    @endif
                    

                    <li><a href="http://localhost:8000/adm/quemSomos">Quem Somos</a></li>
                    
                    <li><a href="javascript:history.back(-1)">Voltar</a></li>

                   

                    <li><a href="/sair">Sair</a></li>
                </ul>
            </div>
    <div class="jumbotron jumbotron-fluid" >
        <div class="container">
            <h1>@yield('cabecalho')</h1>
        </div>
    </div>
    
    <div>
        <style>
            body{
                margin: 0;
                }

                    #menu ul{
                        margin: 0;
                        background-color: #3092E3;
                        list-style: none;
                    }

                    #menu ul li{
                        display: inline;
                        
                    }

                    #menu ul li a{
                        padding: 10px 10px;
                        display: inline-block;

                        color: white;
                        text-decoration: none;
                    }

                    #menu ul li a:hover{
                        color: #ffffff;
                    }

                    #menu ul li a:active{
                        color: red;
                    }

                    #menu ul li a:visited{
                        color: #ffffff;
                    }
                </style>    
            </div>
    <!--<div style="text-align:right; width:100%; padding:0;">
    <input type="button" class="btn btn-primary" value="Voltar" onClick="history.go(-2)">
    <a href="/sair">Sair</a>
     </div>   
    </div>
    </div>
    -->
    
    

    <div class="container">
        @yield('conteudo') 
    </div>

        <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div style="height: 10em;"></div>
				
            </div><!-- end row -->
        </div><!-- end container -->
        </footer><!-- end footer -->

        

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js')}}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

        @yield('post-script')
    </body>
</html>