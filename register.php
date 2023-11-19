<!DOCTYPE html>

<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="lala">
        <h2>Registration Form</h2>
        <form class="wrapper" action="register.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" required><br><br>

            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>

<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validation (you can add more validation as needed)
    if ($password !== $confirm_password) {
        die("Password and Confirm Password do not match");
    }

    $sample = hash('sha256', $password);

    // Database connection (You should replace with your database credentials)
    $db_host = "localhost:3308";
    $db_user = "root";
    $db_password = "";
    $db_name = "addie";

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user data into the database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$sample')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>