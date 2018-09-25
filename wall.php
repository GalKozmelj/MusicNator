
<!-- HEADER -->

<!DOCTYPE HTML>
<html>
	<head>
		<title>MusicNator</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="images/icon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="wall.css" />

		<?php
		include 'php/database.php';
		session_start();
		$username = $_SESSION['username'];
		 ?>


	</head>
	<body>

			<header id="header">
				<h1><a href="index.php">MusicNator</a></h1>
				<a href="#menu">Menu</a>
			</header>

			<nav id="menu">
				<ul class="links">
					<li><a href="profile.php">Profile</a></li>
          <li><a href="wall.php">Wall </a></li>
          <li><a href="logout.php">logout</a></li>
				</ul>
			</nav>

        </body>
</html>




        <!-- CONTENT -->

    <div class="content">


      <div class="projects">
        <h3>All Projects:</h3>
				<?php
				$stmt = $pdo->query('SELECT * FROM projekti');
				foreach ($stmt as $row)
				{
						echo "- ";
						echo "<b>Project name: </b>";
				    echo $row['ime'] . "\n";
						echo "<b>Project description: </b>";
						echo $row['opis'] . "\n";
						echo "<b>Project user: </b>";
						echo $row['owner'] . "\n";
						echo "</br>";
				}
				?>

				<br>
				<h3>Find projects:</h3>
				<form class="search" action="#" method="post">
					<input style="width:40%; margin-left:30%" type="text" name="find_text" placeholder="find projects">
					<input style="width:40%" type="submit" name="submit_find">
				</form>


				<?php
					if (isset($_POST['submit_find'])) {
						$find_text = $_POST['find_text'];
					}

					 //selecta iz baze vse uporabnike ali projekte ki imajo v imenu $find_text

					 // Prepare statement
					 $search = $pdo->prepare("SELECT ime, opis FROM projekti WHERE ime LIKE ?");
					 // Execute with wildcards
					 $search->execute(array("%$find_text%"));
					 // Echo results
					 foreach($search as $s) {

						echo "-";
						echo "<b>Project name: </b>";
						echo $s['ime'] . " ";
						echo "<b>Project description: </b>";
						echo $s['opis'];
						echo "<br>";


					?>

      </div>
    </div>


<?php
include 'footer.php';
 ?>
