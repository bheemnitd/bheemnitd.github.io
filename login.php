
<!DOCTYPE html>
<html lang="en">
<head>
  <title>signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="signup.css"/>
  </head>
  <body>
      
      <?php

          $name=$email=$password="";
          $signup="Sign Up";
          $login=" Login";
          $emailpassError="";
         if(isset($_POST['submit']))
         {           
             
            if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                $flag='Email or Password is not matched!'; 
            }
             else
            {
                $email = test_input($_POST["email"]);                
            }
             
             
            
            if(strlen($_POST['password'])<8)
            {
                 $flag='Email or Password is not matched!'; 
            }
             else
            {
                $password=test_input($_POST['password']);    
            }  
             
        }
      function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
     }
    if(!empty($email) and !empty($password))
    {
      // Create connection
        $conn = new mysqli('localhost', 'root', 'root', 'Bazar');
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT name,password FROM Employee WHERE email='$email';";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
            $row=$result->fetch_assoc();
            if($password!=$row['password'])
            {
               $flag='Email or Password is not matched!'; 
            }
            else
            {
            $signup=$row['name'];
            $login=" Logout";
            }
    
        } 
        else 
        {
            $flag=$email." not exist!";
        }
        $conn->close();
    }
  ?>

  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Page 1</a></li>
          <li><a href="#">Page 2</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> <?php echo $signup;?></a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span><?php echo $login;?></a></li>
        </ul>
      </div>
    </nav>

    
    <div class="container" style="background-color:#f4511e">
        <div class="header">login</div>
        <div>
            <form action="login.php" method="post">
                <div class="form-group">
                    <input class="form-control" placeholder="Enter email" type="text" name="email" value="<?php echo $email;?>"><br>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Enter password" type="password" name="password" value="<?php echo $password;?>"><br>
                    
                </div>
                    <input type="submit" name="submit" class="btn btn-default" value="Submit"><br><br>
                    <span class="error"><?php echo $emailpassError;?></span>
                    <label><?php echo $flag ?></label>
            </form>
        </div>
      </div>
    </body>
</html>