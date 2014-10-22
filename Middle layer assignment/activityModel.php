<?php

require('activityModelCore.php');

class activityModel extends activityModelCore {

  function processEventRequest ($data) {
    //Do something here
    return $this->saveUserEvent($data);
  }

}

?>
