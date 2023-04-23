<?php
require_once("conexao.php");
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
    <link rel="stylesheet" href="css/ganho.css">
    <link rel="stylesheet" href="css/popupmodel.css">
   
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <title>Controle | Financeiro</title>
</head>
<body>

<?php
        header('Cache-Control: no cache');
        //$palavra = $_POST['pesquisar'];
        $sql = mysqli_query($conexao, "SELECT * FROM dinheiros");
        $numRegistros = mysqli_num_rows($sql);
        if ($numRegistros !=0) {
            while ($produto = mysqli_fetch_object($sql))
    {?>

    <input class="modal-btn" type="checkbox" id="modal-btn" name="modal-btn"/>
    <label for="modal-btn"><i class="fa fa-plus" aria-hidden="true" ></i></label> 		
    <div class="modal">		
        <div class="modal-wrap">	
          


        <form action="registro.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="para" value="<?=$produto->id_Dinheiro?>">
        
        <label> <br>
            <input type="hidden" name="actual" value="<?=$produto->total_Dinheiro?>">
        </label>
        
        <label for=""><br>
            <input type="number" name="valor"  placeholder="Digite um Valor">
        </label><br>
        <input type="radio" name="ensa" value="1" checked> Ganho<br>
        <input type="radio" name="ensa" value="2"> Gasto<br>
        <p>Tipo de Saida ou Entrada</p> 
        <select name="tipo">
            <option value="1">Trabalho</option>
            <option value="2">Transporte</option>
            <option value="3">Emprestimo</option>
            <option value="4">Devolução</option>
            <option value="5">Venda</option>
            <option value="6">Compra</option>
            <option value="7">Doações</option>
            <option value="8">Documentos</option>
            <option value="9">Saldo</option>
            <option value="10">Formação</option>
          </select><br><br>
        <label for="">
        <input type="text" name="comentar" value="Digite Um Comentário">
        </label><br>
        <input type="hidden" name="adm" value="1">
        <input type="submit" value="Guardar" class="bt">
        </form>



        </div>			          			
    </div>
    <a href="sairAdmAG.php"><i class="fa fa-power-off" aria-hidden="true" ></i> </a>
   

   
    <div class="tabela-top">  
        <div class="top">

            <?php
                $ganhosM = listarGanhosMensais($conexao);
                foreach($ganhosM as $ganhosMs) :
            ?>
             <div>
                <p> Ganho Mensal </p><h2 class="mais"><i class="fa fa-angle-double-up" aria-hidden="true"></i><?= $ganhosMs['valore']?>,00Kz</h2>
           
            </div> 
            <?php
                endforeach
            ?>
    
            <?php
                $ganhosA = listarGanhosAnual($conexao);
                foreach($ganhosA as $ganhosA) :
            ?>
            <div>
                <p>Ganho Anual </p><h2 class="mais"> <i class="fa fa-angle-double-up" aria-hidden="true"></i><?= $ganhosA['anual']?>,00Kz</h2>
          
            </div>  
            <?php
                endforeach
            ?>

            </div>
    <div class="top">
          <?php
       $ganhosM = listarGastosMensais($conexao);
        foreach($ganhosM as $ganhosMs) :
    ?>
    <div><p>Gastos Mensal </p><h2 class="menus"> <i class="fa fa-angle-double-down" aria-hidden="true"></i><?= $ganhosMs['valore']?>,00Kz</h2>
           </div> <?php
        endforeach
    ?>
    
     <?php
       $ganhosA = listarGastosAnual($conexao);
        foreach($ganhosA as $ganhosA) :
    ?>
  <div>
    <p>Gasto Anual</p><h2 class="menus"><i class="fa fa-angle-double-down" aria-hidden="true"></i>  <?= $ganhosA['anual']?>,00Kz</h2>
         
  </div>   <?php
        endforeach
    ?>
    </div>
    
   

    <div class="top">
        <div>
           
        <p>Meu Dinheiro</p> <h2 class="kumbu"><i class="fa fa-dollar" aria-hidden="true"></i><?=$produto->total_Dinheiro?>,00Kz</h2>
       </div>
       
        <h2 class="addmais">
        <i class="fa fa-plus" aria-hidden="true"><p><a href="">Add</a></p></i>
       
        </h2>
       
     
    
    </div> </div>


<table  class="tabtop">
<tr><th>Entrada ou Saida</th><th>Valor </th><th>Detalhes</th><th>Data</th><th>Hora</th></tr>

<?php
       $ganho = listarGanhos($conexao);
        foreach($ganho as $ganhos) :
    ?>
             
               
          
<tr><?php if($ganhos['ensa_hist'] ==1) { ?>
    <td class="mais"><i class="fa fa-plus" aria-hidden="true"></i></td>
    <?php } else { ?>
    <td class="menus"><i class="fa fa-minus" aria-hidden="true"></td>
    <?php } ?>

    <td><?= $ganhos['valor_hist']?>,00Kz</td>
    <td><?= $ganhos['tipo_nome']?></td>
    <td><?= $ganhos['data_hist']?></td>
    <td><?= $ganhos['hora_hist']?></td>
    

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