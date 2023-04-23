<?php require_once("banco-adm.php");
      require_once("logica-adm.php");

$adm = buscaadmCF($conexao, $nome, $senha);

if($adm == null) {
    $_SESSION["aviso"] = "Senha Errada.";
    header("Location: index.php");
} else {
    $_SESSION["sucesso"] = "Usuário logado com sucesso.";
    $_SESSION["nome_Adm"] = $nome;
    logaadm($nome);
    header("Location: index.php");
}
die();


