<?php
require_once("../conexao.php");
require_once("logica-adm.php"); 
$senha = $_POST["senha_Adm"];
//

function buscaadm($conexao, $email, $senha) {
   
    $senha = $_POST["senha_Adm"];
    $senhamd5 = MD5($senha);
    $query = "SELECT * from adm where senha_Adm='$senhamd5'";
    $resultado = mysqli_query($conexao ,$query);
    $usuario = mysqli_num_rows($resultado);
    
 
if ($usuario > 0) {
    $data = mysqli_fetch_array($resultado);
        $_SESSION['active'] = true;
        $_SESSION['id_Adm'] = $data['id_Adm'];
        $_SESSION['nome_Adm'] = $data['nome_Adm'];
        $_SESSION['senha_Adm'] = $data['senha_Adm'];
}
        
return $usuario;
}
   

