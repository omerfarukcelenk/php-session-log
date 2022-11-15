<?php
include __DIR__ . '/user.php';


$user = new User();
$user->giris($_POST);

echo $_SESSION["mesaj"];
?>



<a href="logout.php">Log out</a>


