<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $coursename = $_POST["coursename"];
        $coursedesc = $_POST["coursedesc"];
        $coursecat = $_POST["coursecat"];
        $conn = mysqli_connect("localhost", "batch1", "batch1", "db_tiongsan", "3307");

        $sql = "INSERT INTO `tbl_courses`(`course_name`, `course_description`, `category`) VALUES ('$coursename', '$coursedesc', '$coursecat')";

        $result = $conn->query($sql);
        if($result){
            echo "Course Created Successfully";
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
    <div class="container">
        <header class = "row"></header>
        <main class = "row">
            <h1>Create Course</h1>
            <form action="" method = "POST">
                <label for="coursename">Course Name</label>
                <input type="text" name="coursename" class="form-control"> 

                <label for="coursedesc" class="form-label">Course Description</label>
                <textarea name="coursedesc" id="coursedesc" class="form-control"></textarea>

                <label for="coursecat">Course Category</label>
                <input type="text" name="coursecat" class="form-control">

                <center><input type="submit" value="Create Course" class="btn btn-danger mt-3"></center>
            </form>
        </main>
        <footer class = "row"></footer>
    </div>




        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>