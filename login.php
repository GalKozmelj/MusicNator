<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MusicNator</title>
  </head>
  <body>
    <?php include 'header.php'; ?>


      <img draggable="false" style="width:100%;" src="images/wp5.jpg" alt="pic20">


      <div class="main_box">
      <h1 style="font-size:40px;">Login</h1>
      <form class="" action="index.html" method="post">
      <p>Email:<input type="text" name="" placeholder="Email"></p>
      <p>Password<input type="text" name="" placeholder="Password"></p>
      <p style="color:gray;">*We will never ask you for your password!</p>
      <input type="submit" name="submit_btn" value="Connect!">
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



    </div>

    <?php include 'footer.php'; ?>
    </div>
  </body>
</html>
