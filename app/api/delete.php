<?php

require '../common/service.php';

$service = new NoteService();

echo json_encode([
  'message' => $service->remove($_REQUEST['id'])
]);
