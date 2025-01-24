<?php
session_start();
session_unset();
session_destroy();
header('Location: ../docs/index.php');
exit();
?>
