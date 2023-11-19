<!-- Create Simple Login Form In PHP

In this step, you need to create a form, where you accept user email id and password. So you can create a login.php file and update the below code into your file.
The below code is used to show login form and authenticate the user from MySQL database in PHP. -->

<?php
session_start();
 
require_once "db.php";
 
if (isset($_SESSION['id']) != "") {
    header("Location: dashboard.php");
}
 
if (isset($_POST['login'])) {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash('sha256',mysqli_real_escape_string($conn, $_POST['password']));
    // echo $password;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
    }
   //  if (strlen($password) < 6) {
   //      $password_error = "Password must be minimum of 6 characters";
   //  }
     
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email . "' and password = '" . $password . "'");
    // echo $result;
    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['id']     = $row['id'];
        $_SESSION['user_name']   = $row['name'];
      //   $_SESSION['user_mobile'] = $row['mobile'];
        $_SESSION['user_email']  = $row['email'];
        header("Location: dashboard.php");
    } else {
        $error_message = "Incorrect Email or Password!!!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Email" id="username" name="email" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="password" name="password" id="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            
            <!-- <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="register.html">Forgot Password</a>
            </div> -->
            
            <input type="submit" class="btn" onclick="validate()" name="login" value="submit">

            
            <div class="register-link">
                <p> Don't have an account? <a href="register.php"><u>Register</u></a></p>
            </div>
            
        </form>
    </div>

</body>
</html>

