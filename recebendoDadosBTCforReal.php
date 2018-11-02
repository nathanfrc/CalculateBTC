<?php

if(isset($_REQUEST['valorBTC'])&& isset($_REQUEST['cotacao']))
{
    $valorDigitado = $_REQUEST['valorBTC'];
    $cotacao = $_REQUEST['cotacao'];


    $blockchainURL = "https://blockchain.info/pt/ticker";
    $MercadoURL = "https://www.mercadobitcoin.net/api/BTC/ticker/";



        if($cotacao == 1)
        {

          $json = file_get_contents($blockchainURL,0,null,null);
          //Decodificando a string e criando o json
          $json_output = json_decode($json);

              $valorBTC = (int) $json_output->BRL->last;

             $flag = 'Blockchain';

        }else{
                if($cotacao == 2)
                {
                  $json_mercado = file_get_contents($MercadoURL,0,null,null);

                  $json_output_mercado = json_decode($json_mercado);

                  $valorBTC = (int) $json_output_mercado->ticker->last;

                  $flag = 'Mercado Bitcoin';

                }

        }

        $BTCforReal = $valorDigitado * $valorBTC;

        if(strlen($valorDigitado) > 1)
        {

            $valorDireita = strstr($BTCforReal,'.', true);
            $valorEsquerda = strstr($BTCforReal,'.', false);
            $valorEsquerda = substr($valorEsquerda,0,3);
            $BTCforReal = $valorDireita.$valorEsquerda;
            $BTCforReal= trim(str_replace('.', ',', $BTCforReal));
        }else{
            $BTCforReal.=",00";
        }

        echo "<p class='font-weight-bold'><h2><center>$flag</center></h2></p>";
      echo "<h3><span class='glyphicon glyphicon-bitcoin'></span>ITCOIN = <font color='red'>R$ $valorBTC,00</font></h3>";
      
      $div = '
      <div class="alert alert-success alert-dismissible fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong></strong><h3>
          <span class="glyphicon glyphicon-bitcoin"></span> '.$valorDigitado.' = > R$ '.$BTCforReal.'
       </h3> </div>     '; 
        
        echo $div;

}//fim do 1º if 