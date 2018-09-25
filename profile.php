
<!DOCTYPE HTML>
<html>
	<head>
		<title>MusicNator</title>
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

				<!-- izbira slike -->
				<form class="izbira_profilne_slike" action="#" method="post" enctype="multipart/form-data">
					<input style="width:80%; " type="file" name="file">
					<input type="submit" name="submit" value="submit">
				</form>

				<!-- ce smo kliknili submit_profilka -->
				<?php
					if (isset($_POST['submit'])) {
						move_uploaded_file($_FILES['file']['tmp_name'],"images/profile_picture/".$_FILES['file']['name']);
						$sql = "UPDATE uporabniki SET profile_picture = ? WHERE name = ?";
						$pdo->prepare($sql)->execute([$_FILES['file']['name'], $username]);
						header("Refresh:0");
					}

				?>

				</div>
				<div class="box_profile_info">
				<p>profile info:</p>
				<b>Username:</b> <?php echo $username; ?>
				<!-- dobim user type iz baze -->
				<?php
				$stmt = $pdo->prepare("SELECT type FROM uporabniki WHERE name=?");
				$stmt->execute([$username]);
				$db_type = $stmt->fetchColumn();
				?>

				<b>Activitie:</b> <?php echo $db_type; ?>

				<form class="description" action="#" method="post">
					<textarea name="description" rows="4" cols="80" placeholder="Enter your description- skills, advantages, weaknesses .."></textarea>
					<input type="submit" name="submit_desc" value="Update profile description">
				</form>

				<?php
				if (isset($_POST['submit_desc'])) {
				$description = $_POST['description'];

				//da v bazo
				$sql = "UPDATE uporabniki SET description = ? WHERE name = ?";
				$pdo->prepare($sql)->execute([$description, $username]);
				}

				//izpiše iz baze user description
				$stmt = $pdo->prepare("SELECT description FROM uporabniki WHERE name=?");
				$stmt->execute([$username]);
				$db_description = $stmt->fetchColumn();

				echo $db_description;


				 ?>

			</div>

			<div class="projects">
				<h3>Projects:	</h3>
				<form class="projects" action="#" method="post">
					project name:
					<input style="margin-bottom:20px;" placeholder="Enter name" type="text" name="name">
					Project description:
					<textarea style="margin-bottom:20px;" placeholder="Enter description" name="description" rows="8" cols="80"></textarea>
					<input type="submit" name="submit_project" value="Add Project">
				</form>
			</div>

			<?php

				if (isset($_POST['name'])) {
					$project_name = $_POST['name'];
					$project_desc = $_POST['description'];
					$project_owner = $_SESSION['username'];
				}

				if (isset($_POST['submit_project'])) {
					$stmt = $pdo->prepare("insert into projekti(ime, opis, owner) values(?,?,?)");
					$stmt->execute([$project_name, $project_desc, $username]);
					header("Refresh:0; url=profile.php");
				}
			 ?>


			</div>
    </div>


<?php
include 'footer.php';
 ?>
