<?php
require_once("conexao.php");
require_once("logica-adm.php"); 
$nome = $_POST["nome"];
$senha = $_POST["senha"];
//

function buscaadmCF($conexao, $nome, $senha) {
   
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $query = "SELECT * from adm where nome_Adm='$nome' and senha_Adm='$senha'";
    $resultado = mysqli_query($conexao ,$query);
    $usuario = mysqli_num_rows($resultado);
    
 
if ($usuario > 0) {
    $data = mysqli_fetch_array($resultado);
        $_SESSION['active'] = true;
        $_SESSION['id_adms'] = $data['id_adms'];
        $_SESSION['nome'] = $data['nome'];
        $_SESSION['senha'] = $data['senha'];
}
        
return $usuario;
}
   


