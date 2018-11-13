 
<!DOCTYPE html>
<html>
	<head>	
    <title>login</title>
    <link href="login/css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico:400,700,300|Roboto:400,100,100italic,300,300italic,400italic,500italic,500' ' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,500,600,700,300' rel='stylesheet' type='text/css'>
    <!--webfonts-->
        </head>
<body>	
<!--start-login-form-->
<div class="main">
    <div class="login-head">
        <h1>Login form</h1>
    </div>
<div  class="wrap">
    
<div class="Login">
    <div class="Login-head">
    <h3>LOGIN</h3>
    </div>

    <form action="login.php" method="post" >
            <div class="ticker">
                <h4>Username</h4>
                <input type="text" value="Please enter username" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'John Smith';}" ><span> </span>
                <div class="clear"> </div>
            </div>
            <div>
            <h4>Username</h4>
            <input type="password" value="" name="pass" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
               <div class="clear"> </div>
            </div>
         
            <div class="submit-button">
              <input type="submit" onclick="myFunction()" value="LOGIN" >
             <a href="index.php" class="smoothScroll">Cancel</a>


            </div>
               <div class="clear"> </div>
            </div>
</div>
</div>
<?php
include './DataBaeseConn/myconn.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
$username =$_POST["name"];
$password = $_POST["pass"];

$sql = "SELECT * FROM employee where Username= '$username' and Password='$password'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    session_start();
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['myID'] = $row['id'];
        $_SESSION['myUsername'] = $row['Username'];
      
        header('Location: ./gallarycontrolpanel.php'); 
    }
  }
   
    else 
     {
             echo '<br/><br/><br/><br/>';
             echo "<h3 align='center'>Invalid Username or Password</h3>"; 
     }   
    }
?>				
  </form>
</div>
	<!--//End-login-form-->	
  
	<div class ="copy-right">
          <p>Template by <a href="https://www.linkedin.com/in/oday-al-bayati-11b97b162/">Oday Albayai</a></p>
        </div>
 </div>
</body>
</html>


