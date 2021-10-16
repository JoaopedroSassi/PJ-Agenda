<?php
   include_once('templates/header.php')
?>
   <div class="container">
      <?php if (isset($print_msg) && $print_msg != ''): ?>
         <p id="msg"><?= $print_msg ?></p>
      <?php else: ?>
         <?php if (isset($print_msg_del) && $print_msg_del != ''): ?>
            <p id="msg-del"><?= $print_msg_del ?></p>
         <?php endif; ?>
      <?php endif; ?>

      <h1 id="main-title">Minha Agenda</h1>
      <?php if(count($contacts) > 0): ?>
         <table class="table" id="contacts-table">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Telefone</th>
                  <th scope="col"></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach($contacts as $contact): ?>
                  <tr>
                     <td scope="row" class="col-id"><?= $contact['id'] ?></td>
                     <td scope="row"><?= $contact['name'] ?></td>
                     <td scope="row"><?= $contact['phone'] ?></td>
                     <td class="actions">
                        <a href="<?= $BASE_URL ?>show.php?id=<?= $contact['id'] ?>"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="<?= $BASE_URL ?>edit.php?id=<?= $contact['id'] ?>"><i class="bi bi-pencil"></i></a>
                        <form class="delete-form" action="<?= $BASE_URL ?>/config/process.php" method="POST">
                           <input type="hidden" name="type" value="Delete">
                           <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                           <button type="submit" class="delete-btn"><i class="bi bi-person-dash-fill"></i></button>
                        </form>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>

      <?php else: ?>

         <p id="empty-list-text">Ainda não há contatos em sua agenda, <a href="<?= $BASE_URL ?>create.php">clique aqui para adicionar</a>.</p>
      <?php endif; ?>
   </div>
<?php
   include_once('templates/footer.php')
?>