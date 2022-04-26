<?php
  include_once("../templates/header.php");

?>

   <div class="container">
  
       <?php if(isset($printMsg) && $printMsg != ''): ?>

        <p id="msg"><?= $printMsg?></p>
       <?php endif; ?>

       <h1 id="main-title">Todas as solicitações</h1>

       <?php if(count($solicitacoes) > 0): ?>
           <table class="table" id="solicitacoes-table">
               <thead>
                   <tr>
                   <th scope="col">id</th>
                       <th scope="col">Titulos</th>
                       <th scope="col">Descrição</th>
                       <th scope="col">Solicitantes</th>
                       <th scope="col">Statos</th>
                       <th scope="col">Ação</th>
                      
                   </tr>
               </thead>
               <tbody>
                   <?php foreach($solicitacoes as $solicitacoes): ?>
                    <tr>
                       <td scope="row"><?= $solicitacoes["id"]?></td>
                       <td scope="row"><?= $solicitacoes["titulo"]?></td>
                       <td scope="row"><?= $solicitacoes["descrcao"]?></td>
                       <td scope="row"><?= $solicitacoes["solicitante"]?></td>
                       <td scope="row"><?= $solicitacoes["statos"]?></td>
                       <td class="action">
                           <a href="../templates/show.php?id=<?= $solicitacoes["id"]?>"><i class="fas fa-eye check-icon"></i></a>
                           <a href="../templates/edit.php?id=<?= $solicitacoes["id"]?>"><i class="far fa-edit edit-icon"></i></a>
                          <form class="delete-form" action="../config/process.php" method="POST">
                              <input type="hidden" name="type" value="delete">
                              <input type="hidden" name="id" value="<?= $solicitacoes['id']?>">
                          <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                          </form>
                       </td>
                       
                    </tr>
                    <?php endforeach; ?>
               </tbody>
           </table>
       <?php else: ?>
         <p id="empty-list-text"> sem solicitações no momento, <a href="../templates/edicao.php"> para abrir uma nova clic aqui!</a>.</p>
       <?php endif; ?>
   </div>
    
<?php
       include_once("../templates/footer.php");

?>