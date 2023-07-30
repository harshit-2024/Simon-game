<?php
    $inserted = false;
    if(isset($_POST['point'])){

        $server = "sql311.infinityfree.com";
        $username = "if0_34721877";
        $password = "Dg5910pCTwH";

        $con = mysqli_connect($server, $username, $password);

        if(!$con){
            die('could not connect: ' . mysqli_connect_error());
        }

        // echo "Success";

        $point = $_POST['point'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO `if0_34721877_simongame`.`feedback` (`point`, `comment`, `date`) VALUES ('$point', '$comment', current_timestamp());";
        // echo $sql;

        if($con->query($sql) == true){
            // echo "Succes";
            $inserted = true;
            header("refresh:3;url=index.html");
        }
        else{
            echo "Error: $sql <br/> $con->error";
        }

        $con->close();

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="./css/feedback.css">
</head>
<body>
    
    <div id="wrapper">
        <div class="container">
            
            <?php

                if($inserted == true){
                    echo "<div class='thank'>
                    <h2>Thanks for your valuable feedback!!😊</h2>
                </div>";
                }
            ?>                
            
            <form action="./feedback.php" method="post">

                <div class="top-container">
                    <h2>Send us your feedback</h2>
                </div>
                <div class="bottom-container">
                    <h4>Based on your experience how likely are you to recommend this game to your friend?</h4>
                    
                    <div class="rating">
                        <input type="radio" name="point" id="one" value="1">
                        <label for="one">1</label>
                        
                        <input type="radio" name="point" id="two" value="2">
                        <label for="two">2</label>

                        <input type="radio" name="point" id="three" value="3">
                        <label for="three">3</label>

                        <input type="radio" name="point" id="four" value="4">
                        <label for="four">4</label>

                        <input type="radio" name="point" id="five" value="5">
                        <label for="five">5</label>

                        <input type="radio" name="point" id="six" value="6">
                        <label for="six">6</label>

                        <input type="radio" name="point" id="seven" value="7">
                        <label for="seven">7</label>

                        <input type="radio" name="point" id="eight" value="8">
                        <label for="eight">8</label>

                        <input type="radio" name="point" id="nine" value="9">
                        <label for="nine">9</label>

                        <input type="radio" name="point" id="ten" value="10">
                        <label for="ten">10</label>
                    </div>

    
                    <div class="text-feed">
                        <h4>Would you like to add a comment?</h4>
                        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                    </div>
    
                    <div class="btn">
                        <button id="submit" type="submit">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</body>
</html>