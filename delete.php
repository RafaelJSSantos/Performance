<?php
  require_once('connectvars.php');
 
  $id = $_GET['id'];

  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$query = "DELETE FROM u327803205_cfp.info_cliente WHERE `id`='$id'";
	$result = mysqli_query($dbc, $query)
	 or die($query);
	mysqli_close($dbc);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <link rel="stylesheet" href="css/index.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Cadastro do Paciente</title>
</head>
<body>
	<h1><img src="img/logo.png" alt="Clínica Performance" id="cfperfor"></h1>
	<div id="corpo" class="rounded">
	<h3>ID <?=$id ?> Deletado com sucesso!</h3>
	<a href="search.php"><img src="img/consulta.png" alt="Clínica Performance" width="436px"></a>
	<a href="insert.php"><img src="img/cadastro.png" alt="Clínica Performance" width="436px"></a>
    </div>
</body>
</html>