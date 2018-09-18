<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MusicNator</title>
  </head>
  <body>
    <?php include 'header.php'; ?>


      <img draggable="false" style="width:100%;" src="images/pic20.jpg" alt="pic20">


      <div class="main_box">
      <h1 style="font-size:40px;">Register</h1>
      <form class="" action="#" method="post">
      <p>Username:<input type="text" name="username" placeholder="Name"></p>
      <p>Email:<input type="text" name="email" placeholder="Email"></p>
      <p>Password:<input type="text" name="password" placeholder="Password"></p>
      <p>Confirm Password:<input type="text" name="confirm_password" placeholder="Confirm Password"></p>
      Studio<input type="radio" name="studio" value="">musician <input type="radio" name="musician" value="">
      </form>


      <?php
      if(isset($_POST['username'])){
      $username = $_POST['username'];
      $query_insert = "insert into users(username) values('$username')";
      }


       ?>

      <!-- style za main box -->
      <style media="screen">

        .main_box{
          position: absolute;
          top: 25%;
          left: 23%;
          width: 50%;
          height: 80%;
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
