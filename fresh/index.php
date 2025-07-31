<?php

$con = mysqli_connect("localhost", "farm", "farm-try", "farm", 3306);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    header{
        display: flex;
        justify-content: space-evenly;
        padding: 20px;
        background-color: teal;
        align-items: center;
        gap: 75%;
        height: 50px;
    }

    .nav{
        display: flex;
        justify-content: center;
        gap: 40px;
    }
    .nav li{
        list-style: none;
    }

    .nav li a{
        text-decoration: none;
        color: beige;
    }

    .section{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
        
    }

    .card{
        width: 300px;
        height: 400px;
        border: 1px solid black;
        margin: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 10px;
    }

    .card img{
        width: 100%;
        height: 200px;
        border: 1px solid teal;
        border-radius: 10px;
    }

    
</style>
<body>
    <header>
        <img src="" alt="Logo">

        <div class="nav">
            <li><a href="">Home</a></li>
            <li><a href="">Cart</a></li>
        </div>
    </header>

    <div class="section">
        <?php
        $query1 = "SELECT * FROM `tbl_Products` LIMIT 3";
        $result1 = mysqli_query($con, $query1);
        while ($row = mysqli_fetch_assoc($result1)){
            echo '
            <div class = "card">
                <img src="' . $row['image'] . '" alt="">
                <div class="contents"> <h2>' . $row['product_name'] . '</h2>
                <h4>' . $row['price'] . 'Per' .$row['unit_type'] . '</h4>
                <button>Add To Cart</button>
                </div>
            </div>';
        }
        ?>
    </div>
    
</body>
</html>