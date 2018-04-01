<?php

require_once('../session.php');
require_once('../user.php');

$user = new User();
$user->logout();
$session->gc();


header('location: ../index.php');
exit;

?>