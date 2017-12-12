<?php
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];

unset ($_SESSION['login']);
unset ($_SESSION['senha']);
header('location:inicial.php');


?>