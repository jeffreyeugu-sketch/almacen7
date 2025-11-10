<?php
  session_start();
  $id1 = session_id();
  session_regenerate_id(true);
  $id2 = session_id();
  session_destroy();  
  echo "OK"
?>  