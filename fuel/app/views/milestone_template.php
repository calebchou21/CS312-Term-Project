<?php 
        function checkURL(){    
            $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            if(strcmp($url, "http://www.cs.colostate.edu/~calebrc/m1/")==0){
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
            <h1>Company</h1>
            <hr>
            <h2>Subheader</h2>
        </div>
        <div class="navbar">
            <li><a 
            href="https://cs.colostate.edu:4444/~calebrc/m1/index.php/milestone/">Home</a></li>
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