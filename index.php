
<?php 
    require_once("conexao.php");
      require_once("logica-adm.php");
      //require_once("banco-adm.php");
      //error_reporting(E_ALL ^ E_NOTICE);?>

	  <?php if(admsEstaLogadoF()) { ?>
	
<section class="conte">
<br><br>
<?php
require_once("ganhos.php");
?>

    <?php } else { ?>
    
  <!DOCTYPE html>
<html>
	<head>
		<meta charset=UTF-8>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="Shortcut Icon" type="ico" href="img/logo/logo.ico">
		<title>Controlo Financeiro</title>
		<link rel="stylesheet" href="css/style.css">
                <link rel="stylesheet" href="css/alerta.css">
                <link rel="stylesheet" href="css/font-awesome.min.css">
	</head>

  <?php
     
        
        ?>
	<body>
 
    
<div class="login"><br><br><br><br><br>
<i class="fa fa-user" aria-hidden="true" ></i>
<h1>MUNIR</h1>
    <h1>Controlo Financeiro</h1>

<!--a href="ganhos.php"><h2>Ganhos</h2> <img src="img/ganhos.gif" alt="" class="img-gif"></a> <br>
<a href="gastos.php"><h2>Gastos</h2>  <img src="img/gastos.gif" alt="" class="img-gif"></a-->
<form action="login.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="nome" value="Jacó Jorge Garcia">
    <input type="password" name="senha" placeholder="Senha" class="logininp" required><br><br>
    <input type="submit" value="Entrar" class="btn">
    <?php
alertaMunir("aviso");
alertaMunir("sucesso");

?>

</form>

</div>


</body>
</html>


<?php } ?>





