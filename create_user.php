<?php
/**
 * Request Method: POST, GET
 * *POST = $_POST[];
 * GET = $_GET[];
 */
if($_SERVER["REQUEST_METHOD"] =="POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $password = $password . "system";

    //encryption
    $cipher = password_hash($password, PASSWORD_DEFAULT);
    echo "Plain Password: $password <br>";
    echo "Cipher Password: $cipher <br>";

    //decryption
    $password = "admin1234system"; //for checking wrong password
    $decrypted = password_verify($password, $cipher);
    echo "Decrypted Password: $decrypted <br>";


    //Database Connection
    // [servername, username, password, database name, port]
    $conn = mysqli_connect("localhost", "batch1", "batch1", "db_tiongsan", "3307");

    //check connection
    if($conn->connect_error){
        echo "Connection failed" .$conn->connect_error;
    }
    else{
        echo "Connected";
    }

    //Insert Query
    $sql = "INSERT INTO `tbl_users`(`username`, `password`, `role`) VALUES ('$username','$cipher', '$role')";
    $conn->query($sql);
    
}
 
?>