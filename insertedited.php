<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <link rel="stylesheet" href="css/index.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Cadastro do Paciente</title>
</head>
<body>
	<a href="index.php"><h1><img src="img/logo.png" alt="Clínica Performance" id="cfperfor"></h1></a>
	<div id="corpo" class="rounded">
	<a href="search.php"><img src="img/consulta.png" alt="Clínica Performance" width="436px"></a>
	<a href="insert.php"><img src="img/cadastro.png" alt="Clínica Performance" width="436px"></a>
    </div>
<div class="footer">
	Feito por Rafael J. S. Santos - 96141390
</div>
</body>
</html>
<?php
  require_once('connectvars.php');
  if (isset($_POST["submit"])) {
  $id = $_POST['id'];
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
  
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$query = "DELETE FROM u327803205_cfp.info_cliente WHERE `id`='$id'";
	$result = mysqli_query($dbc, $query)
	 or die($query);
	mysqli_close($dbc);
	
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    or die('Error connecting to MySQL server.');

  $query = "INSERT INTO `info_cliente` VALUES('$id','$nome', '$nascimento', '$telefone', '$endereco', '$carteira', " .
    "'$medico', '$convenio', '$obs', '$prontuario', '$email')";

  $result = mysqli_query($dbc, $query)
    or die($query);

  mysqli_close($dbc);
  }
?>