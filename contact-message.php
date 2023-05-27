<?php

if (!$_SESSION["mail_error"] && !$_SESSION["mail_success"]) :
?>
  <div class="notification">
    <p></p>
  </div>
<?php

elseif ($_SESSION["mail_success"]) :
?>
  <div class="notification success">
    <p><b> Response sent.</p>
  </div>
<?php
  unset($_SESSION["mail_success"]);

elseif ($_SESSION["mail_error"]) :
?>
  <div class="notification error">
    <p><b>Error.</b> Response not sent.</p>
  </div>
<?php
  unset($_SESSION["mail_error"]);
endif;

?>
