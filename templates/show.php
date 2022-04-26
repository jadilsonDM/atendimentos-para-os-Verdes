<?php
  include_once("../templates/header.php");

?>

<div class="container" id="view-solicitacoes-coteiner">
    <h1 id="main-title"><?= $solicitacoes["solicitante"]?></h1>
    <h4>Titulo:</h4>
    <p><?= $solicitacoes["titulo"]?></p>
    <h4>Data da solicitada:</h4>
    <p><?= $solicitacoes["dataSl"]?></p>
    <h4>Descrição:</h4>
    <p><?= $solicitacoes["descrcao"]?></p>
    <h4>Status:</h4>
    <p><?= $solicitacoes["statos"]?></p>

    <br>
    <br>
    <a id="voltar" href="../templates/index.php" id="back-link">Voltar</a>
</div>





<?php
       include_once("../templates/footer.php");

?>