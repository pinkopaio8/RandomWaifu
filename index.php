<?php
  	try {
    $hostname = "localhost";
    $dbname = "my_randomwaifu";
    $user = "randomwaifu";
    $pass = "";

    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
	}
	catch (PDOException $e) {
    	echo "Errore: " . $e->getMessage();
    	die();
	}

  $stmt = $db->prepare("SELECT COUNT(*) FROM Waifu;");
  $stmt->execute();
  $user = $stmt->fetch();
  $waifu = $user[0];
  $num = rand(1, $waifu);

?>
<html>
<head>
<title>Random Waifu</title>
<link rel="icon" href="/images/0021.png">
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body style="background-color:black;">

  <?php

  $stmt = $db->prepare("SELECT NameWaifu, Location, Anime FROM Waifu WHERE IdWaifu=:num;");
  $stmt->execute(['num' => $num]);
  $loc = $stmt->fetch();

  echo '<center><p style="color:white; font-size:200%;" align="center">'. $loc[0] .' from ' . $loc[2] . '</p><br>
  <div class="imgbox" align="middle">
    <img class="center-fit" src="images/'. $loc[1] .'.png">

  </div></center>'
  ?>

<div style="margin-top:380px; background-color:black;" align="left">
<p style="color:white; font-size:80%;">Website made by: <a href="https://t.me/hakase22">Hakase22</a> If you see any "Unknown" title, contact me to tell me the name of the character/anime. Thank you for your support!</p>
</div>

</body>
</html>
