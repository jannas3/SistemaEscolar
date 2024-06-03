<?php 
$pag = "frequencia";
require_once("../conexao.php"); 

@session_start();
// Verificar se o usuário está autenticado
if(@$_SESSION['id_usuario'] == null || @$_SESSION['nivel_usuario'] != 'professor'){
    echo "<script language='javascript'> window.location='../index.php' </script>";
}

?>

<!-- Início do HTML -->
<div class="row mt-4 mb-4">
    <!-- Botão para adicionar nova frequência -->
    <a href="index.php?pag=<?php echo $pag ?>&funcao=novo" class="button-link">
        <button type="button" class="btn btn-primary m-1" style="padding: 0.2rem 0.5rem;">
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Lançar Frequência</font>
            </font>
        </button>
    </a>
</div>

<!-- Tabela de Frequências -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Disciplina</th>
                        <th>Data</th>
                        <th>Presença</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aqui você irá preencher com os dados das frequências -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal para lançar frequência -->
<div class="modal fade" id="modalFrequencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lançar Frequência</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formFrequencia" method="POST">
                <div class="modal-body">
                    <!-- Aqui você irá adicionar os campos para o lançamento da frequência -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" name="btn-lancar-frequencia" class="btn btn-primary">Lançar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts para interação com o banco de dados e manipulação do DOM -->
<script>
    // Seção para scripts JavaScript e jQuery para interação com o banco de dados e manipulação do DOM
</script>

