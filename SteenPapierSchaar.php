<!DOCTYPE html>
<html lang="nl">
<head>
	<!--Kevin Esser-->
	<meta charset=utf-8>
	<meta name=description content="beschrijving van de webpagina">
	<meta name=keywords content="trefwoorden, gescheiden, door, komma's">
	<meta name="author" content="Kevin Esser">
	<link href="https://fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
	<title>Rock_Paper_Scissors</title>
</head>
<style>
	body{
		background-image: url("https://i.ytimg.com/vi/3q3V_-OAsFQ/maxresdefault.jpg");
		background-size: cover;
		color: white;
	}
	h1{
		font-size: 100px;
		text-align: center;
		font-family: 'Lobster', cursive;
	}
	
	.SteenPapierSchaar{
		margin: 100px 0px 0px 535px;
	}
</style>
<body>
	<h1>Rock - Paper - Scissors</h1>
	
	<form class="SteenPapierSchaar" name="Steen-Papier-Schaar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input class="StoneClicker" type="image" name="SPS" value="Stone" src="http://www.clipartkid.com/images/306/you-need-to-scale-it-down-to-a-reasonable-amount-qWKhLG-clipart.png" style="width:125px; height:125px">  
		<input class="PaperClicker" type="image" name="SPS" value="Paper" src="http://www.clker.com/cliparts/5/6/2/0/1194984467464538364carta_architetto_frances_01.svg.med.png" style="width:125px; height:125px">
		<input class="ScissorsClicker" type="image" name="SPS" value="Scissors" src="http://www.clker.com/cliparts/d/b/d/6/11949839942140777322scissors.svg.hi.png" style="width:125px; height:125px">
	</form>
	
	<?php	
		error_reporting(error_reporting() & ~E_NOTICE );
		session_start();
			//Random Keuze van de "tegenstander"
		$keuzetegenstanders = rand(1,9999);
		//echo "<p id='Keuzetegenstandernummer'>" . $keuzetegenstanders . "</p>";
		
		if($keuzetegenstanders >= 1 && $keuzetegenstanders <= 3332)
		{
			$keuzetegenstanders = "Stone";
			echo "</br></br>Your opponent chooses: <strong>" . $keuzetegenstanders . "</strong>";
		}
		elseif($keuzetegenstanders >= 3333 && $keuzetegenstanders <= 6665)
		{
			$keuzetegenstanders = "Paper";
			echo "</br></br>Your opponent chooses: <strong>" . $keuzetegenstanders . "</strong>";
		}
		elseif($keuzetegenstanders >= 6666 && $keuzetegenstanders <= 9999)
		{
			$keuzetegenstanders = "Scissors";
			echo "</br></br>Your opponent chooses: <strong>" . $keuzetegenstanders . "</strong>";
		}
		
			//Winners, Losers and Tie!!
			//Winners;
		if($_POST['SPS'] == "Stone" && $keuzetegenstanders == "Scissors")
		{
			$_SESSION["Win"]++;
			echo "</br></br>You win!";
		}
		elseif($_POST['SPS'] == "Scissors" && $keuzetegenstanders == "Paper")
		{
			$_SESSION["Win"]++;
			echo "</br></br>You win!";
		}
		elseif($_POST['SPS'] == "Paper" && $keuzetegenstanders == "Stone")
		{
			$_SESSION["Win"]++;
			echo "</br></br>You win!";
		}
			//Losers;
		elseif($_POST['SPS'] == "Scissors" && $keuzetegenstanders == "Stone")
		{
			$_SESSION["Lose"]++;
			echo "</br></br><strong>Loser!!</strong>";
		}
		elseif($_POST['SPS'] == "Paper" && $keuzetegenstanders == "Scissors")
		{
			$_SESSION["Lose"]++;
			echo "</br></br><strong>Loser!!</strong>";
		}
		elseif($_POST['SPS'] == "Stone" && $keuzetegenstanders == "Paper")
		{
			$_SESSION["Lose"]++;
			echo "</br></br><strong>Loser!!</strong>";
		}
			//Tie;
		elseif($_POST['SPS'] == "Stone" && $keuzetegenstanders == "Stone")
		{
			$_SESSION["Tie"]++;
			echo "</br></br>Tie!";
		}
		elseif($_POST['SPS'] == "Paper" && $keuzetegenstanders == "Paper")
		{
			$_SESSION["Tie"]++;
			echo "</br></br>Tie!";
		}
		elseif($_POST['SPS'] == "Scissors" && $keuzetegenstanders == "Scissors")
		{
			$_SESSION["Tie"]++;
			echo "</br></br>Tie!";
		}

			//Wins
		echo "</br>Wins: " . $_SESSION["Win"];
			//Loses
		echo "</br>Loses: " . $_SESSION["Lose"];
			//Ties
		echo "</br>Ties: " . $_SESSION["Tie"];
	?>
	
	<form name="Steen-Papier-Schaar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="checkbox" name="Refresh1" value="bevesteging">Refresh Game
		<input type="image" src="http://www.free-icons-download.net/images/blue-refresh-button-icon-65919.png" value="Reset" style="width:70px; height:70px">
	</form>
	<?php
		error_reporting(error_reporting() & ~E_NOTICE );
		if($_POST["Refresh1"] == "bevesteging")
		{
			session_unset(); 
			echo "Sure? </br> Click again!";
		}
	?>
</body>
</html>