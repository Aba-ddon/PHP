<?php
    
    $conn = mysqli_connect("localhost", "batch1", "batch1", "db_tiongsan", "3307");

    $sql = "SELECT * FROM `tbl_courses`";
    $result = $conn->query($sql);
    $courses = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $courses[] = $row;
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <header class="row bg-primary">
            <div class="col-4"><nav class="navbar bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand" href="#">
                    <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
                    </a>
                </div>
                </nav>
            </div>

            <div class="col-4">col2</div>
            <div class="col-4">col3</div>
        </header>

        <main class="row p-3 gx-5">
            <?php
                foreach($courses as $course){
                    ?>
                        <div class="card col-3 m-2" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $course["course_name"];?></h5>
                                <p class="card-text"><?php echo $course["course_description"];?></p>
                                <a href="#" class="btn btn-danger">Show More</a>
                            </div>
                        </div>
                    <?php        
                }
            ?>
        </main>

        <footer class="row bg-primary">Footer</footer>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>