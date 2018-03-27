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


  </head>

<body>

<form action="signup.php" method="POST">
<div align="center" class="form-group">
    <label class="control-label col-md-3" for="email">Email address</label>
    <div class="col-md-5">
    <input type="email" class="form-control" id="email" name="email">
  </div>

  <div align="center" class="form-group">
    <label class="control-label col-md-3" for="fName">First Name: </label>
    <div class="col-md-5">
    <input type="name" class="form-control" id="fName" name="fName">
  </div>

  <div align="center" class="form-group">
    <label class="control-label col-md-3" for="lName">Last Name: </label>
    <div class="col-md-5">
    <input type="name" class="form-control" id="lName" name="lName">
  </div>

  <div align="center" class="form-group">
    <label class="control-label col-md-3" for="gender">Gender: </label>
    <div class="col-md-5">
    <select class="form-control" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
  </div>

  <div align="center" class="form-group">
    <label class="control-label col-md-3" for="birthday">Birthday: </label>
    <div class="col-md-5">
    <input type="date" class="form-control" id="birthday" name="birthday">
  </div>

  <div class="form-group">
    <label class="control-label col-md-3" for="password">Password</label>
    <div class="col-md-5">
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <div class="form-group">
    <label class="control-label col-md-3" for="rpassword">Re-enter Password</label>
    <div class="col-md-5">
    <input type="password" class="form-control" id="rpassword" name="password">
  </div>

  <div class="form-group">
    <div class="col-md-3">
  <button type="submit" class="btn btn-primary" >Submit</button>
  </div>
  </div>
</body>
</form>


</body>
</html>
