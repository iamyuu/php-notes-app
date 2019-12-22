<?php

require '../common/service.php';

$service = new NoteService();

$result = !$_REQUEST['id']
  ? $service->save($_REQUEST)
  : $service->update($_REQUEST);

echo json_encode(['message' => $result]);

header('Location: /');
