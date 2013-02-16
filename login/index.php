<!--
    PHP-Sessionscript 1.0
    © Dennis Friebe 
    www.dennis-friebe.com

    Developed for ©groundworks
    www.groundworks.de
    
    01-16-2013

//-->
<?php
	$verhalten = 0;
	session_start();

	if(!isset($_SESSION["username"]) and !isset($_GET["page"])) 
	{
		$verhalten = 0;
	}

	if($_GET["page"] == "log") 
	{
		$user = $_POST["user"];
		$passwort = $_POST["passwort"];

		if($user == "d" and $passwort == "d") 
		{
			$_SESSION["username"] = $user;
			$verhalten = 1;
		} 
		
		else 
		{
			$verhalten = 2;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Geschützer Bereich</title>
	<?php
	if($verhalten == 1) {
	?>
		<meta http-equiv="refresh" content="1.5; URL=seite2.php"/>
	<?php
	}
	?>
</head>

<body>

	<?php 
		if($verhalten == 0) {
	?>

		Bitte logge dich ein:<br />
		<form method="post" action="index.php?page=log">
			User:<input type="text" name="user" /><br /> 
			Passwort:<input type="password" name="passwort" /><br />
			<input type="submit" value="Einloggen" />
		</form>
	<?php
		}
		
		if($verhalten == 1) 
		{
	?>

		Du hast dich richtig eingeloggt und wirst nun weitergeleitet....
	<?php
		} 

		if($verhalten == 2) {
	?>

		Du hast dich nicht richtig eingeloggt, <a href="index.php">zurück</a>.
	<?php
		}
	?>
	
	
	
	<?php
	if($verhalten == 1) {
	?>
		<progress id="bar" value="0" max="100">
		    <span id="fallback">
		    <!-- Your fallback goes here -->
		    </span>
		  </progress>
	<?php
	}
	?>
	
<!--Javascript for Progressbar -->
<!--source:http://www.onlywebpro.com/2011/09/09/html5-progress-bar/-->
	
	<script>
	window.onload = function() {
	             
	    var bar = document.getElementById("bar"), 
	    fallback = document.getElementById("fallback"), 
	    loaded = 0;
	     
	    var load = function() {
	        loaded += 1;
	        bar.value = loaded;
	         
	        /* The below will be visible if the progress tag is not supported */
	        $(fallback).empty().append("HTML5 progress tag not supported: " + loaded + "% loaded");
	         
	        if(loaded == 100) {
	            clearInterval(dummyLoad);
	        }
	    };
	     
	    var dummyLoad = setInterval(function() {
	        load();
	    } ,15);        
	}
	</script>

</body>
</html>