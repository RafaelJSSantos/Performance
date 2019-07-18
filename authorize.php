<?php
  // User name and password for authentication
  $username = '35331855';
  $password = '35331855';

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    // The user name/password are incorrect so send the authentication headers
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Clinica Performance"');
    exit('<h2>Clinica Performance</h2>Usuário ou senha invalido');
  }
?>