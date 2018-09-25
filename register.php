<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MusicNator</title>
    <link rel="icon" href="images/icon.png" type="image/x-icon"/>

  </head>
  <body>
    <?php
          include 'header.php';
          include 'php/database.php';
      ?>


      <img draggable="false" style="width:100%;" src="images/wp.jpg" alt="wp">


      <div class="main_box">
      <h1 style="font-size:40px;">Register</h1>

      <form class="" action="#" method="post">
      <p>Username:<input type="text" name="username" placeholder="Name" required></p>
      <p>Email:<input type="email" name="email" placeholder="email" required></p>
      <p>Password:<input type="password" name="password" placeholder="Password" required></p>
      <p>Confirm Password:<input type="password" name="confirm_password" placeholder="Confirm Password" required></p>
      Studio<input type="radio" name="type" value="studio">
      Musician <input type="radio" name="type" value="musician">
      Band/Group <input type="radio" name="type" value="band">
      <p><input type="submit" name="" value="Join us!"></p>
      </form>



      <?php
      if(isset($_POST['username'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password2 = $_POST['confirm_password'];
      $email = $_POST['email'];
      $salted_password = sha1($password . $salt);
      $type = $_POST['type'];


      // $query_insert = "insert into users(username) values('$username')";
      if ($password == $password2) {
        $stmt = $pdo->prepare("insert into uporabniki(name, password, email, type) values(?,?,?,?)");
        $stmt->execute([$username, $salted_password, $email, $type]);
        header("Refresh:0; url=login.php");
        }
      ?>
      <p style="color:red">Password do not match! Try again!</p>
      <?php
      }

       ?>

      <!-- style za main box -->
      <style media="screen">

        .main_box{
          position: absolute;
          top: 20%;
          left: 23%;
          width: 50%;
          height: 75%;
          background-color: #000;
          padding: 20px;
          opacity: 0.7;

        }
        .main_box p{
          color: white;
        }
        .main_box input[type = "text"]{
          width: 100%;
        }
        .main_box input[type = "radio"]{
          margin-right: 50px;
          position: relative;
        }
        .main_box h1{
          text-align: center;
        }

      </style>



    </div>

    <?php include 'footer.php'; ?>
    </div>
  </body>
</html>
