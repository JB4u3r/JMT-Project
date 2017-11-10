
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
            $id=$_GET['id'];
            
            $sql = "SELECT * FROM details WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            ?>
            
             <?php if (mysqli_num_rows($result) > 0) { 
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { ?>

        <form action="" method="post">
                    <div class="form-group">
                    <label for="exampleInputPassword1">ID</label>
                    <input type="text" name="id" class="form-control"  value="<?php echo $row['id'];?>" readonly>
                      <label for="exampleInputEmail1">First Name</label>
                      <input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Last Name</label>
                      <input type="text" name="surname" class="form-control" value="<?php echo $row['surname'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Vehicle Book No</label>
                        <input type="text" name="book"  class="form-control" value="<?php echo $row['book'];?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Vehicle Reg No.</label>
                        <input type="text" name="plate" class="form-control" value="<?php echo $row['plate'];?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Payment Duration</label>
                        <input type="text" name="month" class="form-control" value="<?php echo $row['month'];?>">
                      </div>
                      <div class="form-group">
                        <label for="comment">Address:</label>
                        <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>">
                      </div>
                    
                    <button type="submit" name="update" class="btn btn-primary">Update Details</button>
                    <a href="payment.php?id=<? echo $row['id']; ?>" class="btn btn-danger" role="button">Proceed To Payment</a>
                    
                  </form>
        
    <?php }
} else {
    echo "0 results";
};?>
               <?php 
               $id= $_POST["id"];
               $name = $_POST["name"];
               $surname = $_POST["surname"];
               $book = $_POST["book"];
               $plate = $_POST["plate"];
               $month = $_POST["month"];
               $address = $_POST["address"];
               if (isset($_POST["update"])){
                   $sql = "UPDATE details SET name='$name', surname='$surname', book='$book', plate='$plate', month='$month', address='$address' WHERE id='$id'";
                   if (mysqli_query($conn, $sql)) { 
                       echo "Update was successful <br><br>";
                   } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                   } 
                   }
               
               ?>
           
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
