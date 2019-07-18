<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <link rel="stylesheet" href="css/insert.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Cadastro do Paciente</title>
</head>
<body>
  <h1><a href="index.php"><img src="img/logo.png" alt="Clínica Performance" align="middle"></a></h1>
	
	<div id="formulario" class="rounded">
	
	<form  method="post" action="insertedited.php">
	
	<h2>Cadastro</h2>
<?php

  require_once('connectvars.php');
   
	$id2 = $_GET['id'];	
    $nome2 = $_GET['nome'];
    $nascimento2 = $_GET['nascimento'];
    $telefone2 = $_GET['telefone'];
    $endereco2 = $_GET['endereco'];
    $carteira2 = $_GET['carteira'];
	$medico2 = $_GET['medico'];
	$convenio2 = $_GET['convenio'];
	$obs2 = $_GET['obs'];
	$email2 = $_GET['email'];
	$prontuario2 = $_GET['prontuario'];
        $prontuario2= str_replace("<br />","\n",$prontuario2);
   
?>
	<label for="nome">Nome:</label>
    <input type="text" class="input" name="nome" id="nome" size="62" value="<?=$nome2 ?>" />
	
	<label for="nascimento">Nascimento:</label>
    <input type="text" class="input" name="nascimento" id="nascimento" size="12" value="<?=$nascimento2 ?>" />
	
    <label for="telefone">Telefone:</label>
    <input type="text" class="input" name="telefone" id="telefone" size="12" value="<?=$telefone2 ?>"/>
	
    <label for="endereco">Endereco:</label>
    <input type="text" class="input" name="endereco" id="endereco" size="20" value="<?=$endereco2 ?>"/>
	
	<label for="carteira">Carteira:</label>
    <input type="text" class="input" name="carteira" id="carteira" size="29" value="<?=$carteira2 ?>"/></br>
	
    <label for="medico">Medico:</label>
    <input type="text" class="input" name="medico" id="medico" size="20" value="<?=$medico2 ?>"/>

	<label for="medico">Convenio:</label>
    <input type="text" class="input" name="convenio" id="convenio" size="20" value="<?=$convenio2 ?>"/>
	
	<label for="medico">ID:</label>
    <input type="text" class="input" name="id" id="id" readonly="readonly" size="5" value="<?=$id2 ?>"/>
	
	<br />
	
	<label for="medico">Obs.:</label>
    <input type="text" class="input" name="obs" id="obs" size="50" value="<?=$obs2 ?>"/>	

	<label for="email">E-mail:</label>
    <input type="text" class="input" name="email" id="email" size="25" value="<?=$email2 ?>"/>
	</br></br>

    <label for="prontuario">Prontuario:</label></br>
    <textarea   rows="15" cols="103" class="input textarea" name="prontuario" id="prontuario"><?= $prontuario2?></textarea>
	
	<input type="submit" name="submit"  class="button" value="Salvar" />
	
    </form>
	
    </div>

</body> 
</html>	