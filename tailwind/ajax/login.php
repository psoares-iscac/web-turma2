<?php
session_start();

# vou buscar os dados, faço validacoes

#ligado
$_SESSION['ligado'] = true;
$_SESSION['nome'] = 'paulo soares';

header('Location:../index.php');
exit;
