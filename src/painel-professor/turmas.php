<?php 
$pag = "turmas";
require_once("../conexao.php"); 

@session_start();

// Verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'professor'){
    echo "<script language='javascript'> window.location='../index.php' </script>";
}

// Verificar se o usuário é professor
$isProfessor = @$_SESSION['nivel_usuario'] == 'Professor';

?>

<div class="row mt-4 mb-4">
    <?php if($isProfessor): ?>
    <a href="index.php?pag=<?php echo $pag ?>&funcao=minhas_turmas" class="button-link">
        <button type="button" class="btn btn-primary m-1" style="padding: 0.2rem 0.5rem;">
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Minhas Turmas</font>
            </font>
        </button>
    </a>
    <?php endif; ?>
</div>

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
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Query para obter as turmas
                    $query = $pdo->query("SELECT * FROM turmas order by id desc ");
                    $res = $query->fetchAll(PDO::FETCH_ASSOC);

                    for ($i=0; $i < count($res); $i++) { 
                        // Loop através das turmas
                        $disciplina = $res[$i]['disciplina'];
                        $sala = $res[$i]['sala'];
                        $professor = $res[$i]['professor'];
                        $horario = $res[$i]['horario'];
                        $dia = $res[$i]['dia'];
                        $id = $res[$i]['id'];

                        // RECUPERAR NOME DISCIPLINA
                        $query_r = $pdo->query("SELECT * FROM disciplinas where id =  '$disciplina'");
                        $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
                        $nome_disc = $res_r[0]['nome'];

                        // RECUPERAR NOME SALA
                        $query_r = $pdo->query("SELECT * FROM salas where id =  '$sala'");
                        $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
                        $nome_sala = $res_r[0]['sala'];

                        // RECUPERAR NOME PROFESSOR
                        $query_r = $pdo->query("SELECT * FROM professores where id =  '$professor'");
                        $res_r = $query_r->fetchAll(PDO::FETCH_ASSOC);
                        $nome_prof = $res_r[0]['nome'];

                        // Exibir apenas as turmas do professor autenticado
                        if($isProfessor && $professor != $_SESSION['id_usuario']) continue;
                    ?>
                    <tr>
                        <td><?php echo $nome_disc ?></td>
                        <td><?php echo $nome_sala ?></td>
                        <td><?php echo $nome_prof ?></td>
                        <td><?php echo $horario ?></td>
                        <td><?php echo $dia ?></td>
                        <td>
                            <a href="index.php?pag=<?php echo $pag ?>&funcao=detalhes&id=<?php echo $id ?>" class='text-info mr-1' title='Detalhes da Turma'><i class='fas fa-info-circle'></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
// Verificar se foi solicitado para ver os detalhes da turma
if(isset($_GET['funcao']) && $_GET['funcao'] == 'detalhes' && isset($_GET['id'])){
    $id_turma = $_GET['id'];
    $query = $pdo->query("SELECT * FROM turmas WHERE id = '$id_turma'");
    $res = $query->fetch(PDO::FETCH_ASSOC);
    if($res){
        // Exibir detalhes da turma
        echo "<div class='alert alert-info' role='alert'>";
        echo "<h4 class='alert-heading'>Detalhes da Turma</h4>";
        echo "<p><strong>Disciplina:</strong> {$res['disciplina']}</p>";
        echo "<p><strong>Sala:</strong> {$res['sala']}</p>";
        echo "<p><strong>Professor:</strong> {$res['professor']}</p>";
        echo "<p><strong>Horário:</strong> {$res['horario']}</p>";
        echo "<p><strong>Dias:</strong> {$res['dia']}</p>";
        echo "</div>";
    } else {
        // Se a turma não existir
        echo "<div class='alert alert-danger' role='alert'>";
        echo "<h4 class='alert-heading'>Erro!</h4>";
        echo "<p>A turma solicitada não foi encontrada.</p>";
        echo "</div>";
    }
}
?>
