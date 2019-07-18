<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>MailTo</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>MailTo</h2>

  <form method="post" action="mailto.php">
    <label for="de">DE:</label>
    <input type="text" id="de" name="de" /><br />
    <label for="para">PARA:</label>
    <input type="text" id="para" name="para" /><br />
    <label for="assunto">ASSUNTO: </label>
    <input type="text" id="assunto" name="assunto" /><br />
    <br />
    <label for="other">MENSAGEM: </label>
    <textarea id="mensagem" name="mensagem"></textarea><br />
    <input type="submit" value="ENVIAR" name="submit" />
  </form>
  
  <?php
  $de = $_POST['de'];
  $para = $_POST['para'];
  $assunto = $_POST['assunto'];
  $mensagem = $_POST['mensagem'];

  
  mail($para, $assunto, $mensagem, 'From:' . $de);
?>
</body>
</html>
