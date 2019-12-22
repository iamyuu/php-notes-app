<?php

require '../common/service.php';

$service = new NoteService();
$service->remove($_REQUEST['id']);

header('Location: /');
