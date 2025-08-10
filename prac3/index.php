<?php
    $con = mysqli_connect("localhost", "farm", "farm-try", "game", 3306);
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
        display:flex;
        justify-content: center;
        align-items: center;
        height: 75px;
        background-color: teal;
    }

    .section{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        padding: 20px;
    }

    .cards{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: grey;
        border:10px;
        border-radius:15px;
        width: 100%;
        height:300px;
        color:white;
    }

    .popup{
        display:none;
        position:fixed;
        top:0; left:0;
        width:100%;
        height:100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content:center;
        align-items:center;
    }

    @media(max-width: 780px) {
        .section{
            grid-template-columns: repeat(1, 1fr);
            align-items:center;
        }

        .card{
            width:90%;
        }


    }
</style>
<body>
    <header>
        <input type="text" id = "username" placeholder = "Enter Your Name">
    </header>

    <div class="section">
       <?php 
       $query1 = "SELECT * FROM `quests`";
        $result1 = mysqli_query($con, $query1);
        while ($row = mysqli_fetch_assoc($result1)) {
            echo '
            <div class="cards">
                <h2>' . $row['quest_name'] . '</h2>
                <h3>' . $row['description'] . '</h3>
                <h4>Difficulty: ' . $row['difficulty'] . '</h4>
                <p> ' . $row['point_value'] . ' Points</p>
                <button onclick = "startQuest(
                    \'' . addslashes($row['quest_name']) . '\',
                    \'' . addslashes($row['question']) . '\',
                    \'' . addslashes($row['answer']) . '\',
                    ' . (int)$row['point_value'] . '
                )">Start Quest</button>
            </div>
            ';
        }
        ?> 
    </div>

    <div class="popup" id = "popup">
        <div style = "background-color:white; padding: 20px; border-radius:20px; width: 300px; text-align: center;">
            <h2 id = "questTitle"></h2>
            <h3 id = "questQuestion"></h3>
            <input type="text" id = "answer" placeholder = "Your Answer Here"><br><br>
            <button onclick = "submitAnswer()">Submit</button>
            <button onclick = "closePopup()">Cancel</button>
        </div>
    </div>

</body>

<script>
    let correctAnswer = "";
    let currentPoints = 0;

    function startQuest(name, question, answer, points){
        document.getElementById('questTitle').innerText = name;
        document.getElementById('questQuestion').innerText = question;
        correctAnswer = answer.toLowerCase();
        currentPoints = points;
        document.getElementById('popup').style.display = "flex";
    }

    function closePopup(){
        document.getElementById('popup').style.display = "none";
    }

    function submitAnswer(){
        let ans = document.getElementById('answer').value.trim().toLowerCase();
        let username = document.getElementById("username").value.trim();
        if (ans === correctAnswer){
            if (!username){
                alert ('Please Enter your Name first');
                return;
            }

            fetch("save_score.php",{
                method: "POST",
                headers:{"content-type": "application/x-www-form-urlencoded"},
                body: "username=" + encodeURIComponent(username) + "&points=" + encodeURIComponent(currentPoints)
            }).then(() =>{
                alert("Your Answer is Correct! Points Added");
                closePopup();
            });
        } else{
            alert("Your Answer is Incorrect, please try again.")
        }
    }
</script>
</html>