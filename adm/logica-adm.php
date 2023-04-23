<?php

 //error_reporting(E_ALL ^ E_NOTICE);
session_start();
function admsEstaLogado() {
    return isset($_SESSION["adms_logado"]);
}

function verificaadms() {
  if(!admsEstaLogado()) {
      $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
     header("Location: index.php");
     die();
  }
}

function admsLogado() {
    return $_SESSION["adms_logado"];
}

function logaadm($email) {
    $_SESSION["adms_logado"] = $email;
}

function sairDoAdmAG() {
    //session_start();
	//session_status("adms_logado");
	unset($_SESSION["adms_logado"]);
   
   
}
