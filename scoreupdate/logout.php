<?php
session_start();
if($_SESSION['admin_email'])
{
  unset($_SESSION['admin_email']);
  session_destroy();
  ?>
  <script type="text/javascript"> window.location.href="index.php";</script>
  <?php
}
else
{
	?>
    <script type="text/javascript"> window.location.href="index.php";</script>
    <?php
}
?>