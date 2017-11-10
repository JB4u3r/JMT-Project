<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>JMT VEHICLE LICENSE</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar-fixed-top1.css" rel="stylesheet">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="margin-top:-15px" ><img src="images/jmt_logo.png" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
           
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="registration.php">Register <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "license";
            
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $id= $_POST["id"];
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $book = $_POST["book"];
            $plate = $_POST["plate"];
            $month = $_POST["month"];
            $address = $_POST["address"];
            
            $sql = "INSERT INTO details (name, surname, book, plate, month, address)
            VALUES ('$name', '$surname', '$book', '$plate', '$month', '$address')";
            ?>
   
             <?php if (mysqli_query($conn, $sql)) { ;?>
                <div class="alert alert-danger" role="alert"> <h5><?php echo "Registration was successful <br><br>"; ?></h5> </div>
            <?php } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            } ?>

            <h4>Name:</h4> <?php echo $_POST["name"]; ?><br>
            <h4>Surname:</h4> <?php echo $_POST["surname"]; ?><br>
            <h4>Book Number:</h4> <?php echo $_POST["book"]; ?><br>
            <h4>Reg Number:</h4> <?php echo $_POST["plate"]; ?><br>
            <h4>Months:</h4> <?php echo $_POST["month"]; ?><br>
            <h4>Address:</h4> <?php echo $_POST["address"]; ?><br> 

            
            <a href="verify.php?id=<? echo mysqli_insert_id($conn); ?>" class="btn btn-success" role="button">Edit Record</a>
            <a href="payment.php?id=<? echo mysqli_insert_id($conn); ?>" class="btn btn-danger" role="button">Proceed To Payment</a>

           <?php
            
            mysqli_close($conn);
        ?>
           
                
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
