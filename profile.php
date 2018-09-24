
<!DOCTYPE HTML>
<html>
	<head>
		<title>MusicNator.net</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="images/icon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="profile.css" />

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
          <li><a href="wall.php">Wall</a></li>
          <li><a href="logout.php">logout</a></li>
				</ul>
			</nav>

        </body>
</html>




        <!-- CONTENT -->

    <div class="content">
			<div class="profile_picture">

				<!-- dobim ime profilne slike iz baze (default.php) -->
				<?php
				$stmt = $pdo->prepare("SELECT profile_picture FROM uporabniki WHERE name=?");
				$stmt->execute([$username]);
				$profile_picture = $stmt->fetchColumn();
				?>

				<div class="box_profile_picture">
				<p>profile picture:</p>
				<img draggable="false" style="width:200px;height:200px;" src="images/profile_picture/<?php echo $profile_picture;?>" alt="profile_picture">
				<button type="button" name="profile_picture_button">Chose new profile picture</button>
				</div>
				<div class="box_profile_info">
				<p>profile info:</p>
				<b>Username:</b> <?php echo $username; ?>
				<textarea name="name" rows="8" cols="80"></textarea>
				<button type="button" name="update_desc_button">Update profile description</button>
			</div>

			<div class="projects">
				<h3>Projects:	</h3>
				<button type="button" name="button">Add project</button>
			</div>


			</div>
    </div>


<?php
include 'footer.php';
 ?>
