<?php 
$pag = "turmas";
require_once("../conexao.php"); 

@session_start();
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'aluno'){
    echo "<script language='javascript'> window.location='../index.php' </script>";
}
?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Disciplina</th>
                        <th>Sala</th>
                        <th>Professor</th>
                        <th>Horário</th>
                        <th>Dias</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = $pdo->query("SELECT * FROM turmas ORDER BY id DESC");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($res as $turma) {
                        $disciplina = $turma['disciplina'];
                        $sala = $turma['sala'];
                        $professor = $turma['professor'];
                        $horario = $turma['horario'];
                        $dia = $turma['dia'];
                        $id = $turma['id'];

                        // Get names for disciplina, sala, professor
                        $nome_disc = $pdo->query("SELECT nome FROM disciplinas WHERE id = '$disciplina'")->fetchColumn();
                        $nome_sala = $pdo->query("SELECT sala FROM salas WHERE id = '$sala'")->fetchColumn();
                        $nome_prof = $pdo->query("SELECT nome FROM professores WHERE id = '$professor'")->fetchColumn();
                    ?>
                    <tr>
                        <td><?php echo $nome_disc ?></td>
                        <td><?php echo $nome_sala ?></td>
                        <td><?php echo $nome_prof ?></td>
                        <td><?php echo $horario ?></td>
                        <td><?php echo $dia ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
