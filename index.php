<!DOCTYPE html>
<html>
<head>
<style>  
    
    
    
body, html, .main {
    height: 100%;
    
}  
section {
    min-height: 100%;
    }   
    #gallery{
        background: url('same.jpg');
    }
    #dropdown-menu{
           background-color: transparent
       }
    #login{
        background: url('same.jpg');   
        background-size: 1350px 750px;
        background-repeat: no-repeat;
    }
    #signup{
        background: url('same.jpg');
    }
    #transparent{
        background-color: rgba(0,0,0,0.8);
        height: 100%;
        width: 100%;
    }
    #about{
        background: url('samee.jpg');
        background-size: 1350px 900px;
        background-repeat: no-repeat;
    }
    img{
        width: 100%;
        height: auto;
        
        
    }
    #me{
        background-color: rgba(0,0,0,0.7);
        height: 100%;
        width: 100%;
    }
    .header{
    font-size: 3em;
    color: white;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>.error{color:white;}</style>
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

<nav class="navbar navbar-default navbar-fixed-top" style="background-color: transparent;border-color: transparent;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage" style="letter-spacing: 7px;color:white;"><img src="logo1.PNG" alt="Pixel" style="width:100px;height:80px;color:white;" class="img-rounded" >STUDIO
</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"  style = "color:white;background-color: transparent">GALLERY <span class="caret"></span></a>
        <ul class="dropdown-menu" style = "background-color: transparent; text-align: right">
          <li><a href="#" style = "color:white; background-color: transparent;">ANIMALS</a></li>
          <li><a href="#" style = "color:white; background-color: transparent;">BIRDS</a></li>
          <li><a href="#" style = "color:white; background-color: transparent;">FRUITS</a></li>
          <li><a href="gallery.html" style = "color:white; background-color: transparent;">FLOWERS</a></li>
          <li><a href="#" style = "color:white; background-color: transparent;">NATURES</a></li>
          <li><a href="#" style = "color:white; background-color: transparent;">VAN</a></li>

        </ul>
      </li>
        <li><a href="#signup"  style = "color:white;letter-spacing: 2px;">SIGNUP</a></li>
        <li><a href="#login"  style = "color:white;letter-spacing: 2px;">LOGIN</a></li>
        <li><a href="#about"  style = "color:white;letter-spacing: 2px;">ABOUT</a></li>
      </ul>
    </div>
  </div>
</nav> 
    
<!gallery section>
<div class="main" id="gallery">
    <div id = "transparent">
        <section  style ="padding-top: 50px;"></section>
    </div>
</div>
    

<!login section>
<div class="main" id = "login">
        <div id = "transparent">
        <div class = "col-sm-3"></div>
	        <div class = "col-sm-6" style="padding-top: 15%">	
	            <div class="header" size = "">Login</div>
	            <form action="login.php" method="post">
	                <div class="form-group">
	                    <input class="form-control" placeholder="Enter email" type="text" name="email" 
	                    style = "background-color:transparent;color:white;" value="<?php echo $email;?>"><br>
	                </div>
	                <div class="form-group">
	                    <input class="form-control" placeholder="Enter password" type="password" name="password" 
	                    style = "background-color:transparent;color:white;" value="<?php echo $password;?>"><br>
	                    
	                </div>
	                    <input type="submit" name="submit" class="btn btn-default" value="login" 
	                    style = "background-color: transparent;color:white;"><br><br>
	                    <span class="error"><?php echo $emailpassError;?></span>
	                    <label><?php echo $flag ?></label>
	            </form>
	        </div>
        </div>   
       </section>
   </div>  
</div>
    
    
    

    <!SignUp section>

<div class="main" id = "signup">
        <div id = "transparent">
        <div class = "col-sm-3"></div>
        <div class = "col-sm-6" style="padding-top: 10%">
            <div class="header">Signup</div>
            <form action="signup.php" method="post">
                <div class="form-group">
                    <input class="form-control" placeholder="Enter name" type="text" name="name" size = "500px" style = "background-color:transparent;color:white;" value="<?php echo $name;?>"><br>
                    <span class="error"><?php echo $nameError;?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Enter email" type="text" name="email" 
                    style = "background-color:transparent;color:white;" value="<?php echo $email;?>"><br>
                    <span class="error"><?php echo $emailError;?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Enter password" type="password" name="password" 
                    style = "background-color:transparent;color:white;" value="<?php echo $password;?>"><br>
                    <span class="error"><?php echo $passwordError;?></span>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Retype password" type="password" name="rpassword" 
                    style = "background-color:transparent;color:white;" value="<?php echo $rpassword;?>"><br>
                    <span class="error"><?php echo $rpasswordError;?></span>
                </div>
                    <input type="submit" name="submit" class="btn btn-default" value="signup" style = "background-color: transparent;color:white;"><br><br>
                    <label><?php echo $flag ?></label>
            </form></div>
            </div>
        </div>
      </div>	
    </body>
</html>

    

    <!about me section>
<div class="main" id="about">
    <div id = "me">
  <section style="padding-top:10px;">
        <div class="col-sm-7" >
           <p style = "font-size: 40px;color: white;font-style: italic;margin-top: 200px;text-align: right">" Bootstrap is the most popular HTML, CSS, and JavaScript framework for developing responsive, mobile-first websites.

Bootstrap is completely free to download and use!"</p>            
      </div>
      <div class = "col-sm-12" style = "margin-top: 5%">
          <a href="https://www.linkedin.com/in/bheem-kumar-1b294113a/" target = "_blank"><img src = "social/if_online_social_media_linked_in_734383.png" style ="height:50px;width:auto;"></a>
          <a href="https://twitter.com/nitdbheem" target = "_blank"><img src = "social/if_online_social_media_twitter_734377.png" style ="height:50px;width:auto;"></a>
          <a href="https://www.facebook.com/sameer.kumar.750546" target = "_blank"><img src = "social/if_facebook_online_social_media_734399.png" style ="height:50px;width:auto;"></a>
          <a href="https://www.instagram.com/my_style.art/" target = "_blank"><img src = "social/if_instagram_online_social_media_734394.png" style ="height:50px;width:auto;"></a>
      </div>
        </section>
        </div>
</div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();
        
      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
</body>
</html>
