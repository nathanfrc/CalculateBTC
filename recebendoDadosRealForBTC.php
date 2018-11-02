<?php

if(isset($_REQUEST['valorReal'])&& isset($_REQUEST['cotacao']))
{

  $RealForBTC =0;
  $valorBTC = 0;
  $flag ="";

  $valorDigitado = $_REQUEST['valorReal'];
  $cotacao = $_REQUEST['cotacao'];


if(strlen($valorDigitado) == 5 or strlen($valorDigitado) == 6 ){

  $valorDigitadoFormat = strstr($valorDigitado,',',true);

      if($valorDigitadoFormat < 50)
      {
          echo '
                <div class="alert alert-danger alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  Não Pode ser menor que R$ 50,00
                </div> '; 
          exit;
      }

}else{
       if(strlen($valorDigitado) == 8 or strlen($valorDigitado) > 8 )
       {
            $tirarPonto = strstr($valorDigitado, '.', true);
            $restante = strstr($valorDigitado, '.',false);
            $restante = trim(str_replace('.', '', $restante));
            $valorDigitadoFormat = strstr($restante, ',', true);
            $valorDigitadoFormat = $tirarPonto.$valorDigitadoFormat; 

            if($valorDigitadoFormat > 999999)
            {
               
                echo '
                <div class="alert alert-danger alert-dismissible fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  Não Pode ser maior que 999.999,99
                </div> '; 
                exit;
            }

       }else{
              

              echo '
              <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Não Pode ser menor que R$ 50,00
              </div> '; 
              exit;

            }

         
}


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

      
        $RealForBTC = (int) $valorDigitadoFormat / $valorBTC;


      $RealForBTC =  substr($RealForBTC, 0, 10);


      echo "<p class='font-weight-bold'><h2><center>$flag</center></h2></p>";
      echo "<h3><span class='glyphicon glyphicon-bitcoin'></span>ITCOIN = <font color='red'>R$ $valorBTC,00</font></h3>";
      
      $div = '
      <div class="alert alert-success alert-dismissible fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong></strong><h3>
        R$ '.$valorDigitado.' = > <span class="glyphicon glyphicon-bitcoin"></span> '.$RealForBTC.'
       </h3> </div>     '; 
        
        echo $div;

}










