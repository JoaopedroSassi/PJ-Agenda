<?php
   include_once('templates/header.php')
?>
   <div class="container">
      <?php if (isset($print_msg) && $print_msg != ''): ?>
         <p id="msg"><?= $print_msg ?></p>
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
                     <td scope="row"><?= $contact['id'] ?></td>
                     <td scope="row"><?= $contact['name'] ?></td>
                     <td scope="row"><?= $contact['phone'] ?></td>
                     <td class="actions">
                        <a href="#"><i class="bi bi-arrows-angle-expand"></i></a>
                        <a href="#"><i class="bi bi-pencil"></i></a>
                        <button type="submit"><i class="bi bi-person-dash-fill"></i></button>
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