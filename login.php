<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MusicNator</title>
    <link rel="icon" href="images/icon.png" type="image/x-icon"/>

  </head>
  <body>
    <?php
     session_start();
     include 'header.php';
     include 'php/database.php';
    ?>


      <img draggable="false" style="width:100%;" src="images/wp5.jpg" alt="wp5  ">


      <div class="main_box">
      <h1 style="font-size:40px;">Login</h1>
      <form class="" action="#" method="post">
      <p>Username:<input type="text" name="username" placeholder="Enter your name" required></p>
      <p>Password:<input type="password" name="password" placeholder="Enter your password" required></p>
      <p style="color:gray; margin-bottom:0px;">*We will <span style="color:red;">never</span> ask you for your password!</p>
      <p style="color:gray;" >Don't have account? <a href="register.php">Register</a></p>
      <input type="submit" name="login_btn" value="Connect!">
      </form>



      <!-- style za main box -->
      <style media="screen">

        .main_box{
          position: absolute;
          top: 23%;
          left: 23%;
          width: 50%;
          height: 60%;
          background-color: black;
          opacity: 0.7;
          padding: 20px;
        }

        .main_box p{
          color: white;
        }
        .main_box input{
          width: 100%;
        }
        .main_box h1{
          text-align: center;
        }

      </style>





      <?php

      if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //session veriables
        $session['username'] = $username;

      $stmt = $pdo->prepare("SELECT password FROM uporabniki WHERE name=?");
      $stmt->execute([$username]);
      $db_password = $stmt->fetchColumn();
      }

      if(isset($_POST['login_btn'])){
         if ($db_password == sha1($password . $salt)) {
         header("location: wall.php");
         }
         else {
           ?>
            <p style="color:red;">*Incorrect password!</p>
           <?php
         }
       }
       ?>




    </div>

    <?php include 'footer.php'; ?>
    </div>
  </body>
</html>
