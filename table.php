<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .feedback-row-2 {
            margin-bottom: 10px;
        }

        .feedback-date {
            font-style: italic;
            font-size: small;
        }

        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .page-header {
            padding: 20px;
        }
    </style>

</head>
<body>

<div class="main-container">

<div class="page-header"><h5>Feedback</h5></div>
<?php
try {
    $conn = new PDO("mysql:host=localhost; dbname=feedback", "root", "321");
    $sql = "SELECT * FROM feedback_list";
    $result = $conn->query($sql);
    echo    "<div class='container' style=''>";
    
    while($row = $result->fetch()){

        echo "<div class='row'>";
        echo "<div class='col-2 feedback-date'>" . $row["date"] . "</div>";
        echo "<div class='col-2'>" . $row["name"] . "</div>";
        echo "<div class='col-1'>" . $row["gender"] . "</div>";
        echo "<div class='col-2'>" . $row["email"] . "</div>";
        echo "<div class='col-2'>" . $row["phone"] . "</div>";
        echo "<div class='col-2'>" . $row["birth"] . "</div>";
        echo "</div>";
        
        echo "<div class='row feedback-row-2'>";
        echo "<div class='col-2'></div>";
        echo "<div class='col-3'>" .$row["message"] . "</div>"; 
        echo "<div class='col-3'>Time to call " .$row["timecall"] . "</div>"; 
        echo "</div>";
    }
    echo "</div>";
}
catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
</div>
</body>

</html>
