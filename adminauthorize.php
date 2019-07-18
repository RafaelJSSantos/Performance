<?php
  // User name and password for authentication
  $username = 'rafael';
  $password = 'minhasenha';

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    // The user name/password are incorrect so send the authentication headers
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Pagina do Administrador"');
    exit('<h2>Administracao</h2>Usuario ou senha invalida...');
  }
?>
