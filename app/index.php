<?php
require './common/service.php';

$service = new NoteService();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Notes app</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="./static/css/style.css">
</head>

<body>
  <div class="row">
    <?php foreach ($service->all() as $row) : ?>
      <?php $isHaveColor = $row['color'] != '' ? 'white-text' : ''; ?>

      <div class="col s12 m4">
        <div class="card <?= $row['color'] ?>">
          <div class="card-content click-able <?= $isHaveColor ?>" onclick="show(<?= $row['id'] ?>)">
            <div class="card-title"><?= $row['title'] ?? '' ?></div>
            <p><?= $row['note'] ?></p>
          </div>
          <div class="card-action">
            <div class="click-able" onclick="remove(<?= $row['id'] ?>, '<?= $row['title'] ?>')">
              <i class="material-icons <?= $isHaveColor ?>">delete</i>
            </div>

            <form class="delete-form" action="actions/delete.php">
              <input type="hidden" name="id" class="form-delete-id">
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="fixed-action-btn" onclick="add()">
    <button class="btn-floating btn-large primary">
      <i class="large material-icons">add</i>
    </button>
  </div>

  <div class="modal">
    <form action="actions/store-or-update.php">
      <div class="modal-content">
        <input id="id" name="id" type="hidden">
        <div class="row">
          <div class="input-field col s10">
            <!-- <label for="title">Title</label> -->
            <input id="title" name="title" type="text" placeholder="Title" required>
          </div>
          <div class="input-field col s2">
            <select name="color" id="color">
              <option value="">White</option>
              <option value="red darken-1">Red</option>
              <option value="orange darken-1">Orange</option>
              <option value="yellow darken-1">Yellow</option>
              <option value="green darken-1">Green</option>
              <option value="teal darken-1">Teal</option>
              <option value="light-blue darken-1">Light Blue</option>
              <option value="blue darken-1">Blue</option>
              <option value="amber darken-1">Amber</option>
            </select>
            <!-- <label>Color</label> -->
          </div>
        </div>
        <div class="input-field col s12">
          <!-- <label for="note">Note</label> -->
          <textarea id="note" name="note" class="materialize-textarea" placeholder="Note" rows="4" cols="50" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="waves-effect waves-light btn-flat modal-close">Cancel</button>
        <button type="submit" class="waves-effect btn primary">Save</button>
      </div>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="./static/js/app.js"></script>
</body>

</html>
