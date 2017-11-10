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
    <div class="container ">

        <div class="row">
            <div class="col-lg-6">
                <h3>Registration Form</h3>

                <form action="confirmation.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">First Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Last Name</label>
                      <input type="text" name="surname" class="form-control" placeholder="Surname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Vehicle Book No</label>
                        <input type="text" name="book"  class="form-control" placeholder="Book No">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Vehicle Reg No.</label>
                        <input type="text" name="plate" class="form-control" placeholder="Reg No">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Payment Duration (Months)</label>
                        <input type="text" name="month" class="form-control" placeholder="duration">
                      </div>
                      <div class="form-group">
                        <label for="comment">Address:</label>
                        <textarea class="form-control" rows="5" name="address"></textarea>
                      </div>
                    
                    <button type="submit" class="btn btn-primary">Register</button>
                  </form>
                
            </div>
            <div class="col-lg-6">
            <img src="images/registration.png" />
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
