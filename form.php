<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send us Message</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    <link href="style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {   
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $gender = $_POST["gender"];
            $timecall = $_POST["timecall"];
            $today = date("Y-m-d H:i:s");
            $birth = $_POST["birth"];
            $message = $_POST["message"];
            $file = $_FILES["myfile"];
            if ($name != "" && $email != "" && $phone != ""){
                try{
                    $conn = new PDO("mysql:host=localhost;dbname=feedback", "root", "321");
                    $sql = "INSERT INTO feedback_list (`date`, `name`, `email`, `timecall`,`message`,`phone`,`birth`) 
                    VALUES ('$today', '$name', '$email','$timecall', '$message', '$phone', '$birth')";
                    $affectedRowsNumber = $conn->exec($sql);
                    // если добавлена как минимум одна строка
                    // if($affectedRowsNumber > 0 ){
                    //     echo "Data successfully added: name= $name  email= $email";  
                    // }
                }
                catch (PDOException $e){
                    $errormessage = "Database error: " . $e->getMessage(); 
                    echo "<script>alert('$errormessage');</script>";
                    }
            }
        }
    ?>
    <main>
        <a href="table.php" class="feedback_page"><strong>Users feedback list</strong></a>
        <div class="container">
            <form method="post" enctype="multipart/form-data" onsubmit="send(event, 'send.php')" id="form">
                <div id="errorMess"></div>
                <h3>SEND US MESSAGE</h3>
                <div class="form-group">
                    <label for="name">Full Name</label><br>
                    <input type="text " id="name" name="name" placeholder="Your Name" class="form-control" required><br>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" placeholder="Your phone number" class="form-control" required><br>
                </div>
                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Your Email" class="form-control" required><br>
                </div>
                <div class="form-group">
                    <label for="birth">Birthday</label>
                    <input type="date" class="form-control" id="birth" name="birth">
                </div>

                <div class="row">
                    <span class="form-check">Gender</span>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender">
                            <label class="form-check-label"for="gender">F</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="Мужчина" >
                            <label class="form-check-label" for="gender1">M</label>
                        </div>      
                    </div>              
                    <div class="form-group col">
                        <label for="timecall">time to call </label>
                        <select id="timecall" class="form-control" name="timecall">
                            <option disabled>Choose time to call</option>
                            <option selected="selected" value="9:00-12:00">9:00-12:00</option>
                            <option selected="selected" value="12:00-15:00">12:00-15:00</option>
                            <option selected="selected" value="15:00-18:00">15:00-18:00</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" placeholder="Your Message"
                        class="form-control"></textarea><br>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" name="myfile[]" multiple id="myfile">
                </div>
                <div class="checkbox form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox" checked required>
                    <label class="form-check-label" for="checkbox">Permission for the processing of personal data</label>
                </div>
                <button type="submit" id="sendMail" class="btn btn-success">SUBMIT</div>
            </form>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/formMail.js"></script>

    </main>
</body>

</html>