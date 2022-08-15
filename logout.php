<?php

  setcookie('uid',' ',time()+(3600*24));
  setcookie('login',0,time()+(3600*24));
        echo "<meta http-equiv='refresh' content='0; url=login.php'>";


?>
