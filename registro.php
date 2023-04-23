<?php require_once("conexao.php");
require_once("logica-adm.php"); 
//maxlength
verificaadms();

      ?>


<?php
header('Cache-Control: no cache');


$id = $_POST["para"];
          
$valor = $_POST["valor"];
$actual = $_POST["actual"];
$total = $valor + $actual;

$valorn = $_POST["valor"];
$actualn = $_POST["actual"];

$totaln = $actualn - $valorn;



$comentar_Ganho = $_POST["comentar"];
$data_Ganho = date("Y/m/d");   
$hora_Ganho = date("H:i:s"); 
$mes_Ganho = date("m"); 
$ano_Ganho = date("Y"); 
$ensa_Ganho = $_POST["ensa"];
$tipo_Ganho = $_POST["tipo"];
$adm_Ganho = $_POST["adm"];

if ($ensa_Ganho == "1") {
  if($valor == "")
{
    header("Location: index.php");
    die();
}
else{
            $sql = mysqli_query($conexao, "UPDATE dinheiros SET total_Dinheiro = '$total' WHERE dinheiros . id_Dinheiro = $id");
            $sqlganho = mysqli_query($conexao, "INSERT INTO historico (valor_hist, comentar_hist, data_hist, hora_hist, total_Dinheiro, mes_hist, ano_hist, ensa_hist, tipo_hist, adm_hist) VALUES ('$valor', '$comentar_Ganho', '$data_Ganho', '$hora_Ganho', '$total','$mes_Ganho', '$ano_Ganho', '$ensa_Ganho', '$tipo_Ganho', '$adm_Ganho')");
            header("Location: index.php");
            die();
          }
}

else{
  $sql = mysqli_query($conexao, "UPDATE dinheiros SET total_Dinheiro = '$totaln' WHERE dinheiros . id_Dinheiro = $id");
  $sqlganho = mysqli_query($conexao, "INSERT INTO historico (valor_hist, comentar_hist, data_hist, hora_hist, total_Dinheiro, mes_hist, ano_hist, ensa_hist, tipo_hist, adm_hist) VALUES ('$valor', '$comentar_Ganho', '$data_Ganho', '$hora_Ganho', '$totaln','$mes_Ganho', '$ano_Ganho', '$ensa_Ganho', '$tipo_Ganho', '$adm_Ganho')");
  header("Location: index.php");
  die();
}
     

?>

