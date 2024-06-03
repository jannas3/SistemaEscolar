<?php 
require_once("../../conexao.php"); 

$aluno = $_POST['aluno'];
$presenca = $_POST['presenca'];
$data = $_POST['data'];

$id = $_POST['txtid2'];

if($id == ""){
	$res = $pdo->prepare("INSERT INTO frequencia SET aluno = :aluno, presenca = :presenca, data = :data");	

}else{
	$res = $pdo->prepare("UPDATE frequencia SET aluno = :aluno, presenca = :presenca, data = :data WHERE id = '$id'");
	
}

$res->bindValue(":aluno", $aluno);
$res->bindValue(":presenca", $presenca);
$res->bindValue(":data", $data);

$res->execute();

echo 'Salvo com Sucesso!';
?>
