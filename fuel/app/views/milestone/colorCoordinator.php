<header>
        <div class="header" >
            <div><?php echo Asset::img("goodLogo.png", array('id'=>'logo')) ?></div>
            <h1>JCC Incorporated</h1>
            <h2>An awesome company</h2>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script>
                $(document).ready(function(){
                                $("#addBtn").click(function(){
                        $.name = prompt("Color Name");
                        $.hexVal = prompt("Hex Value (Do not include the #)");
                        $.hexVal = parseInt(hexVal, 16);
                        $.ajax({
                            method: "POST",
                            url: "add.php",
                            data: { colorName: $.name, hexVal: $.hexVal }
                        }).done(function( response ) {
                            alert("Color Added!");
                        });
                    });
                });
                        </script>
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
 <?php  echo Asset::js("formValidation.js", array('defer'=>''));  
    $query2 = DB::query('SELECT COUNT(*) FROM Colors', DB::SELECT)->execute();
    $colorsDB = $query2[0]['COUNT(*)'];
    echo '<p id="colorsDB" style="display:none">'.$colorsDB.'</p>';
 ?>  

<form method="get" id="color-form">
    <label for="rows-columns">Enter number of rows and columns</label>   
    <p class="invisible" id="rowColError">Please enter number 1-26</p>
    <input type="text" id="rows-columns" name="rows-columns">
    <label for="num-colors">Enter number of colors</label>
    <?php echo '<p class="invisible" id="colorError">Please enter number 1-'.$colorsDB.'</p>'; ?>
    <input type="number" id="num-colors" name="num-colors">
    <button class="submit" type="submit">Submit</button>
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


           

            echo '<select name="Color'.$i.'" id = ';
            echo 'selector';
            echo $i;
            echo '>';

            

            $query = DB::query('SELECT * FROM Colors', DB::SELECT)->execute();
            //Build drop down menus (this sucks)
            for($k = 0; $k < $colorsDB; $k++){
                echo '<option class="colorOption" value="'.$query[$k]['colorName'].'"'; 
                if($i==$k){echo "selected";}
                echo '>'.$query[$k]['colorName'].'</Option>';
            }


            echo "<input type='radio' name='options' value='option1' ";
            if ($i == 0) {
                echo "checked";
            }
            echo ">";

            echo "</td>";

           

            $j = $i+1;
            echo "<td id='row$j' name = 'row$j'>";
            echo "<input id='text$j' name='text$j' type='text' readonly>";
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

            echo "<td onclick='colorCell(this)' >";
            /* echo "<td onclick='colorCell(this)' onclick='colorCord(this)'>"; */
            
               

            if($i == 0 && $j==0){continue;}
            
            if($i==0){echo '<p>'; echo $letter++; echo '</p>';} 
            if($j==0){echo '<p>'; echo $number++; echo '</p>';}
             
            echo '</td>';
            
        }
        echo '</tr>';
    }
    echo '</table>';
    echo '<button class="submit" type="submit">Print View</button>';
    echo '</form>';



}

    

?>

