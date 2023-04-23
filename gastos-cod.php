<?php require_once("conexao.php");
require_once("logica-adm.php"); 
//maxlength
verificaadms();

      ?>


<?php
header('Cache-Control: no cache');


          $id = $_POST["para"];
          $nome = $_POST["nome"];
$valor = $_POST["valor"];
$actual = $_POST["actual"];

$total = $actual - $valor;

$comentar_Gasto = $_POST["comentar"];
$data_Gasto = date("Y/m/d");   
$hora_Gasto = date("H:i:s"); 
$mes_Gasto = date("m"); 
$ano_Gasto = date("Y"); 


if($valor == "")
{
    header("Location: index.php");
    die();
}
else{



            //$sql = mysqli_query($conexao, "SELECT * FROM dinheiros WHERE id_Dinheiro = '".$id."'");
            //$usuario = mysqli_fetch_object($sql);
            $sql = mysqli_query($conexao, "UPDATE dinheiros SET total_Dinheiro = '$total' WHERE dinheiros . id_Dinheiro = $id");

            $sqlgasto = mysqli_query($conexao, "INSERT INTO gastos (id_Gasto, valor_Gasto, comentar_Gasto, data_Gasto, hora_Gasto, total_Dinheiro, mes_Gasto, ano_Gasto) VALUES (NULL, '$valor', '$comentar_Gasto', '$data_Gasto', '$hora_Gasto', '$total', '$mes_Gasto', '$ano_Gasto')");
            


            header("Location: gastos.php");
            die();
          }
     

?>

