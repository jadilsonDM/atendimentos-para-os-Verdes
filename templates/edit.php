<?php
  include_once("../templates/header.php");

?>

    <div class="container"></div>
    <h1 id="main-title">Editar solicitação</h1>
    <form class="create-form" action="../config/process.php" method="POST">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $solicitacoes['id']?>">
        <div class="form-group">
            <label for="titulo">Titulo da solicitação:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="digite o titulo" value="<?= $solicitacoes['titulo']?>" required>
        </div>
        <div class="form-group">
            <label for="titulo"> descricao:</label>
            <textarea type="text" class="form-control" name="descrcao" id="descrcao" placeholder="digite a descrição" required rows="5"><?= $solicitacoes['descrcao']?></textarea>
        </div>
        <div class="form-group">
            <label for="titulo">status:</label>
            <input type="text" class="form-control" name="statos" id="statos" placeholder="qual o status" value="<?= $solicitacoes['statos']?>" required>
        </div>
        <div class="form-group">
            <label for="titulo">Data:</label>
            <input type="date" class="form-control" name="dataSl" id="dataSl" value="<?= $solicitacoes['dataSl']?>" required>
        </div>
        <div class="form-group">
            <label for="titulo">solicitante:</label>
            <input type="text" class="form-control" name="solicitante" id="solicitante" placeholder="digite o nome do solicitante" value="<?= $solicitacoes['solicitante']?>" required>
        </div>
        
        <button type="submit" class="btn btn-success" >Atualizar</button>
        <a id="voltar" href="../templates/index.php" id="back-link">Voltar</a>
    </form>
    
    <?php
       include_once("../templates/footer.php");

?>