<?php
require_once("conexao.php");
//maxlength
require_once("logica-adm.php"); 
//maxlength
verificaadms();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/gasto.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    
<a href="index.php"><i class="fa fa-toggle-left" aria-hidden="true" ></i> </a>
<a href="sairAdmAG.php"><i class="fa fa-power-off" aria-hidden="true" ></i> </a>


    <?php

header('Cache-Control: no cache');



//$palavra = $_POST['pesquisar'];
$sql = mysqli_query($conexao, "SELECT * FROM dinheiros");

$numRegistros = mysqli_num_rows($sql);





if ($numRegistros !=0) {
while ($produto = mysqli_fetch_object($sql)) {?>


<div class="tabela-top">

<?php
       $gastosM = listarGastosMensais($conexao);
        foreach($gastosM as $gastosMs) :
    ?>
    <h2><i class="fa fa-bar-chart" aria-hidden="true"></i> Gasto Mensal <?= $gastosMs['valore']?>,00Kz</h2>
            <?php
        endforeach
    ?>


<?php
       $gastosA = listarGastosAnual($conexao);
        foreach($gastosA as $gastosA) :
    ?>
  <h2><i class="fa fa-line-chart" aria-hidden="true"></i> Gasto Anual <?= $gastosA['anual']?>,00Kz</h2>
            <?php
        endforeach
    ?>

    <h2><i class="fa fa-dollar" aria-hidden="true"></i>Dinheiro <?=$produto->total_Dinheiro?>,00Kz</h2>
        </div>






<form action="gastos-cod.php" method="post" enctype="multipart/form-data">

  

    <input type="hidden" name="para" value="<?=$produto->id_Dinheiro?>">
 
  
    <label> <br>
        <input type="hidden" name="actual" value="<?=$produto->total_Dinheiro?>">
    </label>

    <label for=""><br>
        <input type="number" name="valor"  placeholder="Digite um Valor">
    </label>

    <label for="">
 
 <input type="text" name="comentar" value="Digite Um Comentário">
 
</label>
    <input type="submit" value="Guardar" class="bt">
</form>


<table border="1" class="tabtop">
<tr><th>ID</th><th>Valor Gasto</th><th>Comentário</th><th>Data</th><th>Hora</th><th>Dinheiro</th></tr>

<?php
       $gasto = listarGastos($conexao);
        foreach($gasto as $gastos) :
    ?>
             
               
          
<tr>
    <td><?= $gastos['id_Gasto']?></td>
    <td><?= $gastos['valor_Gasto']?>,00Kz</td>
    <td><?= $gastos['comentar_Gasto']?></td>
    <td><?= $gastos['data_Gasto']?></td>
    <td><?= $gastos['hora_Gasto']?></td>
    <td><?= $gastos['total_Dinheiro']?>,00Kz</td>

</tr>

            <?php
        endforeach
    ?>





</table>



    
    <?php	}
} else {
    echo "Nao tem"; 
            header("Location: index.php");
            echo "Nao tem"; 
            die();
	}

	?>

		
</section>
<br><br> </br> </br>


</body>
</html>