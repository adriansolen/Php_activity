<!-- Create a Database Connection File
In this step, you need to create a file name db.php and update the below code into your file.
The below code is used to create a MySQL database connection in PHP. When you need to insert form data into MySQL database, there you will include this file: -->

<?php
    $servername='localhost:3308';
    $username='root';
    $password='';
    $dbname = "addie";

    $conn=mysqli_connect($servername,$username,$password,"$dbname");

      if(!$conn){
          die('Could not Connect MySql Server:' .mysqli_connect_error());
        }

?>