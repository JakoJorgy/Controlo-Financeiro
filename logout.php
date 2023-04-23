<?php require_once("logica-adm.php");

verificaadm();

sairDoAdm();
$_SESSION["sucesso"] = "Deslogado com sucesso.";
header("Location: index.php");
die();
