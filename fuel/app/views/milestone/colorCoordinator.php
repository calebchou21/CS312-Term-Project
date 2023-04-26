<header>
        <div class="header" >
            <div><?php echo Asset::img("goodLogo.png", array('id'=>'logo')) ?></div>
            <h1>JCC Incorporated</h1>
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
 <?php  echo Asset::js("formValidation.js", array('defer'=>''));  ?>  

<form method="get" id="color-form">
    <label for="rows-columns">Enter number of rows and columns:</label>   
    <p class="invisible" id="rowColError">Please enter number 1-26</p>
    <input type="text" id="rows-columns" name="rows-columns">
    <label for="num-colors">Enter number of colors:</label>
    <p class="invisible" id="colorError">Please enter number 1-10</p>  
    <input type="number" id="num-colors" name="num-colors">
    <button type="submit">Submit</button>
    <p id="colorFormError" class="invisible">Please do not select duplicates</p>
</form> 




<?php 


if($table){   

    //build first table
    echo '<form method="post" action="printView/'.$colors.'/'.$rowCols.'" name="colorTable">';
    echo '<table id=table1>';
        for($i=0; $i < $colors; $i++){

            //Build first column 
            echo "<tr>";
            echo "<td>";

            

            echo '<select id = ';
            echo 'selector';
            echo $i;
            echo ' onchange="validateDropdown()">';

            
    
            //Build drop down menus (this sucks)
            echo '<option value="red" '; 
            if($i==0){echo "selected";}
            echo '> Red </Option>';
           
            echo '<option value="orange" '; 
            if($i==1){echo "selected";}
            echo '> Orange </Option>';
            echo '<option value="yellow" '; 
            if($i==2){echo "selected";}
            echo '> Yellow </Option>';
            echo '<option value="green" '; 
            if($i==3){echo "selected";}
            echo '> Green </Option>';
            echo '<option value="blue" '; 
            if($i==4){echo "selected";}
            echo '> Blue </Option>';
            echo '<option value="purple" '; 
            if($i==5){echo "selected";}
            echo '> Purple </Option>';
            echo '<option value="grey" '; 
            if($i==6){echo "selected";}
            echo '> Grey </Option>';
            echo '<option value="brown" '; 
            if($i==7){echo "selected";}
            echo '> Brown </Option>';
            echo '<option value="black" '; 
            if($i==8){echo "selected";}
            echo '> Black </Option>';
            echo '<option value="teal" '; 
            if($i==9){echo "selected";}
            echo '> Teal </Option>';
            echo "</select>";


            echo "<input type='radio' name='options' value='option1' ";
            if ($i == 0) {
                echo "checked";
            }
            echo ">";

            echo "</td>";

           

            $j = $i +1;
            echo "<td>";
            echo "<p>".$j." Row</p>";
            echo "</td>";
            echo "</tr>";
        }
    echo "</table>";

    echo '<table id=table2>';
    

    $letter = 'A';
    $number = 1;

    for($i=0; $i <= $rowCols; $i++){
        echo '<tr>';
        
        for($j=0; $j <= $rowCols; $j++){
            echo '<td>';
            if($i == 0 && $j==0){continue;}
            if($i==0){echo '<p>'; echo $letter++; echo '</p>';} 
            if($j==0){echo '<p>'; echo $number++; echo '</p>';}
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    
    echo '<button type="submit">Print View</button>';
    echo '</form>';



}
    

?>

