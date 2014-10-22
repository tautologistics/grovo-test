<?php

require('activityModel.php');

$model = new activityModel();

//TODO: Validation and sanitizing

header('Content-type: application/json');

echo(json_encode(array(
  result => $model->processEventRequest($_POST)
)));

?>