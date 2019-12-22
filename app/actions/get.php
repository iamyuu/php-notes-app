<?php

require '../common/service.php';

$service = new NoteService();

echo json_encode([
  'data' => $service->get($_REQUEST['id'])
]);
