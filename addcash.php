<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <link rel="stylesheet" href="css/addcash.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Entrada de Caixa</title>
</head>
<body>
	<h1><a href="cash.php"><img src="img/logo.png" alt="Clínica Performance" align="middle"></a></h1>
	
	<div id="formulario" class="rounded">
	
	<form  method="post" action="addcash.php">
	
	<h2>Entrada de Caixa</h2>
	
	<label for="referente">Referente:</label>
    <input type="text" class="input" name="referente" id="referente" size="62" /></br>
	
	<label for="valor">Valor:</label>
    <input type="text" class="input" name="valor" id="valor" size="12" /></br>
	
	<label for="databd">Data:</label>
    <input type="text" class="input" name="databd" id="databd" size="12" value="<?php echo $data = date("d-m-Y");?>" /></br>

	<label for="obs">Obs.:</label>
    <input type="text" class="input" name="obs" id="obs" size="62" /><br />
	
	<label for="tipo">Tipo de Pagamento.: </label>
    <input type="text" class="input" name="tipo" id="tipo" size="53" />
	
	<br />
	Cliente <input class="cliente" name="cliente" type="radio" value="Cliente" checked />
	Fornecedor <input class="cliente" name="cliente" type="radio" value="Fornecedor" /><br />
	</br></br>
	
	<input type="submit" name="submit"  class="button" value="Receber" />
	
    </form>
	
    </div>
</body>
<?php
  require_once('connectvars.php');
  if (isset($_POST["submit"])) {
  $referente = $_POST['referente'];
  $valor = $_POST['valor'];
  $dat = $_POST['databd'];
  $databd = implode('-', array_reverse(explode('-', $dat)));
  $obs = $_POST['obs']; 
  $tipo = $_POST['tipo'];
  $cliente = $_POST['cliente'];  
	
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    or die('Error connecting to MySQL server.');
////////////////////
  $query = "INSERT INTO `info_cash` VALUES(0,'$referente', '$valor', '$databd', '$obs', '$tipo', '$cliente')";
/////////////////////
  $result = mysqli_query($dbc, $query)
    or die($query);

  mysqli_close($dbc);
  }
?>
</html>