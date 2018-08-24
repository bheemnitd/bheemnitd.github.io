
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
    <style>.error{color:black;}</style>
  </head>
  <body>
      
      <?php

          $name=$email=$password="";
          $signup="Sign Up";
          $login=" Login";
          $nameError=$emailError=$passwordError=$rpasswordError="";
         if(isset($_POST['submit']))
         {
            if (empty($_POST['name'])) 
            {
                $nameError= 'Name is required';
            } 
             elseif (!preg_match('/^[a-zA-Z ]*$/',$_POST['name'])) 
            {
                $nameError = 'Only letters and white space allowed';
            }
             else
            {
                $name = test_input($_POST['name']);
            }
             
             
            if(empty($_POST["email"])) 
            {
              $emailError = "Email is required";
            } 
            elseif (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                $emailError = "Invalid email format"; 
            }
             else
            {
                $email = test_input($_POST["email"]);                
            }
             
            if(empty($_POST['password']))
            {
                $passwordError='Password required';                    
            }
             elseif(strlen($_POST['password'])<8)
            {
                 $passwordError='Password atleast 8 charecter long'; 
            }
             else
            {
                $password=test_input($_POST['password']);    
            }
             
            if(empty($_POST['rpassword']))
            {
                $rpasswordError='Retype Password';                    
            }
             elseif($_POST['password'] != $_POST['rpassword'])
            {
                $rpasswordError='Password not matched'; 
            }
             else
            {
                $rpassword=test_input($_POST['rpassword']); 
            }  
        }
      function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
     }
      
      
      if(!empty($name) and !empty($email) and !empty($password) and !empty($rpassword))
      {
        // Create connection
        $conn = new mysqli("localhost", "root", 'root',"Bazar");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "INSERT INTO Employee (name,email,password)
        VALUES ('$name','$email','$password')";
        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully";
            $flag="signup sucessful";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            //$flag=$email." already exist";
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
        <div class="header" >signup</div>
        <div>
            <form action="signup.php" method="post">
                <div class="form-group">
                    <input class="form-control" placeholder="Enter name" type="text" name="name" value="<?php echo $name;?>"><br>
                    <span class="error"><?php echo $nameError;?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Enter email" type="text" name="email" value="<?php echo $email;?>"><br>
                    <span class="error"><?php echo $emailError;?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Enter password" type="password" name="password" value="<?php echo $password;?>"><br>
                    <span class="error"><?php echo $passwordError;?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Retype password" type="password" name="rpassword" value="<?php echo $rpassword;?>"><br>
                    <span class="error"><?php echo $rpasswordError;?></span>
                </div>
                    <input type="submit" name="submit" class="btn btn-default" value="Submit"><br><br>
                    <label><?php echo $flag ?></label>
            </form>
        </div>
      </div>
    </body>
</html>