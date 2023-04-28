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
    <?php echo Asset::css($css);?>
</head>
<body>  
    <div class = "content"><?php echo $content ?></div>
</body>
</html>