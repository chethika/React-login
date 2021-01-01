<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['email'])){
        // removes backslashes
	$email = stripslashes($_REQUEST['email']);
        //escapes special characters in a string
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE email='$email'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['email'] = $email;
            // Redirect user to index.php
	    header("Location: userlistview.html");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{
?>

<!-- end -->

    <div class="box">
        <h2>Login</h2>
        <form method="post" name="login">
            <label>E mail</label>
            <div class="inputBox">
                <input type="text" name="email" required>
            </div>
            <label>Password</label>

            <div class="inputBox">
                <input type="password" name="password" required>
            </div>
            <input type="submit" name="submit" value="Login"><br><br>
            <a href="register.php">Don't have an account..click here</a>
        </form>
    </div>
    <?php } ?>