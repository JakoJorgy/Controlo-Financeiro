<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$conexao = new mysqli("localhost", "root", "", "muniirfinanceiro");
//$conexao = new mysqli("sql110.epizy.com", "epiz_29109551", "LKyeM0YtnnlZLp", "epiz_29109551_avsg");
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
    

    function buscarGastos($conexao) {
      
        $resultado = mysqli_query($conexao, "SELECT * from gastos");
        $produto = mysqli_fetch_assoc($resultado);
        return $produto;
    }

    function listarGastos($conexao) {
        $mes = date("m"); 
        $ano = date("Y");
        $publicacao = array();
        $resultado = mysqli_query($conexao, "SELECT * FROM gastos WHERE mes_Gasto=$mes AND ano_Gasto=$ano");
  
            while($produto = mysqli_fetch_assoc($resultado)) {
                array_push($publicacao, $produto);
            }
         return $publicacao;
        } 

        function listarGastosMensais($conexao) {
            $mes = date("m"); 
            $ano = date("Y");
            $publicacao = array();
           $resultado = mysqli_query($conexao, "SELECT mes_hist, ano_hist, ensa_hist, SUM(valor_hist) AS valore from historico WHERE mes_hist=$mes AND ano_hist=$ano AND ensa_hist=2");
                while($produto = mysqli_fetch_assoc($resultado)) {
                    array_push($publicacao, $produto);
                }
             return $publicacao;
            } 


            
        function listarGastosAnual($conexao) {
            $ano = date("Y");
            $publicacao = array();
           $resultado = mysqli_query($conexao, "SELECT ano_hist, SUM(valor_hist) AS anual from historico WHERE ano_hist=$ano and ensa_hist=2");
                while($produto = mysqli_fetch_assoc($resultado)) {
                    array_push($publicacao, $produto);
                }
             return $publicacao;
            } 





            function listarGanhos($conexao) {
                $mes = date("m"); 
                $ano = date("Y");
                $publicacao = array();
                $resultado = mysqli_query($conexao, "SELECT * FROM historico, tipo where tipo_hist=tipo_id ORDER BY id_hist desc LIMIT 10");
          
                    while($produto = mysqli_fetch_assoc($resultado)) {
                        array_push($publicacao, $produto);
                    }
                 return $publicacao;
                } 
        
                function listarGanhosMensais($conexao) {
                    $mes = date("m"); 
                    $ano = date("Y");
                    $publicacao = array();
                   $resultado = mysqli_query($conexao, "SELECT mes_hist, ano_hist, ensa_hist, SUM(valor_hist) AS valore from historico WHERE mes_hist=$mes AND ano_hist=$ano AND ensa_hist=1");
                        while($produto = mysqli_fetch_assoc($resultado)) {
                            array_push($publicacao, $produto);
                        }
                     return $publicacao;
                    } 
        
        
                    
                function listarGanhosAnual($conexao) {
                    $ano = date("Y");
                    $publicacao = array();
                   $resultado = mysqli_query($conexao, "SELECT ano_hist, SUM(valor_hist) AS anual from historico WHERE ano_hist=$ano and ensa_hist=1");
                        while($produto = mysqli_fetch_assoc($resultado)) {
                            array_push($publicacao, $produto);
                        }
                     return $publicacao;
                    } 
                    //verificaadms();

                    
                    function alertaMunir($alerta) {
                        if(isset($_SESSION[$alerta])) { ?>
                            <p class="alert-<?= $alerta ?>"><?= $_SESSION[$alerta]?></p>
                    
                    <?php
                            unset($_SESSION[$alerta]);
                        }
                    }
                    ?>
                    