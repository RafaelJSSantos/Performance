<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <link rel="stylesheet" href="css/search.css"
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Busca Financeiro</title>
</head>
<body>
  <h1><a href="cash.php"><img src="img/logo.png" alt="Clínica Performance" align="middle"></a></h1>
  <div id="formulario" class="rounded">
  <form  method="post" action="searchcash.php">
    <input type="text" class="input" name="de" id="de" size="12" value="DD-MM-AAAA" />
	<label for="ate">~</label>
    <input type="text" class="input" name="ate" id="ate" size="12" value="DD-MM-AAAA" />
    <input type="submit" name="data"  class="button" value="Consultar data" />
	<input type="submit" name="hoje"  class="button" value="Consultar Hoje" />
  </form>
<?php
   require_once('connectvars.php');
  if (isset($_POST["data"])) {
  $de = $_POST['de'];
  $data1 = implode('-', array_reverse(explode('-', $de)));//YYYY-MM-DD
  $ate = $_POST['ate'];
  $data2 = implode('-', array_reverse(explode('-', $ate)));
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the score data from MySQL
  $query = "SELECT * FROM `info_cash` WHERE date BETWEEN '".$data1."' AND '".$data2."'";///////////////atenção aki, é DATE e não DATA
  $data = mysqli_query($dbc, $query);

  // Loop through the array of score data, formatting it as HTML 
  echo '<table>';
  $total =0;
  while ($row = mysqli_fetch_array($data)) { 
    // Display the score data
	$total = $total + $row['valor'];
    echo '<tr class="row"><td><strong>' . $row['valor'] . '</strong>||</td>';
	echo '<td>' . $row['referente'] . '||</td>';
    echo '<td>' . implode('-', array_reverse(explode('-', $row['date']))) . '||</td>';
	echo '<td>' . $row['obs'] . '||</td>';
    echo '<td>' . $row['tipo'] . '||</td>';
	echo '<td>' . $row['cliente'] . '||</td>';
    echo '<td><a href="cashdelete.php?id=' . $row['id'] . '">Estornar</a></td></tr>';
  }
  echo '</table>';
  echo '<hr /><strong>'.$total.'</strong>';

  mysqli_close($dbc);
  }
  if (isset($_POST["hoje"])) {
  // Connect to the database 
  $date = date("Y-m-d");
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the score data from MySQL
  $query = "SELECT * FROM info_cash WHERE (date LIKE '".$date."') ORDER BY id DESC";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of score data, formatting it as HTML 
  echo '<table>';
  $total =0;
  while ($row = mysqli_fetch_array($data)) { 
    // Display the score data
	$total = $total + $row['valor'];
    echo '<tr class="row"><td><strong>' . $row['valor'] . '</strong>||</td>';
	echo '<td>' . $row['referente'] . '||</td>';
    echo '<td>' . implode('-', array_reverse(explode('-', $row['date']))) . '||</td>';
	echo '<td>' . $row['obs'] . '||</td>';
    echo '<td>' . $row['tipo'] . '||</td>';
	echo '<td>' . $row['cliente'] . '||</td>';
    echo '<td><a href="cashdelete.php?id=' . $row['id'] . '">Estornar</a></td></tr>';
  }
  echo '</table>';
  echo '<hr /><strong>'.$total.' R$</strong>';

  mysqli_close($dbc);
  }
?>
</div>
</body> 
</html>