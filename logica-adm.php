<?php

 //error_reporting(E_ALL ^ E_NOTICE);
session_start();
function admsEstaLogadoF() {
    return isset($_SESSION["adms_logadocf"]);
}

function verificaadms() {
  if(!admsEstaLogadoF()) {
      $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
     header("Location: index.php");
     die();
  }
}

function admsLogado() {
    return $_SESSION["adms_logadocf"];
}

function logaadm($nome) {
    $_SESSION["adms_logadocf"] = $nome;
}

function sairDoAdmAG() {
    //session_start();
	//session_status("adms_logadocf");
	unset($_SESSION["adms_logadocf"]);
   
   
}
