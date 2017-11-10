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
                  <?php $month = $row['month']; ?>
                  <h4 style="text-align:center">TOTAL COST: $ <?php echo $month * 10 ?> </h4><br>
        <form action="" method="post" class="form-inline">
                   
        <div class="form-group">
        
        <input type="hidden" name="id" class="form-control"  value="<?php echo $row['id'];?>" readonly>
          
          <input type="hidden" name="name" class="form-control" value="<?php echo $row['name'];?>">
        </div>
        <div class="form-group">
          
          <input type="hidden" name="surname" class="form-control" value="<?php echo $row['surname'];?>">
        </div>
        <div class="form-group">
            
            <input type="hidden" name="book"  class="form-control" value="<?php echo $row['book'];?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Vehicle Reg No.</label>
            <input type="text" name="plate" class="form-control" value="<?php echo $row['plate'];?>" readonly>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Reg Duration (Months)</label>
            <input type="text" name="month" class="form-control" value="<?php echo $row['month'];?>" readonly>
          </div>
          <div class="form-group">
           
            <input type="hidden" name="address" class="form-control" value="<?php echo $row['address']; ?>">
          </div>
                      
                      <div class="form-group">
                      <label for="exampleInputPassword1">Payment</label>
                      <select name="payment" class="form-control">
                      <option selected disabled class="text-hide">Select Payment Option</option>
                      <option value="Ecocash">One Wallet</option>
                      <option value="Paynow">Paynow</option>
                      <option value="Visa">Ecocash</option>
                      </select>
                     </div>
                     
                    
                    <button type="submit" name="update" class="btn btn-danger">Pay Receipt</button>
                    
                   
                  </form>
                  
                  <?php $pdf =$row['id']; 
                  
                  ?>
                   
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
               $payment = $_POST["payment"];

               if (isset($_POST["update"])){
                $sql = "UPDATE details SET name='$name', surname='$surname', book='$book', plate='$plate', month='$month', address='$address', payment='$payment' WHERE id='$id'";
                   if (mysqli_query($conn, $sql)) { ?>
                       <br><h5 style="text-align:center;color:red">PAYMENT SUCCESSFUL</h5>

                       <br><p style="text-align:center"><a href="print.php?id=<?php echo $pdf ?>" class="btn btn-primary" role="button">View Receipt</a></p>
                       
                  <?php } else {
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
