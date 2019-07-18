<?php
  require_once('adminauthorize.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <link rel="stylesheet" href="css/search.css"
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Seleção de cliente</title>
</head>
<body>
  <h1><a href="index.php"><img src="img/logo.png" alt="Clínica Performance" align="middle"></a></h1>
  <div id="formulario" class="rounded">
  <form  method="post" action="backup.php">
    <input type="submit" name="backup"  class="button" value="BACKUP" />
  </form>
<?php
  require_once('connectvars.php');
  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
  // Retrieve the score data from MySQL
  $query = "SELECT * FROM info_cliente ORDER BY nome";
  $data = mysqli_query($dbc, $query);
  // Loop through the array of score data, formatting it as HTML 
  echo '<table>';
  while ($row = mysqli_fetch_array($data)) { 
    // Display the score data
	echo '<tr class="row"><td><strong>' . $row['nome'] . '</strong></td>';
    echo '<td>' . $row['telefone'] . '</td>';
    echo '<td><a href="show.php?id=' . $row['id'] . '&amp;nome=' . $row['nome'] .
      '&amp;nascimento=' . $row['nascimento'] . '&amp;telefone=' . $row['telefone'] .
	  '&amp;endereco=' . $row['endereco'] .'&amp;carteira=' . $row['carteira'] .'&amp;medico=' . $row['medico'] .
	  '&amp;convenio=' . $row['convenio'] .'&amp;obs=' . $row['obs'] .'&amp;prontuario=' . $row['prontuario'] . '">Visualizar</a></td>';
	echo '<td><a href="delete.php?id=' . $row['id'] . '">Deletar</a></td></tr>';
   }
  echo '</table>';
  mysqli_close($dbc);
?>
</div>
</body> 
</html>