<?php 
$pag = "frequencia";
require_once("../conexao.php"); 

@session_start();
    //verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'aluno'){
    echo "<script language='javascript'> window.location='../index.php' </script>";

}
?>