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
  <div class="fixed-action-btn">
    <button class="btn-floating btn-large primary modal-trigger" data-target="modal1">
      <i class="large material-icons">add</i>
    </button>
  </div>

  <div class="row">
    <?php foreach ($service->getAll() as $row) : ?>
      <div class="col s12 m4">
        <div class="card z-depth-1 modal-trigger <?= $row['color'] ?>" data-target="modal1">
          <div class="card-content <?= $row['color'] == '' ? '' : 'white-text' ?>">
            <span class="card-title"><?= $row['title'] ?></span>
            <p><?= $row['note'] ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

  <script src=" https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script src="./static/js/app.js"></script>
</body>

</html>
