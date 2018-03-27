<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Loyal Cafe</title>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/one-page-wonder.min.css" rel="stylesheet">

</head>
<body>
<?php
    // check if there is a session 
  if (!isset($_SESSION)) 
  { session_start(); }

    // initialize db
    $db = new PDO("mysql:host=localhost;dbname=loyalcafe","root","");

    // perform query for points
    $sql = "select Points from points\n"
    . "inner join users on points.User_ID = users.User_ID\n"
    . "where points.User_ID = '".$_SESSION["userid"]."';";
    $result = $db -> query($sql);
    $points = $result->fetch(PDO::FETCH_ASSOC);

    // perform query for menu
    $sql2 = "select * from menu";
    $result2 = $db -> query($sql2);

  ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Loyal Cafe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="home.php">Welcome, <?php echo $_SESSION["firstName"];?>!</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="balance.php">Check Points</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white">
    <p> Your current balance is:  <?php 
    echo $points['Points'];
    ?></p>
    </header>

    <section>
    <form action="claim.php" method="POST">
 
        <h1> Confirm selection? </h1>
        <input type="hidden" name="menu" value="<?php 
        echo $_POST["menu"];?>">
      <?php
        echo "<h1>".$_POST["menu"]."</h1>";?>
       <input type="hidden" name="qty" value="<?php echo $_POST["qty"];?>"> 
     <?php
        echo "<h1>".$_POST["qty"]."</h1>";?>
         <button type="submit" class="btn btn-primary">Claim</button>
         <button type="button" class="btn btn-primary" onClick="cancel()">Cancel</button>
    </section>
         
    </form>
    </body>
        <script type="text/javascript"> 
        function cancel(){
            window.location = "balance.php";
        }
        </script>
</html>