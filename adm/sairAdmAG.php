<?php require_once("logica-adm.php");
require_once('conexao.php'); 
$sessao     = $_SESSION['nome_Adm'];
mysqli_query($conexao, "DELETE FROM usuarios_online WHERE sessao = '$sessao'");
verificaadms();

sairDoAdmAG();

$_SESSION["sucesso"] = "Deslogado com sucesso.";
header("Location: ../index.php");
die();