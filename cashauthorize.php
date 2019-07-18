<?php
  // User name and password for authentication
  $username = 'fernando';
  $password = 'nonono';

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    // The user name/password are incorrect so send the authentication headers
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Financeiro"');
    exit('<h2>Financeiro</h2>Usuario ou senha invalido');
  }
?>
