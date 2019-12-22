<?php

require '../common/service.php';

$service = new NoteService();

$result = !$_REQUEST['id']
  ? $service->save($_REQUEST)
  : $service->update($_REQUEST);

header('Location: /');
