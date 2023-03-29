<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <?php 

         if(isset($_GET["direction"])){
            echo Asset::css($_GET["direction"].".css");
        }
        else{
            echo Asset::css("west.css");
        } 

    ?>
    <title> <?php echo $title; ?> </title>
</head>

<body>
<header>
        <nav class="navbar">
            <li><a <?php echo $active1;?>
                <?php echo 'href="https://cs.colostate.edu:4444/~calebrc/cs312/fuelviews/index.php/eastwest/';
                    echo $direction;
                    echo '"';
                ?>>Movies Home</a>
            </li>
            <li><a <?php echo $active2;?>
                <?php echo 'href="./';
                    echo $direction2;
                    echo '"';
                ?>>Synecdoche, New York</a>
            </li>
            <li><a <?php echo $active3;?>
                <?php echo 'href="./';
                    echo $direction3;
                    echo '"';
                ?>>Aftersun</a>
            </li>
            <li><a 
                <?php echo 'href="./';
                    echo $otherDirection;
                    echo '"';
                ?>><?php echo $nextDir ?></a>
            </li>
            <li>
                <a href="https://cs.colostate.edu:4444/~calebrc/">Root Home</a>
            </li>
            
        </nav>
    </header>

    <?php echo $content; ?>

    <footer>
        <p>
            Made By: Caleb Chou<br>
            Contact At: calebrc@colostate.edu
        </p>
    </footer>
</body>


