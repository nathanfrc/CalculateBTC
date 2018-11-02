<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Bitcoin Calculate</title>
		
	<link rel="stylesheet" type="text/css" href="css/style.css">
   	<link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/main.css" rel="stylesheet">
    <link rel="icon" href="public/favicon.ico">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

   <script src="public/js/jquery-3.2.1.min.js"></script>
    <script src="public/js/jquery.validate.min.js"type="text/javascript"></script>
    <script src="public/js/validacao.js"type="text/javascript"></script> 
    
    <?php include "ajax/pesquisaRealAjax.php" ?>
    <?php  include "ajax/maskReal.php" ?>
    <?php include "ajax/pesquisaBTCAjax.php" ?>

</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=""><span class="glyphicon glyphicon-bitcoin"></span>itcoin Calculate</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li  class="active" >
                    <a href="" data-toggle="modal" data-target="#exampleModal"><span class="glyphicon glyphicon-info"></span>$Reais => Bitcoin</a>
                </li>
                <li  class="active">
                    <a href="" data-toggle="modal" data-target="#exampleModal2" ><span class="glyphicon glyphicon-bitcoin"></span>itcoin => Real</a>
                </li>
               
            </ul>
        </div>
    </div>
</nav>


<br>
<br>
<br>
<br>
<div class="container-fluid">

        <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
        <span class="glyphicon glyphicon-info"></span>$Reais => Bitcoin
 </button>
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
        <span class="glyphicon glyphicon-bitcoin"></span>itcoin => Real
 </button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <legend><span class="glyphicon glyphicon-bitcoin"></span>itcoins Calcule</legend></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                <section>				
                        <legend><span class="glyphicon glyphicon-bitcoin"></span>$Reais => Bitcoin</legend>
                        
                        <form method="post" id="form_real_btc" name="form_real_btc">
                         
                            <div class="form-group">
                                <div class="form-label-group">
                                    
                                        <label for="inputEmail">Valor:
                                            <input id="valorReal" type="text" min="10" maxlength="10" name="valorReal" required="true" class="form-control" onKeyPress="return(MascaraMoeda(this,'.',',',event))" placeholder="Ex:R$ 23.000,00" autocomplete="off">
                                        </label> 
                                </div>
                            </div>	
                            <div class="form-group">
                                <div class="form-check">
                                    
                                        <label class="form-check-label">Blockchain
                                            <input  class="form-check-input" id="cotacao" type="radio" name="cotacao" checked  class="form-control"  value="1">
                                        </label> 
                                        <label class="form-check-label">Mercado Bitcoin
                                            <input class="form-check-input" id="cotacao" type="radio" name="cotacao"  class="form-control" value="2" >
                                        </label> 
                                </div>
                            </div>		
                            	
                            <center>        
                                <div id="contentLoading">
                                    <div id="loading"></div>
                                </div>
                            </center>  
                            <section class="jumbotron">
                                <div id="MostraPesq"></div>
                            </section>

                        </form>
                    </section>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> <legend><span class="glyphicon glyphicon-bitcoin"></span>itcoins Calcule</legend></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
    
                    <section>				
                            <legend><span class="glyphicon glyphicon-bitcoin"></span>itcoin => $Real</legend>
                            
                            <form method="post" name="form_btc_valor" id="form_btc_valor">
                             
                                <div class="form-group">
                                    <div class="form-label-group">
                                        
                                            <label for="inputEmail">Valor:
                                                <input id="valorBTC" type="text" min="1" maxlength="10" name="valorBTC" required="true" class="form-control" onKeyPress="MascaraBTC(form_btc_valor.valorBTC);" placeholder="BTC = 0.18663" autocomplete="off">
                                            </label> 
                                    </div>
                                </div>	
                                <div class="form-group">
                                <div class="form-check">
                                    
                                        <label class="form-check-label">Blockchain
                                            <input  class="form-check-input" id="cotacao" type="radio" name="cotacao" value="1" checked  class="form-control" >
                                        </label> 
                                        <label class="form-check-label">Mercado Bitcoin
                                            <input class="form-check-input" id="cotacao" type="radio" name="cotacao" value="2"  class="form-control" >
                                        </label> 
                                </div>
                            </div>			
                                <br>
                                <center>        
                                    <div id="contentLoading">
                                        <div id="loadingBTC"></div>
                                    </div>
                                 </center>  
                                <section class="jumbotron">
                                    <div id="MostraPesqBTC"></div>
                                </section>
                               
                            </form>
                        </section>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
 <!-- Footer -->
 <footer class="py-5 bg-black">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; DilaInox 2018</p>
    </div>
    <!-- /.container -->
</footer>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="public/js/script.js"></script>
    <script src="public/js/jquery-3.2.1.min.js"></script>
    <script src="public/js/jquery.validate.min.js"type="text/javascript"></script>
    <script src="public/js/validacao.js"type="text/javascript"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/mask.js"></script>
    <script src="public/js/jquery.validate.min.js"></script>
    <script src="public/js/additional-methods.min.js"></script>
    <script src="public/js/jquery.mask.min.js"></script>
    <script src="public/js/localfilereader.js"></script>
    <script src="public/js/holder.min.js"></script>
    <script src="public/js/localization/messages_pt_BR.min.js"></script>
</body>
</html>