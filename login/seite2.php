<?php
	session_start();
	if(isset($_SESSION["username"])) {
?>

<html>
</head>
	<title>Mein Bereich</title>
</head>

<body>
	
	<h1>Hallo <?php echo $_SESSION["username"]; ?></h1>
	<a href="logout.php">Ausloggen</a>

</body>
</html>

	<?php
		} 
	
		else 
		{
	?>

		Bitte erst einloggen, <a href="index.php">hier</a>.
	<?php
		}
	?>