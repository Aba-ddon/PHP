<?php
$con = mysqli_connect("localhost", "farm", "farm-try", "game", 3306);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($con, $_POST['username']);
$points = (int) $_POST['points'];

if (!$username || $points <= 0) {
    die("Invalid data");
}


$check = mysqli_query($con, "SELECT id, total_points FROM players WHERE username = '$username'");

if (mysqli_num_rows($check) > 0) {
    
    mysqli_query($con, "UPDATE players 
        SET total_points = total_points + $points, 
            last_played = NOW() 
        WHERE username = '$username'");
} else {
    
    mysqli_query($con, "INSERT INTO players (username, total_points, last_played) 
        VALUES ('$username', $points, NOW())");
}

mysqli_close($con);
?>
