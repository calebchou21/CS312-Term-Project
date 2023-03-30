<?php 
        function checkURL(){    
            if(strlen($_SERVER['REQUEST_URI']) < 20){
                return true;
            } else{
                return false;
            }  
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <?php echo Asset::css("milestone.css");?>
</head>
<body>
    <header>
        <div class="header" >
            <h1>JCC Incorporated</h1>
            <hr>
            <h2>An awesome company</h2>
        </div>
        <div class="navbar">
            <li><a href = "./index">Home</a></li>
            <li><a 
            <?php 
            if(checkURL()){
                echo 'href="./index.php/milestone/about"';
            }else{
                echo 'href="./about"';
            } 
            ?>>About</a></li>
            <li><a <?php 
            if(checkURL()){
                echo 'href="./index.php/milestone/colorCoordinator"';
            }else{
                echo 'href="./colorCoordinator"';
            } 
            ?>>Color Coordinator</a></li>
        </div>
    </header>
    
    <?php echo $content ?>
</body>
</html>