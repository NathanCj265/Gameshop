<?php
session_start();
session_destroy();
header("Location: /Gameshop/src/controller/indexcontroller.php");
exit;