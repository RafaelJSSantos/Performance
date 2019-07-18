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
	
	<form  method="post" action="insert.php">
	
	<h2>Cadastro</h2>
	
	<label for="nome">Nome:</label>
    <input type="text" class="input" name="nome" id="nome" size="62" />
	
	<label for="nascimento">Nascimento:</label>
    <input type="text" class="input" name="nascimento" id="nascimento" size="12" />
	
    <label for="telefone">Telefone:</label>
    <input type="text" class="input" name="telefone" id="telefone" size="12" />
	
    <label for="endereco">Endereco:</label>
    <input type="text" class="input" name="endereco" id="endereco" size="31" />
	
	<label for="carteira">Carteira:</label>
    <input type="text" class="input" name="carteira" id="carteira" size="18" /></br>
	
    <label for="medico">Medico:</label>
    <input type="text" class="input" name="medico" id="medico" size="20" />

	<label id="convenio" for="convenio">Convenio:</label>
    Part. <input class="convenio" name="convenio" type="radio" value="Part." />
    SUS <input class="convenio" name="convenio" type="radio" value="SUS" />
	Tabela <input class="convenio" name="convenio" type="radio" value="Tabela" />
	Unimed <input class="convenio" name="convenio" type="radio" value="Unimed" />
	SCsaude <input class="convenio" name="convenio" type="radio" value="SCsaude" />
	Outros <input class="convenio" name="convenio" type="radio" value="Outros" /><br />
	
	<label for="medico">Obs.:</label>
    <input type="text" class="input" name="obs" id="obs" size="50" />	

	<label for="email">E-mail:</label>
    <input type="text" class="input" name="email" id="email" size="25" />
	</br></br>

    <label for="prontuario">Prontuario:</label></br>
    <textarea  rows="15" cols="103" class="input textarea" name="prontuario" id="prontuario"></textarea>
	
	<input type="submit" name="submit"  class="button" value="OK" />
	
    </form>
	
    </div>

</body>
<?php
  require_once('connectvars.php');
  if (isset($_POST["submit"])) {
  $nome = $_POST['nome'];
  $nascimento = $_POST['nascimento'];
  $telefone = $_POST['telefone'];
  $endereco = $_POST['endereco'];
  $carteira = $_POST['carteira'];
  $medico = $_POST['medico'];
  $convenio = $_POST['convenio'];
  $obs = $_POST['obs'];
  $email = $_POST['email'];
  $prontuario = $_POST['prontuario'];
  $prontuario = nl2br($prontuario);
  
	
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    or die('Error connecting to MySQL server.');

  $query = "INSERT INTO `info_cliente` VALUES(0,'$nome', '$nascimento', '$telefone', '$endereco', '$carteira', " .
    "'$medico', '$convenio', '$obs', '$prontuario', '$email')";

  $result = mysqli_query($dbc, $query)
    or die($query);

  mysqli_close($dbc);
  }
?>
</html>