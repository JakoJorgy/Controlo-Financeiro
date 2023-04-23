<?php require_once("logica-adm.php");
require_once('conexao.php'); 
verificaadms();

sairDoAdmAG();

$_SESSION["sucesso"] = "Deslogado com sucesso.";
header("Location: index.php");
die();