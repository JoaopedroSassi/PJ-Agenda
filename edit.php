<?php
   include_once('templates/header.php')
?>
   <div class="container">
      <?php include_once('templates/back_btn.php') ?>
      <h1 id="main-title">Editar contato</h1>
      <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
         <input type="hidden" name="type" value="Edit">
         <input type="hidden" name="id" value="<?= $contact['id'] ?>">
         <div class="form-group">
            <label for="name">Nome do contato:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome" value="<?= $contact['name'] ?>" required>
         </div>
         <div class="form-group">
            <label for="phone">Telefone do contato:</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Digite o telefone" value="<?= $contact['phone'] ?>" required>
         </div>
         <div class="form-group">
            <label for="observations">Observações:</label>
            <textarea type="text" class="form-control" name="observations" id="observations" placeholder="Insira as observações" rows="3"><?= $contact['observations'] ?></textarea>
         </div>
         <button type="submit" id="btn-create" class="btn btn-primary">Atualizar</button>
      </form>
   </div>
<?php
   include_once('templates/footer.php')
?>